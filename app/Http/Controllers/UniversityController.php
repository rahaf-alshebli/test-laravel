<?php

namespace App\Http\Controllers;

use App\Models\University;
use App\Models\room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;


class UniversityController extends Controller
{
    
    
    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          // $categories = category::all();
        // $rooms = Room::all();
        $universities = DB::table('university')
        ->join('rooms', 'university.room_id', '=', 'rooms.id')
        ->select('university.*', 'rooms.name_of_building')
        ->get();

        return view('university-Admin', ['universities' =>$universities]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        

        $rooms = room::all();
        return view('add_universities', [
            'rooms'=>$rooms,
            'auth_user'=>Auth::user(),

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_university'          => 'required',
            'address'=> 'required',
            'logo_image'        => 'required|image',

        ]);
        
        $file_name = time() . '.' . request()->logo_image->getClientOriginalExtension();

        request()->logo_image->move(public_path('images'), $file_name);

        $university = new University;

        $university->name_university = $request->name_university;
        $university->address = $request->address;

        $room->room_id = $request->name_of_building;
        
        $room->logo_image = $file_name;

        $room->save();

        return redirect('admin/universitry-Admin')->with('success', 'Room Data Add successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\University  $university
     * @return \Illuminate\Http\Response
     */
    public function show(University $university)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\University  $university
     * @return \Illuminate\Http\Response
     */
    public function edit(University $university)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\University  $university
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, University $university)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\University  $university
     * @return \Illuminate\Http\Response
     */
    public function destroy(University $university)
    {
        //
    }
}
