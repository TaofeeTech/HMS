<header class="tp-header-height">

    @php
        $system = App\Models\SystemSetting::findorFail(1);
    @endphp

    <style>
        .bams-pos-re{
            position: relative;
        }
        .bams-pos-ab{
            position: absolute;top: 2px;
            right: 7px;
            font-size: 9px
        }
    </style>

    <!-- header-area-start -->
    <div class="tp-header-area">
        <div class="tp-header-top tp-header-border-bottom d-none d-lg-block">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="tp-header-info">
                            <ul>
                                <li>
                                    <a href="mailto:{{ $system->email }}">
                                        <svg width="18" height="15" viewBox="0 0 18 15" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M2.6 1H15.4C16.28 1 17 1.72 17 2.6V12.2C17 13.08 16.28 13.8 15.4 13.8H2.6C1.72 13.8 1 13.08 1 12.2V2.6C1 1.72 1.72 1 2.6 1Z"
                                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M17 2.6L9 8.2L1 2.6" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        {{ $system->email }}
                                    </a>
                                </li>
                                <li>
                                    <a href="tel:{{ $system->phone }}">
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10.9104 4.06394C11.6586 4.20991 12.3462 4.57582 12.8852 5.11483C13.4242 5.65383 13.7901 6.34142 13.9361 7.08959M10.9104 1C12.4648 1.17268 13.9143 1.86876 15.0209 2.97395C16.1275 4.07914 16.8254 5.52775 17 7.08193M16.234 13.1945V15.4925C16.2349 15.7058 16.1912 15.9169 16.1057 16.1124C16.0203 16.3079 15.8949 16.4833 15.7377 16.6275C15.5805 16.7718 15.3949 16.8816 15.1928 16.9499C14.9908 17.0182 14.7766 17.0436 14.5642 17.0244C12.2071 16.7683 9.94297 15.9629 7.95371 14.6728C6.10295 13.4968 4.53384 11.9277 3.35779 10.0769C2.06326 8.07863 1.25765 5.80349 1.00622 3.43583C0.987076 3.22401 1.01225 3.01053 1.08014 2.80897C1.14802 2.60741 1.25713 2.4222 1.40052 2.26512C1.54391 2.10804 1.71843 1.98254 1.91298 1.8966C2.10753 1.81067 2.31785 1.76619 2.53053 1.76599H4.82849C5.20022 1.76233 5.56061 1.89397 5.84247 2.13636C6.12433 2.37876 6.30843 2.71538 6.36046 3.08348C6.45745 3.81888 6.63732 4.54094 6.89665 5.2359C6.99971 5.51007 7.02201 5.80803 6.96092 6.09448C6.89983 6.38093 6.7579 6.64387 6.55195 6.85213L5.57915 7.82493C6.66958 9.74261 8.25739 11.3304 10.1751 12.4208L11.1479 11.448C11.3561 11.2421 11.6191 11.1002 11.9055 11.0391C12.192 10.978 12.4899 11.0003 12.7641 11.1034C13.4591 11.3627 14.1811 11.5426 14.9165 11.6395C15.2886 11.692 15.6284 11.8795 15.8713 12.1662C16.1143 12.4529 16.2433 12.8188 16.234 13.1945Z"
                                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                        {{ $system->phone }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="tp-header-top-right d-flex justify-content-end align-items-center">
                            <div class="tp-header-usd tp-header-border-right tp-header-usd-spacing mr-20">
                                <span class="tp-header-selected-usd">EN</span>
                                <ul class="tp-header-usd-list">
                                    <li>Spanish</li>
                                    <li>English</li>
                                    <li>Canada</li>
                                </ul>
                            </div>
                            @php
                                use Darryldecode\Cart\Facades\CartFacade as Cart;
                                $cartItems = Cart::getContent();
                                $itemCount = $cartItems->count();
                            @endphp
                            <div class="tp-header-usd tp-header-border-right tp-header-usd-spacing mr-20 bams-pos-re">
                                <a href="{{ route('cart') }}"><i class="fa fa-shopping-cart"></i></a>
                                <span class="badge rounded-pill text-bg-danger bams-pos-ab">{{ $itemCount }}</span>
                            </div>
                            <div class="tp-header-acount tp-header-usd tp-header-border-right">
                                <a href="login.html">
                                    <svg width="14" height="16" viewBox="0 0 14 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M6.99988 7.98487C8.9287 7.98487 10.4923 6.42125 10.4923 4.49243C10.4923 2.56362 8.9287 1 6.99988 1C5.07106 1 3.50745 2.56362 3.50745 4.49243C3.50745 6.42125 5.07106 7.98487 6.99988 7.98487Z"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M13 14.9697C13 12.2666 10.3108 10.0803 7 10.0803C3.68917 10.0803 1 12.2666 1 14.9697"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                    Account
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="header-sticky" class="tp-header-bottom tp-header-sm-spacing">
            <div class="container">
                <div class="tp-header-main-wrap p-relative">
                    <div class="row align-items-center">
                        <div class="col-xl-2 col-lg-2 col-6">
                            <div class="tp-header-logo">
                                <a href="{{ route("index") }}"><img data-width="138" src="{{ asset($system->logo) }}"
                                        alt="logo"></a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-8 d-none d-lg-block">
                            <div class="tp-main-menu">
                                <nav class="tp-mobile-menu-active">
                                    <ul>
                                        <li class="position-static">
                                            <a href="index.html">Home</a>
                                            <div class="tp-mega-menu">
                                                <div class="tp-main-has-submenu">
                                                    <div class="row gx-6 row-cols-1 row-cols-md-2 row-cols-lg-5">
                                                        <div class="col homemenu">
                                                            <div class="homemenu-thumb mb-15">
                                                                <a href="index.html">
                                                                    <img src="{{ asset('main/assets/img/menu-demo/demo.jpg') }}"
                                                                        alt="">
                                                                </a>
                                                            </div>
                                                            <div class="homemenu-content text-center">
                                                                <h4 class="homemenu-title">
                                                                    <a href="index.html">Modern Hotel</a>
                                                                </h4>
                                                            </div>
                                                        </div>
                                                        <div class="col homemenu">
                                                            <div class="homemenu-thumb mb-15">
                                                                <a href="index-2.html">
                                                                    <img src="{{ asset('main/assets/img/menu-demo/demo-2.jpg') }}"
                                                                        alt="">
                                                                </a>
                                                            </div>
                                                            <div class="homemenu-content text-center">
                                                                <h4 class="homemenu-title">
                                                                    <a href="index-2.html">City Hotel</a>
                                                                </h4>
                                                            </div>
                                                        </div>
                                                        <div class="col homemenu">
                                                            <div class="homemenu-thumb mb-15">
                                                                <a href="index-3.html">
                                                                    <img src="{{ asset('main/assets/img/menu-demo/demo-3.jpg') }}"
                                                                        alt="">
                                                                </a>
                                                            </div>
                                                            <div class="homemenu-content text-center">
                                                                <h4 class="homemenu-title">
                                                                    <a href="index-3.html">Luxury Hotel</a>
                                                                </h4>
                                                            </div>
                                                        </div>
                                                        <div class="col homemenu">
                                                            <div class="homemenu-thumb mb-15">
                                                                <a href="index-4.html">
                                                                    <img src="{{ asset('main/') }}assets/img/menu-demo/demo-4.jpg"
                                                                        alt="">
                                                                </a>
                                                            </div>
                                                            <div class="homemenu-content text-center">
                                                                <h4 class="homemenu-title">
                                                                    <a href="index-4.html">Modern Resort</a>
                                                                </h4>
                                                            </div>
                                                        </div>
                                                        <div class="col homemenu">
                                                            <div class="homemenu-thumb mb-15">
                                                                <a href="index-5.html">
                                                                    <img src="assets/img/menu-demo/demo-5.jpg"
                                                                        alt="">
                                                                </a>
                                                            </div>
                                                            <div class="homemenu-content text-center">
                                                                <h4 class="homemenu-title">
                                                                    <a href="index-5.html">Sea Hotel</a>
                                                                </h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="about.html">About Us</a>
                                        </li>
                                        <li>
                                            <a href="room-1.html">Room</a>
                                            <ul class="tp-submenu submenu">
                                                <li><a href="room-1.html">Room One</a></li>
                                                <li><a href="room-1.html">Room Two</a></li>
                                                <li><a href="room-2.html">Room Three</a></li>
                                                <li><a href="room-details-1.html">Room Details one</a></li>
                                                <li><a href="room-details-1.html">Room Details Two</a></li>
                                                <li><a href="room-details-2.html">Room Details Three</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="gallery.html">Gallery</a>
                                        </li>
                                        <li>
                                            <a href="blog-grid.html">Blog</a>
                                            <ul class="tp-submenu submenu">
                                                <li><a href="blog-grid.html">Blog Grid</a></li>
                                                <li><a href="blog-sidebar.html">Blog Sidebar</a></li>
                                                <li><a href="blog-details.html">Blog Details</a></li>
                                                <li><a href="blog-details-2.html">Blog Details Two</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">Pages</a>
                                            <ul class="tp-submenu submenu">
                                                <li><a href="faq.html">Faq</a></li>
                                                <li><a href="offer.html">Offer</a></li>
                                                <li><a href="pricing-plan.html">Pricing Plan</a></li>
                                                <li><a href="destination.html">Destination</a></li>
                                                <li><a href="destination-details.html">Destination Details</a></li>
                                                <li><a href="login.html">Login</a></li>
                                                <li><a href="register.html">Register</a></li>
                                                <li><a href="forgot.html">Forgot</a></li>
                                                <li><a href="cart.html">Cart</a></li>
                                                <li><a href="checkout.html">Checkout</a></li>
                                                <li><a href="wishlist.html">Wishlist</a></li>
                                                <li><a href="privacy-policy.html">privacy-policy</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="contact.html">Contact</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-2 col-6">
                            <div class="tp-header-action d-flex justify-content-end">
                                <div class="tp-header-search tp-search-click d-none d-xl-block">
                                    <form action="#" class="tp-header-form tp-header-input-toggle">
                                        <input class="tp-header-search-input" type="text"
                                            placeholder="Search...">
                                        <button class="tp-header-submit-btn" type="button">
                                            <span>
                                                <svg width="18" height="18" viewBox="0 0 18 18"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M8.1111 15.2222C12.0385 15.2222 15.2222 12.0385 15.2222 8.1111C15.2222 4.18375 12.0385 1 8.1111 1C4.18375 1 1 4.18375 1 8.1111C1 12.0385 4.18375 15.2222 8.1111 15.2222Z"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M17.0001 17L13.1334 13.1333" stroke="currentColor"
                                                        stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                        </button>
                                    </form>
                                </div>
                                <div class="tp-header-btn-wrap d-none d-lg-block ml-30">
                                    <a class="tp-header-btn" href="contact.html">Book Now</a>
                                </div>
                                <div class="tp-header-3-menu-bar d-lg-none tp-header-menu-btn-black">
                                    <button class="tp-offcanvas-open-btn">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- header-area-end -->

</header>