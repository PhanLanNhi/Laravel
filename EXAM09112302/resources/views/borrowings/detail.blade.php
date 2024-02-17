<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .main {
            background: rgb(191 190 190);
            padding: 25px;
            width: 500px;
            border-radius: 10px;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center">
                <div class="wrapped mt-5">
                    <div class="main ">
                        <h3 class="mt-3 h3 text-success text-center">Detail Borrow</h3>
                        <div class="mb-3 d-flex">
                            <label for="reviewID" class="form-label">Borrowing: <strong>{{$borrowing->borrowingID}}</strong></label>
                        </div>
                        <div class="mb-3 d-flex">
                            <label for="name" class="form-label">Book ID: <strong>{{ $borrowing->book->author}}</strong></label>
                        </div>
                        <div class="mb-3 d-flex">
                            <label for="name" class="form-label">Member ID: <strong>{{ $borrowing->memberID}}</strong></label>
                        </div>
                        <div class="mb-3 d-flex">
                            <label for="name" class="form-label">Borrow Date: <strong>{{$borrowing->borrowDate }}</strong></label>
                        </div>
                        <div class="mb-3 d-flex">
                            <label for="name" class="form-label">Due Date: <strong>{{$borrowing->dueDate}}</strong></label>
                        </div>
                        <div class="mb-3 d-flex">
                            <label for="name" class="form-label">Returned Date: <strong>{{$borrowing->returnedDate}}</strong></label>
                        </div>
                        <a href="{{route('borrowings.index')}}" class="btn btn-warning my-4">Exits</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

