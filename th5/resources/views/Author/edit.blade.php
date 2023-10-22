<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Author</title>
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12 d-flex justify-content-center">
        <div class="wrapped w-50 mt-5">
          <h4 class="text-success text-center"> Edit Author</h4>
          <form method="post" action="{{route('authors.update', $author)}}">
          @csrf
          @method ('PUT')
            <div class="mb-3">
              <label for="id" class="form-label">ID</label>
              <input type="text" name="id" id="id" class="form-control" value="{{$author->id}}" readonly>
            </div>
            <div class="mb-3">
              <label for="name" class="form-label">Author's name</label>
              <input type="text" name="name" id="name" class="form-control" value="{{$author->name}}">
            </div>
            <button class="btn btn-success">Update</button>
            <a href="{{route('authors.index')}}" class="btn btn-success my-4 ms-3">Exits</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>