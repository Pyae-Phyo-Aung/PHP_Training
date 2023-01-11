@extends('layouts.app')
@section('content')
<a href="{{ route('student.create') }}" class="btn btn-secondary">Add New Student</a>
<div class="card mt-3">
    <div class="card-header">
        Student List
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Major</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>
                        @empty($student->major->name)
                        no major
                        @endempty
                        @isset($student->major->name)
                        {{ $student->major->name }}
                        @endisset
                    </td>
                    <td>{{ $student->phone }}</td>
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
