@extends('layouts.base')

@section('title', 'Article')

@section('main')

<div class="container">
        <div class="">
            <div class="header">
                <div class="row">
                    <div class="col-md-10">
                        <h3 class="mt-3 h3 text-success text-center">Article Management</h3>
                    </div>
                    <div class="col-md-10">
                        <a href="{{route('articles.create')}}" class="btn btn-success my-3">Add Article</a>
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
                            <th>Article Name</th>
                            <th>Content</th>
                            <th>Day</th>
                            <th>ID Author</th>
                            <th>Image</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($articles as $article)
                        <tr>
                            <td>{{$article->id}}</td>
                            <td>{{$article->nameArticle}}</td>
                            <td>{{$article->content}}</td>
                            <td>{{$article->day}}</td>
                            <td>{{$article->idAuthor}}</td>
                            <td>
                                @if(file_exists(public_path('images/'. $article->img)))
                                    <img style="width: 200px; height: 200px;" src="{{ asset('images/' . $article->img) }}" alt="Article Image">
                                @else
                                    <img style="width: 200px; height: 200px;" src="{{ $article->img }}" alt="Article Image">
                                @endif
                            </td>
                            <td><a href="{{route('articles.edit',['article'=> $article])}}" class="btn btn-primary"><i class="bi bi-pen-fill"></i></a></td>
                            <td><a href="" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $article->id }}" class="btn btn-danger"><i class="bi bi-trash-fill"></i></a></td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="deleteModal-{{ $article->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Delete Confirmation</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this Article?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <form action="{{ route('articles.destroy', $article->id) }}" method="POST">
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
        {{$articles->links('pagination::bootstrap-4')}}
    </div>
@endsection