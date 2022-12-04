<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @yield('local-css')

</head>
<body>
    <div id="app">
        <header class="header-bg sticky-top">
            <nav class="navbar navbar-expand-md shadow-sm navbar-bg text-white">
                <div class="container">
                    <a class="navbar-brand" href="/">
                        <img src="{{ url('images/logo.png') }}" alt="MediaPesantrenIndonesia" height="40">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">

                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                        <a class="dropdown-item" href="/pesantren/upload">
                                            Upload
                                        </a>

                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <main>
            @yield('content')
        </main>

        <footer class="content-bg-secondary">
            <div class="container bg-gray pt-5">
                <div class="row justify-content-around">
                    <div class="col-md-5 mb-3">
                        <form>
                            <h5>Leave A Message:</h5>
                            <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                                <label for="newsletter1" class="visually-hidden">Message</label>
                                <input id="newsletter1" type="text" class="form-control" placeholder="Leave a message">
                                <button class="btn btn-primary" type="button">Send</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-6 col-md-2 mb-3">
                        <h6>Media Pesantren Indonesia</h6>
                        <ul class="nav flex-column text-light" style="font-size: 15px;">
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-secondary">Home</a>
                            </li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-secondary">Cari Pesantren</a>
                            </li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-secondary">Tambah Pesantren</a></li>
                        </ul>
                    </div>

                    <div class="col-6 col-md-2 mb-3">
                        <h6>Contact Us</h6>
                        <ul class="nav flex-column text-light" style="font-size: 15px;">
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-secondary">+6287712345678</a>
                            </li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-secondary">+62212345</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-6 col-md-2 mb-3" style="font-size: 15px;">
                        <h6>Connect with us</h6>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-secondary">Instagram</a>
                            </li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-secondary">Twitter</a>
                            </li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-secondary">Facebook</a>
                            </li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-secondary">Tiktok</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="d-flex flex-column flex-sm-row justify-content-between py-4 border-top">
                    <p>&copy; 2022 MediaPesantrenIndonesia. All rights reserved.</p>
                    <ul class="list-unstyled d-flex">
                        <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24">
                                    <use xlink:href="#twitter" />
                                </svg></a></li>
                        <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24">
                                    <use xlink:href="#instagram" />
                                </svg></a></li>
                        <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24">
                                    <use xlink:href="#facebook" />
                                </svg></a></li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
</body>
</html>
