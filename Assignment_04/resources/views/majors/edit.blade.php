@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        Major Edit
    </div>
    <div class="card-body">
        <form action="{{ route('major.update',$major->id) }}" method="POST" class="form-horizontal">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="major" class="col-12 control-label">Major Name</label>
                <div class="col-12">
                    <input type="text" name="name" id="major" class="form-control" value="{{ $major->name }}">
                    @error("name")
                    <small class="font-weight-bold text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group mt-3 row">
                <div class="col-10">
                    <a href="{{ route('major.index') }}" type="submit" class="btn btn-secondary btn-sm text-light">
                        <i class="fa-solid fa-arrow-left"></i> Go Back
                    </a>
                </div>
                <div class="col-2">
                    <button type="submit" class="btn btn-success btn-sm text-light">
                        <i class="fa-solid fa-check"></i> Update
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
