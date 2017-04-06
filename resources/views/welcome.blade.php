<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <link rel="stylesheet" href="{{asset("/css/app.css")}}">

    </head>
    <body>

        <div id="app" class="container-fluid" style="width: 800px; position: absolute; left: 50%; top: 25%; margin-left: -400px">
            @yield('content')
        </div>

        <script src="{{asset("/js/app.js")}}"></script>

    </body>
</html>
