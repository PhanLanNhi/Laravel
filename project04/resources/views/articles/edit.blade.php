<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Article</title>
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12 d-flex justify-content-center">
        <div class="wrapped w-50 mt-5">
          <h4 class="text-success text-center">Edit Article</h4>
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
          <form method="post" action="{{route('articles.update', $article)}}" enctype="multipart/form-data">
          @csrf
          @method ('PUT')
            <div class="mb-3">
                <label for="id" class="form-label">ID</label>
                <input type="text" name="id" id="id" class="form-control" readonly value="{{$article->id}}">
            </div>
            <div class="mb-3">
                <label for="nameArticle" class="form-label">Article's name</label>
                <input type="text" name="nameArticle" id="nameArticle" class="form-control"  
                value="{{ old('nameArticle') == '' ? $article->nameArticle : old('nameArticle') }}">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <input type="text" name="content" id="content" class="form-control"  
                value="{{ old('content') == '' ? $article->content : old('content') }}">
            </div>
            <div class="mb-3">
                <label for="day" class="form-label">Day</label>
                <input type="date" name="day" id="day" class="form-control" 
                value="{{ old('day') == '' ? $article->day : old('day') }}">
            </div>
            <div class="mb-3">
                <label for="idAuthor" class="form-label">ID Author</label>
                  <select name="idAuthor" id="idAuthor" class="form-control">
                    @foreach($idAuthors as $idAuthor)
                      @if(old('idAuthor') == '')
                        <option value="{{$idAuthor}}" {{$idAuthor == $article->idAuthor ? "selected" : ""}}> {{$idAuthor}} </option>
                      @else  
                        <option value="{{$idAuthor}}" {{ old('idAuthor') == $idAuthor ? 'selected' : '' }}>{{$idAuthor}}</option>
                      @endif
                    @endforeach
                  </select>
            </div>
            <div class="mb-3">
                <label for="img" class="form-label">Image</label>
                <input type="file" name="img" id="img" class="form-control">
                <img src="{{$article->img}}" alt="" width = "200px" class="mt-3">
            </div>
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{route('articles.index')}}" class="btn btn-warning my-4 ms-3">Exits</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>