<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Review</title>
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12 d-flex justify-content-center">
        <div class="wrapped w-50 mt-5">
          <h4 class="text-success text-center">Edit Review</h4>
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
          <form method="post" action="{{route('reviews.update', $review)}}" enctype="multipart/form-data">
          @csrf
          @method ('PUT')
            <div class="mb-3">
                <label for="reviewID" class="form-label">Review ID</label>
                <input type="text" name="reviewID" id="reviewID" class="form-control" readonly value="{{$review->reviewID}}">
            </div>
            <div class="mb-3">
              <label for="bookID" class="form-label">Book ID</label>
              <select name="bookID" id="bookID" class="form-control">
                @foreach($bookIDs as $each)
                  <option value="{{$each->bookID}}" {{$each->bookID == $review->bookID ? "selected" : ""}}> {{$each->author}} </option>
                @endforeach
              </select>
            </div>
            <div class="mb-3">
              <label for="userID" class="form-label">User ID</label>
              <select name="userID" id="userID" class="form-control">
                @foreach($userIDs as $each)
                  <option value="{{$each->id}}" {{$each->id == $review->userID ? "selected" : ""}}> {{$each->name}} </option>
                @endforeach
              </select>
            </div>
            <div class="mb-3">
                <label for="rating" class="form-label">Rating</label>
                <input type="number" min="1" max="5" name="rating" id="rating" class="form-control" value="{{$review->rating}}">
            </div>
            <div class="mb-3">
                <label for="reviewText" class="form-label">Review Text</label>
                <input type="text" name="reviewText" id="reviewText" class="form-control" value="{{$review->reviewText}}">
            </div>
            <div class="mb-3">
                <label for="reviewDate" class="form-label">Review Date</label>
                <input type="date" name="reviewDate" id="reviewDate" class="form-control" value="{{$review->reviewDate}}">
            </div>
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{route('reviews.index')}}" class="btn btn-warning my-4 ms-3">Exits</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>