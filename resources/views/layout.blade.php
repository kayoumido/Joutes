<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8" />

        <title>Joutes</title>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/sweetalert.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" type="text/css" />

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
                    <a class="navbar-brand" href="{{ route('events.index') }}">
                        <img src="{{ asset('images/logo.png') }}" alt="">
                    </a>
                </div>
                <div id="navbar-collapse" class="navbar-collapse collapse" aria-expanded="false">
                    <ul class="nav navbar-nav">
                        <li><a href="{{ route('events.index') }}">Evénements</a></li>
                        <li><a href="{{ route('sports.index') }}">Sports</a></li>
                        <li><a href="{{ route('courts.index') }}">Terrains</a></li>
                        <li><a href="{{ route('tournaments.index') }}">Tournois</a></li>
                        <li><a href="{{ route('teams.index') }}">Equipes</a></li>
                        <li><a href="{{ route('participants.index') }}">Participants</a></li>
                    </ul>
                    <div class="nav navbar-nav navbar-right">
                        <div class="user-infos">
                            @if(Auth::check())
                                <span>{{ Auth::user()->username }}</span>
                                {{ Form::open(array('url' => route('admin.destroy', 0), 'method' => 'delete')) }}
                                    {{ Form::submit('Déconnexion', array('class' => 'btn btn-danger')) }}
                                {{ Form::close() }}
                            @else
                                <a href="{{ route('admin.index') }}"><button type="button" class="btn btn-success">Connexion</button></a>
                            @endif
                        </div>
                    </div>
                </div>
            </nav>
        </header>

            <div id="page">

                <div id="content">

                    @yield('content')

                </div><!-- content -->

            </div><!-- page -->

        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="copyright">
                            © 2017 - Centre professionnel du Nord vaudois
                        </div>
                        <div class="devs">
                            <a href="#" class="show-devs">Développeurs</a>

                            <div class="dev-names hide">
                                <a href="#" class="dev">Doran Kayoumi</a>
                                <a href="#" class="dev">Loïc Dessaules</a>
                                <a href="#" class="dev">Antoine Dessauges</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/sweetalert.min.js') }}"></script>
        <script src="{{ asset('js/select2.full.min.js') }}"></script>

        <script src="{{ asset('js/main.js') }}"></script>
    </body>
</html>
