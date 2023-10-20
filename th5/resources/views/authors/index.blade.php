@extends('layouts.base')

<!-- trien khai -->
@section('main')
    <div class="container">
        <div class="">
            <div class="header">
                <div class="row">
                    <div class="col-md-10">
                        <center class=" h3 text-success">Authors</center>
                    </div>
                    <div class="col-md-10">
                        <a href="{{route('authors.create')}}" class="btn btn-success my-3">Add Author</a>
                    </div>
                </div>
            </div>
            <div class="body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Author Name</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($authors as $author)
                        <tr>
                            <td>{{$author->id}}</td>
                            <td>{{$author->name}}</td>
                            <td><a href="" class="btn btn-primary"><i class="bi bi-pen-fill"></i></a></td>
                            <td><a href="" class="btn btn-danger"><i class="bi bi-trash-fill"></i></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
    <div class="">
        {{$authors->links('pagination::bootstrap-4')}}
    </div>
@endsection
