@extends('layouts.app')

@section('jspagina')
    <script type="text/javascript" src="{{ asset('build/assets/login/login.js') }}"></script>
@endsection

@section('content')
    @php
    use Illuminate\Support\Facades\DB;

    // Valores por defecto
    $imagen_mostrar = asset('images/optimiza.png');
    $nombre_mostrar = 'OptimizaData';

    if (request()->has('acced') && request()->has('actnf')) {
        $token_1 = request('acced');
        $token_2 = request('actnf');

        $result = DB::table('controlcuentas')
            ->select('imagen_mostrar', 'nombre_mostrar')
            ->where('token_1', $token_1)
            ->where('token_2', $token_2)
            ->first();

        if ($result) {
            $imagen_mostrar = $result->imagen_mostrar;
            $nombre_mostrar = $result->nombre_mostrar;
        }
    }
    @endphp

    <form method="POST" name="login" action="{{ route('login') }}">
        @csrf
        <div class="panel panel-body login-form">
            <div class="text-center form-group">
                <img src="{{ $imagen_mostrar }}" width="253" height="70">
            </div>

            <div class="form-group" style="margin-top: 40px;">
                <div class="form-group has-feedback has-feedback-left">
                    <input id="email" type="email"
                        class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Usuario"
                        name="email" value="{{ old('email') }}" required autofocus>
                    <div class="form-control-feedback">
                        <i class="icon-user text-muted"></i>
                    </div>
                </div>
                @if ($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif

                <div class="form-group has-feedback has-feedback-left mb-20">
                    <input id="password" type="password"
                        class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Contraseña"
                        name="password" required>
                    <div class="form-control-feedback">
                        <i class="icon-lock2 text-muted"></i>
                    </div>
                </div>
                @if ($errors->has('password'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group" style="margin-top: 40px;">
                <button type="submit" class="btn btn-primary btn-block">
                    {{ __('Acceder') }}<i class="icon-circle-right2 position-right"></i>
                </button>

                <div class="text-center pt-15">
                    <a class="" href="{{ route('password.request') }}">
                        {{ __('¿No recuerdas tu contraseña?') }}
                    </a>
                </div>
            </div>
        </div>
    </form>
@endsection
