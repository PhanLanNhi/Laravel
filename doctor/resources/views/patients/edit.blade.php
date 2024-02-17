<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Patient</title>
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12 d-flex justify-content-center">
        <div class="wrapped w-50 mt-5">
          <h4 class="text-success text-center">Edit Patient</h4>
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
          <form method="post" action="{{route('patients.update', $patient)}}" enctype="multipart/form-data">
          @csrf
          @method ('PUT')
            <div class="mb-3">
                <label for="id" class="form-label">ID</label>
                <input type="text" name="id" id="id" class="form-control" readonly value="{{$patient->id}}">
            </div>
            <div class="mb-3">
                <label for="namePatient" class="form-label">Patient's name</label>
                <input type="text" name="namePatient" id="namePatient" class="form-control"  
                value="{{ old('namePatient') == '' ? $patient->namePatient : old('namePatient') }}">
            </div>
            <div class="mb-3">
                <label for="day" class="form-label">Day</label>
                <input type="date" name="day" id="day" class="form-control" 
                value="{{ old('day') == '' ? $patient->day : old('day') }}">
            </div>
            <div class="mb-3">
                <label for="symptom" class="form-label">Symptom</label>
                <input type="text" name="symptom" id="symptom" class="form-control"  
                value="{{ old('symptom') == '' ? $patient->symptom : old('symptom') }}">
            </div>
            <div class="mb-3">
                <label for="idDoctor" class="form-label">ID Doctor</label>
                  <select name="idDoctor" id="idDoctor" class="form-control">
                    @foreach($idDoctors as $idDoctor)
                      @if(old('idDoctor') == '')
                        <option value="{{$idDoctor}}" {{$idDoctor == $patient->idDoctor ? "selected" : ""}}> {{$idDoctor}} </option>
                      @else  
                        <option value="{{$idDoctor}}" {{ old('idDoctor') == $idDoctor ? 'selected' : '' }}> {{$idDoctor}} </option>
                      @endif
                    @endforeach
                  </select>
            </div>
            <div class="mb-3">
                <label for="img" class="form-label">Image</label>
                <input type="file" name="img" id="img" class="form-control">
                <img src="{{$patient->image}}" alt="" width = "200px" class="mt-3">
            </div>
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{route('patients.index')}}" class="btn btn-warning my-4 ms-3">Exits</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>