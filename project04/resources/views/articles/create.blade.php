<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <title>Add Article</title>
</head>
<body>
    <div class="container">
            <div class="row">
                <div class="col-md-12 d-flex justify-content-center">
                    <div class="wrapped w-50 mt-5">
                        <h4 class="text-success text-center"> Add Article</h4>
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!!! </strong>There were some problems with your input <br> <br>
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="post" action="{{route('articles.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="nameArticle" class="form-label">Article name</label>
                                <input type="text" name="nameArticle" id="nameArticle" class="form-control" placeholder="Enter name" value="{{old('nameArticle')}}">
                            </div>
                            <div class="mb-3">
                                <label for="content" class="form-label">Content</label>
                                <input type="text" name="content" id="content" class="form-control" placeholder="Enter content" value="{{old('content')}}">
                            </div>
                            <div class="mb-3">
                                <label for="day" class="form-label">Day</label>
                                <input type="date" name="day" id="day" class="form-control " value="{{old('day')}}">
                            </div>
                            <!-- <div class="mb-3">
                                <label for="idAuthor" class="form-label">ID Author</label>
                                <select name="idAuthor" id="idAuthor" class="form-control">
                                    @foreach($idAuthors as $id)
                                        <option value="{{$id}}">{{$id}}</option>
                                    @endforeach
                                </select>
                            </div> -->
                            <div class="mb-3">
                                <label for="idAuthor" class="form-label">ID Author</label>
                                <select name="idAuthor" id="idAuthor" class="form-control">
                                    @foreach($idAuthors as $id)
                                        <option value="{{$id}}" {{ old('idAuthor') == $id ? 'selected' : '' }}>{{$id}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="img" class="form-label">Image</label>
                                <input type="file" name="img" id="img" class="form-control">
                            </div>
                            <button class="btn btn-success my-4">Save</button>
                            <a href="{{route('articles.index')}}" class="btn btn-warning my-4 ms-3">Exits</a>
                        </form>
                    </div>
                </div>
            </div>
    </div>
</body>
</html>