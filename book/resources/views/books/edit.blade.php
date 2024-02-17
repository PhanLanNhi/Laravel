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
          <form method="post" action="{{route('books.update', $book)}}" enctype="multipart/form-data">
          @csrf
          @method ('PUT')
            <div class="mb-3">
                <label for="id" class="form-label">Id</label>
                <input type="text" name="id" id="id" class="form-control" readonly value="{{$book->id}}">
            </div>
            <div class="mb-3">
                <label for="nameBook" class="form-label">Book's name</label>
                <input type="text" name="nameBook" id="nameBook" class="form-control"  value="{{$book->nameBook}}">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" name="price" id="price" class="form-control"  value="{{$book->price}}">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" name="image" id="image" class="form-control">
                <img src="{{$book->image}}" alt="Book Image" width = "200px" class="mt-3">
            </div>
            <div class="mb-3">
                <label for="publishDate" class="form-label">Publish Date</label>
                <input type="date" name="publishDate" id="publishDate" class="form-control" value="{{$book->publishDate}}">
            </div>
            <div class="mb-3">
            <label class="form-label">Author</label>
                    <select name="authorId" class="form-select">
                      @foreach($authors as $author)
                      <option value="{{ $author->id }}">
                        {{ $author->nameAuthor }}
                      </option>
                      @endforeach
                    </select>
              </div>
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{route('books.index')}}" class="btn btn-success my-4 ms-3">Exits</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>