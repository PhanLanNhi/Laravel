@extends('layout.base')

@section('main')
<div class="container">
    <div class="row">
        <form action="{{route('students.store')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="mb-3">
                        <label class="form-label">Ten sinh vien</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Gioi tinh</label>
                        <select name="gender" class="from-control">
                            <option value="male">male</option>
                            <option value="female">female</option>
                            <option value="other">other</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">So dien thoai</label>
                        <input type="tel" name="phone" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Chọn lớp học</label>
                        <select name="idClass" class="form-control">
                            @foreach($projects as $project)
                            <option value="{{ $project->idClass }}">{{ $project->nameClass }}</option>
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