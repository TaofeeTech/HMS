@extends('main_master')
@section('main')
    <!-- tp-breadcrumb-area-start -->
    <div class="tp-breadcrumb-area pt-105 mb-45 p-relative">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="tp-breadcrumb-title-wrap text-center">
                        <h2 class="tp-breadcrumb-title-blog mb-10">Room & Suites</h2>
                        <p class="tp-breadcrumb-para-3">All our hotels are equipped with premium suites and first-class
                            entertainment areas.
                            The comfort and the needs of our guests come before all else here.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- tp-breadcrumb-area-end -->

    <div class="tp-bocking-date-form">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-12">
                    <div class="tp-bocking-search-form round-6">
                        <form action="#">
                            <div class="tp-hero-quantity-wrap d-flex">
                                <div class="tp-bocking-input-wrap round-6 mr-15 mb-20">
                                    <div class="tp-bocking-form-input">
                                        <p>Check-In&nbsp;* </p>
                                        <div class="p-relative">
                                            <input name="datetime-local" type="text" placeholder="Check-in Date"
                                                class="flatpickr-input" readonly="readonly">
                                        </div>
                                    </div>
                                    <div class="tp-bocking-form-input pl-30">
                                        <p>Room Type</p>
                                        <div class="p-relative">
                                            <select class=" form-control border border-0" name="" id="" style="outline: none">
                                                <option value="">1</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="tp-bocking-form-quantity round-6 mr-15 mb-20">
                                    <p>Guests</p>
                                    <div class="tp-hero-quantity tp-bocking-quantity p-relative">
                                        <span class="tp-hero-quantity-click tp-hero-quantity-toggle">
                                            0 Guests(s)
                                        </span>
                                        <div
                                            class="tp-hero-quantity-border tp-hero-quantity-active tp-bocking-quantity-active">
                                            <ul class="tp-hero-quantity-list border-bottom">
                                                <li>
                                                    <div class="tp-hero-quantity-content">
                                                        <span>Adult</span>
                                                        <p>Ages 12 or adove</p>
                                                    </div>
                                                    <div class="tp-hero-quantity-inner">
                                                        <input class="tp-hero-quantity-input" type="text" value="1">
                                                        <span class="tp-dreckment"><i
                                                                class="fa-regular fa-angle-up"></i></span>
                                                        <span class="tp-increment"><i
                                                                class="fa-regular fa-angle-down"></i></span>
                                                    </div>
                                                </li>
                                            </ul>
                                            <ul class="tp-hero-quantity-list">
                                                <li>
                                                    <div class="tp-hero-quantity-content">
                                                        <span>Child</span>
                                                        <p>Ages 12 or adove</p>
                                                    </div>
                                                    <div class="tp-hero-quantity-inner">
                                                        <input class="tp-hero-quantity-input" type="text" value="0">
                                                        <span class="tp-dreckment"><i
                                                                class="fa-regular fa-angle-up"></i></span>
                                                        <span class="tp-increment"><i
                                                                class="fa-regular fa-angle-down"></i></span>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="tp-hero-quantity-btn">
                                                <button type="button">OK</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tp-bocking-submit-btn-wrap mb-20">
                                    <button class="tp-hero-submit-btn tp-bocking-submit-btn round-6"
                                        type="button">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- tp-suites-area-start -->
    <div class="tp-suites-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                @foreach ($availableRooms as $item)
                    @php
                        $img = json_decode($item->image);
                    @endphp
                    <div class="col-lg-4 col-md-6 mb-25">
                        <div class="tp-suites-item round-6 p-relative wow fadeInUp" data-wow-delay=".3s"
                            data-wow-duration="1s">
                            <a href="{{ route('room.details', $item->id) }}">
                                <div class="tp-suites-thumb">
                                    <img class="w-100" src="{{ asset('main/assets/img/service/01.jpg') }}" alt="service">
                                </div>
                            </a>
                            <div class="tp-suites-price price-radius p-absolute">
                                <span><b>&#8358;{{ number_format($item->price, 2) }}</b> Per Night</span>
                            </div>
                            <div class="tp-suites-content p-absolute">
                                <h3 class="tp-suites-title text-capitalize"><a
                                        href="{{ route('room.details', $item->id) }}">{{ $item->type }} Room</a></h3>
                                <div class="tp-suites-room mb-15">
                                    <span>{{ $item->capacity }} Guests</span>
                                    <span class="space">|</span>
                                    <span>Size: 26sqm, 270 sqft</span>
                                </div>
                                <div class="tp-suites-hidden">
                                    <p>{{ $item->short_description }}</p>
                                    <div class="tp-suites-btn">
                                        <a class="tp-btn-2" href="tobook">
                                            <span>
                                                <svg width="12" height="15" viewBox="0 0 12 15" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M11 13.8571L6 10.2857L1 13.8571V2.42857C1 2.04969 1.15051 1.68633 1.41842 1.41842C1.68633 1.15051 2.04969 1 2.42857 1H9.57143C9.95031 1 10.3137 1.15051 10.5816 1.41842C10.8495 1.68633 11 2.04969 11 2.42857V13.8571Z"
                                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                            Book Now
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col-12">
                    <div class="tp-pagenation tp-pagenation-2 text-center pt-35">
                        <nav>
                            <ul>
                                <li><a class="active" href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li>
                                    <a href="#">
                                        <i class="fa-sharp fa-regular fa-arrow-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- tp-suites-area-end -->
@endsection
