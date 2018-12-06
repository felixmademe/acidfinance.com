<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Acid Finance helps you visualize your income and expenses">
    <meta name="author" content="Felix Wetell">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Acid Finance') }} - @yield( 'title' )</title>
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.13/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/css/swiper.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.16/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="{{ asset( '/css/main.min.css' ) }}">
    <link rel="icon" href="{{ asset( '/img/acid-icon.ico' ) }}">
</head>
<body>
    <nav class="navbar navbar-expand-lg fixed-top scrolling-navbar">
        <a class="navbar-brand" href="/">
        	<img src="{{ asset( '/img/acid-logo.svg' ) }}" alt="">
        </a>
        <button class="navbar-toggler toggler-example" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
            <span class="dark-blue-text">
                <i class="fa fa-bars fa-2x"></i>
            </span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route( 'about' ) }}">What is {{ config('app.name', 'Acid Finance') }}?</a>
                </li>
				<li class="nav-item">
					<a class="nav-link" href="{{ route( 'guide' ) }}">How to use</a>
				</li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @auth
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->username }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route( 'dashboard' ) }}">
                                {{ __( 'Dashboard' ) }}
                            </a>
                            <a class="dropdown-item" href="{{ route( 'user.profile' ) }}">
                                {{ __( 'Profile' ) }}
                            </a>
                            <a class="dropdown-item" href="{{ route( 'logout' ) }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route( 'logout' ) }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    <li class="nav-item">
                        @if (Route::has('register'))
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    </li>
                @endauth
            </ul>
        </div>
    </nav>

    <main>
        <div class="container mt-5 py-5">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="text-center">
                        <h1>@yield( 'title' )</h1>
                    </div>
                    <hr>
                    @yield( 'content' )
                </div>
            </div>
        </div>
    </main>

    <footer class="footer mb-3">
        <div class="container-fluid">
            <hr>
            <div class="row p-4">
                <div class="col-md-3 d-none d-md-block">
                    <img src="{{ asset( '/img/logo.svg' ) }}" alt="">
                </div>
                <div class="col-md-3">
                    <h4>Acid Finance</h4>
                    <p>
                        Karlstad
                        <br>
                        Sweden
                        <br>
                    </p>
                </div>
                <div class="col-md-3">
                    <h4>Useful Links</h4>
                    <p>
                        <a href="{{ route( 'about' ) }}">What is {{ config('app.name', 'Acid Finance') }}?</a>
                        <br>
                        <a href="{{ route( 'guide' ) }}">How to use</a>
                        <br>
                        <a href="{{ route( 'privacy' ) }}">Privacy Policy</a>
                        <br>
                    </p>
                </div>
                <div class="col-md-3">
                    <h4>Contact</h4>
                    <p>
                        hello@acidfinance.com
                    </p>
                </div>
            </div>
            <hr>
            <div class="text-center">
                <small>
                    by <a href="https://felixmade.me">Felix Wetell</a>
                </small>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/js/swiper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="{{ asset('/js/main.js') }}"></script>
    <script src="{{ asset('/js/ajax.js') }}"></script>
</body>
</html>
