@extends('layout.base')

@section('main')
    <div class="container">
        <div class="">
            <div class="header">
                <div class="row">
                    <div class="col-md-10">
                        <center class=" h3 text-success">Student</center>
                    </div>
                    <div class="col-md-10">
                        <a href="{{route('students.create')}}" class="btn btn-success">Add</a>
                    </div>
                </div>
            </div>
            <div class="body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Student Name</th>
                            <th>Email</th>
                            <th>Gender</th>
                            <th>Phone</th>
                            <th>Id class</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $student)
                        <tr>
                            <td>{{$student->idStudent}}</td>
                            <td>{{$student->name}}</td>
                            <td>{{$student->email}}</td>
                            <td>{{$student->gender}}</td>
                            <td>{{$student->phone}}</td>
                            <td>{{$student->idClass}}</td>
                            
                            <td>
                                <form action="{{route('students.destroy', $student->idStudent)}}" method="post">
                                    <a href="{{route('students.edit', $student->idStudent)}}" class="btn btn-success btn-sm">Sua</a>
                                    @csrf
                                    
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
    
@endsection
