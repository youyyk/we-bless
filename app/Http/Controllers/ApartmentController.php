<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApartmentRequest;
use App\Models\Apartment;
use App\Models\Room;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function GuzzleHttp\Promise\all;
use function PHPUnit\Framework\returnArgument;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()){
            if (Auth::user()->isRole('OFFICER')){
                $apartments = Apartment::whereUserId(Auth::id())->get();
            }
        }else{
            $apartments = Apartment::get();
        }
        return view('apartments.index',[
            'apartments' => $apartments
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create',Apartment::class);
        return view('apartments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ApartmentRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ApartmentRequest $request)
    {
        $this->authorize('create',Apartment::class);
        $apartment = new Apartment();
        $apartment->name = $request->input('name');
        $apartment->num_floor = $request->input('num_floor');
        $apartment->num_room = $request->input('num_room');
        $apartment->save();
        return redirect()->route('apartments.index');
    }

    public function createRoom($apartment_id){
        $apartment = Apartment::findOrFail($apartment_id);
        $this->authorize('update',$apartment);
        return view('apartments.create-room',[
            'apartment' => $apartment,
            'room_types' => Room::$room_types
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $apartment = Apartment::findOrFail($id); // or fins($id)
        $this->authorize('view',$apartment);
        return view('apartments.show',[
            'apartment' => $apartment
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $apartment = Apartment::findOrFail($id);
        $this->authorize('update',$apartment);
        return view('apartments.edit',[
            'apartment' => $apartment
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ApartmentRequest $request, $id)
    {
        $apartment = Apartment::findOrFail($id);
        $this->authorize('update',$apartment);
        $apartment->name = $request->input('name');
        $apartment->num_floor = $request->input('num_floor');
        $apartment->num_room = $request->input('num_room');
        $apartment->save();
        return redirect()->route('apartments.show',['apartment' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $apartment = Apartment::findOrFail($id);
        $this->authorize('delete',$apartment);
        if ($apartment->name === $request->input('name')) {
            $apartment->delete();
            return redirect()->route('apartments.index');
        }
        return redirect()->back();
    }
}
