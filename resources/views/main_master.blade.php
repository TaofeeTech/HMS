<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Housey Resort and Hotel HTML Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset(App\Models\SystemSetting::findorFail(1)->favicon) }}">

    {{-- <!-- CSS here --> {{ asset('main/assets/') }} --}}
    <link rel="stylesheet" href="{{ asset('main/assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('main/assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('main/assets/css/swiper-bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('main/assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('main/assets/css/font-awesome-pro.css') }}">
    <link rel="stylesheet" href="{{ asset('main/assets/css/ion.rangeSlider.min.css') }}">
    <link rel="stylesheet" href="{{ asset('main/assets/css/flatpicker-min.css') }}">
    
    <link rel="stylesheet" href="{{ asset('main/assets/css/spacing.css') }}">
    <link rel="stylesheet" href="{{ asset('main/assets/css/main.css') }}">
</head>

<body>

    <div class="input-body-overlay"></div>
    <!-- back-to-top -->
    <div class="back-to-top-wrapper">
        <button id="back_to_top" type="button" class="back-to-top-btn">
            <svg width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11 6L6 1L1 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
        </button>
    </div>

    <div id="loading">
        <div class="loading"></div>
    </div>

    <!-- tp-offcanvus-area-end -->
    <div class="tp-offcanvas-area">
        <div class="tp-offcanvas-wrapper">
            <div class="tp-offcanvas-top d-flex align-items-center justify-content-between">
                <div class="tp-offcanvas-logo">
                    <a href="index.html">
                        <img data-width="138" src="assets/img/logo/logo-2.png" alt="logo">
                    </a>
                </div>
                <div class="tp-offcanvas-close">
                    <button class="tp-offcanvas-close-btn">
                        <svg width="37" height="38" viewBox="0 0 37 38" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.19141 9.80762L27.5762 28.1924" stroke="currentColor" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M9.19141 28.1924L27.5762 9.80761" stroke="currentColor" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="tp-offcanvas-main">
                <div class="tp-offcanvas-content">
                    <h3 class="tp-offcanvas-title">Hello There!</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, </p>
                </div>
                <div class="tp-offcanvas-menu d-lg-none">
                    <nav></nav>
                </div>
                <div class="tp-offcanvas-contact">
                    <h3 class="tp-offcanvas-title sm">Information</h3>
                    <ul>
                        <li><a href="tel:1245654">+ 4 20 7700 1007</a></li>
                        <li><a href="mailto:hello@housey.com">hello@housey.com</a></li>
                        <li><a href="#">Avenue de Roma 158b, Lisboa</a></li>
                    </ul>
                </div>
                <div class="tp-offcanvas-social">
                    <h3 class="tp-offcanvas-title sm">Follow Us</h3>
                    <ul>
                        <li>
                            <a href="#">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11.25 1.5H4.75C2.95507 1.5 1.5 2.95507 1.5 4.75V11.25C1.5 13.0449 2.95507 14.5 4.75 14.5H11.25C13.0449 14.5 14.5 13.0449 14.5 11.25V4.75C14.5 2.95507 13.0449 1.5 11.25 1.5Z"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M10.6016 7.5907C10.6818 8.13166 10.5894 8.68414 10.3375 9.16955C10.0856 9.65497 9.68711 10.0486 9.19862 10.2945C8.71014 10.5404 8.15656 10.6259 7.61663 10.5391C7.0767 10.4522 6.57791 10.1972 6.19121 9.81055C5.80451 9.42385 5.54959 8.92506 5.46271 8.38513C5.37583 7.8452 5.46141 7.29163 5.70728 6.80314C5.95315 6.31465 6.34679 5.91613 6.83221 5.66425C7.31763 5.41238 7.87011 5.31998 8.41107 5.4002C8.96287 5.48202 9.47372 5.73915 9.86817 6.1336C10.2626 6.52804 10.5197 7.0389 10.6016 7.5907Z"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M11.5742 4.42578H11.5842" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M2.50589 12.7494C4.57662 16.336 9.16278 17.5648 12.7494 15.4941C14.2113 14.65 15.2816 13.388 15.8962 11.9461C16.7895 9.85066 16.7208 7.37526 15.4941 5.25063C14.2674 3.12599 12.1581 1.82872 9.89669 1.55462C8.34063 1.366 6.71259 1.66183 5.25063 2.50589C1.66403 4.57662 0.435172 9.16278 2.50589 12.7494Z"
                                        stroke="currentColor" stroke-width="1.5" />
                                    <path
                                        d="M12.7127 15.4292C12.7127 15.4292 12.0086 10.4867 10.5011 7.87559C8.99362 5.26451 5.28935 2.57155 5.28935 2.57155M5.68449 15.6124C6.79553 12.2606 12.34 8.54524 16.3975 9.43537M12.311 2.4082C11.1953 5.72344 5.75732 9.38453 1.71875 8.58915"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <svg width="18" height="11" viewBox="0 0 18 11" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M1 5.5715H6.33342C7.62867 5.5715 8.61917 6.56199 8.61917 7.85725C8.61917 9.15251 7.62867 10.143 6.33342 10.143H1.76192C1.30477 10.143 1 9.83823 1 9.38108V1.76192C1 1.30477 1.30477 1 1.76192 1H5.5715C6.86676 1 7.85725 1.99049 7.85725 3.28575C7.85725 4.58101 6.86676 5.5715 5.5715 5.5715H1Z"
                                        stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" />
                                    <path
                                        d="M10.9062 7.09454H17.0016C17.0016 5.41832 15.6301 4.04688 13.9539 4.04688C12.2777 4.04688 10.9062 5.41832 10.9062 7.09454ZM10.9062 7.09454C10.9062 8.77076 12.2777 10.1422 13.9539 10.1422H15.2492"
                                        stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M16.1125 1.44434H11.668" stroke="currentColor" stroke-width="1.2"
                                        stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <svg width="18" height="14" viewBox="0 0 18 14" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12.75 13H5.25C3 13 1.5 11.5 1.5 9.25V4.75C1.5 2.5 3 1 5.25 1H12.75C15 1 16.5 2.5 16.5 4.75V9.25C16.5 11.5 15 13 12.75 13Z"
                                        stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path
                                        d="M8.70676 5.14837L10.8006 6.40465C11.5543 6.90716 11.5543 7.66093 10.8006 8.16344L8.70676 9.41972C7.86923 9.92224 7.19922 9.50348 7.19922 8.5822V6.06964C7.19922 4.98086 7.86923 4.64585 8.70676 5.14837Z"
                                        fill="currentColor" />
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="body-overlay"></div>
    <!-- tp-offcanvus-area-end -->

    @include('partials.header')

    <main>

        @yield('main')

    </main>

    <!-- footer-area-start -->
    <footer>
        <div class="tp-footer-area tp-pink-bg pt-120">
            <div class="container mb-50">
                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-6 col-sm-6">
                        <div class="tp-footer-widget mb-60">
                            <div class="tp-footer-logo mb-25">
                                <a href="index.html"><img data-width="138" src="assets/img/logo/logo-white.png"
                                        alt="logo"></a>
                            </div>
                            <div class="tp-footer-widget-content">
                                <div class="tp-footer-location mb-20">
                                    <a href="https://www.google.com/maps/@41.6758525,-86.2531698,18.17z">84 N. Hill
                                        Field St.Scarsdale, NY 10583</a>
                                </div>
                                <div class="tp-footer-number mb-15">
                                    <span class="tp-footer-call-title">Call For Reservations</span>
                                    <a href="tel:+(62)43502476" class="tp-footer-call">+(62) 4350 2476</a>
                                </div>
                                <div class="tp-footer-btn">
                                    <a href="#">View Map
                                        <span>
                                            <svg width="10" height="11" viewBox="0 0 10 11" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1 9.5L9 1.5" stroke="currentColor" stroke-width="1.5"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M1 1.5H9V9.5" stroke="currentColor" stroke-width="1.5"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-7 col-md-6 col-sm-6">
                        <div class="tp-footer-widget mb-60">
                            <h3 class="tp-footer-widget-title mb-25">Quick Links</h3>
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="tp-footer-widget-content">
                                        <ul>
                                            <li><a href="#">Things To Do</a></li>
                                            <li><a href="#">Rooms & Suites</a></li>
                                            <li><a href="#">About Us</a></li>
                                            <li><a href="#">Book Now</a></li>
                                            <li><a href="#">Testimonials</a></li>
                                            <li><a href="#">Contact</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="tp-footer-widget-content">
                                        <ul>
                                            <li><a href="#">Services</a></li>
                                            <li><a href="#">Popular Destination</a></li>
                                            <li><a href="#">Pricing Plan</a></li>
                                            <li><a href="#">Gallery</a></li>
                                            <li><a href="#">Restaurant</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="tp-footer-widget tp-footer-widget-space pl-65 mb-60">
                            <h3 class="tp-footer-widget-title mb-15">Don’t miss<br> Our Latest Updated</h3>
                            <p class="tp-footer-widget-para mb-10">Sign up to our newsletter for exclusive offers.</p>
                            <div class="tp-footer-form mb-20">
                                <form action="#">
                                    <div class="tp-footer-input p-relative">
                                        <input type="email" placeholder="E-mail">
                                        <button type="button"
                                            class="tp-footer-input-btn p-absolute">Subscribe</button>
                                    </div>
                                </form>
                            </div>
                            <div class="tp-footer-social">
                                <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                                <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                                <a href="#">
                                    <svg width="13" height="13" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.33161 6.77486L15.1688 0H13.7856L8.71722 5.8826L4.66907 0H0L6.12155 8.89546L0 16H1.38336L6.73581 9.78785L11.0109 16H15.68L9.33148 6.77486H9.33187H9.33161ZM7.43696 8.97374L6.81669 8.088L1.88171 1.03969H4.00634L7.98902 6.72789L8.60929 7.61362L13.7863 15.0074H11.6616L7.43709 8.974V8.97361L7.43696 8.97374Z"
                                            fill="currentColor" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tp-footer-botom">
                <div class="container">
                    <div class="tp-footer-bottom-inner">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="tp-footer-copyright">
                                    <p>Copyright © 2024 <a href="#">Housey</a>. All Rights Reserved.</p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="tp-footer-develop tp-footer-copyright text-right">
                                    <p>Developed by: <a href="#">ThemePure</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer-area-end -->

    <!-- JS here -->
    <script src="{{ asset('main/assets/js/vendor/jquery.js') }}"></script>
    <script src="{{ asset('main/assets/js/vendor/waypoints.js') }}"></script>
    <script src="{{ asset('main/assets/js/bootstrap-bundle.js') }}"></script>
    <script src="{{ asset('main/assets/js/swiper-bundle.js') }}"></script>
    <script src="{{ asset('main/assets/js/imagesloaded-pkgd.js') }}"></script>
    <script src="{{ asset('main/assets/js/isotope-pkgd.js') }}"></script>
    <script src="{{ asset('main/assets/js/magnific-popup.js') }}"></script>
    <script src="{{ asset('main/assets/js/nice-select.js') }}"></script>
    <script src="{{ asset('main/assets/js/purecounter.js') }}"></script>
    <script src="{{ asset('main/assets/js/wow.js') }}"></script>
    <script src="{{ asset('main/assets/js/ajax-form.js') }}"></script>
    <script src="{{ asset('main/assets/js/flatpicker.js') }}"></script>
    <script src="{{ asset('main/assets/js/parallax.js') }}"></script>
    <script src="{{ asset('main/assets/js/jarallax.js') }}"></script>
    <script src="{{ asset('main/assets/js/parallax-scroll.js') }}"></script>
    <script src="{{ asset('main/assets/js/jquery.mb.YTPlayer.min.js') }}"></script>
    <script src="{{ asset('main/assets/js/slider-init.js') }}"></script>
    <script src="{{ asset('main/assets/js/main.js') }}"></script>

</body>

</html>
