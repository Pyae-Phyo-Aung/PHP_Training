@extends('layouts.app')
@section('content')
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Student</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form name="createForm" class="form-horizontal">
                    <div class="form-group">
                        <label for="studentName" class="col-12 control-label">Name</label>
                        <div class="col-12">
                            <input type="text" name="studentName" id="studentName" class="form-control">
                            <span id="nameError"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-12 control-label">Email</label>
                        <div class="col-12">
                            <input type="text" name="email" id="email" class="form-control">
                            <span id="emailError"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone" class="col-12 control-label">Phone</label>
                        <div class="col-12">
                            <input type="text" name="phone" id="phone" class="form-control">
                            <span id="phoneError"></span>
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
                            <span id="majorError"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address" class="col-12 control-label">Address</label>
                        <div class="col-12">
                            <input type="text" name="address" id="address" class="form-control">
                            <span id="addressError"></span>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!--/#createModal -->
<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Student</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form name="detailForm" class="form-horizontal">
                    <div class="form-group">
                        <label for="name" class="col-12 control-label">Name</label>
                        <div class="col-12">
                            <input type="text" name="name" id="name" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-12 control-label">Email</label>
                        <div class="col-12">
                            <input type="text" name="email" id="email" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone" class="col-12 control-label">Phone</label>
                        <div class="col-12">
                            <input type="text" name="phone" id="phone" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="major" class="col-12 control-label">Major</label>
                        <div class="col-12">
                            <input type="text" name="major" id="major" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address" class="col-12 control-label">Address</label>
                        <div class="col-12">
                            <input type="text" name="address" id="address" class="form-control" readonly>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--/#detailModal-->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Student</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form name="editForm" class="form-horizontal">
                    <div class="form-group">
                        <label for="name" class="col-12 control-label">Name</label>
                        <div class="col-12">
                            <input type="text" name="name" id="name" class="form-control">
                            <span id="nameUpdateError"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-12 control-label">Email</label>
                        <div class="col-12">
                            <input type="text" name="email" id="email" class="form-control">
                            <span id="emailUpdateError"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone" class="col-12 control-label">Phone</label>
                        <div class="col-12">
                            <input type="text" name="phone" id="phone" class="form-control">
                            <span id="phoneUpdateError"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="major" class="col-12 control-label">Major</label>
                        <div class="col-12">
                            <select name="major" id="major" class="form-control">
                                <option value="" disabled>Select Major</option>
                                @foreach(App\Models\Major::all() as $major)
                                <option value="{{ $major->id }}">{{ $major->name }}</option>
                                @endforeach
                            </select>
                            <span id="majorUpdateError"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address" class="col-12 control-label">Address</label>
                        <div class="col-12">
                            <input type="text" name="address" id="address" class="form-control">
                            <span id="addressUpdateError"></span>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!--/#editModal -->
<div class="modal fade" id="mailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Send Mail to Student</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form name="mailForm" class="form-horizontal">
                    <div class="form-group">
                        <label for="email" class="col-12 control-label">Email</label>
                        <div class="col-12">
                            <input type="text" name="email" id="email" class="form-control">
                            <span id="sendMailError"></span>
                        </div>
                    </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Send</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!--/#mailModal-->
<secction class="sec-student-list">
    <button class="btn btn-secondary" data-toggle="modal" data-target="#createModal">Create</button>
    <div id="successMessage">
    </div>
    <div class="card mt-3">
        <div class="card-header">
            Student List
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Major</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="studentList">

                </tbody>
            </table>
        </div>
    </div>
</secction>
<!--/.sec-student-list-->
@endsection
