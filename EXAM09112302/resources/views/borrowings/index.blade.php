@extends('layouts.base')

@section('title', 'Borrowing')

@section('main')

<div class="container">
        <div class="">
            <div class="header">
                <div class="row">
                    <div class="col-md-10">
                        <h3 class="mt-3 h3 text-success text-center">Borrowing Management</h3>
                    </div>
                    <div class="col-md-10">
                        <a href="{{route('borrowings.create')}}" class="btn btn-success my-3">Add Borrowing</a>
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
                            <th>Borrow ID</th>
                            <th>Book ID</th>
                            <th>Member ID</th>
                            <th>Borrowing Date</th>
                            <th>Due Date</th>
                            <th>Returned Date</th>
                            <th>Detail</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($borrowings as $borrowing)
                        <tr>
                            <td>{{$borrowing->borrowingID}}</td>
                            <td>{{$borrowing->book->author}}</td>
                            <td>{{$borrowing->memberID}}</td>
                            <td>{{$borrowing->borrowDate}}</td>
                            <td>{{$borrowing->dueDate}}</td>
                            <td>{{$borrowing->returnedDate}}</td>
                            <td><a href="{{route('borrowings.show',['borrowing'=> $borrowing])}}" class="btn btn-warning"><i class="bi bi-eye-fill"></i></a></td>
                            <td><a href="{{route('borrowings.edit',['borrowing'=> $borrowing])}}" class="btn btn-primary"><i class="bi bi-pen-fill"></i></a></td>
                            <td><a href="" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $borrowing->borrowingID }}" class="btn btn-danger"><i class="bi bi-trash-fill"></i></a></td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="deleteModal-{{ $borrowing->borrowingID }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Delete Confirmation</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this Borrowing?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <form action="{{ route('borrowings.destroy', $borrowing->borrowingID) }}" method="POST">
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
        {{$borrowings->links('pagination::bootstrap-4')}}
    </div>
@endsection