<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <title>Add Patient</title>
</head>
<body>
    <div class="container">
            <div class="row">
                <div class="col-md-12 d-flex justify-content-center">
                    <div class="wrapped w-50 mt-5">
                        <h4 class="text-success text-center"> Add Patient</h4>
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
                        <form method="post" action="{{route('patients.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="namePatient" class="form-label">Patient's name</label>
                                <input type="text" name="namePatient" id="namePatient" class="form-control" placeholder="Enter name" value="{{old('namePatient')}}">
                            </div>
                            <div class="mb-3">
                                <label for="day" class="form-label">Day</label>
                                <input type="date" name="day" id="day" class="form-control " value="{{old('day')}}">
                            </div>
                            <div class="mb-3">
                                <label for="symptom" class="form-label">Symptom</label>
                                <input type="text" name="symptom" id="symptom" class="form-control" placeholder="Enter symptom" value="{{old('symptom')}}">
                            </div>
                            <div class="mb-3">
                                <label for="idDoctor" class="form-label">ID Doctor</label>
                                <select name="idDoctor" id="idDoctor" class="form-control">
                                    @foreach($idDoctors as $id)
                                        <option value="{{$id}}" {{ old('idDoctor') == $id ? 'selected' : '' }}>{{$id}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="img" class="form-label">Image</label>
                                <input type="file" name="img" id="img" class="form-control">
                            </div>
                            <button class="btn btn-success my-4">Save</button>
                            <a href="{{route('patients.index')}}" class="btn btn-warning my-4 ms-3">Exits</a>
                        </form>
                    </div>
                </div>
            </div>
    </div>
</body>
</html>