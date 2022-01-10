<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AllocatedStudentscontroller extends Controller
{
    private $numberOfallalocated;
    private $numberOfallalocatedMales;
    private $numberOfallalocatedFemales;
    private $numberOfallalocatedDisability;
    private $numberOfallalocatedYear5;
    private $numberOfallalocatedYear4;
    private $numberOfallalocatedYear3;
    private $numberOfallalocatedYear2;
    private $numberOfallalocatedYear1;

    public function __construct() {
        $this->middleware(['auth']);
        $this->numberOfallalocated = $numberOfallalocated = DB::table('users')->where([
            ['role_id', '=', '1'],
            ['is_allocated', '=', '1'],
        ])->get()->count();

        $this->numberOfallalocatedMales = $numberOfallalocatedMales = DB::table('users')->where([
            ['role_id', '=', '1'],
            ['is_allocated', '=', '1'],
            ['gender' , '=', 'M']
        ])->get()->count();

        $this->numberOfallalocatedFemales = $numberOfallalocatedFemales = DB::table('users')->where([
            ['role_id', '=', '1'],
            ['is_allocated', '=', '1'],
            ['gender' , '=', 'F']
        ])->get()->count();

        $this->numberOfallalocatedDisability = $numberOfallalocatedDisability = DB::table('users')->where([
            ['role_id', '=', '1'],
            ['is_allocated', '=', '1'],
            ['has_disability' , '=', '1']
        ])->get()->count();

        $this->numberOfallalocatedYear5 = $numberOfallalocatedYear5 = DB::table('users')->where([
            ['role_id', '=', '1'],
            ['is_allocated', '=', '1'],
            ['year_of_study' , '=', '5']
        ])->get()->count();

        $this->numberOfallalocatedYear4 = $numberOfallalocatedYear4 = DB::table('users')->where([
            ['role_id', '=', '1'],
            ['is_allocated', '=', '1'],
            ['year_of_study' , '=', '4']
        ])->get()->count();

        $this->numberOfallalocatedYear3 = $numberOfallalocatedYear3 = DB::table('users')->where([
            ['role_id', '=', '1'],
            ['is_allocated', '=', '1'],
            ['year_of_study' , '=', '3']
        ])->get()->count(); 
        
        $this->numberOfallalocatedYear2 = $numberOfallalocatedYear2 = DB::table('users')->where([
            ['role_id', '=', '1'],
            ['is_allocated', '=', '1'],
            ['year_of_study' , '=', '2']
        ])->get()->count(); 
        
        $this->numberOfallalocatedYear1 = $numberOfallalocatedYear1 = DB::table('users')->where([
            ['role_id', '=', '1'],
            ['is_allocated', '=', '1'],
            ['year_of_study' , '=', '1']
        ])->get()->count(); 
    }


    public function showAllocatedStudents()
    {
        $this->authorize('isAdmin', Auth::user());
        $msg = 'Allocated Students';
        $routeName = 'Ordered by Date';
        $newApplicatants = User::orderBy('created_at', 'desc')->where(['role_id' => 1, 'is_allocated' => 1])->paginate(10);
        return view(
            'student_application.allocated_applicants', 
            [
                'newApplicatants' => $newApplicatants, 
                'routeName' => $routeName,
                'numberOfallalocated' => $this->numberOfallalocated,
                'numberOfallalocatedMales' => $this->numberOfallalocatedMales,
                'numberOfallalocatedFemales' => $this->numberOfallalocatedFemales,
                'numberOfallalocatedDisability' => $this->numberOfallalocatedDisability,
                'numberOfallalocatedYear5' => $this->numberOfallalocatedYear5,
                'numberOfallalocatedYear4' => $this->numberOfallalocatedYear4,
                'numberOfallalocatedYear3' => $this->numberOfallalocatedYear3,
                'numberOfallalocatedYear2' => $this->numberOfallalocatedYear2,
                'numberOfallalocatedYear1' => $this->numberOfallalocatedYear1,
                'msg' => $msg
        ]);
    }
}
