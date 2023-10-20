<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <title>Add Doctor</title>
</head>
<body>
    <div class="container">
            <div class="row">
                <div class="col-md-12 d-flex justify-content-center">
                    <div class="wrapped w-50 mt-5">
                        <h4 class="text-success text-center"> Add Doctor</h4>
                        <form method="post" action="{{route('doctors.store')}}">
                            @csrf
                            <div class="mb-3">
                                <label for="nameDoctor" class="form-label">Doctor's name</label>
                                <input type="text" name="nameDoctor" id="nameDoctor" class="form-control" placeholder="Enter name">
                            </div>
                            <div class="mb-3">
                                <label for="specialist" class="form-label">Specialist</label>
                                <input type="text" name="specialist" id="specialist" class="form-control" placeholder="Enter specialist">
                            </div>
                            <button class="btn btn-success my-4">Save</button>
                            <a href="{{route('doctors.index')}}" class="btn btn-success my-4 ms-3">Exits</a>
                        </form>
                    </div>
                </div>
            </div>
    </div>
</body>
</html>