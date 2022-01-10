<?php

namespace App\Http\Controllers;

use App\Models\FaultReport;
use Illuminate\Http\Request;

class ReportedFaultscontroller extends Controller
{
    public function index()
    {
        $reportedFaults =  FaultReport::all();
        $msg = 'Reported Faults';
        return view('maintenance.faults.reports', ['reportedFaults' => $reportedFaults, 'msg' => $msg]);
    }

    public function solved($id)
    {
        $faultReport = FaultReport::findOrFail($id);

        
        if ($faultReport->is_solved == 0) {
            $faultReport->update([
                'is_solved' => 1,
            ]);
            return back()->with('success', 'Fault is marked as solved!');
        } else {
            $faultReport->update([
                'is_solved' => 0,
            ]);
            return back()->with('success', 'Fault is marked as not solved!');
        }
        

        return back()->with('warning', 'Failed to update, Please try again!');
    }

}
