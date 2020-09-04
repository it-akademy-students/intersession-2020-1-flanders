<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link rel="styles<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>heet" href="{{ asset('css/bootstrap.css') }}">

</head>
<body>

<div id="app">
    <!-- Barre de navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">


    <a class="navbar-brand" href="#">
    <img src="{{ asset('/images/hibou.png') }}" width="30" height="30" alt="" loading="lazy">
  </a>

        <router-link to="/" class="navbar-brand">Check Your PHP</router-link>
        {{-- <a class="navbar-brand" href="#">Check Your PHP</a> --}}
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor02">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <router-link to="/GetStarted" class="nav-link"><i class="fad fa-question-circle"></i> Aide</router-link>
                </li>
                <li class="nav-item">
                    <router-link to="/Donations" class="nav-link"><i class="fas fa-money-check-alt"></i> Faire un don</router-link>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container mt-2">
        <!-- Composants Vue gérés par VueRouter -->
        <router-view></router-view>
    </div>
</div>

<script src="{{ asset('js/app.js') }}"></script>

<!-- <script src="{{ asset('js/.paypal.js') }}"></script> -->

</body>
</html>
