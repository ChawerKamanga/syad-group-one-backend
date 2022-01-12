<?php

namespace App\Http\Controllers;

use App\Models\Allocation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function __construct()
    {
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
        $record = User::select(DB::raw("COUNT(*) as count"), DB::raw("DAYNAME(created_at) as day_name"), DB::raw("DAY(created_at) as day"))
            ->where('created_at', '>', Carbon::today()->subDay(6))
            ->groupBy('day_name', 'day')
            ->orderBy('day')
            ->get();
        
        $data = [];

        foreach ($record as $row) {
            $data['label'][] = $row->day_name;
            $data['data'][] = (int) $row->count;
        }


        $data['chart_data'] = json_encode($data);

        // return view('chart-js', $data);

        return view('dashboard.temp', $data);
    }
}
