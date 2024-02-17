<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" reviewDate="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <title>Add Review</title>
</head>
<body>
    <div class="container">
            <div class="row">
                <div class="col-md-12 d-flex justify-content-center">
                    <div class="wrapped w-50 mt-5">
                        <h4 class="text-success text-center"> Add Review</h4>
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
                        <form method="post" action="{{route('reviews.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="bookID" class="form-label">Book ID</label>
                                <select name="bookID" id="bookID" class="form-control">
                                    @foreach($bookIDs as $each)
                                        <option value="{{$each->bookID}}" {{ old('bookID') == $each->bookID ? 'selected' : '' }}>{{$each->author}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="userID" class="form-label">User ID</label>
                                <select name="userID" id="userID" class="form-control">
                                    @foreach($userIDs as $each)
                                        <option value="{{$each->id}}" {{ old('userID') == $each->id ? 'selected' : '' }}>{{$each->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="rating" class="form-label">Rating</label>
                                <input type="number" min="1" max="5" name="rating" id="rating" class="form-control" placeholder="Enter rating" value="{{old('rating')}}">
                            </div>
                            <div class="mb-3">
                                <label for="reviewText" class="form-label">Review Text</label>
                                <input type="text" name="reviewText" id="reviewText" class="form-control" placeholder="Enter Review Text" value="{{old('reviewText')}}">
                            </div>
                            <div class="mb-3">
                                <label for="reviewDate" class="form-label">Review Date</label>
                                <input type="date" name="reviewDate" id="reviewDate" class="form-control" placeholder="Enter Review Date" value="{{old('reviewDate')}}">
                            </div>
                            <button class="btn btn-success my-4">Save</button>
                            <a href="{{route('reviews.index')}}" class="btn btn-warning my-4 ms-3">Exits</a>
                        </form>
                    </div>
                </div>
            </div>
    </div>
</body>
</html>