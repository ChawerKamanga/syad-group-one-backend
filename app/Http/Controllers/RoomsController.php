<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoomsController extends Controller
{
    private $msg = 'Rooms';
    public function __construct() {
        $this->middleware(['auth']);
    }
    
    public function index()
    {
        $this->authorize('isAdmin', Auth::user());
        $rooms = Room::orderBy('id', 'asc')->paginate(10);

        return view('rooms.index', ['rooms' => $rooms, 'msg' => $this->msg]);
    }

    public function create()
    {
        $this->authorize('isAdmin', Auth::user());
        $msg = 'Add Rooms';

        // for ($i=1; $i < 10; $i++) { 

        //     $room = new Room;
        //     $room->room_name = '#' . $i;
        //     $room->max_students = 4;

        //     if ($i > 20 && $i < 30) {
        //         $room->floor_number = 1;
        //     }elseif ($i > 30 && $i < 40) {
        //         $room->floor_number = 2;
        //     }

        //     $room->save();
        // }

        return view('rooms.create', ['msg' => $msg]);
    }

    public function store(Request $request)
    {
        $this->authorize('isAdmin', Auth::user());
        $this->validate($request, [
            'room_name' => 'required|unique:rooms',
            'max_students' => 'required',
        ]);

        Room::create([
            'room_name' => $request->room_name,
            'max_students' => $request->max_students,
            'floor_number' => $request->floor_number 
        ]);

        return redirect(route('rooms.index'))->with('success', 'Room added successfully!');
    }

    public function edit(Room $room)
    {
        $this->authorize('isAdmin', Auth::user());
        $msg = 'Edit Rooms';
        return view('rooms.edit', ['room' => $room, 'msg' => $msg]);
    }

    public function update(Room $room, Request $request)
    {
        $this->authorize('isAdmin', Auth::user());
        $this->validate($request, [
            'room_name' => 'required',
            'max_students' => 'required',
        ]);

        $room->update(['room_name' => $request->room_name, 'max_students' => $request->max_students ]);

        return redirect(route('rooms.index'))->with('success', 'Room updated successfully!');
    }

    public function destroy(Room $room)
    {
        $this->authorize('isAdmin', Auth::user());
        $room->delete();
        return back()->with('success', 'Room Deleted successfully!'); 
    }
}
