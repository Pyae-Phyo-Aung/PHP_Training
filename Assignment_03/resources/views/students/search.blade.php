@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-10">
        <a href="{{ route('student.create') }}" class="btn btn-primary">Create</a>
    </div>
    <div class="col-1">
        <a href="{{ route('student.import') }}" class="btn btn-primary">Import</a>
    </div>
    <div class="col-1">
        <a href="{{ route('export') }}" class="btn btn-primary">Export</a>
    </div>
</div>
<div class="card mt-3">
    <div class="card-header">
        <div class="row">
        <div class="col-9">
        Student List
        </div>
        <div class="col-3">
            <form class="d-flex" role="search" method="post" action="{{ route('student.search') }}">
                @csrf
                <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Major</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->major }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->phone }}</td>
                    <td>{{ $student->address }}</td>
                    <td class="text-nowrap">
                        <a href="{{ route('student.show',$student->id)}}" class="btn btn-success btn-sm d-inline"><i class="fa-solid fa-circle-info"></i>Detail</a>
                        <a href="{{ route('student.edit',$student->id)}}" class="btn btn-secondary btn-sm d-inline"><i class="fas fa-edit"></i>Edit</a>
                        <form action="{{ route('student.destroy',$student->id) }}" method="post" class="d-inline">
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
