<?php

namespace App\Http\Controllers;

use App\Models\Allocation;
use App\Models\User;
use Illuminate\Http\Request;

class AllocationController extends Controller
{
    public function __construct() {
        $this->middleware(['auth']);
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'hall_id' => 'required',
            'room_id' => 'required'
        ]);
        
        $isAllocated = Allocation::create([
            'hall_id' => $request->hall_id,
            'room_id' => $request->room_id,
            'user_id' => $request->user_id
        ]);

        if ($isAllocated) {
            $user = User::findOrFail($request->user_id);
            $user->allocation_id = $isAllocated->id;
            $user->hall_id = $isAllocated->hall_id;
            $user->room_id = $isAllocated->room_id;
            $user->is_allocated = 1;
            $user->save();
        }

        return redirect(route('new-applicants'))->with('success', 'Student has been allocated successfully!');
    }

    public function deallocate(User $user)
    {
        $isDeleted = $user->allocation->delete();
        if ($isDeleted) {
            $user->allocation_id = null;
            $user->hall_id = null;
            $user->room_id = null;
            $user->is_allocated = 0;   
            $user->save();
            return redirect(route('new-applicants'))->with('success', 'Student has been de-allocated successfully!');
        }

        return back()->with('warning', 'An error occurred when deleting');
    }
}
