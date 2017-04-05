<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8" />

        <title>Joutes - Schedule</title>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/schedule.css') }}" rel="stylesheet" type="text/css" />

        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Lato:400,900" rel="stylesheet">
        <title>Laravel</title>
    </head>
    <body>


            <div id="page">

                <div id="content">

                    @yield('content')

                </div><!-- content -->

            </div><!-- page -->


        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
