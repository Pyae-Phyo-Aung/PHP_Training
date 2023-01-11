@extends('layouts.app')
@section('content')
<div class="card create-form">
    <div class="card-header">
        Major Register
    </div>
    <div class="card-body">
        <form name="majorCreateForm" class="form-horizontal" id="createMajorFrom">
            <div class="form-group">
                <label for="name" class="col-12 control-label">Major Name</label>
                <div class="col-12">
                    <input type="text" name="name" id="name" class="form-control">
                    <span id="nameError"></span>
                </div>
            </div>
            <div class="form-group mt-3">
                <div class="col-offset-3 col-6">
                    <button type="submit" class="btn btn-success btn-sm text-light">
                        <i class="fa-solid fa-plus"></i> Add
                    </button>
                </div>
            </div>
        </form>
        <form name="majorEditForm" class="form-horizontal" id="editMajorFrom">
            <div class="form-group">
                <label for="name" class="col-12 control-label">Major Name</label>
                <div class="col-12">
                    <input type="text" name="name" id="name" class="form-control">
                    <span id="updateNameError"></span>
                </div>
            </div>
            <div class="form-group mt-3">
                <div class="col-offset-3 col-6">
                    <button class="btn btn-danger btn-sm text-light mr-3" onclick="cancleUpdate()"><i class="fa-solid fa-xmark"></i> Cancle</button>
                    <button type="submit" class="btn btn-success btn-sm text-light"><i class="fa-solid fa-check"></i> Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!--/.create-form -->
<secction class="sec-major-list">
    <div id="successMessage">
    </div>
    <div class="card mt-3">
        <div class="card-header">
            Major List
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="majorList">

                </tbody>
            </table>
        </div>
    </div>
</secction>
<!--/.sec-major-list-->
@endsection
<!--axios script -->
<script src="https://cdn.jsdelivr.net/npm/axios@1.1.2/dist/axios.min.js"></script>
<script src="https://unpkg.com/axios@1.1.2/dist/axios.min.js"></script>
