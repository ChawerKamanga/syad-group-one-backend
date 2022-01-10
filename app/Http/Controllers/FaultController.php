<?php

namespace App\Http\Controllers;

use App\Models\Fault;
use App\Models\FaultReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FaultController extends Controller
{
    public function index()
    {
        $msg = 'Common Faults';
        $search = 'search';
        $commonfaults = Fault::orderBy('created_at', 'asc')->where('is_common', 1)->take(4)->get();
        $faults = Fault::orderBy('created_at', 'asc')->where('is_common', 0)->take(4)->get();
        return view('maintenance.index', ['commonfaults' => $commonfaults, 'msg' => $msg, 'faults' => $faults, 'search' => $search]);
    }

    public function create()
    {
        $msg = 'Report a Fault';
        return view('maintenance.create', ['msg' => $msg]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'fault_name' => 'required|unique:faults',
            'description' => 'required|max:200',
        ]);

        if ($request->is_common) {
            Fault::create([
                'fault_name' => $request->fault_name,
                'description' => $request->description,
                'is_common' => $request->is_common,
                'slug' => 'laravel-multiple-slug-urls-example',
            ]);
        }  else {
            if (Auth::user()->role_id == 1) {
                $fault = Fault::create([
                    'fault_name' => $request->fault_name,
                    'description' => $request->description,
                    'slug' => 'laravel-multiple-slug-urls-example',
                ]);

                FaultReport::create([
                    'user_id' => Auth::user()->id,
                    'fault_id' => $fault->id,
                ]);

                return redirect(route('maintenance.index'))->with('success', 'Fault reported our team will assist you soon!');
            }else {
                Fault::create([
                    'fault_name' => $request->fault_name,
                    'description' => $request->description,
                    'slug' => 'laravel-multiple-slug-urls-example',
                ]);
            }

        }      

        return redirect(route('maintenance.index'))->with('success', 'Fault added successfully!');
    }

    public function edit(Fault $fault)
    {
        $msg = 'Report a Fault';
        return view('maintenance.edit', ['msg' => $msg, 'fault' => $fault]);   
    }

    public function update(Fault $fault, Request $request)
    {
        $this->validate($request, [
            'fault_name' => 'required',
            'description' => 'required|max:200',
        ]);

        if ($request->is_common) {
            $fault->update([
                'fault_name' => $request->fault_name,
                'description' => $request->description,
                'is_common' => $request->is_common,
            ]);
        }else {
            $fault->update([
                'fault_name' => $request->fault_name,
                'description' => $request->description,
            ]);
        }


        return redirect(route('maintenance.index'))->with('success', 'Fault edited successfully!');
    }

    public function report($id)
    {
        $fault = Fault::FindOrFail($id);

        FaultReport::create([
            'user_id' => Auth::user()->id,
            'fault_id' => $fault->id,
        ]);      

        return redirect(route('maintenance.index'))->with('success', 'Fault reported our team will assist you soon!');
    }
}
