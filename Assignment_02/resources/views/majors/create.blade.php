@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        Major Register
    </div>
    <div class="card-body">
        <form action="{{ route('major.create')}}" method="POST" class="form-horizontal">
            @csrf
            <div class="form-group">
                <label for="major" class="col-12 control-label">Major Name</label>
                <div class="col-12">
                    <input type="text" name="name" id="major" class="form-control"  value="{{old('name')}}">
                    @error("name")
                    <small class="font-weight-bold text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group mt-3">
                <div class="col-offset-3 col-6">
                    <button type="submit" class="btn btn-success btn-sm text-light">
                        <i class="fa-solid fa-plus"></i> Add Major
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="card mt-3">
    <div class="card-header">
        Major List
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Major</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($majors as $major)
                <tr>
                    <td>{{ $major->id }}</td>
                    <td>{{ $major->name }}</td>
                    <td class="text-nowrap">
                        <a href="{{ route('major.edit',$major->id)}}" class="btn btn-secondary btn-sm d-inline"><i class="fas fa-edit"></i>Edit</a>
                        <form action="{{ route('major.destroy',$major->id)}}" method="post" class="d-inline">
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
