<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tea House - Tea Shop Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ url('website/img/favicon.ico')}}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Playfair+Display:wght@700;900&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ url('website/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{ url('website/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ url('website/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ url('website/css/style.css')}}" rel="stylesheet">





    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('website/wow/wow.min.js')}}"></script>
    <script src="{{ url('website/easing/easing.min.js')}}"></script>
    <script src="{{ url('website/waypoints/waypoints.min.js')}}"></script>
    <script src="{{ url('website/owlcarousel/owl.carousel.min.js')}}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3I5UAhnMsIrb6jMtnUOAxYoC6wYsiWZ0Zc2Is4bc1CbEZsUwE1THoTl6fjzUigWrnro5p0BzK3uTMIxwRAA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-c9keTg9akzHnxKnG+4jxIEJOiDlAFefU4C5syXX6H4QTQvXmT8oJ29Z2lPV0KMc5TOdJIms5G/mb9vOUg1e6lA==" crossorigin="anonymous" referrerpolicy="no-referrer" />




    <!-- Template Javascript -->
    <script src="{{ url('website/js/main.js')}}"></script>

</head>

<body>
    
    @include('sweetalert::alert')

    <?php
    function active($currect_page)
    {
        $url_array =  explode('/', $_SERVER['REQUEST_URI']); // current page url
        $url = end($url_array);
        if ($currect_page == $url) {
            echo 'active'; //class name in css 
        }
    }
    ?>

    <!-- Spinner Start -->
    <!-- <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div> -->
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <div class="container-fluid bg-white sticky-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-2 py-lg-0">
                <a href="index" class="navbar-brand">
                    <img class="img-fluid" src="{{ url('website/img/logo.png')}}" alt="Logo">
                </a>
                <button type="button" class="navbar-toggler ms-auto me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        
                        <a href="/" class="nav-item nav-link <?php active('') ?>">Home</a>
                        <a href="about" class="nav-item nav-link <?php active('about') ?>">About</a>
                        <a href="product" class="nav-item nav-link <?php active('product') ?>">Products</a>
                        <a href="">
              
            @if(session()->has('ses_userid'))
            <a href="userprofile" class="pt-1">
              <i class="fa fa-USER" aria-hidden="true"></i>
              <span>
              <h6> Hi .. {{session()->get('ses_username')}}  / My Account </h6>
              </span>
            </a>
            @endif
                        <a href="store" class="nav-item nav-link <?php active('store') ?>">Store</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu bg-light rounded-0 m-0">
                                <a href="feature" class="dropdown-item <?php active('feature') ?>">Features</a>
                                <a href="blog" class="dropdown-item <?php active('blog') ?>">Blog Article</a>
                                <a href="testimonial" class="dropdown-item <?php active('testimonial') ?>">Testimonial</a>
                                <a href="404" class="dropdown-item <?php active('404') ?>">404 Page</a>
                            </div>
                        </div>
                        <a href="contact" class="nav-item nav-link <?php active('contact') ?>">Contact</a>
                        <div class="navbar-nav ms-auto border-start ps-4 d-none d-lg-block">
                        @if(session()->has('ses_userid'))
                <li class="nav-item">
                  <a class="nav-link" href="user_logout">Logout</a>
                </li>
                @else
                <li class="nav-item <?php active('signup')?>">
                  <a class="nav-link" href="signup">Signup</a>
                </li>
                @endif                        </div>
                    </div>

                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->