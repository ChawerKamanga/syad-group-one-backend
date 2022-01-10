<?php

namespace App\Http\Controllers;

/**
 * @EmailDomainRule
 */

use App\Models\Hall;
use App\Models\Program;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maize\EmailDomainRule\EmailDomainRule;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    private $msg = 'Edit profile';

    public function __construct() {
        $this->middleware(['auth'])->except(['showForm', 'store']);
    }

    public function showForm()
    {
        $years = [1, 2, 3, 4, 5];
        $programs = Program::orderBy('program_code', 'asc')->get();
        return view('student_application.index', ['programs' => $programs, 'years' => $years]);
    }


    public function store(Request $request)
    {
        $email = $request->email;

        Validator::make([
            'email' => $email
        ], [
            'email' => [
                'string',
                'required',
                'email',
                'unique:users',
                new EmailDomainRule,
            ],
        ])->validated();

        // authenticate the application
        $this->validate($request, [
            'fullname' => 'required',
            'reg_number' => ['required', 'unique:users','not_regex:/[*|\":<>[\]{}`\\()\'\\;\/@&$]/'],
            'phonenumber' => 'required',
            'year_of_study' => 'required',
            'program' => 'required',
            'payment_photo' => 'required|image|max:2048',
            'gender' => 'required',
            'has_disability' => 'required',
            'password' => 'required|confirmed',
        ]);

        // store the application
        $file = $request->file('payment_photo');
        
        if ($file) {
            $imageName = $file->getClientOriginalName();
            
            $user = User::create([
                'fullname' => $request->input('fullname'),
                'email' => $request->input('email'),
                'reg_number' => $request->input('reg_number'),
                'program_id' => $request->input('program'),
                'year_of_study' => $request->input('year_of_study'),
                'payment_photo' => $imageName,
                'gender' => $request->input('gender'),
                'phonenumber' => $request->input('phonenumber'),
                'has_disability' => $request->input('has_disability'),
                'password' => Hash::make($request->input('password')),
                "slug" => "laravel-multiple-slug-urls-example",
            ]);

            $file->move('images/upload', $imageName);
            //dd();

            $user->save();

            if ($user) {
                auth()->attempt($request->only('email', 'password'));
                return redirect()->route('dashboard')->with('success', 'Application Sent');
            }
        }

    }


    public function show(User $user)
    {
        $campusHalls = Hall::orderBy('id', 'asc')->where('is_at_camp', 0)->get();
        $campHalls = Hall::orderBy('id', 'asc')->where('is_at_camp', 1)->get();
        $rooms = Room::orderBy('id', 'asc')->take(40)->get();
        $msg = 'Allocate student';

        if ($user->has_disability == 1) {
            if ($user->gender == 'M') {
                $campusHalls = Hall::orderBy('id', 'asc')
                ->where([
                    ['gender', '=', 'M'],
                    ['is_for_disability', '=', 1],
                ])
                ->get();

                return view('student_application.show', [
                    'user' => $user,
                    'campusHalls' => $campusHalls,
                    'campHalls' => null,
                    'rooms' => $rooms,
                    'msg' => $msg
                ]);
            }else  {
                $campusHalls = Hall::orderBy('id', 'asc')
                ->where([
                    ['gender', '=', 'F'],
                    ['is_for_disability', '=', 1],
                ])
                ->get();

                return view('student_application.show', [
                    'user' => $user,
                    'campusHalls' => $campusHalls,
                    'campHalls' => null,
                    'rooms' => $rooms,
                    'msg' => $msg
                ]);
            }
        }

        if ($user->gender == 'M' && $user->year_of_study >= 2) {
            $campusHalls = Hall::orderBy('id', 'asc')
                ->where([
                    ['is_at_camp', '=', 0],
                    ['gender', '=', 'M'],
                ])
                ->get();

            return view('student_application.show', [
                'user' => $user,
                'campusHalls' => $campusHalls,
                'campHalls' => null,
                'rooms' => $rooms,
                'msg' => $msg
            ]);
        }else {
            $campHalls = Hall::orderBy('id', 'asc')
            ->where([
                ['is_at_camp', '=', 1],
                ['gender', '=', 'M'],
            ])
            ->get();

            return view('student_application.show', [
                'user' => $user,
                'campusHalls' => null,
                'campHalls' => $campHalls,
                'rooms' => $rooms,
                'msg' => $msg
            ]);
        }

       
        if ($user->gender == 'F' && $user->year_of_study >= 2) {
            $campusHalls = Hall::orderBy('id', 'asc')
                ->where([
                    ['is_at_camp', '=', 0],
                    ['gender', '=', 'F'],
                ])
                ->get();

            return view('student_application.show', [
                'user' => $user,
                'campusHalls' => $campusHalls,
                'campHalls' => null,
                'rooms' => $rooms,
                'msg' => $msg
            ]);
        }

        return view('student_application.show', [
            'user' => $user,
            'campusHalls' => $campusHalls,
            'campHalls' => $campHalls,
            'rooms' => $rooms,
            'msg' => $msg
        ]);
    }

    public function edit(User $user)
    {
        return view('users.edit', ['user' => $user, 'msg' => $this->msg]);
    }

    public function update(User $user, Request $request)
    {    
         $this->validate($request, [
            'fullname' => 'required',
            'phonenumber' => 'required',
            'profile_pic' => 'image|max:2048',
            'password' => 'required|confirmed',
        ]);

        $file = $request->file('profile_pic');
        
        if ($file) {
            $imageName = $file->getClientOriginalName();
            
            $user->update([
                'fullname' => $request->input('fullname'),
                'profile_pic' => $imageName,
                'phonenumber' => $request->input('phonenumber'),
                'password' => Hash::make($request->input('password')),
            ]);

            $file->move('images/upload', $imageName);

            return redirect()->route('dashboard')->with('success', 'Profile Update');
        }
    }
}
