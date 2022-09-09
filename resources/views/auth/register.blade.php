@extends('layout')

@section('title', 'Sign Up for an Account')

@section('content')
<div class="container">
    <div class="auth-pages">
        <div>
            @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
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
            <h2>Créer un compte</h2>
            <div class="spacer"></div>

            <form method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}

                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Nom" required autofocus>

                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required>

                <input id="password" type="password" class="form-control" name="password" placeholder="Password" placeholder="Mot de passe" required>

                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmation de mot de passe"
                    required>

                <div class="login-container">
                    <button type="submit" class="auth-button">Créer un compte</button>
                    <div class="already-have-container">
                        <p><strong>Avez-vous déjà un compte?</strong></p>
                        <a href="{{ route('login') }}">Se connecter</a>
                    </div>
                </div>

            </form>
        </div>

        <div class="auth-right">
            <h2>Nouveau Client</h2>
            <div class="spacer"></div>
            <p><strong>Gagnger du temps.</strong></p>
            <p>En créant un compte, vous serez capable de faire rapidement vos commandes, accéder à votre espace et voir votre historique concernant vos commandes</p>

            &nbsp;
            <div class="spacer"></div>
            
        </div>
    </div> <!-- end auth-pages -->
</div>
@endsection