<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ProgramsController extends Controller
{
    private $msg = 'Univeristy Programs';

    public function __construct() {
        $this->middleware(['auth']);
    }
    
    public function index()
    {
        $this->authorize('isAdmin', Auth::user());
        $programs = Program::orderBy('program_code', 'asc')->paginate(10);

        return view('programs.index', ['programs' => $programs, 'msg' => $this->msg]);
    }

    public function create()
    {   
        $this->authorize('isAdmin', Auth::user());
        return view('programs.create', ['msg' => $this->msg]);
    }

    public function store(Request $request)
    {   
        $this->authorize('isAdmin', Auth::user());
        $this->validate($request, [
            'program_code' => 'required|max:10|unique:programs',
            'program_name' => 'required',
        ]);

        // Store Program
        Program::create([
            'program_code' => $request->program_code,
            'program_name' => $request->program_name,
        ]);

        return redirect(route('programs.index'))->with('success', 'Program added successfully!');
    }

    public function edit(Program $program)
    {   
        $this->authorize('isAdmin', Auth::user());
        return view('programs.edit', ['program' => $program, 'msg' => $this->msg]);
    }

    public function update(Program $program, Request $request)
    {   
        $this->authorize('isAdmin', Auth::user());
        $this->validate($request, [
            'program_code' => 'required | max:10 ',
            'program_name' => 'required',
        ]);

        
        $program->update(['program_code' => $request->program_code, 'program_name' => $request->program_name]);

        return redirect(route('programs.index'))->with('success', 'Program updated successfully!');
    }

    public function destroy(Program $program)
    {   
        $this->authorize('isAdmin', Auth::user());
        $program->delete();
        return back()->with('success', 'Program Deleted successfully!');
    }
}
