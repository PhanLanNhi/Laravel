@extends('layouts.base')

@section('title', 'Doctor')

@section('main')

<div class="container">
        <div class="">
            <div class="header">
                <div class="row">
                    <div class="col-md-10">
                        <center class=" h3 text-success">Doctors Management</center>
                    </div>
                    <div class="col-md-10">
                        <a href="{{route('doctors.create')}}" class="btn btn-success my-3">Add Doctor</a>
                    </div>
                </div>
            </div>
            <div class="body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Doctor Name</th>
                            <th>Specialist</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($doctors as $doctor)
                        <tr>
                            <td>{{$doctor->idDoctor}}</td>
                            <td>{{$doctor->nameDoctor}}</td>
                            <td>{{$doctor->specialist}}</td>
                            <td><a href="{{route('doctors.edit',['doctor'=> $doctor])}}" class="btn btn-primary"><i class="bi bi-pen-fill"></i></a></td>
                            <td><a href="" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $doctor->idDoctor }}" class="btn btn-danger"><i class="bi bi-trash-fill"></i></a></td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="deleteModal-{{ $doctor->idDoctor }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Delete Confirmation</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this Doctor?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <form action="{{ route('doctors.destroy', $doctor->idDoctor) }}" method="POST">
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
        {{$doctors->links('pagination::bootstrap-4')}}
    </div>
@endsection