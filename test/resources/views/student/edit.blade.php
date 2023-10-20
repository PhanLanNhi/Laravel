@extends('layout.base')

@section('main')
<div class="container">
    <div class="row">
        <form action="{{route('students.update', $student->idStudent)}}" method="post">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="mb-3">
                        <label class="form-label">Ma sinh vien</label>
                        <input type="text" name="idStudent" class="form-control" value="{{$student->idStudent}}" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Ten sinh vien</label>
                        <input type="text" name="name" class="form-control" value="{{$student->nameStudent}}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="{{$student->email}}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Gioi tinh</label>
                        <select name="gender" class="from-control">
                            <option value="male" {{$student->gender == "male" ? 'selected' : ''}}>male</option>
                            <option value="female" {{$student->gender == "female" ? 'selected' : ''}}>female</option>
                            <option value="other" {{$student->gender == "male" ? 'selected' : ''}}>other</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">So dien thoai</label>
                        <input type="tel" name="phone" class="form-control" value="{{$student->phone}}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Chọn lớp học</label>
                        <select name="idClass" class="form-control">
                            @foreach($projects as $project)
                            <option value="{{ $project->idClass }}" @if($project->idClass == $project->idClass) selected
                                @endif>{{ $project->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="float-end">
                <button type="submit" class="btn btn-success btn-sm">Luu</button>
                <a href="{{route('students.index')}}" class="btn btn-secondary btn-sm">Thoat</a>
            </div>
        </form>
    </div>
</div>
@endsection