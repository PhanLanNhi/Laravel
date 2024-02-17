<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Book</title>
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12 d-flex justify-content-center">
        <div class="wrapped w-50 mt-5">
          <h4 class="text-success text-center">Edit Book</h4>
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
          <form method="post" action="{{route('books.update', $book)}}" enctype="multipart/form-data">
          @csrf
          @method ('PUT')
          <div class="mb-3">
              <label for="bookID" class="form-label">ID</label>
              <input type="text" name="bookID" id="bookID" class="form-control" readonly value="{{$book->bookID}}">
          </div>
          <div class="mb-3">
              <label for="title" class="form-label">Title</label>
              <input type="text" name="title" id="title" class="form-control" value="{{$book->title}}">
          </div>
          <div class="mb-3">
              <label for="author" class="form-label">Author</label>
              <input type="text" name="author" id="author" class="form-control" value="{{$book->author}}">
          </div>
          <div class="mb-3">
            <label for="genre" class="form-label">Genre</label>
            <select name="genre" id="genre" class="form-select">
              <option value="default">Select Genre</option>
              <option value="romatic" {{$book->genre == "romatic" ? 'selected' : ''}}>Romatic</option>
              <option value="detective" {{$book->genre == "detective" ? 'selected' : ''}}>Detective</option>
              <option value="blockbuster" {{$book->genre == "blockbuster" ? 'selected' : ''}}>Blockbuster</option>
              <option value="comedy" {{$book->genre == "comedy" ? 'selected' : ''}}>Comedy</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="publicationYear" class="form-label">Publication Year</label>
            <select name="publicationYear" id="publicationYear" class="form-select">
              @for ($publicationYear = date('Y'); $publicationYear >= 2000; $publicationYear--)
                <option value="{{ $publicationYear }}" {{ $book->publicationYear == $publicationYear ? 'selected' : '' }}>
                  {{ $publicationYear }}
                </option>
              @endfor
            </select>
          </div>
          <div class="mb-3">
              <label for="ISBN" class="form-label">ISBN</label>
              <input type="number" name="ISBN" id="ISBN" class="form-control" value="{{$book->ISBN}}">
          </div>
          <div class="mb-3">
                <label for="coverImageURL" class="form-label">Image</label>
                <input type="file" name="coverImageURL" id="coverImageURL" class="form-control">
                <img src="{{$book->coverImageURL}}" alt="" width = "200px" class="mt-3">
            </div>
          <button type="submit" class="btn btn-success">Update</button>
          <a href="{{route('books.index')}}" class="btn btn-warning my-4 ms-3">Exits</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>