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
          <form method="post" action="{{route('books.update', $book)}}">
          @csrf
          @method ('PUT')
            <div class="mb-3">
              <label for="id" class="form-label">ID</label>
              <input type="text" name="id" id="id" class="form-control" value="{{$book->id}}" readonly>
            </div>
            <div class="mb-3">
              <label for="name" class="form-label">Book's name</label>
              <input type="text" name="name" id="name" class="form-control" value="{{$book->name}}">
            </div>
            <div class="mb-3">
              <label for="years" class="form-label">Years</label>
              <input type="date" name="years" id="years" class="form-control" value="{{$book->years}}">
            </div>
            <div class="mb-3">
              <label for="idAuthor" class="form-label">ID Author</label>
              <input type="text" name="idAuthor" id="idAuthor" class="form-control" value="{{$book->idAuthor}}">
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