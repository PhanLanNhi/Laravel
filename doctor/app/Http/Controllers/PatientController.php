<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Doctor;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = Patient::orderBy('created_at', 'desc')->paginate(3);
        return view('patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $idDoctors = Doctor::all()->pluck('id');
        return view('patients.create', compact('idDoctors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // img: tránh nó bị trùng với cái trường của csdl của merge
            $request->validate([
            'namePatient'=> 'required',
            'day'=> 'required',
            'symptom'=> 'required',
            'idDoctor'=> 'required',
            'img'=> 'required',
        ]);
        if($request->hasFile('img')){
            $file = $request->file('img');
            $fileName = $file->getClientOriginalName();
            $file->move('images/', $fileName);
            $request->merge(['image' =>$fileName]);
        }
        Patient::create($request->all());
        return redirect()->route('patients.index')->with('success','Patient created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        $idDoctors = Doctor::all()->pluck('id');
        return view('patients.edit', compact('patient','idDoctors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'namePatient'=> 'required',
            'day'=> 'required',
            'symptom'=> 'required',
            'idDoctor'=> 'required',
        ]);
        $patient = Patient::find($id);
        if($request->hasFile('img')){
            $file = $request->file('img');
            $fileName = $file->getClientOriginalName();
            $file->move('images/', $fileName);
            $request->merge(['image' =>$fileName]);
        }
        $patient->update($request->all());
        return redirect()->route('patients.index')->with('success','Patient updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect()->route('patients.index')->with('success','Patient deleted successfully');
    }
}
