@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        Update Task
    </div>
    <div class="card-body">
        <form action="{{url('/update/'.$task->id)}}" method="POST" class="form-horizontal">
            @csrf
            @method('PUT') 
            <div class="form-group">
                <label for="task" class="col-12 control-label">Task</label>
                <div class="col-12">
                    <input type="text" name="name" id="task-name" class="form-control" value="{{$task->name}}">
                    @error("name")
                    <small class="font-weight-bold text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group mt-3 row">
                <div class="col-10">
                    <a href="{{url('/')}}" type="submit" class="btn btn-info btn-sm text-light">
                        <i class="fa-solid fa-arrow-left"></i> Go Back
                    </a>
                </div>
                <div class="col-2">
                    <button type="submit" class="btn btn-info btn-sm text-light">
                        <i class="fa-solid fa-edit"></i> Update Task
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
