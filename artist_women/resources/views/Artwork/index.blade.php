@extends('layouts.base')

@section('title', 'Artwork')

@section('main')

<div class="container">
        <div class="">
            <div class="header">
                <div class="row">
                    <div class="col-md-10">
                        <center class=" h3 text-success">Artwork Management</center>
                    </div>
                    <div class="col-md-10">
                        <a href="{{route('artworks.create')}}" class="btn btn-success my-3">Add Artwork</a>
                    </div>
                </div>
            </div>
            <div class="body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Artist Name</th>
                            <th>Description</th>
                            <th>Art type</th>
                            <th>Media link</th>
                            <th>Cover image</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($artworks as $artwork)
                        <tr>
                            <td>{{$artwork->id}}</td>
                            <td>{{$artwork->artist_name}}</td>
                            <td>{{$artwork->description}}</td>
                            <td>{{$artwork->art_type}}</td>
                            <td>{{$artwork->media_link}}</td>
                            <td>{{$artwork->cover_image}}</td>
                            <td><a href="{{route('artworks.edit',['artwork'=> $artwork])}}" class="btn btn-primary"><i class="bi bi-pen-fill"></i></a></td>
                            <td><a href="" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $artwork->id }}" class="btn btn-danger"><i class="bi bi-trash-fill"></i></a></td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="deleteModal-{{ $artwork->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Delete Confirmation</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this Artwork?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <form action="{{ route('artworks.destroy', $artwork->id) }}" method="POST">
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
        {{$artworks->links('pagination::bootstrap-4')}}
    </div>
@endsection