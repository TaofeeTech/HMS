<div class="dlabnav">
    <div class="dlabnav-scroll">
        <ul class="metismenu" id="menu">
            <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-025-dashboard"></i>
                    <span class="nav-text">Rooms</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('rooms.all') }}">All Rooms</a></li>
                    <li><a href="{{ route('room.cats') }}">Room Categories</a></li>
                </ul>

            </li>
            <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-book"></i>
                    <span class="nav-text">Bookings</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('all.bookings') }}">All Bookings</a></li>
                    {{-- <li><a href="{{ route('room.cats') }}">Room Categories</a></li> --}}
                </ul>

            </li>
        </ul>
        <div class="dropdown header-profile2 ">
            <div class="header-info2 text-center">
                <img src="images/profile/pic1.jpg" alt="" />
                <div class="sidebar-info">
                    <div>
                        <h5 class="font-w500 mb-0">{{ Auth::guard('admin')->user()->name }}</h5>
                        <span class="fs-12">{{ Auth::guard('admin')->user()->email }}</span>
                    </div>
                </div>
                <div>
                    <a href="javascript:void(0);" class="btn btn-md text-secondary">Contact Us</a>
                </div>
            </div>
        </div>
        <div class="copyright">
            <p class="text-center"><strong>Travl Hotel Admin Dashboard</strong> © 2021 All Rights Reserved</p>
            <p class="fs-12 text-center">Made with <span class="heart"></span> by DexignLab</p>
        </div>
    </div>
</div>
