@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        Student Detail
    </div>
    <div class="card-body">
        <form action="" method="POST" class="form-horizontal">
            <div class="form-group">
                <label for="name" class="col-12 control-label">Name</label>
                <div class="col-12">
                    <input readonly type="text" name="name" id="name" class="form-control" value="{{ $student->name }}">
                    @error("name")
                    <small class="font-weight-bold text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-12 control-label">Email</label>
                <div class="col-12">
                    <input readonly type="text" name="email" id="email" class="form-control" value="{{ $student->email }}">
                    @error("email")
                    <small class="font-weight-bold text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="phone" class="col-12 control-label">Phone</label>
                <div class="col-12">
                    <input readonly type="text" name="phone" id="phone" class="form-control" value="{{ $student->phone }}">
                    @error("phone")
                    <small class="font-weight-bold text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="major" class="col-12 control-label">Major</label>
                <div class="col-12">
                    <input readonly type="text" name="major" id="major" class="form-control" value="{{ $student->major->name }}">
                    @error("major")
                    <small class="font-weight-bold text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="address" class="col-12 control-label">Address</label>
                <div class="col-12">
                    <input readonly type="text" name="address" id="address" class="form-control" value="{{ $student->address }}">
                    @error("address")
                    <small class="font-weight-bold text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group mt-3">
                <div class="col-6">
                    <a href="{{ route('student.index') }}" type="submit" class="btn btn-secondary btn-sm text-light">
                        <i class="fa-solid fa-arrow-left"></i> Go Back
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
