<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <title>Add Author</title>
</head>
<body>
    <div class="container">
            <div class="row">
                <div class="col-md-12 d-flex justify-content-center">
                    <div class="wrapped w-50 mt-5">
                        <h4 class="text-success text-center"> Add Author</h4>
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
                        <form method="post" action="{{route('authors.store')}}">
                            @csrf
                            <div class="mb-3">
                                <label for="nameAuthor" class="form-label">Author name</label>
                                <input type="text" name="nameAuthor" id="nameAuthor" class="form-control" placeholder="Enter name" value="{{old('nameAuthor')}}">
                            </div>
                            <div class="mb-3">
                                <label for="specialized" class="form-label">Specialized</label>
                                <select name="specialized" id="specialized" class="form-select">
                                    <option value="default">Select specialized</option>
                                    <option value="Music" {{ old('specialized') == 'Music' ? 'selected' : '' }}>Music</option>
                                    <option value="Art" {{ old('specialized') == 'Art' ? 'selected' : '' }}>Art</option>
                                    <option value="Literature" {{ old('specialized') == 'Literature' ? 'selected' : '' }}>Literature</option>
                                </select>
                            </div>
                            <button class="btn btn-success my-4">Save</button>
                            <a href="{{route('authors.index')}}" class="btn btn-warning my-4 ms-3">Exits</a>
                        </form>
                    </div>
                </div>
            </div>
    </div>
</body>
</html>