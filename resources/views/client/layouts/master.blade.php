<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>Gestion Stock</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/4.4/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/4.4/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/4.4/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
    <link rel="icon" href="/docs/4.4/assets/img/favicons/favicon.ico">
    <meta name="msapplication-config" content="/docs/4.4/assets/img/favicons/browserconfig.xml">
    <meta name="theme-color" content="#563d7c">


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
    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    @yield('extra-css')
    
  </head>
  <body>
    <div class="container">
  <header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
    <div class="col-6 text-left">
        <a class="blog-header-logo text-dark" href="{{url('/')}}"> Bienvenu</a>
      </div>
      <div class="col-6 pt-1 text-right">
        <a class="text-muted" href="{{route('stockcart.index')}}">Panier <span class="badge badge-pill badge-dark">{{Cart::count()}} </span></a>
      </div>
     
      
    </div>
  </header>

  <div class="nav-scroller py-1 mb-0">
    <!-- <nav class="nav d-flex justify-content-between">
      <a class="p-2 text-muted" href="#">categorie 1</a>
      <a class="p-2 text-muted" href="#">categorie 2</a>
      <a class="p-2 text-muted" href="#">categorie 3</a>
    
     
    </nav> -->
  </div>

  @if(session('success'))
  <div class="alert alert-success">
    {{session('success')}}
  </div>
  @endif
  @if(session('success_message'))
  <div class="alert alert-success">
    {{session('success_message')}}
  </div>
  @endif
  <style>
  .profil{
    text-decoration:none!important;
    color:white;
  }
  </style>

  <div class="jumbotron p-4 p-md-5 text-white rounded bg-dark">
    <div class="col-md-12 px-0 d-flex justify-content-between">
      <h5 class="display-5 font-italic">
      Bonjour 
      @if (auth()->user())
            {{  auth()->user()->name }} 

      @endif !
        </h5>
       <a href="{{ route('users.edit') }}" class="profil"> <i class="fa fa-eye"> </i>  Mon Profil</a>
       @if (auth()->user()->role_id == 4 || auth()->user()->role_id == 3)
       <a href="{{route('goAdmin')}}" class="profil"> <i class="fa fa-cog"> </i>  Gérer Stock</a>
       @endif
       <a href="{{ route('logout') }}" class="profil"
            onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
           Déconnexion
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
      <!-- <p class="lead my-3">Choisissez vos produits !</p> -->
    
    </div>
    
  </div>

  <div class="row mb-2">
    
    @yield('content')
  </div>

<br/>

<footer class="blog-footer">
  <p><a href="#"></a> - 🛒 </p>
  <p>
    <a href="#">Revenir en haut</a>
  </p>
</footer>
@yield('extra-js')
</body>
</html>