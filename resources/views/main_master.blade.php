<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <title>Starhotel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="shortcut icon" href="{{ asset('frontend/favicon.ico') }}">

    <!-- Stylesheets -->
    <link rel="stylesheet" href=" {{ asset('frontend/css/animate.css') }} ">
    <link rel="stylesheet" href=" {{ asset('frontend/css/bootstrap.css') }} ">
    <link rel="stylesheet" href=" {{ asset('frontend/css/font-awesome.min.css') }} ">
    <link rel="stylesheet" href=" {{ asset('frontend/css/owl.carousel.css') }} ">
    <link rel="stylesheet" href=" {{ asset('frontend/css/owl.theme.css') }} ">
    <link rel="stylesheet" href=" {{ asset('frontend/css/prettyPhoto.css') }} ">
    <link rel="stylesheet" href=" {{ asset('frontend/css/smoothness/jquery-ui-1.10.4.custom.min.css') }} ">
    <link rel="stylesheet" href=" {{ asset('frontend/rs-plugin/css/settings.css') }} ">
    <link rel="stylesheet" href=" {{ asset('frontend/css/theme.css') }} ">
    <link rel="stylesheet" href=" {{ asset('frontend/css/colors/turquoise.css') }} " id="switch_style">
    <link rel="stylesheet" href=" {{ asset('frontend/css/responsive.css') }} ">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600,700">

    <!-- Javascripts -->
    <script type="text/javascript" src="{{ asset('frontend/js/jquery-1.11.0.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/bootstrap-hover-dropdown.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/jquery.parallax-1.1.3.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/jquery.nicescroll.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/jquery.prettyPhoto.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/jquery-ui-1.10.4.custom.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/jquery.forms.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/jquery.sticky.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/waypoints.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/jquery.isotope.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/jquery.gmap.min.js') }}"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript" src="{{ asset('frontend/rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/switch.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/custom.js') }}"></script>
    <script src="https://js.paystack.co/v2/inline.js">
    <script>
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '../../www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-50960990-1', 'slashdown.nl');
        ga('send', 'pageview');
    </script>
</head>

<body>

    @include('partials.header')

    @yield('frontend')

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <h4>About Starhotel</h4>
                    <p>Suspendisse sed sollicitudin nisl, at dignissim libero. Sed porta tincidunt ipsum, vel volutpat.
                        <br>
                        <br>
                        Nunc ut fringilla urna. Cras vel adipiscing ipsum. Integer dignissim nisl eu lacus interdum
                        facilisis. Aliquam erat volutpat. Nulla semper vitae felis vitae dapibus.
                    </p>
                </div>
                <div class="col-md-3 col-sm-3">
                    <h4>Recieve our newsletter</h4>
                    <p>Suspendisse sed sollicitudin nisl, at dignissim libero. Sed porta tincidunt ipsum, vel volutpa!
                    </p>
                    <form role="form">
                        <div class="form-group">
                            <input name="newsletter" type="text" id="newsletter" value=""
                                class="form-control" placeholder="Please enter your E-mailaddress">
                        </div>
                        <button type="submit" class="btn btn-lg btn-black btn-block">Submit</button>
                    </form>
                </div>
                <div class="col-md-3 col-sm-3">
                    <h4>From our blog</h4>
                    <ul>
                        <li>
                            <article>
                                <a href="blog-post.html">This is a video post<br>April 15 2014</a>
                            </article>
                        </li>
                        <li>
                            <article>
                                <a href="blog-post.html">An image post<br>April 14 2014</a>
                            </article>
                        </li>
                        <li>
                            <article>
                                <a href="blog-post.html">Audio included post<br>April 12 2014</a>
                            </article>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-3">
                    <h4>Address</h4>
                    <address>
                        <strong>Starhotel</strong><br>
                        795 Las Palmas<br>
                        Spain, CA 94107<br>
                        <abbr title="Phone">P:</abbr> <a href="#">(123) 456-7890</a><br>
                        <abbr title="Email">E:</abbr> <a href="#">mail@example.com</a><br>
                        <abbr title="Website">W:</abbr> <a href="#">www.slashdown.nl</a><br>
                    </address>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-xs-6"> &copy; 2014 Starhotel All Rights Reserved </div>
                    <div class="col-xs-6 text-right">
                        <ul>
                            <li><a href="contact-01.html">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Go-top Button -->
    <div id="go-top"><i class="fa fa-angle-up fa-2x"></i></div>

</body>

</html>
