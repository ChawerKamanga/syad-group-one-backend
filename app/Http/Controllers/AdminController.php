<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Maize\EmailDomainRule\EmailDomainRule;

class AdminController extends Controller
{
    private $msg = 'Univeristy Admins';

    public function __construct() {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $this->authorize('viewAny', Auth::user());

        $admins = User::orderBy('id', 'asc')->where([
            ['role_id', '<>', '1'],
            ['is_admin', '=', '1']
        ])->paginate(10);

        return view('admin.index', ['admins' => $admins, 'msg' => $this->msg]);
    }

    public function create()
    {
        $this->authorize('create', Auth::user());

        $roles = Role::orderBy('id', 'asc')->get();

        return view('admin.create', ['roles' => $roles, 'msg' => $this->msg]);
    }

    public function register(Request $request)
    {
        $this->authorize('create', Auth::user());   
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
            'phonenumber' => 'required',
            'gender' => 'required',
            'password' => 'required',
            'role_id' => 'required',
        ]);
        
        User::create([
            'fullname' => $request->input('fullname'),
            'email' => $request->input('email'),
            'gender' => $request->input('gender'),
            'phonenumber' => $request->input('phonenumber'),
            'role_id' => $request->input('role_id'),
            'is_admin' => 1,
            'password' => Hash::make($request->input('password')),
            "slug" => "laravel-multiple-slug-urls-example",
        ]);

        return redirect(route('admin.index'))->with('success', 'User Added Successfully');
    }

    public function edit(User $user)
    {
        $this->authorize('update', Auth::user());
        $roles = Role::orderBy('id', 'asc')->get();
        return view('admin.edit', ['admin' => $user, 'roles' => $roles, 'msg' => $this->msg]);
    }

    public function update(Request $request, $id)
    {
        $this->authorize('update', Auth::user());
        $email = $request->email;

        Validator::make([
            'email' => $email
        ], [
            'email' => [
                'string',
                'required',
                'email',
                new EmailDomainRule,
            ],
        ])->validated();

        // authenticate the application
        $this->validate($request, [
            'fullname' => 'required',
            'phonenumber' => 'required',
            'gender' => 'required',
            'password' => 'required',
            'role_id' => 'required'
        ]);


        $updateAdmin = User::where('id', $id)->update(
            [
                'fullname' => $request->input('fullname'),
                'email' => $request->input('email'),
                'gender' => $request->input('gender'),
                'phonenumber' => $request->input('phonenumber'),
                'role_id' => $request->input('role_id'),
                'is_admin' => 1,
                'password' => Hash::make($request->input('password'))
            ]
        );

        if ($updateAdmin) {
            return redirect()->route('admin.index')->with('success', 'Company updated successfully');
        }
    }

    public function destroy($id, Request $request)
    {
        $user = User::findOrFail($id);
        if ($request->user()->cannot('delete', Auth::user())) {
            return back()->with('warning', 'You do not have permission to delete');
            abort(403);
        }
        if ($user->destroy($id)) {
            return back()->with('success', 'User deleted successfully');
        }
    }
}
