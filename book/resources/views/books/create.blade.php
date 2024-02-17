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
                        <form method="post" action="{{route('books.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="nameBook" class="form-label">Book's name</label>
                                @if($errors->has('nameBook'))
                                    <input type="text" name="nameBook" id="nameBook" class="form-control is-invalid" placeholder="Enter name" value="{{old('nameBook')}}">
                                    <span class="text-danger">
                                        {{ $errors->first('nameBook') }}
                                    </span>
                                @else
                                    <input type="text" name="nameBook" id="nameBook" class="form-control" placeholder="Enter name" value="{{old('nameBook')}}">
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                @if($errors->has('price'))
                                    <input type="number" name="price" id="price" class="form-control is-invalid" placeholder="Enter price" value="{{old('price')}}">
                                    <span class="text-danger">
                                        {{ $errors->first('price') }}
                                    </span>
                                @else
                                    <input type="number" name="price" id="price" class="form-control" placeholder="Enter price" value="{{old('price')}}">
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                @if($errors->has('image'))
                                    <input type="file" name="image" id="image" class="form-control is-invalid">
                                    <span class="text-danger">
                                        {{ $errors->first('image') }}
                                    </span>
                                @else
                                    <input type="file" name="image" id="image" class="form-control">
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="publishDate" class="form-label">Publish Date</label>
                                @if($errors->has('publishDate'))
                                    <input type="date" name="publishDate" id="publishDate" class="form-control is-invalid" placeholder="Enter Publish Date" value="{{old('publishDate')}}">
                                    <span class="text-danger">
                                        {{ $errors->first('publishDate') }}
                                    </span>
                                @else
                                <input type="date" name="publishDate" id="publishDate" class="form-control" placeholder="Enter Publish Date" value="{{old('publishDate')}}">
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="authorId" class="form-label">Author</label>
                                @if($errors->has('authorId'))
                                    <select name="authorId" class="form-select is-invalid">
                                        <option value="default">Select an Author</option>
                                @foreach($authors as $author)
                                        <option value="{{ $author->id }}">
                                            {{ $author->nameAuthor }}
                                        </option>
                                @endforeach
                                    </select>
                                        <span class="text-danger">
                                            {{ $errors->first('authorId') }}
                                        </span>
                                @else
                                    <select name="authorId" class="form-select">
                                        <option value="default">Select an Author</option>
                                @foreach($authors as $author)
                                        <option value="{{ $author->id }}">
                                            {{ $author->nameAuthor }}
                                        </option>
                                @endforeach
                                    </select>
                                @endif
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