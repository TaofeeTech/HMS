@extends('main_master')
@section('main')
<style>
    .img-bams{
        object-fit: cover;
    }
</style>
    <!-- tp-room-details-start -->
    <div class="tp-room-details-area pt-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="tp-room-info-wrap mb-50">
                        <span class="tp-room-info-subtitle-2 text-capitalize"><i class="fa-sharp fa-solid fa-star-sharp"></i>{{ $room->type . " Room" }}</span>
                        <h2 class="tp-room-info-title-2 mb-15">Forn Gully Bungalow</h2>
                        <div class="tp-room-popup-map">
                            <span class="tp-room-popup-icon">
                                <svg width="13" height="19" viewBox="0 0 13 19" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M3.17846 1.34309C5.14483 0.200547 7.56183 0.220517 9.50974 1.3954C11.4385 2.59422 12.6108 4.73376 12.5999 7.0353C12.555 9.32174 11.298 11.471 9.72672 13.1325C8.81985 14.0958 7.80535 14.9475 6.70396 15.6704C6.59053 15.736 6.46627 15.7799 6.33734 15.8C6.21324 15.7947 6.09239 15.758 5.98568 15.6933C4.30418 14.6071 2.829 13.2206 1.6311 11.6006C0.628729 10.2482 0.0592511 8.61441 0 6.92098L0.0044876 6.67462C0.0863299 4.46418 1.28232 2.44484 3.17846 1.34309ZM7.11654 5.0313C6.31716 4.69151 5.39554 4.87611 4.78199 5.49891C4.16843 6.12171 3.98398 7.05985 4.31475 7.8753C4.64552 8.69075 5.42626 9.22266 6.29244 9.22266C6.85989 9.22674 7.40537 8.99944 7.80733 8.59143C8.20929 8.18341 8.43433 7.62857 8.43234 7.05054C8.43535 6.16823 7.91591 5.37108 7.11654 5.0313Z"
                                        fill="#B7124D" />
                                    <path opacity="0.4"
                                        d="M6.30078 18.5002C8.78606 18.5002 10.8008 18.0973 10.8008 17.6002C10.8008 17.1031 8.78606 16.7002 6.30078 16.7002C3.8155 16.7002 1.80078 17.1031 1.80078 17.6002C1.80078 18.0973 3.8155 18.5002 6.30078 18.5002Z"
                                        fill="#B7124D" />
                                </svg>
                            </span>
                            <span class="tp-room-popup-map-content">84 N. Hill Field St.Scarsdale, NY 10583 USA – </span>
                            <a class="popup-gmaps tp-room-popup-map-link"
                                href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31078.361591144112!2d-74.0256365664179!3d40.705584751235754!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1724572184688!5m2!1sen!2sbd">Show
                                map</a>
                        </div>
                        <div class="tp-room-info tp-room-info-2">
                            <ul>
                                <li>
                                    <span class="tp-room-info-icon tp-room-info-border">
                                        <svg width="21" height="19" viewBox="0 0 21 19" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M17.666 18.5001V6.5M17.666 18.5001L15.666 16.6053M17.666 18.5001L19.666 16.6053M17.666 6.5L15.666 8.39475M17.666 6.5L19.666 8.39475"
                                                stroke="#141414" stroke-width="0.8" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M1 2.50002H13M1 2.50002L2.89475 0.5M1 2.50002L2.89475 4.50003M13 2.50002L11.1053 0.5M13 2.50002L11.1053 4.50003"
                                                stroke="#141414" stroke-width="0.8" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M1 17.8335V7.16667C1 6.79848 1.29848 6.5 1.66667 6.5H12.3334C12.7017 6.5 13.0001 6.79848 13.0001 7.16667V17.8335C13.0001 18.2016 12.7017 18.5001 12.3334 18.5001H1.66667C1.29848 18.5001 1 18.2016 1 17.8335Z"
                                                stroke="#141414" stroke-width="0.8" />
                                        </svg>
                                    </span>
                                    <span class="tp-room-info-text">{{ $room->size }} sq ft</span>
                                </li>
                                <li>
                                    <span class="tp-room-info-icon tp-room-info-border">
                                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M5.5 14.9002V14.0002C5.5 11.5149 7.51472 9.50024 10 9.50024C12.4853 9.50024 14.5 11.5149 14.5 14.0002V14.9002"
                                                stroke="#141414" stroke-width="0.8" stroke-linecap="round" />
                                            <path
                                                d="M9.99883 9.49983C11.49 9.49983 12.6989 8.29103 12.6989 6.79985C12.6989 5.30869 11.49 4.09985 9.99883 4.09985C8.50765 4.09985 7.29883 5.30869 7.29883 6.79985C7.29883 8.29103 8.50765 9.49983 9.99883 9.49983Z"
                                                stroke="#141414" stroke-width="0.8" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M10 18.5C14.9706 18.5 19 14.4706 19 9.5C19 4.52944 14.9706 0.5 10 0.5C5.02944 0.5 1 4.52944 1 9.5C1 14.4706 5.02944 18.5 10 18.5Z"
                                                stroke="#141414" stroke-width="0.8" />
                                        </svg>
                                    </span>
                                    <span class="tp-room-info-text">{{ $room->capacity }} People</span>
                                </li>
                                <li>
                                    <span class="tp-room-info-icon tp-room-info-border">
                                        <svg width="20" height="16" viewBox="0 0 20 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M2.02857 7.36443V3.29663C2.02857 3.04239 2.13143 2.53392 2.54286 2.53392C2.95429 2.53392 4.77143 2.53392 5.62857 2.53392C6.14286 1.9407 8.20362 0.5 10 0.5C11.8 0.5 12.9829 0.9068 14.6286 2.53392H17.4571C17.7143 2.61866 18.2286 2.88985 18.2286 3.29663C18.2286 3.70341 18.2286 6.17799 18.2286 7.36443M2.02857 7.36443C1.68571 7.53391 1 8.0763 1 8.8898C1 9.3241 1 10.3571 1 11.4322M2.02857 7.36443H4.34286M18.2286 7.36443C18.8457 7.77122 19 8.5509 19 8.8898V11.4322M18.2286 7.36443H15.6571M1 11.4322H19M1 11.4322C1 12.3713 1 13.3424 1 13.9746H1.77143M4.34286 7.36443V4.82203C4.34286 4.5678 4.44571 4.05932 4.85714 4.05932C5.26857 4.05932 8.11429 4.05932 9.48571 4.05932C9.74286 4.05932 10 4.36441 10 4.5678M4.34286 7.36443H10M19 11.4322V13.9746H18.2286M15.6571 7.36443C15.6571 6.51696 15.6571 4.77119 15.6571 4.5678C15.6571 4.36441 15.4 4.05932 15.1429 4.05932H10.5143C10.2571 4.05932 10.0857 4.31356 10 4.5678M15.6571 7.36443H10M18.2286 13.9746H1.77143M18.2286 13.9746V15.5M1.77143 13.9746V15.5M10 4.5678C10 4.77119 10 6.51696 10 7.36443"
                                                stroke="#141414" stroke-width="0.8" stroke-linecap="round" />
                                        </svg>
                                    </span>
                                    <span class="tp-room-info-text">{{ $room->bed }} Beds</span>
                                </li>
                                <li>
                                    <span class="tp-room-info-icon tp-room-info-border">
                                        <svg width="20" height="18" viewBox="0 0 20 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 9.6665H19.3333" stroke="#141414" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M18.418 9.66675L17.9189 12.8615C17.6291 14.7161 16.0317 16.0834 14.1545 16.0834H6.18145C4.30431 16.0834 2.70687 14.7161 2.41711 12.8615L1.91797 9.66675"
                                                stroke="#141414" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M4.78696 15.8149L3.75 16.9999" stroke="#141414" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M15.5469 15.8149L16.5839 16.9999" stroke="#141414"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M9.14942 3.25H9.35438C10.326 3.25 11.1886 3.87172 11.4959 4.79346C11.589 5.07299 11.5422 5.38028 11.3699 5.61932C11.1976 5.85836 10.9209 6 10.6262 6H7.87762C7.58296 6 7.30626 5.85836 7.13397 5.61932C6.96168 5.38028 6.91481 5.07299 7.00798 4.79346C7.31523 3.87172 8.17782 3.25 9.14942 3.25Z"
                                                stroke="#141414" stroke-linecap="round" stroke-linejoin="round" />
                                            <path
                                                d="M9.24998 3.25C9.24998 1.73122 8.01878 0.5 6.5 0.5C4.98122 0.5 3.75 1.73122 3.75 3.25V9.6667"
                                                stroke="#141414" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                    <span class="tp-room-info-text">{{ $room->bathroom }} Bathrooms</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- tp-room-details-end -->

    <!-- tp-room-details-gellary-start -->
    <div class="tp-room-details-gellary pb-70">
        @php
            $image = json_decode($room->image);
            $images = array_slice($image, 1)
        @endphp
        <div class="container">
            <div class="row tp-gx-25">
                <div class="col-lg-4">
                    <div class="tp-room-gellary-thumb tp-room-gellary-thumb-2 mb-25 p-relative">
                        <img class="w-100 img-bams" style="object-fit: cover" src="{{ asset($image[0]) }}" alt="thumb">
                        <div class="tp-room-gellary-btn">
                            <a class="tp-btn-white tp-btn-white-2 popup-image"
                                href="{{ asset($image[0]) }}">View Photos</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row tp-gx-25">
                        @foreach ($images as $item)
                            <div class="col-lg-6 col-md-6">
                                <div class="tp-room-gellary-thumb tp-room-gellary-thumb-2 mb-25">
                                    <a class="popup-image" href="{{ asset($item) }}">
                                        <img class="w-100" src="{{ asset($item) }}" alt="thumb">
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- tp-room-details-gellary-end -->

    <!-- tp-about-more-info-wrap -->
    <div class="tp-room-about-more-info pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 order-1 order-lg-0">
                    <div class="tp-room-details-left-2">
                        <div class="tp-room-about-content tp-room-about-content-2 mb-25">
                            <h2 class="tp-room-details-title-2 mb-20">About This Room</h2>
                            <p class="mb-30">{!! $room->description !!}</p>
                            <div class="tp-room-details-toggle-btn tp-room-details-toggle-btn-2">
                                <button id="show-more" class="tp-btn-4 mb-40">Read More</button>
                            </div>
                        </div>
                        <div class="tp-room-about-amenities tp-room-about-amenities-2 mb-60">
                            <h2 class="tp-room-details-title-2 mb-30">Amenities</h2>
                            <div class="row tp-gx-12">
                                @php
                                    $features = json_decode($room->features, true);
                                @endphp
                                @if ($features)
                                    @forelse ($features as $item)
                                        <div class="col-lg-6 col-md-6">
                                            <div
                                                class="tp-room-about-amenities-item tp-room-about-amenities-item-2 colum-space d-flex align-items-center">
                                                <div class="tp-room-about-amenities-icon">
                                                    <span>
                                                        {!! $item["icon"] !!}
                                                    </span>
                                                </div>
                                                <h5 class="tp-room-about-amenities-title">{{ $item["name"] }}</h5>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                        No Amenities
                                @endif
                            </div>
                        </div>
                        <div class="tp-room-map mb-30 fix">
                            <h2 class="tp-room-details-title-2 mb-30">Location</h2>
                            <div class="tp-room-map-box tp-room-map-box-2">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31078.361591144112!2d-74.0256365664179!3d40.705584751235754!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1724572184688!5m2!1sen!2sbd"
                                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                            <div class="tp-room-free-parking">
                                <p><i class="fa-sharp fa-solid fa-check"></i> Free street parking</p>
                            </div>
                        </div>
                        <div class="tp-room-about-feature tp-room-about-feature-2 mb-35">
                            <h2 class="tp-room-details-title-2 mb-20">House Rules</h2>
                            <ul>
                                <li><span></span> Check-in time is 3:00 PM; check-out time is 11:00 AM.</li>
                                <li><span></span>No smoking allowed inside the room. Designated smoking areas are available
                                    outside.</li>
                                <li><span></span>Please conserve water and electricity by turning off lights and appliances
                                    when not in use.</li>
                                <li><span></span>Guests are responsible for locking the doors and securing their belongings.
                                </li>
                                <li><span></span>Room keys must be returned at check-out. Lost keys incur a replacement fee.
                                </li>
                            </ul>
                        </div>
                        <div class="tp-review-wrap mb-30">
                            <h2 class="tp-room-details-title-2 mb-20">Guest Reviews</h2>
                            <div class="tp-review-inner tp-review-inner-2 mb-20">
                                <div class="tp-review-rating">
                                    <span class="tp-review-rating-star"><i class="fa-sharp fa-solid fa-star"></i></span>
                                    <h4 class="tp-review-rating-title">5/5 Excellent</h4>
                                    <span class="tp-review-rating-number">(3 reviews)</span>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="tp-review-rating-progress-wrap">
                                            <div class="tp-review-rating-progress tp-review-rating-progress-2">
                                                <span class="tp-review-rating-content">Staff</span>
                                                <div
                                                    class="tp-review-rating-bar-item d-flex justify-content-between align-items-center">
                                                    <div class="tp-review-rating-bar">
                                                        <div class="single-progress" data-width="90%"></div>
                                                    </div>
                                                    <div class="tp-review-rating-bar-text">
                                                        <span>4.8/5</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tp-review-rating-progress tp-review-rating-progress-2">
                                                <span class="tp-review-rating-content">Cleanliness</span>
                                                <div
                                                    class="tp-review-rating-bar-item d-flex justify-content-between align-items-center">
                                                    <div class="tp-review-rating-bar">
                                                        <div class="single-progress" data-width="100%"></div>
                                                    </div>
                                                    <div class="tp-review-rating-bar-text">
                                                        <span>5/5</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tp-review-rating-progress tp-review-rating-progress-2">
                                                <span class="tp-review-rating-content">Check-in</span>
                                                <div
                                                    class="tp-review-rating-bar-item d-flex justify-content-between align-items-center">
                                                    <div class="tp-review-rating-bar">
                                                        <div class="single-progress" data-width="90%"></div>
                                                    </div>
                                                    <div class="tp-review-rating-bar-text">
                                                        <span>4.5/5</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="tp-review-rating-progress-wrap">
                                            <div class="tp-review-rating-progress tp-review-rating-progress-2">
                                                <span class="tp-review-rating-content">Facilities</span>
                                                <div
                                                    class="tp-review-rating-bar-item d-flex justify-content-between align-items-center">
                                                    <div class="tp-review-rating-bar">
                                                        <div class="single-progress" data-width="100%"></div>
                                                    </div>
                                                    <div class="tp-review-rating-bar-text">
                                                        <span>5/5</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tp-review-rating-progress tp-review-rating-progress-2">
                                                <span class="tp-review-rating-content">Location</span>
                                                <div
                                                    class="tp-review-rating-bar-item d-flex justify-content-between align-items-center">
                                                    <div class="tp-review-rating-bar">
                                                        <div class="single-progress" data-width="85%"></div>
                                                    </div>
                                                    <div class="tp-review-rating-bar-text">
                                                        <span>4.8/5</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tp-review-rating-progress tp-review-rating-progress-2">
                                                <span class="tp-review-rating-content">Value</span>
                                                <div
                                                    class="tp-review-rating-bar-item d-flex justify-content-between align-items-center">
                                                    <div class="tp-review-rating-bar">
                                                        <div class="single-progress" data-width="100%"></div>
                                                    </div>
                                                    <div class="tp-review-rating-bar-text">
                                                        <span>5/5</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tp-review-count">
                                <p>3 reviews on this Hotel - Showing 1 to 3</p>
                            </div>
                        </div>
                        <div class="tp-room-review-list mb-25">
                            <div class="tp-room-review-item">
                                <div class="tp-room-review-avater">
                                    <div class="tp-room-review-avater-thumb">
                                        <img src="assets/img/review/avatar.png" alt="review">
                                    </div>
                                    <div class="tp-room-review-avater-info">
                                        <div class="tp-room-review-rating">
                                            <span><i class="fa-sharp fa-solid fa-star-sharp"></i></span>
                                            <span><i class="fa-sharp fa-solid fa-star-sharp"></i></span>
                                            <span><i class="fa-sharp fa-solid fa-star-sharp"></i></span>
                                            <span><i class="fa-sharp fa-solid fa-star-sharp"></i></span>
                                            <span><i class="fa-sharp fa-solid fa-star-sharp"></i></span>
                                        </div>
                                        <div class="tp-room-review-avater-content">
                                            <h4 class="tp-room-review-avater-title">Eleanor Fant <span>06 March, 2023
                                                </span></h4>
                                            <p>Very nice sea view hotel, very clean room with basic kitchen with cooking
                                                facility . Good sleeping<br>
                                                quality, will definitely come back again. You need to have a car.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tp-room-review-item">
                                <div class="tp-room-review-avater">
                                    <div class="tp-room-review-avater-thumb">
                                        <img src="assets/img/review/avatar-2.png" alt="review">
                                    </div>
                                    <div class="tp-room-review-avater-info">
                                        <div class="tp-room-review-rating">
                                            <span><i class="fa-sharp fa-solid fa-star-sharp"></i></span>
                                            <span><i class="fa-sharp fa-solid fa-star-sharp"></i></span>
                                            <span><i class="fa-sharp fa-solid fa-star-sharp"></i></span>
                                            <span><i class="fa-sharp fa-solid fa-star-sharp"></i></span>
                                            <span><i class="fa-sharp fa-solid fa-star-sharp"></i></span>
                                        </div>
                                        <div class="tp-room-review-avater-content">
                                            <h4 class="tp-room-review-avater-title">Theodore Handle <span>12 April, 2023
                                                </span></h4>
                                            <p>If you want to get away from city life, rent a car and book Joyuam. It is a
                                                no-frills<br>
                                                where you can enjoy fresh air and serene surrounding.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tp-room-review-item">
                                <div class="tp-room-review-avater">
                                    <div class="tp-room-review-avater-thumb">
                                        <img src="assets/img/review/avatar.png" alt="review">
                                    </div>
                                    <div class="tp-room-review-avater-info">
                                        <div class="tp-room-review-rating">
                                            <span><i class="fa-sharp fa-solid fa-star-sharp"></i></span>
                                            <span><i class="fa-sharp fa-solid fa-star-sharp"></i></span>
                                            <span><i class="fa-sharp fa-solid fa-star-sharp"></i></span>
                                            <span><i class="fa-sharp fa-solid fa-star-sharp"></i></span>
                                            <span><i class="fa-sharp fa-solid fa-star-sharp"></i></span>
                                        </div>
                                        <div class="tp-room-review-avater-content">
                                            <h4 class="tp-room-review-avater-title">Eleanor Fant <span>12 April, 2023
                                                </span></h4>
                                            <p>Great value for money” Place was clean with everything you need provided.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tp-room-review-form-wrap">
                            <div class="tp-room-review-form-btn">
                                <button id="showlogin" class="tp-btn-large mb-50">Write a review</button>
                            </div>
                            <div id="checkout-login"
                                class="tp-room-review-form-content tp-room-review-form-content-2 mb-50">
                                <h2 class="tp-room-details-title tp-room-details-title-2 mb-10">Leave a comment</h2>
                                <p class="mb-30">Your email address will not be published. Required fields are marked *
                                </p>
                                <div class="tp-review-rates-wrap tp-review-rates-wrap-2 mb-25">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="tp-review-clients">
                                                <div class="tp-review-item">
                                                    <span class="tp-review-stats">Staff</span>
                                                    <div class="tp-review-rates">
                                                        <span><i class="fa-sharp fa-solid fa-star-sharp"></i></span>
                                                        <span><i class="fa-sharp fa-solid fa-star-sharp"></i></span>
                                                        <span class="tp-grey-2"><i
                                                                class="fa-sharp fa-solid fa-star-sharp"></i></span>
                                                        <span class="tp-grey-2"><i
                                                                class="fa-sharp fa-solid fa-star-sharp"></i></span>
                                                        <span class="tp-grey-2"><i
                                                                class="fa-sharp fa-solid fa-star-sharp"></i></span>
                                                    </div>
                                                </div>
                                                <div class="tp-review-item">
                                                    <span class="tp-review-stats">Cleanliness</span>
                                                    <div class="tp-review-rates">
                                                        <span><i class="fa-sharp fa-solid fa-star-sharp"></i></span>
                                                        <span><i class="fa-sharp fa-solid fa-star-sharp"></i></span>
                                                        <span><i class="fa-sharp fa-solid fa-star-sharp"></i></span>
                                                        <span class="tp-grey-2"><i
                                                                class="fa-sharp fa-solid fa-star-sharp"></i></span>
                                                        <span class="tp-grey-2"><i
                                                                class="fa-sharp fa-solid fa-star-sharp"></i></span>
                                                    </div>
                                                </div>
                                                <div class="tp-review-item">
                                                    <span class="tp-review-stats">Check-in</span>
                                                    <div class="tp-review-rates">
                                                        <span><i class="fa-sharp fa-solid fa-star-sharp"></i></span>
                                                        <span><i class="fa-sharp fa-solid fa-star-sharp"></i></span>
                                                        <span><i class="fa-sharp fa-solid fa-star-sharp"></i></span>
                                                        <span><i class="fa-sharp fa-solid fa-star-sharp"></i></span>
                                                        <span class="tp-grey-2"><i
                                                                class="fa-sharp fa-solid fa-star-sharp"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="tp-review-clients">
                                                <div class="tp-review-item">
                                                    <span class="tp-review-stats">Facilities</span>
                                                    <div class="tp-review-rates">
                                                        <span><i class="fa-sharp fa-solid fa-star-sharp"></i></span>
                                                        <span class="tp-grey-2"><i
                                                                class="fa-sharp fa-solid fa-star-sharp"></i></span>
                                                        <span class="tp-grey-2"><i
                                                                class="fa-sharp fa-solid fa-star-sharp"></i></span>
                                                        <span class="tp-grey-2"><i
                                                                class="fa-sharp fa-solid fa-star-sharp"></i></span>
                                                        <span class="tp-grey-2"><i
                                                                class="fa-sharp fa-solid fa-star-sharp"></i></span>
                                                    </div>
                                                </div>
                                                <div class="tp-review-item">
                                                    <span class="tp-review-stats">Location</span>
                                                    <div class="tp-review-rates">
                                                        <span><i class="fa-sharp fa-solid fa-star-sharp"></i></span>
                                                        <span><i class="fa-sharp fa-solid fa-star-sharp"></i></span>
                                                        <span class="tp-grey-2"><i
                                                                class="fa-sharp fa-solid fa-star-sharp"></i></span>
                                                        <span class="tp-grey-2"><i
                                                                class="fa-sharp fa-solid fa-star-sharp"></i></span>
                                                        <span class="tp-grey-2"><i
                                                                class="fa-sharp fa-solid fa-star-sharp"></i></span>
                                                    </div>
                                                </div>
                                                <div class="tp-review-item">
                                                    <span class="tp-review-stats">Value</span>
                                                    <div class="tp-review-rates">
                                                        <span><i class="fa-sharp fa-solid fa-star-sharp"></i></span>
                                                        <span><i class="fa-sharp fa-solid fa-star-sharp"></i></span>
                                                        <span><i class="fa-sharp fa-solid fa-star-sharp"></i></span>
                                                        <span class="tp-grey-2"><i
                                                                class="fa-sharp fa-solid fa-star-sharp"></i></span>
                                                        <span class="tp-grey-2"><i
                                                                class="fa-sharp fa-solid fa-star-sharp"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tp-postbox-comment-input">
                                    <form action="#">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="tp-postbox-input mb-25">
                                                    <label class="tp-label mb-5" for="name">Last Name *</label>
                                                    <input class="tp-input" type="text" id="name"
                                                        placeholder="Smith">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="tp-postbox-input mb-25">
                                                    <label class="tp-label mb-5" for="email">Email *</label>
                                                    <input class="tp-input" type="email" id="email"
                                                        placeholder="housey@mail.com">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="tp-postbox-input mb-25">
                                                    <label class="tp-label mb-5" for="titel">Titel *</label>
                                                    <input class="tp-input" type="email" id="titel"
                                                        placeholder="Titel">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="tp-postbox-textarea mb-15">
                                                    <label class="tp-label mb-5" for="textarea">Your Comment *</label>
                                                    <textarea class="tp-textarea" id="textarea" placeholder="Leave us a  Comment..."></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="tp-postbox-agree mb-30 d-flex align-items-start mb-25">
                                                    <input class="tp-checkbox" type="checkbox" id="agree">
                                                    <label class="tp-agree" for="agree">I agree that my submitted data
                                                        is being <a href="privacy-policy.html">collected and
                                                            stored.</a></label>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="tp-postbox-comment-btn-wrap">
                                                    <button class="tp-btn-large " type="submit">Leave a comment</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 order-0 order-lg-1">
                    <form action="#">
                        <div class="tp-room-booking-sidebar mb-50">
                            <div class="tp-room-book-wrap tp-room-book-wrap-2 mb-15">
                                <span class="tp-room-book-unit">From</span>
                                <h4 class="tp-room-book-price">&#8358;{{ number_format($room->price) }} <span class="night">/night</span></h4>
                            </div>
                            <div class="tp-room-book-wrap tp-room-book-wrap-space tp-room-book-wrap-2">
                                <div class="tp-hero-form-input tp-room-book-date pb-20">
                                    <p>Check-In *</p>
                                    <div class="p-relative">
                                        <input class="input" name="datetime-local" type="text"
                                            placeholder="dd/mm/yyyy">
                                        <span>
                                            <svg width="15" height="16" viewBox="0 0 15 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M12.5556 2.40015H2.44444C1.6467 2.40015 1 3.02695 1 3.80015V13.6001C1 14.3733 1.6467 15.0001 2.44444 15.0001H12.5556C13.3533 15.0001 14 14.3733 14 13.6001V3.80015C14 3.02695 13.3533 2.40015 12.5556 2.40015Z"
                                                    stroke="#9D9C9D" stroke-width="1.3" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M10.3887 1V3.8" stroke="#9D9C9D" stroke-width="1.3"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M4.61133 1V3.8" stroke="#9D9C9D" stroke-width="1.3"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M1 6.59985H14" stroke="#9D9C9D" stroke-width="1.3"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                                <div class="tp-hero-form-input tp-room-book-date pb-20">
                                    <p>Check-Out *</p>
                                    <div class="p-relative">
                                        <input class="input" name="datetime-local" type="text"
                                            placeholder="dd/mm/yyyy">
                                        <span>
                                            <svg width="15" height="16" viewBox="0 0 15 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M12.5556 2.40015H2.44444C1.6467 2.40015 1 3.02695 1 3.80015V13.6001C1 14.3733 1.6467 15.0001 2.44444 15.0001H12.5556C13.3533 15.0001 14 14.3733 14 13.6001V3.80015C14 3.02695 13.3533 2.40015 12.5556 2.40015Z"
                                                    stroke="#9D9C9D" stroke-width="1.3" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M10.3887 1V3.8" stroke="#9D9C9D" stroke-width="1.3"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M4.61133 1V3.8" stroke="#9D9C9D" stroke-width="1.3"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M1 6.59985H14" stroke="#9D9C9D" stroke-width="1.3"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                                <div
                                    class="tp-hero-form-quantity tp-booking-form-quantity-2 tp-hero-form-quantity mb-20 w-100">
                                    <p>Guests *</p>
                                    <div class="tp-hero-quantity p-relative">
                                        <span class="tp-hero-quantity-click tp-room-guest-toogle tp-hero-quantity-toggle">
                                            <svg width="17" height="15" viewBox="0 0 17 15" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M11.9094 13.2732V11.9095C11.9094 11.1861 11.6221 10.4924 11.1106 9.98095C10.5991 9.46947 9.9054 9.18213 9.18206 9.18213H3.72735C3.00401 9.18213 2.3103 9.46947 1.79882 9.98095C1.28735 10.4924 1 11.1861 1 11.9095V13.2732"
                                                    stroke="#9D9C9D" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path
                                                    d="M6.45392 6.45471C7.96019 6.45471 9.18127 5.23363 9.18127 3.72735C9.18127 2.22108 7.96019 1 6.45392 1C4.94764 1 3.72656 2.22108 3.72656 3.72735C3.72656 5.23363 4.94764 6.45471 6.45392 6.45471Z"
                                                    stroke="#9D9C9D" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path
                                                    d="M16.0006 13.2729V11.9092C16.0001 11.3049 15.799 10.7179 15.4288 10.2403C15.0585 9.7627 14.5402 9.42158 13.9551 9.27051"
                                                    stroke="#9D9C9D" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path
                                                    d="M11.2285 1.08862C11.8152 1.23883 12.3352 1.58002 12.7065 2.05841C13.0778 2.53679 13.2794 3.12516 13.2794 3.73075C13.2794 4.33634 13.0778 4.9247 12.7065 5.40308C12.3352 5.88147 11.8152 6.22266 11.2285 6.37287"
                                                    stroke="#9D9C9D" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                            4 Guests(s)
                                        </span>
                                        <div class="tp-hero-quantity-border tp-hero-quantity-active">
                                            <ul class="tp-hero-quantity-list border-bottom">
                                                <li>
                                                    <div class="tp-hero-quantity-content">
                                                        <span>Adult</span>
                                                        <p>Ages 12 or adove</p>
                                                    </div>
                                                    <div class="tp-hero-quantity-inner">
                                                        <input class="tp-hero-quantity-input" type="text"
                                                            value="1">
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
                                                        <input class="tp-hero-quantity-input" type="text"
                                                            value="0">
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
                                <div class="tp-purches-btn">
                                    <button type="button" class="tp-btn-large w-100">Reserve</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- tp-about-more-info-end -->

    <!-- tp-servce-area-start -->
    <div class="tp-service-area tp-bg-gray pt-100 pb-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="tp-section-title-wrapper mb-40">
                        <h6 class="tp-section-title-pre-red tp-section-title-pre">Our Rooms</h6>
                        <h2 class="tp-section-title">Similar Rooms</h2>
                    </div>
                </div>
                @foreach ($similarRooms as $item) 
                @php
                    $image = json_decode($item->image);
                    $first_image = collect($image)->first();
                @endphp
                    <div class="col-lg-4 col-md-6">
                        <div class="tp-suites-item round-6 mb-30 p-relative">
                            <a href="room-details-1.html">
                                <div class="tp-suites-thumb">
                                    <img class="w-100" src="{{ asset($first_image) }}" alt="service">
                                </div>
                            </a>
                            <div class="tp-suites-price price-radius p-absolute">
                                <span><b>&#8358; {{ number_format($item->price, 2) }}</b> Per Night</span>
                            </div>
                            <div class="tp-suites-content p-absolute">
                                <h3 class="tp-suites-title text-capitalize"><a href="{{ route('room.details', $item->id) }}">{{ $item->type . " Room"}}</a></h3>
                                <div class="tp-suites-room mb-15">
                                    <span>{{ $item->capacity }} Guests</span>
                                    <span class="space">|</span>
                                    <span>Size: 26sqm, 270 sqft</span>
                                </div>
                                <div class="tp-suites-hidden">
                                    <p>{{ $item->short_description }}</p>
                                    <div class="tp-suites-btn">
                                        <a class="tp-btn-2" href="room-details-1.html">
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
            </div>
        </div>
    </div>
    <!-- tp-servce-area-end -->
@endsection
