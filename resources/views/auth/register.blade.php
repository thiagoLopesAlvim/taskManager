<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Registro</title>

    <!-- Importação do CSS -->
    <link rel="stylesheet" href="{{ asset('css/styleRegister.css') }}">
</head>

<body>
    <header>
        <h1>Registrar</h1>
    </header>

    <div class="container">
        <h2>Criar Nova Conta</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Nome -->
            <div class="form-group">
                <label for="name">Nome</label>
                <input id="name" class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" />
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email -->
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" />
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Senha -->
            <div class="form-group">
                <label for="password">Senha</label>
                <input id="password" class="form-control @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="new-password" />
                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Confirmar Senha -->
            <div class="form-group">
                <label for="password_confirmation">Confirme a Senha</label>
                <input id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" type="password" name="password_confirmation" required autocomplete="new-password" />
                @error('password_confirmation')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Links e Botão -->
            <div class="flex">
                <a href="{{ route('login') }}">
                    Já tem uma conta?
                </a>
                <button type="submit" class="btn btn-primary">
                    Registrar
                </button>
            </div>
        </form>
    </div>
</body>

</html>