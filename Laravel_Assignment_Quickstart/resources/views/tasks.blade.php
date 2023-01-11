@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        New Task
    </div>
    <div class="card-body">
        <form action="{{url('/store')}}" method="POST" class="form-horizontal">
            @csrf
            <div class="form-group">
                <label for="task" class="col-12 control-label">Task</label>
                <div class="col-12">
                    <input type="text" name="name" id="task-name" class="form-control">
                    @error("name")
                    <small class="font-weight-bold text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group mt-3">
                <div class="col-offset-3 col-6">
                    <button type="submit" class="btn btn-info btn-sm text-light">
                        <i class="fa-solid fa-plus"></i> Add Task
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="card mt-3">
    <div class="card-header">
        Current Tasks
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Task</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                <tr>
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->name }}</td>
                    <td class="text-nowrap">
                        <a href="{{url('/edit/'.$task->id)}}" class="btn btn-primary btn-sm d-inline"><i class="fas fa-edit"></i>Update</a>
                        <form action="{{url('/destroy/'.$task->id)}}" method="post" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick='return confirm("Are you sure to delete?")'>
                                <i class="fa-solid fa-trash-can"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
