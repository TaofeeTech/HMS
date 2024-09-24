@extends('admin.main_master')
@section('admin')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">

                @if (Session::has('mssg'))
                    <div class="alert alert-secondary alert-dismissible fade show">
                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2"
                            fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2">
                            <path
                                d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3">
                            </path>
                        </svg>
                        <strong>Done!</strong> {{ session::get('mssg') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                        </button>
                    </div>
                @endif

                <div class="container mt-0 mx-0 px-0 pt-0">

                    <h4>{{ Auth::guard('admin')->user()->name }}</h4>

                </div>

                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header d-flex ">
                                <h4 class="card-title">All Bookings</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-responsive-md">
                                        <thead>
                                            <tr class="text-center">
                                                <th style="width:80px;"><strong>#</strong></th>
                                                <th><strong>Room Name</strong></th>
                                                <th><strong>Arrival Date</strong></th>
                                                <th><strong>Departure Date</strong></th>
                                                <th><strong>Date</strong></th>
                                                <th><strong>Status</strong></th>
                                                <th><strong>Number Of Guests</strong></th>
                                                <th><strong>Room Type</strong></th>
                                                <th><strong>Rate</strong></th>
                                                <th><strong>Total Cost</strong></th>
                                                <th><strong>Payment Method</strong></th>
                                                <th><strong>Payment Status</strong></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $index = 1;
                                            @endphp
                                            @forelse ($bookings as $item)
                                                <tr class="text-center text-capitalize">

                                                    <td><strong>{{ $index++ }}</strong></td>
                                                    <td>{{ $item->room->category->cat_name . '-' . $item->room->room_number }}
                                                    </td>
                                                    <td>{{ $item->arrival_date }}</td>
                                                    <td>{{ $item->departure_date }}</td>
                                                    <td>{{ $item->booking_date }}</td>
                                                    <td>

                                                        @if ($item->status == 'confirmed')
                                                            <span
                                                                class="badge light badge-success">{{ $item->status }}</span>
                                                        @elseif ($item->status == 'pending')
                                                            <span
                                                                class="badge light badge-warning">{{ $item->status }}</span>
                                                        @else
                                                            <span
                                                                class="badge light badge-danger">{{ $item->status }}</span>
                                                        @endif

                                                    </td>
                                                    <td>{{ $item->num_guests }}</td>
                                                    <td>{{ $item->room_type }}</td>
                                                    <td>{{ $item->rate }}</td>
                                                    <td>{{ $item->total_cost }}</td>
                                                    <td class="{{ $item->payment_method ? 'text-success' : 'text-danger' }}">{{ $item->payment_method ? $item->payment_method : 'Awaiting payment' }}</td>
                                                    <td>
                                                        @if ($item->payment_status == 'paid')
                                                            <span
                                                                class="badge light badge-success">{{ $item->payment_status }}</span>
                                                        @elseif ($item->payment_status == 'pending')
                                                            <span
                                                                class="badge light badge-warning">{{ $item->payment_status }}</span>
                                                        @else
                                                            <span
                                                                class="badge light badge-danger">{{ $item->payment_status }}</span>
                                                        @endif
                                                    </td>


                                                </tr>



                                            @empty

                                                <tr class="text-center text-danger">
                                                    <td>No Booking Found</td>
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
@endsection
