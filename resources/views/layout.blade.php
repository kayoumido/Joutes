<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8" />

        <title>Joutes</title>

        <link rel="stylesheet" type="text/css" href="/css/sweetalert.css">

        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/sweetalert.css') }}" rel="stylesheet" type="text/css" />

        <link href="{{ asset('css/layout.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" type="text/css" />

        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        
        <title>Laravel</title>
    </head>
    <body>
        <header class="header">
            <nav class="navbar">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html">
                        <img src="{{ asset('images/logo.png') }}" alt="">
                    </a>
                </div>
                <div id="navbar-collapse" class="navbar-collapse collapse" aria-expanded="false">
                    <ul class="nav navbar-nav">
                        <li><a href="index.html">Accueil</a></li>
                        <li><a href="#Formations">Formations</a></li>
                        <li><a href="#Admissions">Admissions</a></li>
                        <li><a href="#Entreprise">Entreprise</a></li>
                    </ul>
                </div>
            </nav>
        </header>

            <div id="page">

                <div id="content">

                    @yield('content')

                </div><!-- content -->

            </div><!-- page -->

        <footer>

        </footer>
        
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/sweetalert.min.js') }}"></script>

        <script src="{{ asset('js/main.js') }}"></script>
    </body>
</html>
