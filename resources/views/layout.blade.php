<?php
    $controller = explode('@', class_basename(Route::currentRouteAction()))[0];
?>
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
                <ul class="nav navbar-nav">
                    <li class="{{ $controller ==  '' ? 'active' : ''  }}">
                        <a href="/">Home</a>
                    </li>
                    <li class="{{ $controller ==  'PostController' ? 'active' : ''  }}">
                        <a href="/post/">Posts</a>
                    </li>
                    <li class="{{ $controller ==  'StatisticController' ? 'active' : ''  }}">
                        <a href="/statistic/">Statistic</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container" id="app">
            @yield('content')
        </div>
        @yield('js')
    </body>
</html>