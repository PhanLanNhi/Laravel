<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Category</title>
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12 d-flex justify-content-center">
        <div class="wrapped w-50 mt-5">
          <h4 class="text-success text-center">Edit Category</h4>
          <form method="post" action="{{route('categories.update', $category)}}">
          @csrf
          @method ('PUT')
            <div class="mb-3">
              <label for="id" class="form-label">ID</label>
              <input type="text" name="id" id="id" class="form-control" value="{{$category->id}}" readonly>
            </div>
            <div class="mb-3">
              <label for="nameCategory" class="form-label">Category's name</label>
              <input type="text" name="nameCategory" id="nameCategory" class="form-control" value="{{$category->nameCategory}}">
            </div>
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{route('categories.index')}}" class="btn btn-success my-4 ms-3">Exits</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>