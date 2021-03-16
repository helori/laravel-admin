@extends('laravel-admin::layout')
@section('content')
<div id="home">
                
    <h1>Welcome !</h1>

    <a class="btn btn-secondary btn-block" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
        <i class="fa fa-sign-out"></i> Déconnexion
    </a>
    <form id="logout-form" action="{{ route('admin-logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>

</div>
@endsection
