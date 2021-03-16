@extends('laravel-admin::layout')
@section('content')

<div id="login">
                
    <form class="form" role="form" method="post" action="{{ route('admin-password-email') }}">

        <h1>Récupération du mot de passe</h1>

        <hr>
        
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} mb-2">
            <input id="email" type="email" class="form-control text-center" name="email" value="{{ old('email') }}" placeholder="Email..." required autofocus>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <hr>

        <button type="submit" class="btn btn-primary btn-block mb-2">Envoyer le lien de ré-initialisation</button>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        
    </form>
    
</div>

@endsection
