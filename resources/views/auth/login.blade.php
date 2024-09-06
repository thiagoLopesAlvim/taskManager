<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('css/styleLogin.css') }}" rel="stylesheet">
    <style>
        body {
            background-color: #f2f4f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: 'Poppins', sans-serif;
        }

        .login-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            width: 100%;
        }

        .login-container {
            max-width: 400px;
            width: 100%;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            margin: 1rem;
        }

        .login-container h4 {
            margin-bottom: 1.5rem;
            text-align: center;
            font-weight: 600;
            color: #333;
        }

        .form-group {
            margin-bottom: 1.5rem;
            margin-right: 35px;
        }

        .form-group label {
            display: block;
            font-weight: 500;
            margin-bottom: 0.5rem;
            color: #555;
        }

        .form-group input {
            width: 100%;
            padding: 0.75rem;
            border-radius: 8px;
            border: 1px solid #ced4da;
            font-size: 0.875rem;
        }

        .form-group input:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.25);
            outline: none;
        }

        .form-check {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .form-check input {
            margin-right: 0.5rem;
        }

        .form-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .form-actions a {
            color: #007bff;
            text-decoration: none;
            font-size: 0.875rem;
        }

        .form-actions a:hover {
            text-decoration: underline;
        }

        .btn-primary {
            width: 100%;
            padding: 0.75rem;
            border-radius: 8px;
            border: none;
            background-color: #007bff;
            color: #fff;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .alert {
            margin-bottom: 1.5rem;
        }
    </style>
</head>

<body>
    <div class="login-wrapper">
        <div class="login-container">
            <h4>Login</h4>

            <!-- Session Status -->
            <x-auth-session-status class="alert alert-success" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" required autofocus autocomplete="username">
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password">Senha</label>
                    <input id="password" type="password" name="password" required autocomplete="current-password">
                </div>

                <!-- Remember Me -->
                <div class="form-check">
                    <input id="remember_me" type="checkbox" name="remember">
                    <label for="remember_me">Lembre-me</label>
                </div>



                <button type="submit" class="btn btn-primary">
                    Entrar
                </button>
            </form>
            <div class="form-actions">
                @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">
                    Esqueceu sua senha?
                </a>
                @endif
                <a href="{{ route('register') }}">
                    Registre-se
                </a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>