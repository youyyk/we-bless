<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $apartment = Apartment::findOrFail($request->apartment_id);
        $num_floor = $apartment->num_floor;
        $floor = $request->input('floor');
        $validated = $request->validate([
           'apartment_id' => ['required'],
           'floor' => ['required', 'integer', 'min:1', "max:{$num_floor}"],
           'name' => ['required', 'min:3', 'max:10', "starts_with:{$floor}"],
           'type' => ['required', Rule::in(Room::$room_types)]
        ]);

        $room = new Room();
        $room->apartment_id = $request->input('apartment_id');
        $room->floor = $request->input('floor');
        $room->name = $request->input('name');
        $room->type = $request->input('type');
        $room->save();
        return redirect()->route('apartments.show',['apartment'=>$room->apartment->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        return view('rooms.show',[
            'room' => $room
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        return view('rooms.edit', [
            'room' => $room,
            'room_types' => Room::$room_types
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Room $room)
    {
        $num_floor = $room->apartment->floors;
        $floor = $request->input('floor');
        $rules = [
            'floor' => ['required', 'integer', 'min:1', "max:{$num_floor}"],
            'name' => ['required', 'min:3', 'max:10', "starts_with:{$floor}"],
            'type' => ['required', Rule::in(Room::$room_types)]
        ];
        $messages = [
            'name.starts_with' => 'ชื่อห้องต้องขึ้นต้นด้วย :values',
            'floor.max' => 'จำนวนชั้นสูงสุดคือ :max ชั้น'
        ];
        Validator::make($request->all(), $rules, $messages)
            ->validate();
        $room->name = $request->input('name');
        $room->floor = $request->input('floor');
        $room->type = $request->input('type');
        $room->save();
        return redirect()->route('rooms.show', ['room' => $room->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        //
    }
}
