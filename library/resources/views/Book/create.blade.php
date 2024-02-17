<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <title>Add Book</title>
</head>
<body>
    <div class="container">
            <div class="row">
                <div class="col-md-12 d-flex justify-content-center">
                    <div class="wrapped w-50 mt-5">
                        <h4 class="text-success text-center"> Add Book</h4>
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
                        <form method="post" action="{{route('books.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="nameBook" class="form-label">Book's name</label>
                                <input type="text" name="nameBook" id="nameBook" class="form-control" placeholder="Enter name" value="{{old('nameBook')}}">
                            </div>
                            <div class="mb-3">
                                <label for="years" class="form-label">Years</label>
                                <input type="date" name="years" id="years" class="form-control ">
                            </div>
                            <div class="mb-3">
                                <label for="idAuthor" class="form-label">ID Author</label>
                                <select name="idAuthor" id="idAuthor" class="form-control">
                                    @foreach($idAuthors as $id)
                                        <option value="{{$id}}">{{$id}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Art type</label>
                                <select name="art_type" class=" form-select">
                                    <option value="art">art</option>
                                    <option value="music" >music</option>
                                    <option value="literature">literature</option>
                                </select>
                            </div>
                            <!-- <div class="mb-3">
                                <label for="img" class="form-label">Image</label>
                                <input  type="text" name="img" id="img" class="form-control" placeholder="Enter image" >
                            </div> -->
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>
                            <button class="btn btn-success my-4">Save</button>
                            <a href="{{route('books.index')}}" class="btn btn-success my-4 ms-3">Exits</a>
                        </form>
                    </div>
                </div>
            </div>
    </div>
</body>
</html>