<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8" />
        
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/layout.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" type="text/css" />
        
        
        <title>Laravel</title>
    </head>
    <body>
        
        <header>

        </header>
            
            <div id="page">
                
                <div id="content">

                    @yield('content')

                </div><!-- content -->
            
            </div><!-- page -->
        
        <footer>

        </footer>
        
    <script src="https://use.fontawesome.com/e153ca534d.js"></script>
    </body>
</html>