<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Update Borrow</title>
<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
</head>
<body>
<div class="container">
    <div class="row">
    <div class="col-md-12 d-flex justify-content-center">
        <div class="wrapped w-50 mt-5">
        <h4 class="text-success text-center">Edit Borrow</h4>
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
        <form method="post" action="{{route('borrowings.update', $borrowing)}}">
        @csrf
        @method ('PUT')
            <div class="mb-3">
                <label for="borrowingID" class="form-label">Borrow ID</label>
                <input type="text" name="borrowingID" id="borrowingID" class="form-control" readonly value="{{$borrowing->borrowingID}}">
            </div>
            <div class="mb-3">
            <label for="bookID" class="form-label">Book ID</label>
            <select name="bookID" id="bookID" class="form-control">
                @foreach($bookIDs as $each)
                <option value="{{$each->bookID}}" {{$each->bookID == $borrowing->bookID ? "selected" : ""}}> {{$each->author}} </option>
                @endforeach
            </select>
            </div>
            <div class="mb-3">
                <label for="memberID" class="form-label">Member ID</label>
                <input type="number" min="1" max="100" name="memberID" id="memberID" class="form-control" value="{{$borrowing->memberID}}">
            </div>
            <div class="mb-3">
                <label for="borrowDate" class="form-label">Borrow Date</label>
                <input type="date" name="borrowDate" id="borrowDate" class="form-control" value="{{$borrowing->borrowDate}}">
            </div>
            <div class="mb-3">
                <label for="dueDate" class="form-label">Due Date</label>
                <input type="date" name="dueDate" id="dueDate" class="form-control" value="{{$borrowing->dueDate}}">
            </div>
            <div class="mb-3">
                <label for="returnedDate" class="form-label">Returned Date</label>
                <input type="date" name="returnedDate" id="returnedDate" class="form-control" value="{{$borrowing->returnedDate}}">
            </div>
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{route('borrowings.index')}}" class="btn btn-warning my-4 ms-3">Exits</a>
        </form>
        </div>
    </div>
    </div>
</div>
</body>
</html>