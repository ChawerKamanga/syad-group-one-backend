<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ApplicantsOrderController extends Controller
{
    private $numberOfUnallalocated;
    private $numberOfUnallalocatedMales;
    private $numberOfUnallalocatedFemales;
    private $numberOfUnallalocatedDisability;
    private $numberOfUnallalocatedYear5;
    private $numberOfUnallalocatedYear4;
    private $numberOfUnallalocatedYear3;
    private $numberOfUnallalocatedYear2;
    private $numberOfUnallalocatedYear1;

    public function __construct() {
        $this->middleware(['auth']);
        $this->numberOfUnallalocated = DB::table('users')->where([
            ['role_id', '=', '1'],
            ['is_allocated', '=', '0'],
        ])->get()->count();

        $this->numberOfUnallalocatedMales = DB::table('users')->where([
            ['role_id', '=', '1'],
            ['is_allocated', '=', '0'],
            ['gender' , '=', 'M']
        ])->get()->count();

        $this->numberOfUnallalocatedFemales = DB::table('users')->where([
            ['role_id', '=', '1'],
            ['is_allocated', '=', '0'],
            ['gender' , '=', 'F']
        ])->get()->count();

        $this->numberOfUnallalocatedDisability = DB::table('users')->where([
            ['role_id', '=', '1'],
            ['is_allocated', '=', '0'],
            ['has_disability' , '=', '1']
        ])->get()->count();

        $this->numberOfUnallalocatedYear5  = DB::table('users')->where([
            ['role_id', '=', '1'],
            ['is_allocated', '=', '0'],
            ['year_of_study' , '=', '5']
        ])->get()->count();

        $this->numberOfUnallalocatedYear4  = DB::table('users')->where([
            ['role_id', '=', '1'],
            ['is_allocated', '=', '0'],
            ['year_of_study' , '=', '4']
        ])->get()->count();

        $this->numberOfUnallalocatedYear3 = DB::table('users')->where([
            ['role_id', '=', '1'],
            ['is_allocated', '=', '0'],
            ['year_of_study' , '=', '3']
        ])->get()->count(); 
        
        $this->numberOfUnallalocatedYear2 = DB::table('users')->where([
            ['role_id', '=', '1'],
            ['is_allocated', '=', '0'],
            ['year_of_study' , '=', '2']
        ])->get()->count(); 
        
        $this->numberOfUnallalocatedYear1 = DB::table('users')->where([
            ['role_id', '=', '1'],
            ['is_allocated', '=', '0'],
            ['year_of_study' , '=', '1']
        ])->get()->count(); 
    }

    public function showApplicants()
    {
        $this->authorize('isAdmin', Auth::user());
        $routeName = 'Ordered by Date';
        $newApplicatants = User::orderBy('created_at', 'desc')->where(['role_id' => 1, 'is_allocated' => 0])->paginate(10);
        return view(
            'student_application.new_applicants', 
            [
                'newApplicatants' => $newApplicatants, 
                'routeName' => $routeName,
                'numberOfUnallalocated' => $this->numberOfUnallalocated,
                'numberOfUnallalocatedMales' => $this->numberOfUnallalocatedMales,
                'numberOfUnallalocatedFemales' => $this->numberOfUnallalocatedFemales,
                'numberOfUnallalocatedDisability' => $this->numberOfUnallalocatedDisability,
                'numberOfUnallalocatedYear5' => $this->numberOfUnallalocatedYear5,
                'numberOfUnallalocatedYear4' => $this->numberOfUnallalocatedYear4,
                'numberOfUnallalocatedYear3' => $this->numberOfUnallalocatedYear3,
                'numberOfUnallalocatedYear2' => $this->numberOfUnallalocatedYear2,
                'numberOfUnallalocatedYear1' => $this->numberOfUnallalocatedYear1,
                'msg' => $routeName
        ]);
    }

    public function showApplicantsByProgram()
    {
        $this->authorize('isAdmin', Auth::user());
        $routeName = 'Ordered by Program';
        $newApplicatants = User::orderBy('email','asc')
                                ->orderBy('year_of_study', 'desc')
                                ->where(['role_id' => 1, 'is_allocated' => 0])
                                ->paginate(10);
        return view(
            'student_application.new_applicants', 
            [
                'newApplicatants' => $newApplicatants, 
                'routeName' => $routeName,
                'numberOfUnallalocated' => $this->numberOfUnallalocated,
                'numberOfUnallalocatedMales' => $this->numberOfUnallalocatedMales,
                'numberOfUnallalocatedFemales' => $this->numberOfUnallalocatedFemales,
                'numberOfUnallalocatedDisability' => $this->numberOfUnallalocatedDisability,
                'numberOfUnallalocatedYear5' => $this->numberOfUnallalocatedYear5,
                'numberOfUnallalocatedYear4' => $this->numberOfUnallalocatedYear4,
                'numberOfUnallalocatedYear3' => $this->numberOfUnallalocatedYear3,
                'numberOfUnallalocatedYear2' => $this->numberOfUnallalocatedYear2,
                'numberOfUnallalocatedYear1' => $this->numberOfUnallalocatedYear1,
                'msg' => $routeName
        ]);
    }

    public function showApplicantsByYear()
    {
        $this->authorize('isAdmin', Auth::user());
        $routeName = 'Ordered by Year';
        $newApplicatants = User::orderBy('year_of_study', 'desc')
                                ->orderBy('email','asc')
                                ->where(['role_id' => 1, 'is_allocated' => 0])
                                ->paginate(10);
        return view(
            'student_application.new_applicants', 
            [
                'newApplicatants' => $newApplicatants, 
                'routeName' => $routeName,
                'numberOfUnallalocated' => $this->numberOfUnallalocated,
                'numberOfUnallalocatedMales' => $this->numberOfUnallalocatedMales,
                'numberOfUnallalocatedFemales' => $this->numberOfUnallalocatedFemales,
                'numberOfUnallalocatedDisability' => $this->numberOfUnallalocatedDisability,
                'numberOfUnallalocatedYear5' => $this->numberOfUnallalocatedYear5,
                'numberOfUnallalocatedYear4' => $this->numberOfUnallalocatedYear4,
                'numberOfUnallalocatedYear3' => $this->numberOfUnallalocatedYear3,
                'numberOfUnallalocatedYear2' => $this->numberOfUnallalocatedYear2,
                'numberOfUnallalocatedYear1' => $this->numberOfUnallalocatedYear1,
                'msg' => $routeName
        ]);
    }
    
    public function showApplicantsMales()
    {
        $this->authorize('isAdmin', Auth::user());
        $routeName = 'Males';
        $newApplicatants = User::orderBy('year_of_study', 'desc')
            ->where(['gender' =>'M', 'role_id' => 1, 'is_allocated' => 0])
            ->paginate(10);
        return view(
            'student_application.new_applicants', 
            [
                'newApplicatants' => $newApplicatants, 
                'routeName' => $routeName,
                'numberOfUnallalocated' => $this->numberOfUnallalocated,
                'numberOfUnallalocatedMales' => $this->numberOfUnallalocatedMales,
                'numberOfUnallalocatedFemales' => $this->numberOfUnallalocatedFemales,
                'numberOfUnallalocatedDisability' => $this->numberOfUnallalocatedDisability,
                'numberOfUnallalocatedYear5' => $this->numberOfUnallalocatedYear5,
                'numberOfUnallalocatedYear4' => $this->numberOfUnallalocatedYear4,
                'numberOfUnallalocatedYear3' => $this->numberOfUnallalocatedYear3,
                'numberOfUnallalocatedYear2' => $this->numberOfUnallalocatedYear2,
                'numberOfUnallalocatedYear1' => $this->numberOfUnallalocatedYear1,
                'msg' => $routeName
        ]);   
    }

    public function showApplicantsFemales()
    {
        $this->authorize('isAdmin', Auth::user());
        $routeName = 'Females';
        $newApplicatants = User::orderBy('year_of_study', 'desc')
            ->where(['gender' => 'F','role_id' => 1, 'is_allocated' => 0])
            ->paginate(10);
        return view(
            'student_application.new_applicants', 
            [
                'newApplicatants' => $newApplicatants, 
                'routeName' => $routeName,
                'numberOfUnallalocated' => $this->numberOfUnallalocated,
                'numberOfUnallalocatedMales' => $this->numberOfUnallalocatedMales,
                'numberOfUnallalocatedFemales' => $this->numberOfUnallalocatedFemales,
                'numberOfUnallalocatedDisability' => $this->numberOfUnallalocatedDisability,
                'numberOfUnallalocatedYear5' => $this->numberOfUnallalocatedYear5,
                'numberOfUnallalocatedYear4' => $this->numberOfUnallalocatedYear4,
                'numberOfUnallalocatedYear3' => $this->numberOfUnallalocatedYear3,
                'numberOfUnallalocatedYear2' => $this->numberOfUnallalocatedYear2,
                'numberOfUnallalocatedYear1' => $this->numberOfUnallalocatedYear1,
                'msg' => $routeName
        ]);   
    }

    public function showApplicantsWithDisability()
    {
        $this->authorize('isAdmin', Auth::user());
        $routeName = 'With Disabilities';
        $newApplicatants = User::orderBy('year_of_study', 'desc')
            ->where(['has_disability' => 1, 'role_id' => 1, 'is_allocated' => 0])
            ->paginate(10);
        return view(
            'student_application.new_applicants', 
            [
                'newApplicatants' => $newApplicatants, 
                'routeName' => $routeName,
                'numberOfUnallalocated' => $this->numberOfUnallalocated,
                'numberOfUnallalocatedMales' => $this->numberOfUnallalocatedMales,
                'numberOfUnallalocatedFemales' => $this->numberOfUnallalocatedFemales,
                'numberOfUnallalocatedDisability' => $this->numberOfUnallalocatedDisability,
                'numberOfUnallalocatedYear5' => $this->numberOfUnallalocatedYear5,
                'numberOfUnallalocatedYear4' => $this->numberOfUnallalocatedYear4,
                'numberOfUnallalocatedYear3' => $this->numberOfUnallalocatedYear3,
                'numberOfUnallalocatedYear2' => $this->numberOfUnallalocatedYear2,
                'numberOfUnallalocatedYear1' => $this->numberOfUnallalocatedYear1,
                'msg' => $routeName
        ]);   
    }

    public function showYear5()
    {
        $this->authorize('isAdmin', Auth::user());
        $routeName = 'Galantaz';
        $newApplicatants = User::orderBy('email', 'asc')
            ->where(['year_of_study' => 5, 'role_id' => 1, 'is_allocated' => 0])
            ->paginate(10);
        return view(
            'student_application.new_applicants', 
            [
                'newApplicatants' => $newApplicatants, 
                'routeName' => $routeName,
                'numberOfUnallalocated' => $this->numberOfUnallalocated,
                'numberOfUnallalocatedMales' => $this->numberOfUnallalocatedMales,
                'numberOfUnallalocatedFemales' => $this->numberOfUnallalocatedFemales,
                'numberOfUnallalocatedDisability' => $this->numberOfUnallalocatedDisability,
                'numberOfUnallalocatedYear5' => $this->numberOfUnallalocatedYear5,
                'numberOfUnallalocatedYear4' => $this->numberOfUnallalocatedYear4,
                'numberOfUnallalocatedYear3' => $this->numberOfUnallalocatedYear3,
                'numberOfUnallalocatedYear2' => $this->numberOfUnallalocatedYear2,
                'numberOfUnallalocatedYear1' => $this->numberOfUnallalocatedYear1,
                'msg' => $routeName
        ]);   
    } 
    
    public function showYear4()
    {
        $this->authorize('isAdmin', Auth::user());
        $routeName = 'Finalez';
        $newApplicatants = User::orderBy('email', 'asc')
            ->where(['year_of_study' => 4, 'role_id' => 1, 'is_allocated' => 0])
            ->paginate(10);
        return view(
            'student_application.new_applicants', 
            [
                'newApplicatants' => $newApplicatants, 
                'routeName' => $routeName,
                'numberOfUnallalocated' => $this->numberOfUnallalocated,
                'numberOfUnallalocatedMales' => $this->numberOfUnallalocatedMales,
                'numberOfUnallalocatedFemales' => $this->numberOfUnallalocatedFemales,
                'numberOfUnallalocatedDisability' => $this->numberOfUnallalocatedDisability,
                'numberOfUnallalocatedYear5' => $this->numberOfUnallalocatedYear5,
                'numberOfUnallalocatedYear4' => $this->numberOfUnallalocatedYear4,
                'numberOfUnallalocatedYear3' => $this->numberOfUnallalocatedYear3,
                'numberOfUnallalocatedYear2' => $this->numberOfUnallalocatedYear2,
                'numberOfUnallalocatedYear1' => $this->numberOfUnallalocatedYear1,
                'msg' => $routeName
        ]);   
    } 

    public function showYear3()
    {
        $this->authorize('isAdmin', Auth::user());
        $routeName = 'Associates';
        $newApplicatants = User::orderBy('email', 'asc')
            ->where(['year_of_study' => 3, 'role_id' => 1, 'is_allocated' => 0])
            ->paginate(10);
        return view(
            'student_application.new_applicants', 
            [
                'newApplicatants' => $newApplicatants, 
                'routeName' => $routeName,
                'numberOfUnallalocated' => $this->numberOfUnallalocated,
                'numberOfUnallalocatedMales' => $this->numberOfUnallalocatedMales,
                'numberOfUnallalocatedFemales' => $this->numberOfUnallalocatedFemales,
                'numberOfUnallalocatedDisability' => $this->numberOfUnallalocatedDisability,
                'numberOfUnallalocatedYear5' => $this->numberOfUnallalocatedYear5,
                'numberOfUnallalocatedYear4' => $this->numberOfUnallalocatedYear4,
                'numberOfUnallalocatedYear3' => $this->numberOfUnallalocatedYear3,
                'numberOfUnallalocatedYear2' => $this->numberOfUnallalocatedYear2,
                'numberOfUnallalocatedYear1' => $this->numberOfUnallalocatedYear1,
                'msg' => $routeName
        ]);   
    } 

    public function showYear2()
    {
        $this->authorize('isAdmin', Auth::user());
        $routeName = 'Ambuye contiz';
        $newApplicatants = User::orderBy('email', 'asc')
            ->where(['year_of_study' => 2, 'role_id' => 1, 'is_allocated' => 0])
            ->paginate(10);
        return view(
            'student_application.new_applicants', 
            [
                'newApplicatants' => $newApplicatants, 
                'routeName' => $routeName,
                'numberOfUnallalocated' => $this->numberOfUnallalocated,
                'numberOfUnallalocatedMales' => $this->numberOfUnallalocatedMales,
                'numberOfUnallalocatedFemales' => $this->numberOfUnallalocatedFemales,
                'numberOfUnallalocatedDisability' => $this->numberOfUnallalocatedDisability,
                'numberOfUnallalocatedYear5' => $this->numberOfUnallalocatedYear5,
                'numberOfUnallalocatedYear4' => $this->numberOfUnallalocatedYear4,
                'numberOfUnallalocatedYear3' => $this->numberOfUnallalocatedYear3,
                'numberOfUnallalocatedYear2' => $this->numberOfUnallalocatedYear2,
                'numberOfUnallalocatedYear1' => $this->numberOfUnallalocatedYear1,
                'msg' => $routeName
        ]);   
    } 
    public function showYear1()
    {
        $this->authorize('isAdmin', Auth::user());
        $routeName = 'Yaroz';
        $newApplicatants = User::orderBy('email', 'asc')
            ->where(['year_of_study'=> 1, 'role_id' => 1, 'is_allocated' => 0])
            ->paginate(10);
        return view(
            'student_application.new_applicants', 
            [
                'newApplicatants' => $newApplicatants, 
                'routeName' => $routeName,
                'numberOfUnallalocated' => $this->numberOfUnallalocated,
                'numberOfUnallalocatedMales' => $this->numberOfUnallalocatedMales,
                'numberOfUnallalocatedFemales' => $this->numberOfUnallalocatedFemales,
                'numberOfUnallalocatedDisability' => $this->numberOfUnallalocatedDisability,
                'numberOfUnallalocatedYear5' => $this->numberOfUnallalocatedYear5,
                'numberOfUnallalocatedYear4' => $this->numberOfUnallalocatedYear4,
                'numberOfUnallalocatedYear3' => $this->numberOfUnallalocatedYear3,
                'numberOfUnallalocatedYear2' => $this->numberOfUnallalocatedYear2,
                'numberOfUnallalocatedYear1' => $this->numberOfUnallalocatedYear1,
                'msg' => $routeName
        ]);   
    } 
}
