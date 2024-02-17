@extends('layouts.base')

@section('title', 'Book')

@section('main')

<div class="container">
        <div class="">
            <div class="header">
                <div class="row">
                    <div class="col-md-10">
                        <center class="mt-2 h3 text-success">Book Management</center>
                    </div>
                    <div class="col-md-10">
                        <a href="{{route('books.create')}}" class="btn btn-success my-3">Add Book</a>
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
                            <th>Book Name</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Publish Date</th>
                            <th>Author ID</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($books as $book)
                        <tr>
                            <td>{{$book->id}}</td>
                            <td>{{$book->nameBook}}</td>
                            <td>{{$book->price}}</td>
                            <!-- <td>
                                <img style="width: 200px; height: 200px;" src="{{ $book->image }}" alt="Book Image">
                            </td> -->
                            <td>
                                @if(file_exists(public_path('images/' . $book->image)))
                                    <img style="width: 200px; height: 200px;"
                                        src="{{ asset('images/' . $book->image) }}" alt="Book Image">
                                @else
                                    <img style="width: 200px; height: 200px;"
                                        src="{{ $book->image }}" alt="Book Image">
                                @endif
                            </td>
                            <td>{{$book->publish}}</td>
                            <td>{{$book->author->nameAuthor}}</td>
                            <td><a href="{{route('books.edit',['book'=> $book])}}" class="btn btn-primary"><i class="bi bi-pen-fill"></i></a></td>
                            <td><a href="" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $book->id }}" class="btn btn-danger"><i class="bi bi-trash-fill"></i></a></td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="deleteModal-{{ $book->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Delete Confirmation</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this Book?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <form action="{{ route('books.destroy', $book->id) }}" method="POST">
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
        {{$books->links('pagination::bootstrap-4')}}
    </div>
@endsection