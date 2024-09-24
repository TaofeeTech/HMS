@extends('admin.main_master')
@section('admin')

    <style>
        .image-preview {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .image-preview img {
            max-width: 200px;
            max-height: 200px;
            object-fit: cover;
            border-radius: 4px;
        }
    </style>

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">

                @if (Session::has('error'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{ session::get('error') }}</strong>
                    </div>
                @endif

                @if ($errors->any())
                    <div>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>{{ $error }}</strong>
                                </div>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="container mt-0 mx-0 px-0 pt-0">

                    <h4>{{ Auth::guard('admin')->user()->name }}</h4>

                </div>

                <div class="row">
                    <div class="col-xl-8 col-lg-8 mx-auto">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add Room</h4>

                            </div>

                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="{{ route('rooms.add.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div class="mb-3">
                                            <input type="text" class="form-control input-default "
                                                placeholder="Room Number" name="room_number">
                                        </div>

                                        <div class="mb-3">
                                            <select name="room_type" class="form-control input-default ">
                                                <option selected>Room Type</option>
                                                <option value="single room">Single Room</option>
                                                <option value="double room">Double Room</option>
                                                <option value="deluxe room">Deluxe Room</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <select name="room_cat" class="form-control input-default ">
                                                <option selected>Room Category</option>
                                                @forelse ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->cat_name }}</option>
                                                @empty
                                                    <option disabled>No Room Category Avaliable</option>
                                                @endforelse

                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <textarea id="ckeditor" name="description" class="form-control input-default" placeholder="Room Description"></textarea>
                                        </div>

                                        <div class="mb-3">
                                            <input type="text" class="form-control input-default "
                                                placeholder="Room Price" name="price_per_night">
                                        </div>

                                        <div class="mb-3">
                                            <input type="text" class="form-control input-default "
                                                placeholder="Room Capacity" name="capacity">
                                        </div>

                                        <div class="mb-3">
                                            <input type="file" id="image" class="form-control input-default "
                                                placeholder="Room Images" name="images[]" multiple>
                                        </div>

                                        <div class="mb-3 image-preview" id="showImage">
                                            {{-- <img src="{{ asset('dashboard/images/room/room1.jpg') }}" alt="">
                                            <img src="{{ asset('dashboard/images/room/room2.jpg') }}" alt="">
                                            <img src="{{ asset('dashboard/images/room/room3.jpg') }}" alt="">
                                            <img src="{{ asset('dashboard/images/room/room4.jpg') }}" alt="">
                                            <img src="{{ asset('dashboard/images/room/room5.jpg') }}" alt=""> --}}
                                        </div>

                                        <button type="submit" class="btn btn-primary">Add Room</button>
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

<script src="{{ asset('dashboard/js/jquery.js') }}"></script>
<script>
    $(document).ready(function() {

        $('#image').change(function(e) {

            let files = e.target.files;
            $('#showImage').html('')

            for (let i = 0; i < files.length; i++) {

                let reader = new FileReader();

                reader.onload = function(e) {

                    let img = $('<img />', {
                        src: e.target.result,
                        width: '100px',
                        height: '100px'
                    });

                    $('#showImage').append(img);

                }

                reader.readAsDataURL(files[i]);

            }

        });

    });
</script>
