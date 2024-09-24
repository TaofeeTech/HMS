    <!-- Top header -->
    <div id="top-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-6">
                    <div class="th-text pull-left">
                        <div class="th-item"> <a href="#"><i class="fa fa-phone"></i> 05-460789986</a> </div>
                        <div class="th-item"> <a href="#"><i class="fa fa-envelope"></i> MAIL@STARHOTEL.COM </a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="th-text pull-right">
                        <div class="th-item">
                            <div class="btn-group">
                                <button class="btn btn-default btn-xs dropdown-toggle js-activated" type="button"
                                    data-toggle="dropdown"> English <span class="caret"></span> </button>
                                <ul class="dropdown-menu">
                                    <li> <a href="#">ENGLISH</a> </li>
                                    <li> <a href="#">FRANCE</a> </li>
                                    <li> <a href="#">GERMAN</a> </li>
                                    <li> <a href="#">SPANISH</a> </li>
                                </ul>
                            </div>
                        </div>
                        <div class="th-item">
                            <div class="social-icons"> <a href="#"><i class="fa fa-facebook"></i></a> <a
                                    href="#"><i class="fa fa-twitter"></i></a> <a href="#"><i
                                        class="fa fa-youtube-play"></i></a> </div>
                        </div>
                        <div class="th-item">
                            <div class="btn-group">
                                @if (auth()->check())
                                    <a href="{{ route('home') }}" class="btn btn-default btn-xs"> DASHBOARD </a>
                                @else
                                    <a href="{{ route('login') }}" class="btn btn-default btn-xs"> LOGIN </a>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Header -->
    <header>
        <!-- Navigation -->
        <div class="navbar yamm navbar-default" id="sticky">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" data-toggle="collapse" data-target="#navbar-collapse-grid"
                        class="navbar-toggle"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span
                            class="icon-bar"></span> </button>
                    <a href="index.html" class="navbar-brand">
                        <!-- Logo -->
                        <div id="logo"> <img id="default-logo" src="{{ asset('frontend/images/logo.png') }}"
                                alt="Starhotel" style="height:44px;"> <img id="retina-logo"
                                src="{{ asset('frontend/images/logo-retina.png') }}" alt="Starhotel"
                                style="height:44px;"> </div>
                    </a>
                </div>
                <div id="navbar-collapse-grid" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="dropdown active"> <a href="index.html">Home</a>
                        </li>
                        <li class="dropdown"> <a href="#" data-toggle="dropdown"
                                class="dropdown-toggle js-activated">Rooms<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="room-list.html">Room List View</a></li>
                                <li><a href="room-detail.html">Room Detail</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"> <a href="#" data-toggle="dropdown"
                                class="dropdown-toggle js-activated">Features<b class="caret"></b></a>
                            <div class="dropdown-menu">
                                <div class="yamm-content">
                                    <div class="row">
                                        <ul class="col-sm-3 list-unstyled mt20">
                                            <li>
                                                <p><strong>Elements</strong></p>
                                            </li>
                                            <li><a href="elements.html">Elements</a></li>
                                            <li><a href="icons.html">Icons</a></li>
                                            <li><a href="404.html">404 Page</a></li>
                                        </ul>
                                        <ul class="col-sm-3 list-unstyled mt20">
                                            <li>
                                                <p><strong>Layout</strong></p>
                                            </li>
                                            <li><a href="boxed-pattern.html"><i class="fa fa-square-o"></i> Boxed</a>
                                            </li>
                                            <li><a href="index.html"><i class="fa fa-arrows-h"></i> Wide</a></li>
                                            <li><a href="boxed-background.html"><i class="fa fa-picture-o"></i>
                                                    Image</a></li>
                                        </ul>
                                        <ul class="col-sm-6 list-unstyled mt20">
                                            <li>
                                                <p><strong>Colors</strong></p>
                                                <ul class="list-unstyled">
                                                    <li class="row">
                                                        <ul class="col-sm-6 list-unstyled">
                                                            <li><a href="#" class="styleswitch" id="black"><i
                                                                        class="fa fa-circle" style="color:#000;"></i>
                                                                    Black</a></li>
                                                            <li><a href="#" class="styleswitch"
                                                                    id="blue"><i class="fa fa-circle"
                                                                        style="color:#057ad4;"></i>
                                                                    Blue</a></li>
                                                            <li><a href="#" class="styleswitch"
                                                                    id="brown"><i class="fa fa-circle"
                                                                        style="color:#A76837;"></i> Brown</a></li>
                                                            <li><a href="#" class="styleswitch"
                                                                    id="green"><i class="fa fa-circle"
                                                                        style="color:#7ec923;"></i> Green</a></li>
                                                        </ul>
                                                        <ul class="col-sm-6 list-unstyled">
                                                            <li><a href="#" class="styleswitch"
                                                                    id="orange"><i class="fa fa-circle"
                                                                        style="color:#dc7b13;"></i> Orange</a></li>
                                                            <li><a href="#" class="styleswitch"
                                                                    id="purple"><i class="fa fa-circle"
                                                                        style="color:#e331bf;"></i> Purple</a></li>
                                                            <li><a href="#" class="styleswitch"
                                                                    id="red"><i class="fa fa-circle"
                                                                        style="color:#c20808;"></i> Red</a></li>
                                                            <li><a href="#" class="styleswitch"
                                                                    id="turquoise"><i class="fa fa-circle"
                                                                        style="color:#75c5cf;"></i> Turquoise</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown"> <a href="#" data-toggle="dropdown"
                                class="dropdown-toggle js-activated">Blog<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="blog.html">Blog grid</a></li>
                                <li><a href="blog-post.html">Blog post</a></li>
                            </ul>
                        </li>
                        <li> <a href="gallery.html">Gallery</a></li>
                        <li class="dropdown"> <a href="#" data-toggle="dropdown"
                                class="dropdown-toggle js-activated">Contact<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="contact-01.html">Contact 1</a></li>
                                <li><a href="contact-02.html">Contact 2</a></li>
                            </ul>
                        </li>
                        {{-- <li >
                            <i class="fa fa-user"></i>
                        </li> --}}
                    </ul>


                </div>
            </div>
        </div>
    </header>
