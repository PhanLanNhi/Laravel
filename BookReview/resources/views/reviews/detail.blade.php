<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .main {
            background: rgb(191 188 188);
            padding: 25px;
            width: 500px;
            border-radius: 10px;
        }

        .message {
            position: absolute;
            left: 100px;
            top: 150px;
            background-color: #f9bdb8;
            width: 300px;
            height: 200px;
            padding: 15px;

        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center">
                <div class="wrapped mt-5">
                    <div class="main">
                        <div class="mb-3 fw-bold text-white">DETAIL</div>
                        <div class="mb-3 d-flex">
                            <label for="reviewID" class="form-label">Review ID: {{$review->reviewID}}</label>
                        </div>
                        <div class="mb-3 d-flex">
                            <label for="name" class="form-label">Book ID: {{ $review->book->title}}</label>
                        </div>
                        <div class="mb-3 d-flex">
                            <label for="name" class="form-label">User ID: {{ $review->user->name}}</label>
                        </div>
                        <div class="mb-3 d-flex">
                            <label for="name" class="form-label">Rating: {{$review->rating }}</label>
                        </div>
                        <div class="mb-3 d-flex">
                            <label for="name" class="form-label">Review Text: {{$review->reviewText}}</label>
                        </div>
                        <div class="mb-3 d-flex">
                            <label for="name" class="form-label">Review Date: {{$review->reviewDate}}</label>
                        </div>
                        <a href="{{route('reviews.index')}}" class="btn btn-warning my-4">Exits</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

