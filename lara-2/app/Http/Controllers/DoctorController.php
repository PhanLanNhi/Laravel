<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors = Doctor::paginate(5);
        return view('Doctor/index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Doctor/add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Doctor::create($request->all());
        return redirect()->route('doctors.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {
        return view('Doctor/edit', compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Doctor $doctor)
    {
        $doctor->update($request->all());
        return redirect()->route('doctors.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor)
    { 

        $doctor->delete();
        return redirect()->route('doctors.index');
    }

    // public function destroy(string $id)
    // {
    //     Doctor::select ()->where("idDoctor", $id)->delete();
    //     return redirect()->route('doctors.index')->with('success','Delete successfully');
    // }


}
