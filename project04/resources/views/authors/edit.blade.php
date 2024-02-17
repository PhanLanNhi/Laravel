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
          <h4 class="text-success text-center">Edit Author</h4>
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
          <form method="post" action="{{route('authors.update', $author)}}">
          @csrf
          @method ('PUT')
          <div class="mb-3">
              <label for="id" class="form-label">ID</label>
              <input type="text" name="id" id="id" class="form-control" readonly value="{{$author->id}}">
          </div>
          <div class="mb-3">
              <label for="nameAuthor" class="form-label">Author's name</label>
              <input type="text" name="nameAuthor" id="nameAuthor" class="form-control"  value="{{$author->nameAuthor}}">
          </div>
          <div class="mb-3">
              <label for="specialized" class="form-label">Specialized</label>
              <select name="specialized" id="specialized" class="form-select ">
                  <option value="default">Select specialized</option>
                  <option value="Music" {{$author->specialized == "Music" ? 'selected' : ''}}>Music</option>
                  <option value="Art" {{$author->specialized == "Art" ? 'selected' : ''}}>Art</option>
                  <option value="Literature" {{$author->specialized == "Literature" ? 'selected' : ''}}>Literature</option>
              </select>
          </div>
          <button type="submit" class="btn btn-success">Update</button>
          <a href="{{route('authors.index')}}" class="btn btn-warning my-4 ms-3">Exits</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>