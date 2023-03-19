<?php

namespace App\Http\Controllers;

use App\Models\appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments=appointment::all()->load(['doctor']);
        return $appointments;
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'appointment_time'=>'unique:appointments',

        ]);
        $appointment=appointment::create([

           'name'=>$request->name,
           'email'=>$request->email,
           'phone'=>$request->phone,
           'age'=>$request->age,
           'gender'=>$request->gender,
           'description'=>$request->description,
           'appoint_date'=>$request->appoint_date,
           'appoint_time'=>$request->appoint_time,
           'doctor_id'=>$request->doctor_id,
          
        ]);

        return response([
            'status'=>'booking done',
            'appointment'=>$appointment,

        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       return appointment::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
     
    }
    public function deleteAll()
    {
      DB::table('appointments')->truncate();
      return response('Done Delete ALl');
    }
}
