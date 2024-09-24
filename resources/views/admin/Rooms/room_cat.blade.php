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
                                <h4 class="card-title">Room Categories</h4>
                                <a href="{{ route('room.cats.add') }}" class="btn light btn-primary">Add Room Category</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-responsive-md">
                                        <thead>
                                            <tr>
                                                <th style="width:80px;"><strong>#</strong></th>
                                                <th><strong>Category Name</strong></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $index = 1;
                                            @endphp
                                            @forelse ($roomCats as $item)
                                                <tr>
                                                    <td><strong>{{ $index++ }}</strong></td>
                                                    <td>{{ $item->cat_name }}</td>
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
                                                                    href="{{ route('room.cats.edit', $item->id) }}">Edit</a>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('room.cats.del', $item->id) }}">Delete</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>

                                            @empty

                                                <tr class="text-center text-danger">
                                                    <td>No Category Found</td>
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
