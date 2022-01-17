<?php

namespace App\Http\Controllers;

use App\Models\FaultReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportedFaultscontroller extends Controller
{
    public function __construct() {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $this->authorize('isAdmin', Auth::user());
        $reportedFaults =  FaultReport::all();
        $msg = 'Reported Faults';
        return view('maintenance.faults.reports', ['reportedFaults' => $reportedFaults, 'msg' => $msg]);
    }

    public function solved($id)
    {
        $this->authorize('isAdmin', Auth::user());
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
