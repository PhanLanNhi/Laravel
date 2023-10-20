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
          <h4 class="text-success text-center"> Edit Patient</h4>
          <form method="post" action="{{route('patients.update', $patient)}}">
          @csrf
          @method ('PUT')
            <div class="mb-3">
              <label for="idPatient" class="form-label">Id Patient</label>
              <input type="text" name="idPatient" id="idPatient" class="form-control" value="{{$patient->idPatient}}" readonly>
            </div>
            <div class="mb-3">
              <label for="namePatient" class="form-label">Patient's name</label>
              <input type="text" name="namePatient" id="namePatient" class="form-control" value="{{$patient->namePatient}}">
            </div>
            <div class="mb-3">
              <label for="day" class="form-label">Day</label>
              <input type="date" name="day" id="day" class="form-control" value="{{$patient->day}}" >
            </div>
            <div class="mb-3">
              <label for="symptom" class="form-label">Symptom</label>
              <input type="text" name="symptom" id="symptom" class="form-control" value="{{$patient->symptom}}">
            </div>
            <div class="mb-3">
              <label for="idDoctor" class="form-label">Id Doctor</label>
                <select name="idDoctor" id="idDoctor" class="form-control">
                  @foreach($idDoctors as $idDoctor)
                    <option value="{{$idDoctor}}" {{$idDoctor == $patient->idDoctor ? "selected" : ""}}> {{$idDoctor}} </option>
                  @endforeach
                </select>
            </div>
            <button class="btn btn-success">Update</button>
            <a href="{{route('patients.index')}}" class="btn btn-success my-4 ms-3">Exits</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>