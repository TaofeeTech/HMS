@extends('Dashboard.dashboard_main_master')
@section('Dashboard')
    <style>
        .image-preview {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .image-preview .image-wrapper {
            position: relative;
            max-width: 200px;
            max-height: 200px;
        }

        .image-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 4px;
        }

        .image-preview .remove-btn {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: red;
            color: white;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            width: 20px;
            height: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">

                @if (Session::has('error'))
                    <div class="alert alert-danger alert-dismissible fade show">
                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2"
                            fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2">
                            <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2">
                            </polygon>
                            <line x1="15" y1="9" x2="9" y2="15"></line>
                            <line x1="9" y1="9" x2="15" y2="15"></line>
                        </svg>
                        <strong>Error!</strong> {{ session::get('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                        </button>
                    </div>
                @endif

                <div class="row">

                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Room Details</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="POST" action="{{ route('update.room.details') }}"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <input type="hidden" name="id" value="{{ $room->id }}">

                                        <div class="row">

                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Room Number</label>
                                                <input type="number" name="room_number" class="form-control"
                                                    value="{{ $room->room_number }}" readonly>
                                                @error('room_number')
                                                    {{ $message }}
                                                @enderror
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Room Category</label>
                                                @error('room_category_id')
                                                    {{ $message }}
                                                @enderror
                                                <select name="room_category_id" class=" form-control ">
                                                    <option selected value="{{ $room->room_category_id }}">
                                                        {{ $room['category']['title'] }}</option>
                                                </select>
                                                @error('room_category_id')
                                                    {{ $message }}
                                                @enderror
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Room Type</label>
                                                @error('type')
                                                    {{ $message }}
                                                @enderror
                                                <select name="type" class=" form-control ">
                                                    <option selected value="{{ $room->type }}">{{ $room->type }}
                                                    </option>
                                                </select>
                                                @error('type')
                                                    {{ $message }}
                                                @enderror
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Price</label>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-text">&#8358;</div>
                                                    <input type="number" name="price" class="form-control"
                                                        value="{{ $room->price }}">
                                                </div>
                                                @error('price')
                                                    {{ $message }}
                                                @enderror
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Number of Bed</label>
                                                <input type="number" name="bed" value="{{ $room->bed }}"
                                                    class="form-control" placeholder="2">
                                                @error('bed')
                                                    {{ $message }}
                                                @enderror
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Number of Bathroom</label>
                                                <input type="number" name="bathroom" value="{{ $room->bathroom }}"
                                                    class="form-control" placeholder="2">
                                                @error('bathroom')
                                                    {{ $message }}
                                                @enderror
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Images</label>
                                                <div class="form-file">
                                                    <input type="file" class="form-file-input form-control"
                                                        name="image[]" id="image" multiple>
                                                </div>
                                                @error('image')
                                                    {{ $message }}
                                                @enderror
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Capacity</label>
                                                <input type="number" name="capacity" class="form-control"
                                                    value="{{ $room->capacity }}">
                                                @error('capacity')
                                                    {{ $message }}
                                                @enderror
                                            </div>

                                            <div class="mb-3 image-preview" id="showImage">


                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="mb-12 col-md-12">
                                                <label class="form-label">Short Description</label>
                                                {{-- <input type="text" id="ckeditor" name="description"
                                                    placeholder="Room Description"  > --}}
                                                <textarea name="short_description" class="form-control" cols="30" rows="10">{{ $room->short_description }}</textarea>
                                                @error('short_description')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="mb-12 col-md-12">
                                                <label class="form-label">Description</label>
                                                {{-- <input type="text" id="ckeditor" name="description"
                                                    placeholder="Room Description"  > --}}
                                                <textarea name="description" class="form-control" id="ckeditor" cols="30" rows="10">{{ $room->description }}</textarea>
                                                @error('description')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mt-3">

                                            <label class="form-check-label" for="customCheckBox3">Room Features</label>

                                            <div class="col-12 col-md-12 col-lg-12 d-flex gap-4 justify-content-center">
                                                @php
                                                    $features = json_decode($room->features, true);

                                                @endphp

                                                @if ($features)
                                                    <div class="form-check custom-checkbox mb-3 checkbox-success">
                                                        <input type="checkbox" class="form-check-input" id="swimmingPool"
                                                            name="swim"
                                                            {{ in_array('Swimming Pool', array_column($features, 'name')) ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="swimmingPool">Swimming
                                                            Pool</label>
                                                    </div>

                                                    <div class="form-check custom-checkbox mb-3 checkbox-success">
                                                        <input type="checkbox" class="form-check-input" id="wifi"
                                                            name="wifi"
                                                            {{ in_array('Wifi', array_column($features, 'name')) ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="wifi">Wifi</label>
                                                    </div>

                                                    <div class="form-check custom-checkbox mb-3 checkbox-success">
                                                        <input type="checkbox" class="form-check-input" id="food"
                                                            name="food"
                                                            {{ in_array('Lunch & Breakfast', array_column($features, 'name')) ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="food">Lunch &
                                                            Breakfast</label>
                                                    </div>

                                                    <div class="form-check custom-checkbox mb-3 checkbox-success">
                                                        <input type="checkbox" class="form-check-input" id="fitness"
                                                            name="fitness"
                                                            {{ in_array('Fitness Center', array_column($features, 'name')) ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="fitness">Fitness Center</label>
                                                    </div>
                                                @else
                                                    <div class="form-check custom-checkbox mb-3 checkbox-success">
                                                        <input type="checkbox" class="form-check-input" id="swimmingPool"
                                                            name="swim">
                                                        <label class="form-check-label" for="swimmingPool">Swimming
                                                            Pool</label>
                                                    </div>

                                                    <div class="form-check custom-checkbox mb-3 checkbox-success">
                                                        <input type="checkbox" class="form-check-input" id="wifi"
                                                            name="wifi">
                                                        <label class="form-check-label" for="wifi">Wifi</label>
                                                    </div>

                                                    <div class="form-check custom-checkbox mb-3 checkbox-success">
                                                        <input type="checkbox" class="form-check-input" id="food"
                                                            name="food">
                                                        <label class="form-check-label" for="food">Lunch &
                                                            Breakfast</label>
                                                    </div>

                                                    <div class="form-check custom-checkbox mb-3 checkbox-success">
                                                        <input type="checkbox" class="form-check-input" id="fitness"
                                                            name="fitness">
                                                        <label class="form-check-label" for="fitness">Fitness
                                                            Center</label>
                                                    </div>
                                                @endif

                                            </div>

                                        </div>

                                        <br>
                                        <br>
                                        <br>

                                        <center>
                                            <button type="submit" class="btn btn-primary">Update Room Details</button>
                                        </center>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('Dashboard/js/jquery.js') }}"></script>
    <script>
        $(document).ready(function() {
            let selectedFiles = [];

            @php
                $image = json_decode($room->image);
            @endphp


            // Convert the PHP array to JavaScript array correctly
            let defaultImages = [
                @foreach ($image as $item)
                    "{{ asset($item) }}",
                @endforeach
            ];

            // Display default images
            defaultImages.forEach((image, index) => {
                let imageWrapper = $('<div class="image-wrapper"></div>');
                let img = $('<img />', {
                    src: image, // Properly formatted image path
                    alt: 'Default Image',
                });

                imageWrapper.append(img);
                $('#showImage').append(imageWrapper);
            });

            $('#image').change(function(e) {
                let files = Array.from(e.target.files);
                $('#showImage').html(''); // Clear the previous images

                selectedFiles = files; // Store the selected files

                files.forEach((file, index) => {
                    let reader = new FileReader();

                    reader.onload = function(e) {
                        let imageWrapper = $('<div class="image-wrapper"></div>');
                        let img = $('<img />', {
                            src: e.target.result,
                            alt: 'Selected Image',
                        });

                        let removeBtn = $('<button class="remove-btn">&times;</button>');

                        // Remove image on button click
                        removeBtn.click(function() {
                            removeImage(index);
                        });

                        imageWrapper.append(img).append(removeBtn);
                        $('#showImage').append(imageWrapper);
                    };

                    reader.readAsDataURL(file);
                });
            });

            // Function to remove an image
            function removeImage(index) {
                selectedFiles.splice(index, 1); // Remove the file from selectedFiles

                // Reset the file input to contain the remaining files
                let dataTransfer = new DataTransfer();
                selectedFiles.forEach(file => dataTransfer.items.add(file));

                $('#image')[0].files = dataTransfer.files;

                // Trigger change to refresh the image preview
                $('#image').trigger('change');
            }
        });
    </script>
@endsection
