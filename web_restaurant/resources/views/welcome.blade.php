<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>Hello, Restaurant!</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- Fonts and icons -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

    <!-- Material Kit CSS -->
    <link href="/assets/css/addRes.css" rel="stylesheet" />

    <!-- Styles -->
    <style>
        a {
            color: inherit;
            text-decoration: inherit
        }

        .flex {
            display: flex
        }

    </style>
</head>

<body>
    <header class="bg-white">
        <div class="container">
            <div class="flex justify-content-between p-3">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="col-lg-auto">
                            {{ __('Dashboard') }}
                        </a>
                    @else
                        <div class="flex align-items-center">
                            <a href="{{ url('/') }}" class="col-lg-auto">
                                <img src="/assets/img/logo.png" width="40" height="40" />
                            </a>
                            <ul class="nav">
                                <li><a href="{{ url('/addRes') }}"
                                        class="font-weight-normal col-lg-auto">{{ __('Add Restaurant') }}</a>
                                </li>
                                <li><a href="{{ url('/') }}"
                                        class="font-weight-normal col-lg-auto">{{ __('Profile') }}</a>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <a href="{{ url('/') }}" class="col-lg-auto"><span
                                    class="material-icons">account_circle</span></a>
                            <a href="{{ url('/login') }}" class="btn btn-outline-primary">{{ __('Sign In') }}</a>
                            @if (Route::has('register'))
                                <a href="{{ url('/register') }}" class="btn btn-primary">{{ __('Sign Up') }}</a>
                            @endif
                        </div>
                    @endauth
                @endif
            </div>
        </div>
    </header>
    <div class="page-header header-filter" data-parallax="true" style="background-image: url('img/bg3.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto">
                    <div class="brand text-center">
                        <h1>Your title here</h1>
                        <h3>Your Subtitle here</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main main-raised">
        <div class="container">
            <div class="section text-center">
                <form name="" action="" method="" class="flex">
                    <input type="text" name="" placeholder="Search" class="form-control m-xl-3" required>
                    <input type="submit" name="" class="btn btn-primary btn-round m-xl-3">
                </form>
            </div>
        </div>
    </div>
</body>
@include('footer')

</html>
