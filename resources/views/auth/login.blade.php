@extends('layouts.app')

@section('content')
<div class="login-wrapper">
    <div class="login-container">
        <!-- Logo arriba del formulario -->
        <div class="login-logo">
            <img src="{{ asset('images/logo-unab.png') }}" alt="Logo UNAB">
        </div>

        <!-- Tarjeta de inicio de sesión -->
        <div class="login-card">
            <div class="login-header">{{ __('Iniciar Sesión') }}</div>

            <div class="login-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="login-group">
                        <label for="email" class="login-label">{{ __('Correo Electrónico') }}</label>
                        <input id="email" type="email"
                               class="login-input @error('email') is-invalid @enderror"
                               name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="login-error" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="login-group">
                        <label for="password" class="login-label">{{ __('Contraseña') }}</label>
                        <input id="password" type="password"
                               class="login-input @error('password') is-invalid @enderror"
                               name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="login-error" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="login-remember">
                        <label class="login-remember-label">
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            {{ __('Recuérdame') }}
                        </label>
                    </div>

                    <div class="login-actions">
                        <button type="submit" class="login-btn">
                            {{ __('Ingresar') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="login-link" href="{{ route('password.request') }}">
                                {{ __('¿Olvidaste tu contraseña?') }}
                            </a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
