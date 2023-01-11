@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header bgsize-primary-4 white card-header">
        <h4 class="card-title">Import Excel Data</h4>
    </div>
    <div class="card-body">
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <strong>{{ $message }}</strong>
        </div>
        <br>
        @endif
        @if ($message = Session::get('errors'))
        <div class="alert alert-danger alert-block">
            <strong>{{ $message }}</strong>
        </div>
        <br>
        @endif
        <form action="{{url('import')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="file" required class="form-control" name="uploaded_file" id="uploaded_file">
            @if ($errors->has('uploaded_file'))
            <p class="text-right mb-0">
                <small class="danger text-muted" id="file-error">{{ $errors->first('uploaded_file') }}</small>
            </p>
            @endif
            <button class="btn btn-primary square mt-3" type="submit"><i class="ft-upload mr-1"></i> Upload</button>
        </form>
    </div>
</div>
@endsection
