<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dashboard Template · Bootstrap v5.1</title>
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
</head>
<body class="dashboard">

@include('templates.partials.header')

<div class="container-fluid">
    <div class="row">

        @include('templates.partials.side-menu')

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-3">
            @yield('content')
        </main>
    </div>
</div>

<script src="{{ asset('assets/js/app.js') }}"></script>

</body>
</html>
