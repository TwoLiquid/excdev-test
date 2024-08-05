<!doctype html>
<html lang="en">
@include('templates.partials.head')

<body class="text-center">

<main class="form-signin">
    @yield('content')
</main>

<script src="{{ asset('assets/js/app.js') }}" crossorigin="anonymous"></script>
</body>
</html>
