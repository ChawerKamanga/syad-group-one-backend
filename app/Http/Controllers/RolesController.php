<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RolesController extends Controller
{
    public function __construct() {
        $this->middleware(['auth']);
    }
    
    public function index()
    {   
        $msg = "User Roles";
        $this->authorize('isAdmin', Auth::user());
        $roles = Role::orderBy('id', 'asc')->paginate(10);
        return view('roles.index', ['roles' => $roles, 'msg' => $msg]);
    }

    public function store(Request $request)
    {   
        $this->authorize('isAdmin', Auth::user());
        $this->validate($request, [
            'role_name' => 'required|unique:roles',
        ]);

        // Store Role
        Role::create([
            'role_name' => $request->role_name,
        ]);

        return back()->with('success', 'Role added successfully!');
    }

    public function update(Role $role, Request $request)
    {   
        $this->authorize('isAdmin', Auth::user());
        $this->validate($request, [
            'role_name' => 'required|unique:roles',
        ]);

        $role->update(['role_name' => $request->role_name]);

        return back()->with('success', 'Role updated successfully!');
    }

    public function destroy(Role $role)
    {   
        $this->authorize('isAdmin', Auth::user());
        $role->delete();
        return back()->with('success', 'Role Deleted successfully!');   
    }
}
