<!DOCTYPE html>
<html lang="en">

<head>
    <title>Assignment 4</title>
    <!--bootstrap link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--fontawsome link -->
    <link href="{{ asset('fontawesome/css/all.min.css') }}" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light mb-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}">CRUD APP</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('majors') }}">Major</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('students') }}">Student</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        @yield('content')
    </div>
</body>
<!--bootstrap script -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!--axios script -->
<script src="https://cdn.jsdelivr.net/npm/axios@1.1.2/dist/axios.min.js"></script>
<script src="https://unpkg.com/axios@1.1.2/dist/axios.min.js"></script>
<!--student crud -->
<script>
    var nameList = document.getElementsByClassName('nameList');
    var majorList = document.getElementsByClassName('majorList');
    var phoneList = document.getElementsByClassName('phoneList');
    var idList = document.getElementsByClassName('idList');
    var btnList = document.getElementsByClassName('btnList');
    //show student data
    axios.get('/api/student')
        .then(response => {
            var studentList = document.getElementById('studentList');
            response.data.forEach(student => {
                studentList.innerHTML +=
                    '<tr>' +
                    '<td class="idList">' + student.id + '</td>' +
                    '<td class="nameList">' + student.name + '</td>' +
                    '<td class="majorList">' + student.major.name + '</td>' +
                    '<td class="phoneList">' + student.phone + '</td>' +
                    '<td class="text-nowrap btnList">' +
                    '<button class="btn btn-secondary btn-sm d-inline ml-1" data-toggle="modal" data-target="#detailModal" onclick="detailStudent(' + (student.id) + ')"><i class="fas fa-circle-info"></i>Detail</button>' +
                    '<button class="btn btn-success btn-sm d-inline ml-1" data-toggle="modal" data-target="#editModal" onclick="editStudent(' + (student.id) + ')"><i class="fas fa-edit"></i>Edit</button>' +
                    '<button class="btn btn-danger btn-sm d-inline ml-1" onclick="deleteStudent(' + (student.id) + ')"><i class="fas fa-edit"></i>Delete</button>' +
                    '</td>' +
                    '<tr>'
            });
        })
        .catch(error => console.log(error));

    //create student
    var createForm = document.forms['createForm'];
    var name = createForm['name'];
    var studentName = createForm['studentName'];
    var email = createForm['email'];
    var phone = createForm['phone'];
    var major = createForm['major'];
    var address = createForm['address'];

    createForm.onsubmit = function(e) {
        e.preventDefault();
        axios.post('/api/student/store', {
                name: studentName.value,
                email: email.value,
                phone: phone.value,
                major: major.value,
                address: address.value,
            })
            .then(response => {
                if (response.data.msg == 'Successfully created new student.') {
                    $('#createModal').modal('hide');
                    studentList.innerHTML +=
                        '<tr>' +
                        '<td>' + response.data.student.id + '</td>' +
                        '<td>' + response.data.student.name + '</td>' +
                        '<td>' + (response.data.major.name) + '</td>' +
                        '<td>' + response.data.student.phone + '</td>' +
                        '<td class="text-nowrap">' +
                        '<button class="btn btn-secondary btn-sm d-inline ml-1" data-toggle="modal" data-target="#detailModal" onclick="detailStudent(' + (response.data.student.id) + ')"><i class="fa-solid fa-circle-info"></i>Detail</a>' +
                        '<button class="btn btn-success btn-sm d-inline ml-1" data-toggle="modal" data-target="#editModal" onclick="editStudent(' + (response.data.student.id) + ')"><i class="fas fa-edit"></i>Edit</a>' +
                        '<button class="btn btn-danger btn-sm d-inline ml-1" onclick="deleteStudent(' + (response.data.student.id) + ')"><i class="fas fa-edit"></i>Delete</button>' +
                        '</td>' +
                        '<tr>'
                    document.getElementById('successMessage').innerHTML = '<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">' + response.data.msg + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                } else {
                    var nameError = document.getElementById('nameError');
                    var emailError = document.getElementById('emailError');
                    var phoneError = document.getElementById('phoneError');
                    var majorError = document.getElementById('majorError');
                    var addressError = document.getElementById('addressError');
                    if (studentName.value != '') {
                        nameError.innerHTML = '';
                    } else {
                        nameError.innerHTML = '<i class="text-danger">' + response.data.msg.name + '</i>';
                    }
                    if (email.value != '') {
                        emailError.innerHTML = '';
                    } else {
                        emailError.innerHTML = '<i class="text-danger">' + response.data.msg.email + '</i>';
                    }
                    if (phone.value != '') {
                        phoneError.innerHTML = '';
                    } else {
                        phoneError.innerHTML = '<i class="text-danger">' + response.data.msg.phone + '</i>';
                    }
                    if (major.value != '') {
                        majorError.innerHTML = '';
                    } else {
                        majorError.innerHTML = '<i class="text-danger">' + response.data.msg.major + '</i>';
                    }
                    if (address.value != '') {
                        addressError.innerHTML = '';
                    } else {
                        addressError.innerHTML = '<i class="text-danger">' + response.data.msg.address + '</i>';
                    }
                }
            })
            .catch(error => console.log(error));
    }
    //show student detail
    var detailForm = document.forms['detailForm'];
    var detailName = detailForm['name'];
    var detailEmail = detailForm['email'];
    var detailPhone = detailForm['phone'];
    var detailMajor = detailForm['major'];
    var detailAddress = detailForm['address'];

    function detailStudent(studentId) {
        axios.get('/api/student/show/' + studentId)
            .then(response => {
                detailName.value = response.data.student.name;
                detailEmail.value = response.data.student.email;
                detailPhone.value = response.data.student.phone;
                detailMajor.value = response.data.major.name;
                detailAddress.value = response.data.student.address;
            })
            .catch(err => console.log(err));
    }
    //edit student
    var editForm = document.forms['editForm'];
    var editId;
    var editName = editForm['name'];
    var editEmail = editForm['email'];
    var editPhone = editForm['phone'];
    var editMajor = editForm['major'];
    var editAddress = editForm['address'];
    var oldName;
    var oldMajor;
    var oldPhone;

    function editStudent(studentId) {
        editId = studentId;
        axios.get('/api/student/edit/' + studentId)
            .then(response => {
                editName.value = response.data.name;
                editEmail.value = response.data.email;
                editPhone.value = response.data.phone;
                editMajor.value = response.data.major_id;
                editAddress.value = response.data.address;
                oldName = response.data.name;
                oldMajor = response.data.major_id;
                oldPhone = response.data.phone;
            })
            .catch(err => console.log(err));
    }
    //update student
    editForm.onsubmit = function(e) {
        e.preventDefault();
        axios.put('/api/student/update/' + editId, {
                name: editName.value,
                email: editEmail.value,
                phone: editPhone.value,
                major: editMajor.value,
                address: editAddress.value,
            })
            .then(response => {
                if (response.data.msg == 'Successfully update.') {
                    $('#editModal').modal('hide');
                    document.getElementById('successMessage').innerHTML = '<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">' + response.data.msg + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                    for (var i = 0; i < nameList.length; i++) {
                        if (nameList[i].innerHTML == oldName) {
                            nameList[i].innerHTML = editName.value;
                            majorList[i].innerHTML = response.data.major.name;
                            phoneList[i].innerHTML = editPhone.value;
                        }
                    }
                } else {
                    var nameUpdateError = document.getElementById('nameUpdateError');
                    var emailUpdateError = document.getElementById('emailUpdateError');
                    var majorUpdateError = document.getElementById('majorUpdateError');
                    var phoneUpdateError = document.getElementById('phoneUpdateError');
                    var addressUpdateError = document.getElementById('addressUpdateError');
                    if (editName.value != '') {
                        nameUpdateError.innerHTML = '';
                    } else {
                        nameUpdateError.innerHTML = '<i class="text-danger">' + response.data.msg.name + '</i>';
                    }
                    if (editEmail.value != '') {
                        emailUpdateError.innerHTML = '';
                    } else {
                        emailUpdateError.innerHTML = '<i class="text-danger">' + response.data.msg.email + '</i>';
                    }
                    if (editPhone.value != '') {
                        phoneUpdateError.innerHTML = '';
                    } else {
                        phoneUpdateError.innerHTML = '<i class="text-danger">' + response.data.msg.phone + '</i>';
                    }
                    if (editMajor.value != '') {
                        majorUpdateError.innerHTML = '';
                    } else {
                        majorUpdateError.innerHTML = '<i class="text-danger">' + response.data.msg.major + '</i>';
                    }
                    if (editAddress.value != '') {
                        addressUpdateError.innerHTML = '';
                    } else {
                        addressUpdateError.innerHTML = '<i class="text-danger">' + response.data.msg.address + '</i>';
                    }
                }
            })
            .catch(err => console.log(err));
    }
    //delete student
    function deleteStudent(studentId) {
        if (confirm('Are you sure to delete?')) {
            axios.delete('/api/student/destroy/' + studentId)
                .then(response => {
                    document.getElementById('successMessage').innerHTML = '<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">' + response.data.msg + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                    for (var i = 0; i < idList.length; i++) {
                        if (idList[i].innerHTML == studentId) {
                            idList[i].style.display = 'none';
                            nameList[i].style.display = 'none';
                            majorList[i].style.display = 'none';
                            phoneList[i].style.display = 'none';
                            btnList[i].style.display = 'none';
                        }
                    }
                })
                .catch(err => console.log(err));
        }
    }
