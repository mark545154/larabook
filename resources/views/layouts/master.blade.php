<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>larabook</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
</head>
<body>
@section('menu')
    <div class="col-12">
        <ul class="nav nav-justified">
            <li class="nav-item">
                <a href="{{url('topic')}}" class="nav-link">Main page</a>
            </li>
            <li class="nav-item">
                <a href="{{url('block/create')}}" class="nav-link">Content Control</a>
            </li>
        </ul>
    </div>
@show
<div class="container">
    <div class="row">
        @yield('content')
    </div>
</div>

</body>
</html>