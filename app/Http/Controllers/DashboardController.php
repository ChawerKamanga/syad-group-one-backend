<?php

namespace App\Http\Controllers;

use App\Models\Allocation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardController extends Controller
{
    public function __construct() {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $msg = 'Dashboard';
        $mesho = DB::table('users')->where([
            ['room_id', '=', Auth::user()->room_id],
            ['hall_id', '=', Auth::user()->hall_id],
            ['id', '<>', Auth::user()->id],
        ])->first();
            
        $hallmates = User::orderBy('room_id', 'asc')->where([
            ['room_id', '<>', null],
            ['hall_id', '=', Auth::user()->hall_id],
            ['id', '<>', Auth::user()->id],
        ])->paginate(10);   


        return view('dashboard.index', ['mesho' => $mesho, 'hallmates' => $hallmates, 'msg' => $msg]);
    }

    public function showDash()
    {
        return view('dashboard.temp');
    }
}
