@extends('layout')

@section('title', 'Login')

@section('content')

<style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }
      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      /* stylelint-disable selector-list-comma-newline-after */
    .blog-header {
    line-height: 1;
    border-bottom: 1px solid #e5e5e5;
    }
    .blog-header-logo {
    font-family: "Playfair Display", Georgia, "Times New Roman", serif;
    font-size: 2.25rem;
    }
    .blog-header-logo:hover {
    text-decoration: none;
    }
    .display-4 {
    font-size: 2.5rem;
    }
    @media (min-width: 768px) {
    .display-4 {
        font-size: 3rem;
    }
    }
    .nav-scroller {
    position: relative;
    z-index: 2;
    height: 2.75rem;
    overflow-y: hidden;
    }
    .nav-scroller .nav {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: nowrap;
    flex-wrap: nowrap;
    padding-bottom: 1rem;
    margin-top: -1px;
    overflow-x: auto;
    text-align: center;
    white-space: nowrap;
    -webkit-overflow-scrolling: touch;
    }
    .nav-scroller .nav-link {
    padding-top: .75rem;
    padding-bottom: .75rem;
    font-size: .875rem;
    }
    .card-img-right {
    height: 100%;
    border-radius: 0 3px 3px 0;
    }
    .flex-auto {
    -ms-flex: 0 0 auto;
    flex: 0 0 auto;
    }
    .h-250 { height: 250px; }
    @media (min-width: 768px) {
    .h-md-250 { height: 250px; }
    }
    /* Pagination */
    .blog-pagination {
    margin-bottom: 4rem;
    }
    .blog-pagination > .btn {
    border-radius: 2rem;
    }
    /*
    * Blog posts
    */
    .blog-post {
    margin-bottom: 4rem;
    }
    .blog-post-title {
    margin-bottom: .25rem;
    font-size: 2.5rem;
    }
    .blog-post-meta {
    margin-bottom: 1.25rem;
    color: #999;
    }
    /*
    * Footer
    */
    .blog-footer {
    padding: 2.5rem 0;
    color: #999;
    text-align: center;
    background-color: #f9f9f9;
    border-top: .05rem solid #e5e5e5;
    }
    .blog-footer p:last-child {
    margin-bottom: 0;
}
    </style>
    <header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
    <div class="col-6 text-left" style="height:50px;">
        <a class="blog-header-logo text-dark" href="#">  </a>
      </div>
      <div class="col-6 pt-1 py-4 text-right">
        
      </div>
     
      
    </div>
  </header>
<div class="container">

    <div class="auth-pages">
    <div class="auth-left text-center ">
            <h1>Bienvenu(e)</h1>
            <div class="spacer"></div>
            <p><strong>Connectez vous pour naviguer!</strong></p>
             <div class="spacer"></div>
             <!-- <p>Nous sommes Heureux de vous accueillir !</p> -->
         <!-- 
            <div class="spacer"></div>
            <a href="{{ route('guestCheckout.index') }}" class="auth-button-hollow" style="background:#3ebfa4;">Continuer commande</a>
            <div class="spacer"></div>
            &nbsp;
            <div class="spacer"></div>
            <p><strong>Gagner du temps pour plutard !.</strong></p>
            <p>Vous pouvez aussi créer un compte et accéder facilement à l'historique de vos commandes</p>
            <div class="spacer"></div>
            <a href="{{ route('register') }}" class="auth-button-hollow">Créer un compte</a> -->

        </div>
        <div class="auth-right">
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
            <h2></h2>
            <div class="spacer"></div>

            <form action="{{ route('login') }}" method="POST">
                {{ csrf_field() }}

                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
                <input type="password" id="password" name="password" value="{{ old('password') }}" placeholder="Password" required>

                <div class="login-container">
                    <button type="submit" class="auth-button">Connexion</button>
                    <!-- <label>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                    </label> -->
                </div>

                <div class="spacer"></div>

                <!-- <a href="{{ route('password.request') }}">
                   Mot de passe oublié?
                </a> -->

            </form>
        </div>

       
    </div>
</div>
@endsection