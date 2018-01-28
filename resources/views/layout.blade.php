<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Оголошення - @yield('title')</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>

<nav class="navbar navbar-default ">
    <div class="container">

        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="{{ route('main') }}">{{ trans('menu.main_message') }}</a></li>
                <li><a href="{{ route('catalog') }}">{{ trans('menu.catalog') }}</a></li>
                <li><a href="{{ route('about') }}">{{ trans('menu.about') }}</a></li>
                <li><a href="{{ route('login') }}">{{ trans('menu.login') }}</a></li>
                <li> <a href="{{ route('logout') }}">
                        {{ trans('menu.logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>

            </ul>
            <div class="pull-right" style="margin-top:15px;padding:5px 2px;margin-right:2px; border-radius:5px;background-color:palevioletred">
                <a class="flat orange medium flat-button" href="{{ route('create.ad') }}">{{ trans('menu.create_ad') }}</a>

            </div>


        </div><!--/.navbar-collapse -->
    </div>
</nav>

<!-- Main jumbotron for a primary marketing message or call to action -->


<div class="container">
@yield('content')

   {{-- <footer>
        <p>&copy; 2015 Company, Inc.</p>
    </footer>--}}
</div>
</body>
</html>

