<?php

namespace App\Http\Controllers;

use App\Models\Hall;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HallsController extends Controller
{
    public function __construct() {
        $this->middleware(['auth']);
    }
    
    public function index()
    {
        $this->authorize('isAdmin', Auth::user());
        $msg = 'Univeristy Halls';
        $campusHalls = Hall::orderBy('id', 'asc')->where('is_at_camp', 0)->get();
        $campHalls = Hall::orderBy('id', 'asc')->where('is_at_camp', 1)->get();
        return view('halls.index', ['campusHalls' => $campusHalls, 'campHalls' => $campHalls, 'msg' => $msg]);
    }

    public function create()
    {
        $this->authorize('isAdmin', Auth::user());
        $msg = 'Add Univeristy Halls';
        return view('halls.create', ['msg' => $msg]);
    }

    public function store(Request $request)
    {
        $this->authorize('isAdmin', Auth::user());

        $this->validate($request, [
            'hall_name' => 'required|unique:halls',
            'max_number' => 'required',
            'gender'=> 'required',
        ]);

        if ($request->is_at_camp && $request->is_for_disability) {
            Hall::create([
                'hall_name' => $request->hall_name,
                'max_students' => $request->max_number,
                'is_at_camp' => $request->is_at_camp,
                'gender' => $request->gender,
                'is_for_disability' => $request->is_for_disability,
                'slug' => 'laravel-multiple-slug-urls-example',
            ]);
        }else if ($request->is_at_camp && !$request->is_for_disability) {
            Hall::create([
                'hall_name' => $request->hall_name,
                'max_students' => $request->max_number,
                'is_at_camp' => $request->is_at_camp,
                'gender' => $request->gender,
                'slug' => 'laravel-multiple-slug-urls-example',
            ]);
        } else if (!$request->is_at_camp && $request->is_for_disability) {
            Hall::create([
                'hall_name' => $request->hall_name,
                'max_students' => $request->max_number,
                'gender' => $request->gender,
                'is_for_disability' => $request->is_for_disability,
                'slug' => 'laravel-multiple-slug-urls-example',
            ]);
        } else {
            Hall::create([
                'hall_name' => $request->hall_name,
                'max_students' => $request->max_number,
                'gender' => $request->gender,
                'slug' => 'laravel-multiple-slug-urls-example',
            ]);
        }

        return redirect(route('halls.index'))->with('success', 'Hall added successfully!');
    }

    public function edit(Hall $hall)
    {
        $this->authorize('isAdmin', Auth::user());
        $msg = 'Edit Univeristy Halls';
        return view('halls.edit', ['hall' => $hall, 'msg' => $msg]);
    }

    public function update(Hall $hall, Request $request)
    {
        $this->authorize('isAdmin', Auth::user());

        $this->validate($request, [
            'hall_name' => 'required',
            'max_number' => 'required',
            'gender'=> 'required'
        ]);
        // my code 
        if ($request->is_at_camp && $request->is_for_disability) {
            dd('I am here 1');
            $request->is_at_camp = 1;
            $hall->update([
                'hall_name' => $request->hall_name,
                'max_students' => $request->max_number,
                'is_at_camp' => $request->is_at_camp,
                'gender' => $request->gender,
                'is_for_disability' => $request->is_for_disability,
            ]);
        }else if ($request->is_at_camp && !$request->is_for_disability) {
            $request->is_at_camp = 1;
            $hall->update([
                'hall_name' => $request->hall_name,
                'max_students' => $request->max_number,
                'is_at_camp' => $request->is_at_camp,
                'gender' => $request->gender,
            ]);
        } else if (!$request->is_at_camp && $request->is_for_disability) {
            $hall->update([
                'hall_name' => $request->hall_name,
                'max_students' => $request->max_number,
                'gender' => $request->gender,
                'is_for_disability' => $request->is_for_disability,
            ]);
        } else {
            $hall->update([
                'hall_name' => $request->hall_name,
                'max_students' => $request->max_number,
                'gender' => $request->gender,
            ]);
        }


        return redirect(route('halls.index'))->with('success', 'Hall updated successfully!');
    }

    public function show(Hall $hall)
    {
        $msg = 'Students in ' . $hall->hall_name;
        $users = User::orderBy('room_id', 'asc')->where(['role_id' => 1, 'is_allocated' => 1, 'hall_id' => $hall->id])->paginate(10);
        return view('halls.show', ['hall' => $hall, 'users' => $users, 'msg' => $msg]);
    }
}
