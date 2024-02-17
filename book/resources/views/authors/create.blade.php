<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <title>Add Author</title>
</head>
<body>
    <div class="container">
            <div class="row">
                <div class="col-md-12 d-flex justify-content-center">
                    <div class="wrapped w-50 mt-5">
                        <h4 class="text-success text-center"> Add Author</h4>
                        <form method="post" action="{{route('authors.store')}}">
                            @csrf
                            <div class="mb-3">
                                <label for="nameAuthor" class="form-label">Author's name</label>
                                @if($errors->has('nameAuthor'))
                                    <input type="text" name="nameAuthor" id="nameAuthor" class="form-control is-invalid" placeholder="Enter name" value="{{old('nameAuthor')}}">
                                    <span class="text-danger">
                                        {{ $errors->first('nameAuthor') }}
                                    </span>
                                @else
                                    <input type="text" name="nameAuthor" id="nameAuthor" class="form-control" placeholder="Enter name" value="{{old('nameAuthor')}}">
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="birthDay" class="form-label">Birth Day</label>
                                @if($errors->has('birthDay'))
                                    <input type="date" name="birthDay" id="birthDay" class="form-control is-invalid" value="{{old('birthDay')}}">
                                    <span class="text-danger">
                                        {{ $errors->first('birthDay') }}
                                    </span>
                                @else
                                    <input type="date" name="birthDay" id="birthDay" class="form-control" value="{{old('birthDay')}}">
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="gender" class="form-label">Gender</label>
                                @if($errors->has('gender'))
                                    <select name="gender" id="gender" class="form-select is-invalid">
                                        <option value="default">Select gender</option>
                                        <option value="1">Male</option>
                                        <option value="2">Female</option>
                                        <option value="3">Other</option>
                                    </select>
                                    <span class="text-danger">
                                        {{ $errors->first('gender') }}
                                    </span>
                                @else
                                    <select name="gender" id="gender" class="form-select" value="{{old('gender')}}">
                                        <option value="default">Select gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                @endif
                            </div>
                            <button class="btn btn-success my-4">Save</button>
                            <a href="{{route('authors.index')}}" class="btn btn-warning my-4 ms-3">Exits</a>
                        </form>
                    </div>
                </div>
            </div>
    </div>
</body>
</html>