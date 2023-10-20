<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <title>Add Song</title>
</head>
<body>
    <div class="container">
            <div class="row">
                <div class="col-md-12 d-flex justify-content-center">
                    <div class="wrapped w-50 mt-5">
                        <h4 class="text-success text-center"> Add Song</h4>
                        <form method="post" action="{{route('songs.store')}}">
                            @csrf
                            <div class="mb-3">
                                <label for="nameSong" class="form-label">Song's name</label>
                                <input type="text" name="nameSong" id="nameSong" class="form-control" placeholder="Enter name">
                            </div>
                            <div class="mb-3">
                                <label for="singer" class="form-label">Singer</label>
                                <input type="date" name="singer" id="singer" class="form-control" >
                            </div>
                            <div class="mb-3">
                                <label for="idCategory" class="form-label">Id Category</label>
                                <select name="idCategory" id="idCategory" class="form-control">
                                    @foreach($idCategories as $idCategory)
                                        <option value="{{$idCategory}}">{{$idCategory}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button class="btn btn-success my-4">Save</button>
                            <a href="{{route('songs.index')}}" class="btn btn-success my-4 ms-3">Exits</a>
                        </form>
                    </div>
                </div>
            </div>
    </div>
</body>
</html>