@extends('layouts.base')

@section('title', 'Review')

@section('main')

<div class="container">
        <div class="">
            <div class="header">
                <div class="row">
                    <div class="col-md-10">
                        <h3 class="mt-3 h3 text-success text-center">Review Management</h3>
                    </div>
                    <div class="col-md-10">
                        <a href="{{route('reviews.create')}}" class="btn btn-success my-3">Add Review</a>
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
                            <th>Review ID</th>
                            <th>Book ID</th>
                            <th>User ID</th>
                            <th>Rating</th>
                            <th>Review Text</th>
                            <th>Review Date</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reviews as $review)
                        <tr>
                            <td>{{$review->reviewID}}</td>
                            <td>{{$review->book->author}}</td>
                            <td>{{$review->user->name}}</td>
                            <td>{{$review->rating}}</td>
                            <td>{{$review->reviewText}}</td>
                            <td>{{$review->reviewDate}}</td>
                            <td><a href="{{route('reviews.show',['review'=> $review])}}" class="btn btn-success"><i class="bi bi-eye-fill"></i></a></td>
                            <td><a href="{{route('reviews.edit',['review'=> $review])}}" class="btn btn-primary"><i class="bi bi-pen-fill"></i></a></td>
                            <td><a href="" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $review->reviewID }}" class="btn btn-danger"><i class="bi bi-trash-fill"></i></a></td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="deleteModal-{{ $review->reviewID }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Delete Confirmation</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this Review?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <form action="{{ route('reviews.destroy', $review->reviewID) }}" method="POST">
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
        {{$reviews->links('pagination::bootstrap-4')}}
    </div>
@endsection