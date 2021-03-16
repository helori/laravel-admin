@extends('laravel-admin::layout')
@section('content')

<div id="login">
            
    <form class="form" role="form" method="POST" action="{{ route('admin-post-password-reset') }}">

        <h1>Ré-initialiser votre mot de passe</h1>
        
        <hr>

        {{ csrf_field() }}

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} mb-2">
            <input id="email" type="email" class="form-control text-center" name="email" value="{{ $email or old('email') }}" required autofocus placeholder="Email...">
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} mb-2">
            <input id="password" type="password" class="form-control text-center" name="password" required placeholder="Mot de passe...">
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            <input id="password-confirm" type="password" class="form-control text-center" name="password_confirmation" required placeholder="Confirmer le mot de passe...">
            @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
            @endif
        </div>

        <hr>

        <button type="submit" class="btn btn-primary btn-block">
            Ré-initialiser le mot de passe
        </button>

    </form>

</div>

@endsection
