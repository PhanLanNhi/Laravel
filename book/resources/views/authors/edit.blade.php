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
          <form method="post" action="{{route('authors.update', $author)}}">
          @csrf
          @method ('PUT')
          <div class="mb-3">
              <label for="id" class="form-label">ID</label>
              <input type="text" name="id" id="id" class="form-control" readonly value="{{ $author->id }}">
          </div>
          <div class="mb-3">
              <label for="nameAuthor" class="form-label">Author's name</label>
              <input type="text" name="nameAuthor" id="nameAuthor" class="form-control" placeholder="Enter name" 
                value="{{ $author->nameAuthor }}">
              <!-- @if($errors->has('nameAuthor')) -->
                <!-- <input type="text" name="nameAuthor" id="nameAuthor" class="form-control is-invalid" placeholder="Enter name">
                <span class="text-danger">
                  {{ $errors->first('nameAuthor') }}
                </span>
              @else -->
              <!-- nếu gtri trc đó của old name là rỗng, gtri mặc định $author->name sẽ đc sd
              nếu k, gtri trc đó của name sẽ đc sd-->
                <!-- <input type="text" name="nameAuthor" id="nameAuthor" class="form-control" placeholder="Enter name" 
                value="{{ old('nameAuthor') == '' ? $author->nameAuthor : old('nameAuthor')}}"> -->
              <!-- @endif -->
          </div>
          <div class="mb-3">
              <label for="birthDay" class="form-label">Birth Day</label>
              <input type="date" name="birthDay" id="birthDay" class="form-control" 
                  value="{{ $author->birthDay }}">
              <!-- @if($errors->has('birthDay'))
                <input type="date" name="birthDay" id="birthDay" class="form-control is-invalid">
                <span class="text-danger">
                  {{ $errors->first('birthDay') }}
                </span>
              @else
                  <input type="date" name="birthDay" id="birthDay" class="form-control" 
                  value="{{old('birthDay') == '' ? $author->birthDay : old('birthDay')}}">
              @endif -->
          </div>
          <div class="mb-3">
              <label for="gender" class="form-label">Gender</label>
                <!-- <select name="gender" id="gender" class="form-select ">
                  <option value="default">Select gender</option>
                  <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                  <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                  <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
                </select> -->
                <select name="gender" id="gender" class="form-select ">
                  <option value="default">Select gender</option>
                  <option value="male" {{$author->gender == "male" ? 'selected' : ''}}>Male</option>
                  <option value="female" {{$author->gender == "female" ? 'selected' : ''}}>Female</option>
                  <option value="other" {{$author->gender == "other" ? 'selected' : ''}}>Other</option>
                </select>
              <!-- @if($errors->has('gender'))
                <span class="text-danger">
                  {{ $errors->first('gender') }}
                </span>
              @endif -->
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