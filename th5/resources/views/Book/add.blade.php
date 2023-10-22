<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <title>Add Book</title>
</head>
<body>
    <div class="container">
            <div class="row">
                <div class="col-md-12 d-flex justify-content-center">
                    <div class="wrapped w-50 mt-5">
                        <h4 class="text-success text-center"> Add Book</h4>
                        <form method="post" action="{{route('books.store')}}">
                            @csrf
                            <div class="mb-3">
                                <label for="author_id" class="form-label">Id Author</label>
                                <select name="author_id" id="author_id" class="form-control">
                                    @foreach($idAuthor as $id)
                                        <option value="{{$id}}">{{$id}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" name="title" id="title" class="form-control" placeholder="Enter title">
                            </div>
                            <button class="btn btn-success my-4">Save</button>
                            <a href="{{route('books.index')}}" class="btn btn-success my-4 ms-3">Exits</a>
                        </form>
                    </div>
                </div>
            </div>
    </div>
</body>
</html>