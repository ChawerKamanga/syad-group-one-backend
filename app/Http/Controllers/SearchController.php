<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $msg = 'Search Results';
        $results = null;

        if ($query = $request->get('query')) {
            $results = User::search($query)->paginate(10);
        }

        return view('search.index',
            [
                'results' => $results,
                'msg' => $msg
            ]
        );
    }
}
