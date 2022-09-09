@extends('layout')
@section('title', 'Reset Password')
@section('content')
<div class="container">
    <div class="auth-pages">
        <div class="auth-left">
            @if (session()->has('status'))
            <div class="alert alert-success">
                {{ session()->get('status') }}
            </div>
            @endif @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <h2>Mot de passe oublié?</h2>
            <div class="spacer"></div>
            <form action="{{ route('password.email') }}" method="POST">
                {{ csrf_field() }}
                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
                <div class="login-container">
                    <button type="submit" class="auth-button">Envoyer</button>
                </div>


            </form>
        </div>
        <div class="auth-right">
            <h2> Information</h2>
            <div class="spacer"></div>
            <p>Si vous avez oublié votre mot de passe, veuillez renseigner votre adresse email pour recevoir un message de modification</p>
            <div class="spacer"></div>
            <p>A noter que vous devez impérativement disposer d'un compte avant cette action</p>
        </div>
    </div>
</div>
@endsection