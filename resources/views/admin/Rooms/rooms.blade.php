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
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header d-flex ">
                                <h4 class="card-title">All Rooms</h4>
                                <a href="{{ route('rooms.add') }}" class="btn light btn-primary">Add Room </a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-responsive-md">
                                        <thead>
                                            <tr class="text-center">
                                                <th style="width:80px;"><strong>#</strong></th>
                                                <th><strong>Room Name</strong></th>
                                                <th><strong>Description</strong></th>
                                                <th><strong>Price</strong></th>
                                                <th><strong>Capacity</strong></th>
                                                <th><strong>Status</strong></th>
                                                <th><strong>Room Type</strong></th>
                                                <th><strong>Actions</strong></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $index = 1;
                                            @endphp
                                            @forelse ($rooms as $item)
                                                <tr class="text-center text-capitalize">
                                                    <td><strong>{{ $index++ }}</strong></td>
                                                    <td>
                                                        {{ $item['category']['cat_name'] . '-' . $item->room_number }}
                                                        {{-- {{ $item->category->cat_name }} ({{ $item->room_number }}) --}}
                                                    </td>
                                                    <td>

                                                        <button type="button" class="btn btn-outline-info mb-2"
                                                            data-bs-toggle="modal" data-bs-target="#basicModal-{{ $item->id }}">Click Me For
                                                            Description</button>

                                                    </td>
                                                    <td class="text-center">
                                                        {{-- &#8358;{{ $item->price_per_night }} --}}
                                                        {{-- {{ \NumberFormatter::create('en_NG', \NumberFormatter::CURRENCY)->format($item->price_per_night) }} --}}
                                                        &#8358; {{ number_format($item->price_per_night) }}
                                                    </td>
                                                    <td>{{ $item->capacity }}</td>
                                                    <td>
                                                        @if ($item->status == 'available')
                                                            <span
                                                                class="badge light badge-success">{{ $item->status }}</span>
                                                        @elseif ($item->status == 'booked')
                                                            <span
                                                                class="badge light badge-warning">{{ $item->status }}</span>
                                                        @else
                                                            <span
                                                                class="badge light badge-danger">{{ $item->status }}</span>
                                                        @endif

                                                    </td>
                                                    <td>
                                                        {{-- <div id="lightgallery"  class="row">
                                                            @php

                                                                $image = json_decode($item->images);

                                                            @endphp

                                                            @foreach ($image as $img)
                                                                <a href="{{ asset($img) }}"
                                                                    data-exthumbimage="{{ asset($img) }}"
                                                                    data-src="{{ asset($img) }}"
                                                                    class="col-lg-3 col-md-6 mb-4">
                                                                    <img src="{{ asset($img) }}" alt=""
                                                                        style="width:100%;" />
                                                            @endforeach
                                                        </div> --}}
                                                        {{ $item->room_type }}
                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button type="button" class="btn btn-success light sharp"
                                                                data-bs-toggle="dropdown">
                                                                <svg width="20px" height="20px" viewBox="0 0 24 24"
                                                                    version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none"
                                                                        fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24" height="24">
                                                                        </rect>
                                                                        <circle fill="#000000" cx="5" cy="12"
                                                                            r="2"></circle>
                                                                        <circle fill="#000000" cx="12" cy="12"
                                                                            r="2"></circle>
                                                                        <circle fill="#000000" cx="19" cy="12"
                                                                            r="2"></circle>
                                                                    </g>
                                                                </svg>
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item"
                                                                    href="{{ route('room.edit', $item->id) }}">Edit</a>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('room.del', $item->id) }}">Delete</a>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <div class="modal fade text-reset" id="basicModal-{{ $item->id }}">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Room Description(<small>{{ $item['category']['cat_name'] . '-' . $item->room_number }}</small>)</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal">
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body text-reset" style="text-align: left">{!! $item->description !!}</div>
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
                                                    <td>No Room Found</td>
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

<script src="{{ asset('dashboard/js/jquery.js') }}"></script>
