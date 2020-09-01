<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>

        <div id="app">
            <!-- Barre de navigation -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
				<router-link to="/" class="navbar-brand">Check Your PHP</router-link>
                {{-- <a class="navbar-brand" href="#">Check Your PHP</a> --}}
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarColor02">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                      <router-link to="/example" class="nav-link">Example</router-link>
                    </li>
                    <li class="nav-item">
                    <router-link to="/test" class="nav-link">TEST</router-link>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">About</a>
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
    </body>
</html>
