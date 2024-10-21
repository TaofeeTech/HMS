@extends('Dashboard.dashboard_main_master')
@section('Dashboard')
    <style>
        .image-preview {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
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
        @elseif (Session::has('error'))
            <div class="alert alert-danger alert-dismissible fade show">
                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none"
                    stroke-linecap="round" stroke-linejoin="round" class="me-2">
                    <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon>
                    <line x1="15" y1="9" x2="9" y2="15"></line>
                    <line x1="9" y1="9" x2="15" y2="15"></line>
                </svg>
                <strong>Error!</strong> {{ session::get('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                </button>
            </div>
        @endif

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)"><i class="mdi mdi-cogs mx-3"></i>System
                        Settings</a></li>
            </ol>
        </div>

        <div class="row">

            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Update System Settings</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ route('save.settings') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control input-rounded" value="{{ $settings->name }}" name="name">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control input-rounded" value="{{ $settings->email }}"
                                        name="email">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Phone</label>
                                    <input type="number" class="form-control input-rounded" value="{{ $settings->phone }}"
                                        name="phone">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Address</label>
                                    <input type="text" class="form-control input-rounded"
                                        value="{{ $settings->address }}" name="address">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Facebook</label>
                                    <input type="text" class="form-control input-rounded"
                                        value="{{ $settings->facebook }}" name="facebook">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Twitter</label>
                                    <input type="text" class="form-control input-rounded"
                                        value="{{ $settings->twitter }}" name="twitter">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Instagram</label>
                                    <input type="text" class="form-control input-rounded"
                                        value="{{ $settings->instagram }}" name="instagram">
                                </div>

                                <div class="row">

                                    <div class="col-6">
                                        <label class="form-label">Logo</label>
                                        <div class="input-group">
                                            <div class="form-file">
                                                <input type="file" name="logo" id="logo"
                                                    class="form-file-input form-control">
                                            </div>
                                        </div>
                                        <div class="my-3">
                                            <div class="mb-3 image-preview" id="showImage">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <label class="form-label">FavIcon</label>
                                        <div class="input-group">
                                            <div class="form-file">
                                                <input type="file" name="favicon" id="favicon"
                                                    class="form-file-input form-control">
                                            </div>
                                        </div>
                                        <div class="my-3">
                                            <div class="mb-3 image-preview" id="showImage1">
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <button type="submit" class="btn btn-primary">Save Settings</button>

                            </form>
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

            $('#logo').change(function(e) {
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

                $('#logo')[0].files = dataTransfer.files;

                // Trigger change to refresh the image preview
                $('#logo').trigger('change');
            }

            $('#favicon').change(function(e) {
                let files = Array.from(e.target.files);
                $('#showImage1').html(''); // Clear the previous images

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
                        $('#showImage1').append(imageWrapper);
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

                $('#favicon')[0].files = dataTransfer.files;

                // Trigger change to refresh the image preview
                $('#favicon').trigger('change');
            }
        });
    </script>
@endsection
