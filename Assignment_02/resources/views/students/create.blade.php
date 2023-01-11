@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        Student Register
    </div>
    <div class="card-body">
        <form action="{{ route('student.store')}}" method="POST" class="form-horizontal">
            @csrf
            <div class="form-group">
                <label for="name" class="col-12 control-label">Name</label>
                <div class="col-12">
                    <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}">
                    @error("name")
                    <small class="font-weight-bold text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-12 control-label">Email</label>
                <div class="col-12">
                    <input type="text" name="email" id="email" class="form-control" value="{{old('email')}}">
                    @error("email")
                    <small class="font-weight-bold text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="phone" class="col-12 control-label">Phone</label>
                <div class="col-12">
                    <input type="text" name="phone" id="phone" class="form-control" value="{{old('phone')}}">
                    @error("phone")
                    <small class="font-weight-bold text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="major" class="col-12 control-label">Major</label>
                <div class="col-12">
                    <select name="major" id="major" class="form-control">
                        <option value="" selected disabled>Select Major</option>
                        @foreach(App\Models\Major::all() as $major)
                        <option value="{{ $major->id }}">{{ $major->name }}</option>
                        @endforeach
                    </select>

                </div>
            </div>
            <div class="form-group">
                <label for="address" class="col-12 control-label">Address</label>
                <div class="col-12">
                    <input type="text" name="address" id="address" class="form-control" value="{{old('address')}}">
                    @error("address")
                    <small class="font-weight-bold text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group mt-3 row">
                <div class="col-10">
                    <a href="{{ route('student.index') }}" type="submit" class="btn btn-secondary btn-sm text-light">
                        <i class="fa-solid fa-arrow-left"></i> Go Back
                    </a>
                </div>
                <div class="col-2">
                    <button type="submit" class="btn btn-success btn-sm text-light">
                        <i class="fa-solid fa-plus"></i> Add Student
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection