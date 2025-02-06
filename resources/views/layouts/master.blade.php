<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Safe-Cam </title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta content="Free HTML Templates" name="keywords">
        <meta content="Free HTML Templates" name="description">
        <!--favicon-->
        <link href="{{ asset('public/assets/img/favicon.ico') }}" rel="icon">
        <!--google web fonts-->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
        <!--icon font stylesheet-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
        <link href="{{ asset('public/assets/lib/flaticon/font/flaticon.css') }}" rel="stylesheet">
        <!--libraries stylesheet-->
        <link href="{{ asset('public/assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
        <link href="{{ asset('public/assets/lib/animate/animate.min.css') }}" rel="stylesheet">
        <!--customized bootstrap stylesheet-->
        <link href="{{ asset('public/assets/css/bootstrap.min.css') }}" rel="stylesheet">
        <!--template stylesheet-->
        <link href="{{ asset('public/assets/css/style.css') }}" rel="stylesheet">
    </head>
   <body>
        <!--navbar start-->
        <nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm py-3 py-lg-0 px-3 px-lg-0">
            <a href="{{ url('/') }}" class="navbar-brand ms-lg-5">
            <h1 class="display-5 m-0 text-primary">Safe<span class="text-secondary">Cam</span></h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <!-- Home link -->
                <a href="{{ url('/') }}" class="nav-item nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a>
                <!-- About link -->
                <a href="{{ url('about') }}" class="nav-item nav-link {{ request()->is('about') ? 'active' : '' }}">About</a>
                <!-- Service link -->
                <a href="{{ url('service') }}" class="nav-item nav-link {{ request()->is('service') ? 'active' : '' }}">Service</a>
                <!-- Dropdown Pages -->
                <div class="nav-item dropdown {{ request()->is('price', 'blog', 'blog-detail', 'team', 'testimonial') ? 'active' : '' }}">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu m-0">
                        <!-- Pricing Plan -->
                        <a href="{{ url('price') }}" class="dropdown-item {{ request()->is('price') ? 'active' : '' }}">Pricing Plan</a>
                        <!-- Blog Grid (covers both 'blog' and any sub-pages under 'blog') -->
                        <a href="{{ url('blog') }}" class="dropdown-item {{ request()->is('blog') || request()->is('blog/*') ? 'active' : '' }}">Blog Grid</a>
                        <!-- Blog Detail -->
                        <a href="{{ url('blog-detail') }}" class="dropdown-item {{ request()->is('blog-detail') ? 'active' : '' }}">Blog Detail</a>
                        <!-- The Team -->
                        <a href="{{ url('team') }}" class="dropdown-item {{ request()->is('team') ? 'active' : '' }}">The Team</a>
                        <!-- Testimonial -->
                        <a href="{{ url('testimonial') }}" class="dropdown-item {{ request()->is('testimonial') ? 'active' : '' }}">Testimonial</a>
                    </div>
                </div>
                <!-- Contact link -->
                <a href="{{ url('contact') }}" class="nav-item nav-link {{ request()->is('contact') ? 'active' : '' }}">Contact</a>
                <!-- Login link -->
                <a href="{{ url('login') }}" class="nav-item nav-link nav-contact bg-secondary text-white px-5 ms-lg-5 {{ request()->is('login') ? 'active' : '' }}">
                <i class="bi bi-telephone-outbound me-2"></i>Login
                </a>
            </div>
            </div>
        </nav>
      <!--navbar end-->
      @yield('content')
        <!--footer start-->
        <div class="container-fluid bg-dark text-light mt-5 py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container pt-5">
                <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h3 class="text-white mb-4">Quick Links</h3>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-light mb-2" href="{{ url('/') }}"><i class="bi bi-arrow-right text-primary me-2"></i>Home</a>
                        <a class="text-light mb-2" href="{{ url('about') }}"><i class="bi bi-arrow-right text-primary me-2"></i>About Us</a>
                        <a class="text-light mb-2" href="{{ url('service') }}"><i class="bi bi-arrow-right text-primary me-2"></i>Our Services</a>
                        <a class="text-light mb-2" href="{{ url('blog') }}"><i class="bi bi-arrow-right text-primary me-2"></i>Latest Blog</a>
                        <a class="text-light" href="{{ url('contact') }}"><i class="bi bi-arrow-right text-primary me-2"></i>Contact Us</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h3 class="text-white mb-4">Popular Links</h3>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-light mb-2" href="{{ url('/') }}"><i class="bi bi-arrow-right text-primary me-2"></i>Home</a>
                        <a class="text-light mb-2" href="{{ url('about') }}"><i class="bi bi-arrow-right text-primary me-2"></i>About Us</a>
                        <a class="text-light mb-2" href="{{ url('service') }}"><i class="bi bi-arrow-right text-primary me-2"></i>Our Services</a>
                        <a class="text-light mb-2" href="{{ url('blog') }}"><i class="bi bi-arrow-right text-primary me-2"></i>Latest Blog</a>
                        <a class="text-light" href="{{ url('contact') }}"><i class="bi bi-arrow-right text-primary me-2"></i>Contact Us</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h3 class="text-white mb-4">Get In Touch</h3>
                    <p class="mb-2"><i class="bi bi-geo-alt text-primary me-2"></i>123 Street, New York, USA</p>
                    <p class="mb-2"><i class="bi bi-envelope-open text-primary me-2"></i>info@example.com</p>
                    <p class="mb-0"><i class="bi bi-telephone text-primary me-2"></i>+012 345 67890</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h3 class="text-white mb-4">Follow Us</h3>
                    <div class="d-flex">
                        <a class="btn btn-lg btn-primary btn-lg-square rounded me-2" href="#"><i class="fab fa-twitter fw-normal"></i></a>
                        <a class="btn btn-lg btn-primary btn-lg-square rounded me-2" href="#"><i class="fab fa-facebook-f fw-normal"></i></a>
                        <a class="btn btn-lg btn-primary btn-lg-square rounded me-2" href="#"><i class="fab fa-linkedin-in fw-normal"></i></a>
                        <a class="btn btn-lg btn-primary btn-lg-square rounded" href="#"><i class="fab fa-instagram fw-normal"></i></a>
                    </div>
                </div>
                <div class="col-12">
                    <form id="ContactUs" method="POST" class="mx-auto" style="max-width: 600px;">
                        <div class="input-group">
                            <input type="email" name="email" id="email" class="form-control border-white p-3" placeholder="Your Email">
                            <button type="submit" class="btn btn-primary px-4">Sign Up</button>
                        </div>
                    </form>
                    <div class="loader com_ajax_loader" style="display:none;">
                        <img src="{{ url('public/assets/img/200w.gif') }}" />
                    </div>
                    <br>
                    <div class="contact_us_res"></div>
                </div>
                </div>
            </div>
        </div>
        <div class="container-fluid bg-primary text-light py-4">
            <div class="container">
                <div class="row g-5">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-md-0">&copy; <a class="text-white border-bottom" href="#">Your Site Name</a>. All Rights Reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p class="mb-0">Designed by <a class="text-white border-bottom" href="https://htmlcodex.com">HTML Codex</a></p>
                </div>
                </div>
            </div>
        </div>
        <!--footer end-->
        <!--back to top-->
        <a href="#" class="btn btn-lg btn-secondary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>
        <script>
            var base_url = '{{ url('/') }}'
        </script>
        <!--javascript libraries-->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
        <script src="{{ asset('public/assets/js/custom-ajax.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('public/assets/lib/wow/wow.min.js') }}"></script>
        <script src="{{ asset('public/assets/lib/easing/easing.min.js') }}"></script>
        <script src="{{ asset('public/assets/lib/waypoints/waypoints.min.js') }}"></script>
        <script src="{{ asset('public/assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
        <!--template javascript-->
        <script src="{{ asset('public/assets/js/main.js') }}"></script>
    </body>
</html>