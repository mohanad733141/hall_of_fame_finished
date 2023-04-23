<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Meta Tags -->
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- CSS Files -->
  <link rel="stylesheet" href="{{url('/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.4.0/animate.min.css">
  <link rel="stylesheet" href="{{url('/css/style.css')}}">
  <link rel="stylesheet" href="{{url('/css/responsive.css')}}">
  <link rel="stylesheet" href="{{url('/css/halloffame.css')}}">
  <title>Hall OF FAME</title>
<style>
body{
    background-image: url("/img/contact-img.png") !important;

}
</style>

</head>

<body>
    <main>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-md">
            <div class="container">
                <a class="navigation_logo"  href="{{ route('homepage') }}" style="color: white;">
                    <h3>Hall Of Fame</h3>
                </a>
                <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" tabindex="-1" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('homepage')}}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('Halloffame.index')}}">Hall Of Fame</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('others.index')}}">Others</a>
                        </li>
                        @if( auth()->check())
                         @if (auth()->user()->role == '1')
                         <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.project.index')}}">Admin Panel</a>
                        </li>
                        @elseif (auth()->user()->role == '0')
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('user.project.index')}}">My Profile</a>
                        </li>
                        @endif
                        @endif
                    </ul>
                    <span class="navbar-text">
                        <div class="navigation_bar">
                            <a href="https://www.instagram.com/astonuniversity/"><img src="/img/nav-icon3.svg" alt="social-media-Icon"></a>
                            <a href="https://www.facebook.com/astonuniversity/"><img src="/img/nav-icon2.svg" alt="social-media-Icon"></a>
                        </div>


                        <ul class="navbar-nav ms-auto">
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}"> <button class="login_button"> <span>login</span></button></a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class=" nav-link" href="{{ route('register') }}"> <button class="login_button"><span>Register</span></button></a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <button class="login_button"> <span>{{ Auth::user()->name }}</span></button>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>


                    </span>
                </div>
            </div>
        </nav>
        <!-- Navbar End -->
    @yield('contents')



    <!-- Footer -->


        <!-- Footer -->
        <footer class="footer">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="newsletter-bx wow slideInUp" data-wow-duration="1.5s">
                            <div class="row">
                                <div >
                                    <h3 style="text-align: center">Explore the latest and unique projects </h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6">
                        <img src="/img/logo.svg" alt="Logo">
                    </div>
                    <div class="col-12 col-sm-6 text-center text-sm-end">
                        <div class="navigation_bar">
                            <a href="https://www.instagram.com/astonuniversity/"><img src="/img/nav-icon3.svg" alt="social-media-Icon"></a>
                            <a href="https://www.facebook.com/astonuniversity/"><img src="/img/nav-icon2.svg" alt="social-media-Icon"></a>
                        </div>
                        <p>Copyright 2022. All Rights Reserved</p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer End -->
    </main>
  <!-- JS Files -->
  <script src="/js/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
  <script src="/js/bootstrap.bundle.min.js"></script>
  <script src="/js/main.js"></script>
</body>

</html>
