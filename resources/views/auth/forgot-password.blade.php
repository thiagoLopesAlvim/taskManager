<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Esqueceu a Senha</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/styleForgotPassword.css') }}" rel="stylesheet">
</head>

<body>

    <div class="container">
        <div class="mb-4 text-sm text-gray-600">
            {{ __('Esqueceu sua senha? Não tem problema. Informe seu endereço de e-mail e nós enviaremos um link de redefinição de senha para que você possa escolher uma nova.') }}
        </div>

        <!-- Status da Sessão -->
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Endereço de Email -->
            <div class="form-group">
                <label for="email">{{ __('Email') }}</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autofocus>
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mt-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Enviar Link de Redefinição de Senha') }}
                </button>
            </div>
        </form>
    </div>

</body>

</html>