<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  {{-- <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet"> --}}
  <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
  <link href="{{ asset('css/style.SCSS') }}" rel="stylesheet">
  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <!-- nice select  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css"
    integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ=="
    crossorigin="anonymous" />
  <title> Larainfo  </title>
</head>
<body>
    <header>
        <nav>
        {{-- Nav bar with style for the user in the home page --}}
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="">Larainfo</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">Profile</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
  <main>
    @yield('content') <!-- This is where child views will inject their content -->
  </main>

  <footer>
  </footer>
</body>

</html>
