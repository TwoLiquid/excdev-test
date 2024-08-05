@extends('bootstrap.templates.one-page')

@section('content')
    <form action="{{ route('login.store') }}" method="post">
        @csrf

        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

        <div class="form-floating">
            <input type="email" class="form-control {{ $errors->get('login') ? 'is-invalid' : '' }}" name="login" id="floatingInput" placeholder="name@example.com" value="twoliquid@gmail.com" required>
            <label for="floatingInput">Email address</label>
            <div class="invalid-feedback">
                {{ $errors->first() }}
            </div>
        </div>

        <div class="form-floating">
            <input type="password" class="form-control {{ $errors->get('password') ? 'is-invalid' : '' }}" name="password" id="floatingPassword" placeholder="Password" value="qwerty" required>
            <label for="floatingPassword">Password</label>
            <div class="invalid-feedback">
                {{ $errors->first() }}
            </div>
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
        <p class="mt-5 mb-3 text-muted">&copy; Excdev 2024</p>
    </form>
@endsection
