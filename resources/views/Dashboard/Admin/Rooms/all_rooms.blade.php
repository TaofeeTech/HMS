@extends('Dashboard.dashboard_main_master')
@section('Dashboard')
    <div class="container-fluid">

        @if (Session::has('mssg'))
            <div class="alert alert-success alert-dismissible fade show">
                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none"
                    stroke-linecap="round" stroke-linejoin="round" class="me-2">
                    <polyline points="9 11 12 14 22 4"></polyline>
                    <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                </svg>
                <strong>Success!</strong> {{ session::get('mssg') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                </button>
            </div>
        @endif

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)"><i class="mdi mdi-room-service mx-3"></i>All
                        Rooms</a></li>
            </ol>
        </div>

        <div class="mt-4 d-flex justify-content-between align-items-center flex-wrap">
            <div class="card-action coin-tabs mb-2">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#AllRooms">All Rooms</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#BookedRooms">Booked Rooms</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#AvaliableRooms">Avaliable Rooms</a>
                    </li>
                </ul>
            </div>

            <div class="d-flex align-items-center mb-2">
                <a href="{{ route('add.room.details') }}" class="btn btn-secondary">+ New Room</a>
                <div class="newest ms-3">
                    <select class="default-select">
                        <option>Newest</option>
                        <option>Oldest</option>
                    </select>
                </div>
            </div>

        </div>


        <div class="row mt-4">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="tab-content">

                            @if ($rooms->count() > 0)
                                <div class="tab-pane fade active show" id="AllRooms">
                                    <div class="table-responsive">
                                        <table class="table card-table display mb-4 shadow-hover table-responsive-lg"
                                            id="guestTable-all3">
                                            <thead>
                                                <tr>
                                                    {{-- <th class="bg-none">
                                                        <div class="form-check style-1">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="checkAll3">
                                                        </div>
                                                    </th> --}}
                                                    <th>Room Name</th>
                                                    <th>Bed Type</th>
                                                    <th>Capacity</th>
                                                    <th>Facilities</th>
                                                    <th>Rate</th>
                                                    <th>Status</th>
                                                    <th class="bg-none"></th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($rooms as $item)
                                                    <tr>
                                                        @php
                                                            $image = json_decode($item->image);
                                                        @endphp
                                                        {{-- <td>
                                                            <div class="form-check style-1">
                                                                <input class="form-check-input" type="checkbox" value="">
                                                            </div>
                                                        </td> --}}
                                                        <td>
                                                            <div class="room-list-bx d-flex align-items-center">
                                                                <img class="me-3 rounded"
                                                                    src="{{ asset(collect($image)->first()) }}"
                                                                    alt=""
                                                                    style="object-fit: cover">
                                                                <div>
                                                                    <span
                                                                        class=" text-secondary fs-14 d-block">#{{ $item->room_number }}</span>
                                                                    <span
                                                                        class=" fs-16 font-w500 text-nowrap text-capitalize">{{ $item['category']['title'] }}-{{ $item->room_number }}</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="">
                                                            <span
                                                                class="fs-16 font-w500 text-nowrap text-capitalize">{{ $item->type }}
                                                                bed </span>
                                                        </td>
                                                        <td>
                                                            <div class="text-center">

                                                                <span class="fs-16 font-w500">{{ $item->capacity }} </span>
                                                            </div>
                                                        </td>
                                                        <td class="facility">
                                                            <div>
                                                                <span class="fs-16 comments">
                                                                    @php
                                                                        $features = $item->features;
                                                                        $feature = json_decode($features, true);
                                                                    @endphp
                                                                    @if ($feature)
                                                                        @php
                                                                            $featureNames = array_column(
                                                                                $feature,
                                                                                'name',
                                                                            );
                                                                            if (count($featureNames) > 1) {
                                                                                $lastFeature = array_pop($featureNames);
                                                                                $formattedFeatures =
                                                                                    implode(', ', $featureNames) .
                                                                                    ', ' .
                                                                                    $lastFeature;
                                                                            } else {
                                                                                $formattedFeatures = implode(
                                                                                    ', ',
                                                                                    $featureNames,
                                                                                );
                                                                            }
                                                                        @endphp
                                                                        {{ $formattedFeatures }}
                                                                    @else
                                                                        <p>No features available</p>
                                                                    @endif
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="">
                                                                <span
                                                                    class="font-w500">&#8358;{{ number_format($item->price, 2) }}<small
                                                                        class="fs-14 ms-2">/night</small></span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            @if ($item->is_available == 1)
                                                                <a href="javascript:void(0);"
                                                                    class="btn btn-success btn-md">AVAILABLE</a>
                                                            @else
                                                                <a href="javascript:void(0);"
                                                                    class="btn btn-danger btn-md">BOOKED</a>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <div class="dropdown dropend">
                                                                <a href="javascript:void(0);" class="btn-link"
                                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z"
                                                                            stroke="#262626" stroke-width="2"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                        <path
                                                                            d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z"
                                                                            stroke="#262626" stroke-width="2"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                        <path
                                                                            d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z"
                                                                            stroke="#262626" stroke-width="2"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                    </svg>
                                                                </a>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('edit.room.details', $item->id) }}">Edit</a>
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('delete.room', $item->id) }}">Delete</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach


                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="tab-pane" id="BookedRooms">
                                    <div class="table-responsive">
                                        <table class="table card-table display mb-4 shadow-hover table-responsive-lg"
                                            id="guestTable-all1">
                                            <thead>
                                                <tr>
                                                    <th class="bg-none">
                                                        {{-- <div class="form-check style-1">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="" id="checkAll1">
                                                        </div> --}}
                                                    </th>
                                                    <th>Room Name</th>
                                                    <th>Bed Type</th>
                                                    <th>Capacity</th>
                                                    <th>Facilities</th>
                                                    <th>Rate</th>
                                                    <th>Status</th>
                                                    <th class="bg-none"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($bookedRooms as $item)
                                                    <tr>
                                                        {{-- <td>
                                                            <div class="form-check style-1">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="">
                                                            </div>
                                                        </td> --}}
                                                        <td> @php
                                                            $image = json_decode($item->image);
                                                        @endphp
                                                            <div class="room-list-bx d-flex align-items-center">
                                                                <img class="me-3 rounded" src="{{ asset(collect($image)->first()) }}"
                                                                    alt=""
                                                                    style="object-fit: cover">
                                                                <div>
                                                                    <span
                                                                        class=" text-secondary fs-14 d-block">#{{ $item->room_number }}</span>
                                                                    <span
                                                                        class=" fs-16 font-w500 text-nowrap text-capitalize">{{ $item['category']['title'] }}-{{ $item->room_number }}</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="">
                                                            <span
                                                                class="fs-16 font-w500 text-nowrap text-capitalize">{{ $item->type }}
                                                                bed </span>
                                                        </td>
                                                        <td>
                                                            <div class="text-center">

                                                                <span class="fs-16 font-w500">{{ $item->capacity }}
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td class="facility">
                                                            <div>
                                                                <span class="fs-16 comments">
                                                                    @php
                                                                        $features = $item->features;
                                                                        $feature = json_decode($features, true);
                                                                    @endphp
                                                                    @if ($feature)
                                                                        @php
                                                                            $featureNames = array_column(
                                                                                $feature,
                                                                                'name',
                                                                            );
                                                                            if (count($featureNames) > 1) {
                                                                                $lastFeature = array_pop($featureNames);
                                                                                $formattedFeatures =
                                                                                    implode(', ', $featureNames) .
                                                                                    ', ' .
                                                                                    $lastFeature;
                                                                            } else {
                                                                                $formattedFeatures = implode(
                                                                                    ', ',
                                                                                    $featureNames,
                                                                                );
                                                                            }
                                                                        @endphp
                                                                        {{ $formattedFeatures }}
                                                                    @else
                                                                        <p>No features available</p>
                                                                    @endif
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="">
                                                                <span
                                                                    class="font-w500">&#8358;{{ number_format($item->price, 2) }}<small
                                                                        class="fs-14 ms-2">/night</small></span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            @if ($item->is_available == 1)
                                                                <a href="javascript:void(0);"
                                                                    class="btn btn-success btn-md">AVAILABLE</a>
                                                            @else
                                                                <a href="javascript:void(0);"
                                                                    class="btn btn-danger btn-md">BOOKED</a>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <div class="dropdown dropend">
                                                                <a href="javascript:void(0);" class="btn-link"
                                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <svg width="24" height="24"
                                                                        viewBox="0 0 24 24" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z"
                                                                            stroke="#262626" stroke-width="2"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                        <path
                                                                            d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z"
                                                                            stroke="#262626" stroke-width="2"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                        <path
                                                                            d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z"
                                                                            stroke="#262626" stroke-width="2"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                    </svg>
                                                                </a>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('edit.room.details', $item->id) }}">Edit</a>
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('delete.room', $item->id) }}">Delete</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="tab-pane" id="AvaliableRooms">
                                    <div class="table-responsive">
                                        <table class="table card-table display mb-4 shadow-hover table-responsive-lg"
                                            id="guestTable-all2">
                                            <thead>
                                                <tr>
                                                    {{-- <th class="bg-none">
                                                        <div class="form-check style-1">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="" id="checkAll2">
                                                        </div>
                                                    </th> --}}
                                                    <th>Room Name</th>
                                                    <th>Bed Type</th>
                                                    <th>Capacity</th>
                                                    <th>Facilities</th>
                                                    <th>Rate</th>
                                                    <th>Status</th>
                                                    <th class="bg-none"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($avaliableRooms as $item)
                                                    <tr>
                                                        {{-- <td>
                                                            <div class="form-check style-1">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="">
                                                            </div>
                                                        </td> --}}
                                                        <td>
                                                            @php
                                                            $image = json_decode($item->image);
                                                        @endphp
                                                            <div class="room-list-bx d-flex align-items-center">
                                                                <img class="me-3 rounded" src="{{ asset(collect($image)->first()) }}"
                                                                    alt=""
                                                                    style="object-fit: cover">
                                                                <div>
                                                                    <span
                                                                        class=" text-secondary fs-14 d-block">#{{ $item->room_number }}</span>
                                                                    <span
                                                                        class=" fs-16 font-w500 text-nowrap text-capitalize">{{ $item['category']['title'] }}-{{ $item->room_number }}</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="">
                                                            <span
                                                                class="fs-16 font-w500 text-nowrap text-capitalize">{{ $item->type }}
                                                                bed </span>
                                                        </td>
                                                        <td>
                                                            <div class="text-center">

                                                                <span class="fs-16 font-w500">{{ $item->capacity }}
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td class="facility">
                                                            <div>
                                                                <span class="fs-16 comments">
                                                                    @php
                                                                        $features = $item->features;
                                                                        $feature = json_decode($features, true);
                                                                    @endphp
                                                                    @if ($feature)
                                                                        @php
                                                                            $featureNames = array_column(
                                                                                $feature,
                                                                                'name',
                                                                            );
                                                                            if (count($featureNames) > 1) {
                                                                                $lastFeature = array_pop($featureNames);
                                                                                $formattedFeatures =
                                                                                    implode(', ', $featureNames) .
                                                                                    ', ' .
                                                                                    $lastFeature;
                                                                            } else {
                                                                                $formattedFeatures = implode(
                                                                                    ', ',
                                                                                    $featureNames,
                                                                                );
                                                                            }
                                                                        @endphp
                                                                        {{ $formattedFeatures }}
                                                                    @else
                                                                        <p>No features available</p>
                                                                    @endif
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="">
                                                                <span
                                                                    class="font-w500">&#8358;{{ number_format($item->price, 2) }}<small
                                                                        class="fs-14 ms-2">/night</small></span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            @if ($item->is_available == 1)
                                                                <a href="javascript:void(0);"
                                                                    class="btn btn-success btn-md">AVAILABLE</a>
                                                            @else
                                                                <a href="javascript:void(0);"
                                                                    class="btn btn-danger btn-md">BOOKED</a>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <div class="dropdown dropend">
                                                                <a href="javascript:void(0);" class="btn-link"
                                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <svg width="24" height="24"
                                                                        viewBox="0 0 24 24" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z"
                                                                            stroke="#262626" stroke-width="2"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                        <path
                                                                            d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z"
                                                                            stroke="#262626" stroke-width="2"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                        <path
                                                                            d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z"
                                                                            stroke="#262626" stroke-width="2"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                    </svg>
                                                                </a>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('delete.room', $item->id) }}">Edit</a>
                                                                    <a class="dropdown-item"
                                                                        href="javascript:void(0);">Delete</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @else
                                <div class="container">
                                    <p class="lead text-danger display-3 text-center">No Rooms!</p>
                                </div>
                            @endif


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
