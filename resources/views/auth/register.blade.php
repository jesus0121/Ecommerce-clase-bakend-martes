@extends('layouts.app')

@section('content')
<div class="register-container">
  <div class="register-card">
    <h3 class="register-title text-center mb-4">Registro de Usuario</h3>

    <form method="POST" action="{{ route('register') }}">
      @csrf

      <div class="mb-3">
        <label for="name" class="form-label">Nombre</label>
        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
        @error('name')
          <span class="text-danger small">{{ $message }}</span>
        @enderror
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Correo electrónico</label>
        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
        @error('email')
          <span class="text-danger small">{{ $message }}</span>
        @enderror
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Contraseña</label>
        <input id="password" type="password" class="form-control" name="password" required>
        @error('password')
          <span class="text-danger small">{{ $message }}</span>
        @enderror
      </div>

      <div class="mb-4">
        <label for="password-confirm" class="form-label">Confirmar contraseña</label>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
      </div>

      <div class="d-grid">
        <button type="submit" class="btn btn-primary">Registrar</button>
      </div>
    </form>
  </div>
</div>
@endsection
