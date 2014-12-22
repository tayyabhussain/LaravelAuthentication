<html>
    <head>
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
    </head>
    <title>
        LaraVel Authentication
    </title>
    <body>
        
        @include('layout.navigation')
        @if(Session::has('global'))
            <p> {{Session::get('global')}} </p>
        @endif
        @yield('content')
    </body>
    
</html>
    