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
          <h4 class="text-success text-center"> Edit Book</h4>
          <form method="post" action="{{route('books.update', $book)}}">
          @csrf
          @method ('PUT')
          <div class="mb-3">
              <label for="id" class="form-label">ID</label>
              <input type="text" name="id" id="id" class="form-control" value="{{$book->id}}" readonly>
            </div>
          <div class="mb-3">
              <label for="author_id" class="form-label">Id Doctor</label>
                <select name="author_id" id="author_id" class="form-control">
                  @foreach($idAuthor as $author_id)
                    <option value="{{$author_id}}" {{$author_id == $book->author_id ? "selected" : ""}}> {{$author_id}} </option>
                  @endforeach
                </select>
            </div>
            <div class="mb-3">
              <label for="title" class="form-label">Title</label>
              <input type="text" name="title" id="title" class="form-control" value="{{$book->title}}">
            </div>
            <button class="btn btn-success">Update</button>
            <a href="{{route('books.index')}}" class="btn btn-success my-4 ms-3">Exits</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>