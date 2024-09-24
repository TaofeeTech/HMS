@extends('profile.guest_profile_main')
@section('guest')
    <link href="{{ asset('picker/hotel-datepicker-main/dist/css/hotel-datepicker.css') }}" rel="stylesheet" />
    <script src="{{ asset('picker/fecha-4.2.1/dist/fecha.min.js') }}"></script>
    <script src="{{ asset('picker/hotel-datepicker-main/dist/js/hotel-datepicker.js') }}"></script>
    @php
        $user = auth()->user();
    @endphp
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">

                @if (Session::has('info'))
                    <div class="alert alert-secondary alert-dismissible fade show">
                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2"
                            fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2">
                            <path
                                d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3">
                            </path>
                        </svg>
                        <strong>Done!</strong> {{ Session::get('info') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                        </button>
                    </div>
                @endif

                <div class="alert alert-info alert-dismissible fade show text-capitalize">
                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2"
                        fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="12" y1="16" x2="12" y2="12"></line>
                        <line x1="12" y1="8" x2="12.01" y2="8"></line>
                    </svg>
                    <strong>Sorry!</strong> we could not find a room that matches your choice! We have provided alternative
                    rooms that might suit your taste.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                    </button>
                </div>

                <div class="container mt-0 mx-0 px-0 pt-0">

                    <h4>{{ $user->name }}</h4>

                </div>

                <div class="alert alert-info solid alert-dismissible fade show">
                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2"
                        fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="12" y1="16" x2="12" y2="12"></line>
                        <line x1="12" y1="8" x2="12.01" y2="8"></line>
                    </svg>
                    <strong>IMPORTANT NOTICE!</strong> : All Bookings Will Be Cancelled And Deleted if Payment Is Not Made
                    Within Two(2) Hours
                    {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                    </button> --}}
                </div>

                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header d-flex ">
                                <h4 class="card-title">List Of Rooms You Can Book from</h4>
                                <a href="{{ route('rooms.add') }}" class="btn light btn-primary">Add Room </a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-responsive-md">
                                        <thead>
                                            <tr class="text-center">
                                                <th style="width:80px;"><strong>#</strong></th>
                                                <th><strong>Room Type</strong></th>
                                                <th><strong>Capacity</strong></th>
                                                <th><strong>Rate</strong></th>
                                                <th><strong>Action</strong></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $index = 1;
                                            @endphp
                                            @forelse ($alternativeRooms as $item)
                                                <tr class="text-center text-capitalize">

                                                    <td><strong>{{ $index++ }}</strong></td>
                                                    <td>{{ $item->room_type }}</td>
                                                    <td>{{ $item->capacity }}</td>
                                                    <td>{{ $item->price_per_night }}</td>
                                                    <td><button type="button" class="btn btn-primary btn-xs"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#basicModal-{{ $item->id }}">Book</button>
                                                    </td>

                                                    <div class="modal fade text-reset" id="basicModal-{{ $item->id }}">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title text-capitalize">
                                                                        {{ $item->room_type }} (with the capacity of
                                                                        {{ $item->capacity }})
                                                                    </h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal">
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body text-reset" style="text-align: left">
                                                                    <div class="card">
                                                                        <div class="card-header">
                                                                            <h4 class="card-title">Input Style</h4>
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <div class="basic-form">
                                                                                <form
                                                                                    action="{{ route('alternative.book') }}"
                                                                                    method="POST">
                                                                                    @csrf
                                                                                    <div class="mb-3">
                                                                                        <label class="form-label"
                                                                                            for="email">Email</label>
                                                                                        <input type="hidden"
                                                                                            name="id"
                                                                                            value="{{ $user->id }}">
                                                                                        <input type="hidden"
                                                                                            name="room_id"
                                                                                            value="{{ $item->id }}">

                                                                                        <input type="email"
                                                                                            class="form-control input-default "
                                                                                            placeholder="input-default"
                                                                                            type="email" name="email"
                                                                                            value="{{ $user->email }}"
                                                                                            id="email">
                                                                                    </div>
                                                                                    <div class="mb-3">
                                                                                        <label class="form-label"
                                                                                            for="room">Room
                                                                                            Type</label>
                                                                                        <select
                                                                                            class="form-control input-rounded"
                                                                                            name="room_type"
                                                                                            id="room">
                                                                                            <option
                                                                                                value="{{ $item->room_type }}"
                                                                                                selected="selected"
                                                                                                class="text-capitalize">
                                                                                                {{ $item->room_type }}
                                                                                            </option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="mb-3">
                                                                                        <label class="form-label"
                                                                                            for="input-id">Date</label>
                                                                                        <input class="form-control"
                                                                                            id="input-id-{{ $item->id }}"
                                                                                            type="text"
                                                                                            name="daterange">
                                                                                    </div>
                                                                                    <div class="mb-3">
                                                                                        <label class="form-label"
                                                                                            for="num_guest">NUmber of
                                                                                            Guests</label>
                                                                                        <input class="form-control"
                                                                                            id="num_guest" type="number"
                                                                                            name="num_guests"
                                                                                            placeholder="Number of Guest">
                                                                                    </div>

                                                                                    <button type="submit"
                                                                                        class="btn btn-primary">Book
                                                                                        Now</button>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger light"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </tr>

                                            @empty

                                                <tr class="text-center text-danger">
                                                    <td>Sorry! We have a full house</td>
                                                </tr>
                                            @endforelse

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var inputs = document.querySelectorAll('[id^="input-id-"]');

        inputs.forEach(input => {
            var datepicker = new HotelDatepicker(input, {
                separator: '/'
            });
        });
    </script>
@endsection
