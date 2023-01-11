<!DOCTYPE html>
<html lang="en">

<head>
    <title>Laravel_Assignment_Quickstart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="{{ asset('fontawesome/css/all.min.css') }}" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary bg-light mb-3">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">CRUP APP</a>
    <ul class="nav justify-content-end">
  <li class="nav-item">
    <a class="nav-link" href="{{ route('student.index') }}">Student</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('major.index') }}">Major</a>
  </li>
</ul>
  </div>
</nav>
    <div class="container">
        @yield('content')
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</html>
