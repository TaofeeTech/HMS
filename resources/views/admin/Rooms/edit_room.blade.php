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
                    <div class="col-xl-8 col-lg-8 mx-auto">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Room</h4>

                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="{{ route('room.update') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $room->id }}">
                                        <div class="mb-3">
                                            <input type="text" class="form-control input-default "
                                                placeholder="Room Number" name="room_number"
                                                value='{{ $room->room_number }}' readonly>
                                        </div>
                                        <div class="mb-3">
                                            <select name="room_type" class="form-control input-default " readonly>
                                                <option selected value="{{ $room->room_type }}">{{ $room->room_type }}
                                                </option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <select name="room_cat" class="form-control input-default " readonly>
                                                <option selected value="{{ $room->room_cat }}">{{ $room['category']['cat_name'] }}
                                                </option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <textarea id="ckeditor" name="description" class="form-control input-default " placeholder="Room Description">{{ $room->description }}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" class="form-control input-default "
                                                placeholder="Room Price" name="price_per_night"
                                                value='{{ $room->price_per_night }}'>
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" class="form-control input-default "
                                                placeholder="Room Capacity" name="capacity" value='{{ $room->capacity }}'>
                                        </div>
                                        <div class="mb-3">
                                            <input type="file" id="image" class="form-control input-default "
                                                placeholder="Room Images" name="images[]" multiple>
                                        </div>
                                        <div class="mb-3 image-preview" id="showImage">

                                            @php

                                                $image = json_decode($room->images);

                                            @endphp

                                            @foreach ($image as $img)
                                                <img src="{{ asset($img) }}" alt="">
                                            @endforeach
                                        </div>

                                        <button type="submit" class="btn btn-primary">Update Room </button>
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
