<?php

namespace App\Http\Controllers;

use App\Models\Fault;
use Illuminate\Http\Request;

class FaultSearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $msg = 'Search Results';
        $results = null;

        if ($query = $request->get('query')) {
            $results = Fault::search($query)->paginate(10);
        }

        return view('search.faults',
            [
                'results' => $results,
                'msg' => $msg
            ]
        );
    }
}