</script>
<!--major crud -->
<script>
    var majorIdList = document.getElementsByClassName('majorIdList');
    var majorNameList = document.getElementsByClassName('majorNameList');
    var majorBtnList = document.getElementsByClassName('majorBtnList');
    var majorNameError = document.getElementById('majorNameError');
    var updateNameError = document.getElementById('updateNameError');
    var createMajorFrom = document.getElementById('createMajorFrom');
    var editMajorFrom = document.getElementById('editMajorFrom');
    editMajorFrom.style.display = 'none';
    //show student data
    axios.get('/api/major')
        .then(response => {
            var majorList = document.getElementById('majorList');
            response.data.forEach(major => {
                majorList.innerHTML +=
                    '<tr>' +
                    '<td class="majorIdList">' + major.id + '</td>' +
                    '<td class="majorNameList">' + major.name + '</td>' +
                    '<td class="text-nowrap majorBtnList">' +
                    '<button class="btn btn-success btn-sm d-inline ml-1" onclick="editMajor(' + (major.id) + ')"><i class="fas fa-edit"></i>Edit</button>' +
                    '<button class="btn btn-danger btn-sm d-inline ml-1" onclick="deleteMajor(' + (major.id) + ')"><i class="fas fa-edit"></i>Delete</button>' +
                    '</td>' +
                    '<tr>'
            });
        })
        .catch(error => console.log(error));
    //create major
    var majorCreateForm = document.forms['majorCreateForm'];
    var major = majorCreateForm['name'];
    majorCreateForm.onsubmit = function(e) {
        e.preventDefault();
        axios.post('/api/major/store', {
                name: major.value,
            })
            .then(response => {
                if (response.data.msg == 'Successfully created new major.') {
                    var majorList = document.getElementById('majorList');
                    majorList.innerHTML +=
                        '<tr>' +
                        '<td class="majorIdList">' + response.data.major.id + '</td>' +
                        '<td class="majorNameList">' + response.data.major.name + '</td>' +
                        '<td class="text-nowrap majorBtnList">' +
                        '<button class="btn btn-success btn-sm d-inline ml-1" data-toggle="modal" data-target="#editModal" onclick="editMajor(' + (response.data.major.id) + ')"><i class="fas fa-edit"></i>Edit</a>' +
                        '<button class="btn btn-danger btn-sm d-inline ml-1" onclick="deleteMajor(' + (response.data.major.id) + ')"><i class="fas fa-edit"></i>Delete</button>' +
                        '</td>' +
                        '<tr>'
                    document.getElementById('successMessage').innerHTML = '<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">' + response.data.msg + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                } else {
                    var majorNameError = document.getElementById('majorNameError');
                    if (major.value != '') {
                        majorNameError.innerHTML = '';
                    } else {
                        majorNameError.innerHTML = '<i class="text-danger">' + response.data.msg.name + '</i>';
                    }
                }
            })
            .catch(error => console.log(error));
    }
    //edit major
    var majorEditForm = document.forms['majorEditForm'];
    var editId;
    var editName = majorEditForm['name'];
    var oldName;

    function editMajor(majorId) {
        createMajorFrom.style.display = 'none';
        editMajorFrom.style.display = 'block';
        majorNameError.innerHTML = '';
        updateNameError.innerHTML = '';
        editId = majorId;
        axios.get('/api/major/edit/' + majorId)
            .then(response => {
                editName.value = response.data.name;
                oldName = response.data.name;
            })
            .catch(err => console.log(err));
    }

    function cancleUpdate() {
        majorEditForm.reset();
        majorCreateForm.reset();
        majorNameError.innerHTML = '';
        createMajorFrom.style.display = 'block';
        editMajorFrom.style.display = 'none';
    }
    //update student
    majorEditForm.onsubmit = function(e) {
        e.preventDefault();
        axios.put('/api/major/update/' + editId, {
                name: editName.value,
            })
            .then(response => {
                if (response.data.msg == 'Successfully update.') {
                    majorEditForm.reset();
                    createMajorFrom.style.display = 'block';
                    editMajorFrom.style.display = 'none';
                    document.getElementById('successMessage').innerHTML = '<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">' + response.data.msg + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                    console.log(editName.value);
                    for (var i = 0; i < majorNameList.length; i++) {
                        if (majorNameList[i].innerHTML == oldName) {
                            majorNameList[i].innerHTML = response.data.major.name;
                        }
                    }
                } else {
                    if (major.value != '') {
                        updateNameError.innerHTML = '';
                    }else {
                        updateNameError.innerHTML = '<i class="text-danger">' + response.data.msg.name + '</i>';
                    }
                }
            })
            .catch(err => console.log(err));
    }
    //delete major
    function deleteMajor(majorId) {
        if (confirm('Are you sure to delete?')) {
            axios.delete('/api/major/destroy/' + majorId)
                .then(response => {
                    document.getElementById('successMessage').innerHTML = '<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">' + response.data.msg + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                    for (var i = 0; i < majorIdList.length; i++) {
                        if (majorIdList[i].innerHTML == majorId) {
                            majorIdList[i].style.display = 'none';
                            majorNameList[i].style.display = 'none';
                            majorBtnList[i].style.display = 'none';
                        }
                    }
                })
                .catch(err => console.log(err));
        }
    }
</script>
</html>
