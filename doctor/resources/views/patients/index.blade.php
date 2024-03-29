@extends('layouts.base')

@section('title', 'Patient')

@section('main')

<div class="container">
        <div class="">
            <div class="header">
                <div class="row">
                    <div class="col-md-10">
                        <h3 class="mt-3 h3 text-success text-center">Patient Management</h3>
                    </div>
                    <div class="col-md-10">
                        <a href="{{route('patients.create')}}" class="btn btn-success my-3">Add Patient</a>
                    </div>
                </div>
            </div>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <div class="body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Patient Name</th>
                            <th>Day</th>
                            <th>Symptom</th>
                            <th>ID Doctor</th>
                            <th>Image</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($patients as $patient)
                        <tr>
                            <td>{{$patient->id}}</td>
                            <td>{{$patient->namePatient}}</td>
                            <td>{{$patient->day}}</td>
                            <td>{{$patient->symptom}}</td>
                            <td>{{$patient->idDoctor}}</td>
                            <td>
                                @if(file_exists(public_path('images/'. $patient->image)))
                                    <img style="width: 200px; height: 200px;" src="{{ asset('images/' . $patient->image) }}" alt="Patient Image">
                                @else
                                    <img style="width: 200px; height: 200px;" src="{{ $patient->image }}" alt="Patient Image">
                                @endif
                            </td>
                            <td><a href="{{route('patients.edit',['patient'=> $patient])}}" class="btn btn-primary"><i class="bi bi-pen-fill"></i></a></td>
                            <td><a href="" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $patient->id }}" class="btn btn-danger"><i class="bi bi-trash-fill"></i></a></td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="deleteModal-{{ $patient->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Delete Confirmation</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this Patient?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <form action="{{ route('patients.destroy', $patient->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="ms-3">
        {{$patients->links('pagination::bootstrap-4')}}
    </div>
@endsection