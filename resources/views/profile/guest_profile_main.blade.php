<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Travl : Hotel Admin Dashboard Bootstrap 5 Template" />
    <meta property="og:title" content="Travl : Hotel Admin Dashboard Bootstrap 5 Template" />
    <meta property="og:description" content="Travl : Hotel Admin Dashboard Bootstrap 5 Template" />
    <meta property="og:image" content="social-image.png" />
    <meta name="format-detection" content="telephone=no">

    <!-- PAGE TITLE HERE -->
    <title>Travl Hotel Dashboard</title>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('dashboard/images/favicon.png') }}" />
    <link href="{{ asset('dashboard/vendor/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/vendor/lightgallery/css/lightgallery.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/vendor/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('dashboard/vendor/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">

    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('dashboard/vendor/toastr/css/toastr.min.css') }}">
    <link href="{{ asset('dashboard/vendor/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">

    <!-- Style css -->
    <link href="{{ asset('dashboard/css/style.css') }}" rel="stylesheet">

    {{-- Paystack --}}

    <style>
        /* From Uiverse.io by mobinkakei */
        #wifi-loader {
            --background: #62abff;
            --front-color: #4f29f0;
            --back-color: #c3c8de;
            --text-color: #414856;
            width: 64px;
            height: 64px;
            border-radius: 50px;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            /* border: 1px solid red; */
        }

        #wifi-loader svg {
            position: absolute;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #wifi-loader svg circle {
            position: absolute;
            fill: none;
            stroke-width: 6px;
            stroke-linecap: round;
            stroke-linejoin: round;
            transform: rotate(-100deg);
            transform-origin: center;
        }

        #wifi-loader svg circle.back {
            stroke: var(--back-color);
        }

        #wifi-loader svg circle.front {
            stroke: var(--front-color);
        }

        #wifi-loader svg.circle-outer {
            height: 86px;
            width: 86px;
        }

        #wifi-loader svg.circle-outer circle {
            stroke-dasharray: 62.75 188.25;
        }

        #wifi-loader svg.circle-outer circle.back {
            animation: circle-outer135 1.8s ease infinite 0.3s;
        }

        #wifi-loader svg.circle-outer circle.front {
            animation: circle-outer135 1.8s ease infinite 0.15s;
        }

        #wifi-loader svg.circle-middle {
            height: 60px;
            width: 60px;
        }

        #wifi-loader svg.circle-middle circle {
            stroke-dasharray: 42.5 127.5;
        }

        #wifi-loader svg.circle-middle circle.back {
            animation: circle-middle6123 1.8s ease infinite 0.25s;
        }

        #wifi-loader svg.circle-middle circle.front {
            animation: circle-middle6123 1.8s ease infinite 0.1s;
        }

        #wifi-loader svg.circle-inner {
            height: 34px;
            width: 34px;
        }

        #wifi-loader svg.circle-inner circle {
            stroke-dasharray: 22 66;
        }

        #wifi-loader svg.circle-inner circle.back {
            animation: circle-inner162 1.8s ease infinite 0.2s;
        }

        #wifi-loader svg.circle-inner circle.front {
            animation: circle-inner162 1.8s ease infinite 0.05s;
        }

        #wifi-loader .text {
            position: absolute;
            bottom: -40px;
            display: flex;
            justify-content: center;
            align-items: center;
            text-transform: lowercase;
            font-weight: 500;
            font-size: 14px;
            letter-spacing: 0.2px;
        }

        #wifi-loader .text::before,
        #wifi-loader .text::after {
            content: attr(data-text);
        }

        #wifi-loader .text::before {
            color: var(--text-color);
        }

        #wifi-loader .text::after {
            color: var(--front-color);
            animation: text-animation76 3.6s ease infinite;
            position: absolute;
            left: 0;
        }

        @keyframes circle-outer135 {
            0% {
                stroke-dashoffset: 25;
            }

            25% {
                stroke-dashoffset: 0;
            }

            65% {
                stroke-dashoffset: 301;
            }

            80% {
                stroke-dashoffset: 276;
            }

            100% {
                stroke-dashoffset: 276;
            }
        }

        @keyframes circle-middle6123 {
            0% {
                stroke-dashoffset: 17;
            }

            25% {
                stroke-dashoffset: 0;
            }

            65% {
                stroke-dashoffset: 204;
            }

            80% {
                stroke-dashoffset: 187;
            }

            100% {
                stroke-dashoffset: 187;
            }
        }

        @keyframes circle-inner162 {
            0% {
                stroke-dashoffset: 9;
            }

            25% {
                stroke-dashoffset: 0;
            }

            65% {
                stroke-dashoffset: 106;
            }

            80% {
                stroke-dashoffset: 97;
            }

            100% {
                stroke-dashoffset: 97;
            }
        }

        @keyframes text-animation76 {
            0% {
                clip-path: inset(0 100% 0 0);
            }

            50% {
                clip-path: inset(0);
            }

            100% {
                clip-path: inset(0 0 0 100%);
            }
        }
    </style>

</head>

<body>

    <!--*******************
  Preloader start
 ********************-->
    {{-- <div id="preloader">
        <div class="lds-ripple">
            <div></div>
            <div></div>
        </div>
    </div> --}}

    {{-- <div id="preloader" class="payload">
        <div class="lds-ripple">
            <div></div>
            <div></div>
        </div>
    </div> --}}
    <!--*******************
  Preloader end
 ********************-->

    <!--**********************************
  Main wrapper start
 ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
   Nav header start
  ***********************************-->
        @include('profile.partials.navheader')
        <!--**********************************
   Nav header end
  ***********************************-->

        <!--**********************************
   Chat box start
  ***********************************-->
        @php
            session()->forget('cart');

            $user = auth()->user();
            $cart = App\Models\Bookings::with('room.category')
                ->where('status', 'pending')
                ->where('guest_id', $user->id)
                ->get();

            $roomIds = [];
            $bookingIds = [];
            $roomNames = [];

            foreach ($cart as $booking) {
                $roomIds[] = $booking->room_id;
                $bookingIds[] = $booking->id;
                $roomNames[] = $booking->room->category->cat_name . '-' . $booking->room->room_number;
            }

            // $totalRooms = count($cart);
            $totalRooms = $cart->count();

            $totalPrice = $cart->sum(function ($booking) {
                return $booking->total_cost;
            });

        @endphp

        <div class="chatbox">
            <div class="chatbox-close"></div>
            <div class="col-lg-12 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3 p-4">
                    <span class="text-muted">Your cart</span>
                    <span class="badge badge-primary badge-pill">{{ $totalRooms }}</span>
                </h4>
                <ul class="list-group mb-3">

                    @if (isset($cart))
                        @foreach ($cart as $details)
                            @php
                                $room = App\Models\Room::with('category')
                                    ->where('id', $details->room_id)
                                    ->first();
                            @endphp
                            <li class="list-group-item d-flex justify-content-between align-items-center lh-condensed">
                                <div style="width: 50px">
                                    <img class="w-100 rounded-circle" style="aspect-ratio: 1 / 1;"
                                        src="{{ asset('dashboard/images/room/room1.jpg') }}" alt="">
                                </div>
                                <div>
                                    <h6 class="my-0">{{ $room->category->cat_name . '-' . $room->room_number }} </h6>
                                    <small class="text-muted">{{ $details->room_type }}</small>

                                </div>
                                <div>
                                    <span class="h6">&#8358; {{ number_format($details->total_cost, 2) }}</span>
                                    <br>
                                    <a class="text-danger" href="{{ route('cart.remove', $details->id) }}">Remove</a>
                                </div>
                            </li>
                        @endforeach
                    @endif

                </ul>
                <form>
                    <input id="email" name="email" value="{{ $user->email }}" hidden>
                    <input id="user_id" name="user_id" value="{{ $user->id }}" hidden>
                    <input id="price" name="amount" value="{{ $totalPrice }}" hidden>
                    <input id="room_id" name="room_id" value="{{ implode(',', $roomIds) }}" hidden>
                    <input id="booking_id" name="booking_id" value="{{ implode(',', $bookingIds) }}" hidden>
                    <input id="room_name" name="room_name" value="{{ implode(',', $roomNames) }}]" hidden>
                </form>
                <div class="input-group px-2">
                    <button type="submit" class="input-group-text" disabled>Total Price</button>
                    <input type="text" class="form-control" value="&#8358; {{ number_format($totalPrice, 2) }}"
                        readonly>
                    <button type="button" id="pay-now" class="input-group-text btn btn-primary">Check Out</button>
                </div>
            </div>
        </div>
        <!--**********************************
   Chat box End
  ***********************************-->

        <!--**********************************
   Header start
  ***********************************-->
        @include('profile.partials.header')
        <!--**********************************
   Header end ti-comment-alt
  ***********************************-->

        <!--**********************************
   Sidebar start
  ***********************************-->
        @include('profile.partials.sidebar')
        <!--**********************************
   Sidebar end
  ***********************************-->

        <!--**********************************
   Content body start
  ***********************************-->
        <div class="content-body">
            <!-- row -->
            <div class="pay-load"
                style="background-color: #000000a4 ; display: flex; justify-content:center; align-items:center; position: absolute; top:0; left: 0; width:100%; height:100vh; z-index: 999999;">
                <div id="wifi-loader">
                    <svg class="circle-outer" viewBox="0 0 86 86">
                        <circle class="back" cx="43" cy="43" r="40"></circle>
                        <circle class="front" cx="43" cy="43" r="40"></circle>
                        <circle class="new" cx="43" cy="43" r="40"></circle>
                    </svg>
                    <svg class="circle-middle" viewBox="0 0 60 60">
                        <circle class="back" cx="30" cy="30" r="27"></circle>
                        <circle class="front" cx="30" cy="30" r="27"></circle>
                    </svg>
                    <svg class="circle-inner" viewBox="0 0 34 34">
                        <circle class="back" cx="17" cy="17" r="14"></circle>
                        <circle class="front" cx="17" cy="17" r="14"></circle>
                    </svg>
                    <div class="text" data-text="Loading"></div>
                </div>
            </div>
            @yield('guest')

        </div>
        <!--**********************************
   Content body end
  ***********************************-->



        <!--**********************************
   Footer start
  ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="https://dexignlab.com/"
                        target="_blank">DexignLab</a> 2021</p>
            </div>
        </div>
        <!--**********************************
   Footer end
  ***********************************-->

        <!--**********************************
  Support ticket button start
  ***********************************-->

        <!--**********************************
  Support ticket button end
  ***********************************-->


    </div>
    <!--**********************************
  Main wrapper end
 ***********************************-->

    <!--**********************************
  Scripts
 ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('dashboard/vendor/global/global.min.js') }}"></script>

    <script src="{{ asset('dashboard/vendor/jquery-nice-select/js/jquery.nice-select.min.js') }}"></script>

    <!-- Apex Chart -->

    <script src="{{ asset('dashboard/vendor/apexchart/apexchart.js') }}"></script>


    <!-- Chart piety plugin files -->
    <!-- Toastr -->
    <script src="{{ asset('dashboard/vendor/toastr/js/toastr.min.js') }}"></script>

    <!-- All init script -->
    <script src="{{ asset('dashboard/js/plugins-init/toastr-init.js') }}"></script>


    <!-- Dashboard 1 -->
    <script src="{{ asset('dashboard/js/dashboard/dashboard-1.js') }}"></script>

    <script src="{{ asset('dashboard/vendor/owl-carousel/owl.carousel.js') }}"></script>
    <script src="{{ asset('dashboard/vendor/bootstrap-datetimepicker/js/moment.js') }}"></script>
    <script src="{{ asset('dashboard/vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('dashboard/vendor/ckeditor/ckeditor.js') }}"></script>

    {{-- <script src="{{ asset('dashboard/vendor/global/global.min.js') }}"></script> --}}
    <script src="{{ asset('dashboard/vendor/lightgallery/js/lightgallery-all.min.js') }}"></script>

    <script src="{{ asset('dashboard/js/custom.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/dlabnav-init.js') }}"></script>
    <script src="{{ asset('dashboard/js/demo.js') }}"></script>
    <script src="{{ asset('dashboard/js/styleSwitcher.js') }}"></script>
    <script src="{{ asset('dashboard/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/plugins-init/datatables.init.js') }}"></script>
    {{-- <script src="{{ asset('dashboard/vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/plugins-init/sweetalert.init.js') }}"></script> --}}
    {{-- <script src="https://js.paystack.co/v2/inline.js"> --}}
    {{-- <script src="{{ asset('dashboard/js/jquery.js') }}"></script>
    <script src="{{ asset('app.js') }}"></script>
    <script src="{{ asset('code.js') }}"></script> --}}

    <script>
        const btn = document.getElementById('pay-now');
        const loader = document.querySelector('.pay-load');

        loader.style.display = "none";

        async function MakepaymentPaystack() {

            const email = document.getElementById('email').value;
            const price = document.getElementById('price').value;
            const userId = document.getElementById('user_id').value;
            const roomId = document.getElementById('room_id').value;
            const bookingId = document.getElementById('booking_id').value;
            const roomName = document.getElementById('room_name').value;

            try {

                // loader.style.display = "block";

                const response = await fetch("{{ route('payment.paystack') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        email: email,
                        price: price,
                        user_id: userId,
                        room_id: roomId,
                        booking_id: bookingId,
                        room_name: roomName
                    })

                });

                const data = await response.json();

                if (data.status) {
                    // Redirect the user to Paystack payment page
                    window.location.href = data.authorization_url;
                } else {
                    console.error('Payment initialization failed');
                }

            } catch (error) {
                console.error('Error:', error);
            }

        }
        btn.addEventListener('click', MakepaymentPaystack)
    </script>

    <script>
        function TravlCarousel() {

            /*  testimonial one function by = owl.carousel.js */
            jQuery('.front-view-slider').owlCarousel({
                loop: false,
                margin: 15,
                nav: true,
                autoplaySpeed: 3000,
                navSpeed: 3000,
                paginationSpeed: 3000,
                slideSpeed: 3000,
                smartSpeed: 3000,
                autoplay: false,
                animateOut: 'fadeOut',
                dots: true,
                navText: ['<i class="fas fa-arrow-left"></i>', '<i class="fas fa-arrow-right"></i>'],
                responsive: {
                    0: {
                        items: 1
                    },

                    768: {
                        items: 2
                    },

                    1400: {
                        items: 2
                    },
                    1600: {
                        items: 3
                    },
                    1750: {
                        items: 3
                    }
                }
            })
        }

        jQuery(window).on('load', function() {
            setTimeout(function() {
                TravlCarousel();
            }, 1000);
        });
    </script>
    <script>
        $(function() {
            $('#datetimepicker').datetimepicker({
                inline: true,
            });
        });

        $(document).ready(function() {
            $(".booking-calender .fa.fa-clock-o").removeClass(this);
            $(".booking-calender .fa.fa-clock-o").addClass('fa-clock');
        });
    </script>

</body>


</html>
