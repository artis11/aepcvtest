<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>@yield('title')</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    </head>

    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Blog</a>
                </div>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="/">Home</a></li>
                    <li><a href="/post/">Posts</a></li>
                </ul>
            </div>
        </nav>

        <div class="container" id="main">
            @yield('content')
        </div>
    </body>
</html>