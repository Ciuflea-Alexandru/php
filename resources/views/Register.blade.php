<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css/Register.css') }}">
</head>

<body>
    <div class="container">
        <h1 class="title">Register</h1>

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div>
                <input class="input" type="text" name="name" placeholder="Name">
            </div>

            <div>
                <input class="input" type="email" name="email" placeholder="Email">
            </div>

            <div>
                <input class="input" type="password" name="password" placeholder="Password">
            </div>

            <div>
                <input class="input" type="password" name="password_confirmation" placeholder="Confirm Password">
            </div>

            <div>
                <button class="button" type="submit">Register</button>
            </div>
        </form>
        <a class="link" href="/login">Login</a>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</body>

</html>