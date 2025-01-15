<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/Login.css') }}">
</head>

<body>
    <div class="container">
        <h1 class="title">Login</h1>
        <form method="POST">
            @csrf

            <div>
                <input class="input" id="email" type="email" name="email" placeholder="Email" required autofocus>
            </div>

            <div>
                <input class="input" id="password" type="password" name="password" placeholder="Password" required
                    autocomplete="current-password">
            </div>
            <div>
                <button class="button" type="submit">Login</button>
            </div>
        </form>
        <a class="link" href="/register">Register</a>

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