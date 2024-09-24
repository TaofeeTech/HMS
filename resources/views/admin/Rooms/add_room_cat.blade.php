@extends('admin.main_master')
@section('admin')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">

                @if (Session::has('error'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{ session::get('error') }}</strong>
                    </div>
                @endif

                <div class="container mt-0 mx-0 px-0 pt-0">

                    <h4>{{ Auth::guard('admin')->user()->name }}</h4>

                </div>

                <div class="row">
                    <div class="col-xl-8 col-lg-8 mx-auto">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add Room Category</h4>

                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="{{ route('room.cats.store') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <input type="text" class="form-control input-default "
                                                placeholder="Category Name" name="cat_name">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Add </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
