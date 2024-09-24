@extends('profile.guest_profile_main')
@section('guest')
    @php
        $user = auth()->user();
    @endphp
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
                                <h4 class="card-title">Your Bookings</h4>
                                <a href="{{ route('index') }}" class="btn light btn-primary">Book a Room </a>
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
                                                <th rowspan="2"><strong>Actions</strong></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $index = 1;
                                            @endphp
                                            @forelse ($userBookings as $item)
                                                <tr class="text-center text-capitalize">

                                                    <td><strong>{{ $index++ }}</strong></td>
                                                    <td><a href="javascript:void(0);" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModalCenter-{{ $item->id }}">{{ $item->room->category->cat_name . '-' . $item->room->room_number }}</a>
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
                                                    <td>&#8358;{{ number_format($item->rate) }} </td>
                                                    <td>&#8358;{{ number_format($item->total_cost) }}</td>
                                                    <td>{{ $item->payment_method }}</td>
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
                                                    @if ($item->payment_status == 'pending')
                                                        <td>
                                                            <button class="btn btn-primary" data-bs-toggle="modal"
                                                                data-bs-target="#exampleModalCenter-{{ $item->id }}">Pay
                                                                Now</button>
                                                        </td>

                                                        <div class="modal fade" id="exampleModalCenter-{{ $item->id }}"
                                                            style="display: none;" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Verify Payment for
                                                                            {{ $item->room->category->cat_name . '-' . $item->room->room_number }}
                                                                        </h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal">
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">

                                                                        <div class="container">
                                                                            <div class="form-group mb-3">
                                                                                <label for="Email">Email</label>
                                                                                <input type="email"
                                                                                    value="{{ $user->email }}" readonly
                                                                                    class="form-control">
                                                                            </div>
                                                                            <div class="form-group mb-3">
                                                                                <label for="Amount">Total Amount</label>
                                                                                <input type="email"
                                                                                    value="&#8358;{{ number_format($item->total_cost) }}"
                                                                                    readonly class="form-control">
                                                                            </div>
                                                                            <div class="form-group mb-3">
                                                                                <label for="Amount">Room Name</label>
                                                                                <input type="room_name"
                                                                                    value="{{ $item->room->category->cat_name . '-' . $item->room->room_number }}"
                                                                                    readonly class="form-control">
                                                                            </div>
                                                                        </div>

                                                                        <form>
                                                                            <input id="email" name="email"
                                                                                value="{{ $user->email }}" hidden>
                                                                            <input id="user_id" name="user_id"
                                                                                value="{{ $user->id }}" hidden>
                                                                            <input id="price" name="amount"
                                                                                value="{{ $item->total_cost }}" hidden>
                                                                            <input id="room_id" name="room_id"
                                                                                value="{{ $item->room_id }}" hidden>
                                                                            <input id="booking_id" name="booking_id"
                                                                                value="{{ $item->id }}" hidden>
                                                                            <input id="room_name" name="room_name"
                                                                                value="{{ $item->room->category->cat_name . '-' . $item->room->room_number }}"
                                                                                hidden>
                                                                            {{-- <button name="pay_now" type="button" id="pay-now" title="Pay now">Pay now</button> --}}
                                                                        </form>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="btn btn-danger light"
                                                                            data-bs-dismiss="modal">Close</button>
                                                                        <button type="button" class="btn btn-primary"
                                                                            id="pay-now">Make Payment</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif



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


    <script>
        async function MakepaymentPaystack() {

            const email = document.getElementById('email').value;
            const price = document.getElementById('price').value;
            const userId = document.getElementById('user_id').value;
            const roomId = document.getElementById('room_id').value;
            const bookingId = document.getElementById('booking_id').value;
            const roomName = document.getElementById('room_name').value;

            try {

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
        const btn = document.getElementById('pay-now');
        btn.addEventListener('click', MakepaymentPaystack)
    </script>
@endsection
