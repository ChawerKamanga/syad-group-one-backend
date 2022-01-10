<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AllocatedStudentscontroller;
use App\Http\Controllers\AllocationController;
use App\Http\Controllers\ApplicantAssignmentController;
use App\Http\Controllers\ApplicantsOrderController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FaultController;
use App\Http\Controllers\FaultSearchController;
use App\Http\Controllers\HallsController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ProgramsController;
use App\Http\Controllers\ReportedFaultscontroller;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\RoomsController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Contact Us
Route::post('/contactus', [ContactUsController::class, 'store'])
    ->name('contactus');
Route::get('/contact-us', [ContactUsController::class, 'index'])->name('contactus.index');

Route::get('/', [LandingPageController::class, 'index']);
Route::get('/home', [LandingPageController::class, 'index'])->name('home');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Users routes
Route::get('application-form', [UsersController::class, 'showForm'])
    ->name('application');
Route::post('users', [UsersController::class, 'store'])
    ->name('users.store');
Route::get('users/{user:reg_number}/edit', [UsersController::class, 'edit'])->name('users.edit');
Route::put('users/{user}', [UsersController::class, 'update'])->name('users.update');


// Admin Routes
Route::get('admins/register', [AdminController::class, 'create'])->name('admin.register');
Route::get('admins', [AdminController::class, 'index'])->name('admin.index');
Route::post('admins/register', [AdminController::class, 'register'])->name('admin.register');
Route::get('admins/{user:slug}/edit', [AdminController::class, 'edit'])->name('admin.edit');
Route::get('admins/{user:slug}/edit-profile', [UsersController::class, 'edit'])->name('admin.editprofile');
Route::put('admins/{admin}', [AdminController::class, 'update'])->name('admin.update');
Route::delete('admins/{admin}', [AdminController::class, 'destroy'])->name('admin.destroy');

// Applicants Assignment
Route::get('/users/{user:reg_number}', [UsersController::class, 'show'])->name('users.show');

// New Applicants Order
Route::get('new-applicants', [ApplicantsOrderController::class, 'showApplicants'])->name('new-applicants');
Route::get('new-applicants-males', [ApplicantsOrderController::class, 'showApplicantsMales'])->name('new-applicants-males');
Route::get('new-applicants-females', [ApplicantsOrderController::class, 'showApplicantsFemales'])->name('new-applicants-females');
Route::get('new-applicants-with-disability', [ApplicantsOrderController::class, 'showApplicantsWithDisability'])->name('new-applicants-with-disability');
Route::get('new-applicants-year-5', [ApplicantsOrderController::class, 'showYear5'])->name('new-applicants-year-5');
Route::get('new-applicants-year-4', [ApplicantsOrderController::class, 'showYear4'])->name('new-applicants-year-4');
Route::get('new-applicants-year-3', [ApplicantsOrderController::class, 'showYear3'])->name('new-applicants-year-3');
Route::get('new-applicants-year-2', [ApplicantsOrderController::class, 'showYear2'])->name('new-applicants-year-2');
Route::get('new-applicants-year-1', [ApplicantsOrderController::class, 'showYear1'])->name('new-applicants-year-1');
Route::get('new-applicants-order-by-program', [ApplicantsOrderController::class, 'showApplicantsByProgram'])->name('new-applicants-order-by-program');
Route::get('new-applicants-order-by-year', [ApplicantsOrderController::class, 'showApplicantsByYear'])->name('new-applicants-order-by-year');

// Assigned Applicants
Route::get('allocated-students', [AllocatedStudentscontroller::class, 'showAllocatedStudents'])->name('allocated-students');


// Programs
Route::get('/programs', [ProgramsController::class, 'index'])->name('programs.index');
Route::get('/programs/create', [ProgramsController::class, 'create'])->name('programs.create');
Route::post('/programs', [ProgramsController::class, 'store'])->name('programs.store');
Route::get('/programs/{program:program_code}/edit', [ProgramsController::class, 'edit'])->name('programs.edit');
Route::put('/programs/{program}', [ProgramsController::class, 'update'])->name('programs.update');
Route::delete('/programs/{program}', [ProgramsController::class, 'destroy'])->name('programs.destroy');

// Roles 
Route::get('/roles', [RolesController::class, 'index'])->name('roles.index');
Route::post('/roles', [RolesController::class, 'store'])->name('roles.store');
Route::delete('/roles/{role}', [RolesController::class, 'destroy'])->name('roles.destroy');
Route::put('/roles/{role}', [RolesController::class, 'update'])->name('roles.update');


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

// Halls 
Route::get('halls', [HallsController::class, 'index'])->name('halls.index');
Route::get('halls/create', [HallsController::class, 'create'])->name('halls.create');
Route::post('halls', [HallsController::class, 'store'])->name('halls.store');
Route::get('halls/{hall:slug}/edit', [HallsController::class, 'edit'])->name('halls.edit');
Route::get('halls/{hall:slug}/students', [HallsController::class, 'show'])->name('halls.show');
Route::put('/halls/{hall}', [HallsController::class, 'update'])->name('halls.update');

//
Route::post('allocate', [AllocationController::class, 'store'])->name('allocation.store');
Route::delete('allocate/{user}', [AllocationController::class, 'deallocate'])->name('allocation.deallocate');

// Rooms
Route::get('rooms', [RoomsController::class, 'index'])->name('rooms.index');
Route::get('rooms/create', [RoomsController::class, 'create'])->name('rooms.create');
Route::post('rooms', [RoomsController::class, 'store'])->name('rooms.store');
Route::put('rooms/{room}', [RoomsController::class, 'update'])->name('rooms.update');
Route::get('/rooms/{room}/edit', [RoomsController::class, 'edit'])->name('rooms.edit');
Route::delete('rooms/{room}', [RoomsController::class, 'destroy'])->name('rooms.destroy');

// Maintenance 
Route::get('maintenance/faults', [FaultController::class, 'index'])->name('maintenance.index');
Route::get('maintenance/fault/create', [FaultController::class, 'create'])->name('maintenance.create');
Route::get('maintenance/fault/{fault:slug}', [FaultController::class, 'edit'])->name('maintenance.edit');
Route::put('maintenance/fault/{fault}', [FaultController::class, 'update'])->name('maintenance.update');
Route::post('maintenance/fault', [FaultController::class, 'store'])->name('maintenance.store');
Route::post('fault/report/{fault}', [FaultController::class, 'report'])->name('fault.report');

// Fault Reports
Route::get('fault/reports', [ReportedFaultscontroller::class, 'index'])->name('fault.reports');
Route::put('faultreports/{faultreport}', [ReportedFaultscontroller::class, 'solved'])->name('fault.solved');


Route::get('search', SearchController::class)->name('search');
Route::get('search-fault', FaultSearchController::class)->name('search.faults');
