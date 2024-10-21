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


        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="profile card card-body px-3 pt-3 pb-0">
                    <div class="profile-head">
                        <div class="photo-content">
                            <div class="cover-photo rounded"></div>
                        </div>
                        <div class="profile-info">
                            <div class="profile-photo">
                                <img src="{{ asset($admin->image ?? 'no_image.png') }}" class="img-fluid rounded-circle"
                                    alt="">
                            </div>
                            <div class="profile-details">
                                <div class="profile-name px-3 pt-2">
                                    <h4 class="text-primary mb-0">{{ $admin->name }}</h4>
                                    <p class="text-capitalize">{{ $admin->role }}</p>
                                </div>
                                <div class="profile-email px-2 pt-2">
                                    <h4 class="text-muted mb-0">{{ $admin->email }}</h4>
                                    <p>Email</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-4">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="profile-statistics">
                                    <div class="text-center">
                                        <div class="mt-4">
                                            <a href="javascript:void(0);" class="btn btn-primary mb-1"
                                                data-bs-toggle="modal" data-bs-target="#sendMessageModal"> <i
                                                    class="fa fa-camera m-0"></i> Update Profile Image</a>
                                        </div>
                                    </div>
                                    <!-- Modal -->
                                    <div class="modal fade" id="sendMessageModal">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Update Profile Image</h5>
                                                    <button type="button" class="btn-close"
                                                        data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">

                                                    <form class="comment-form" action="{{ route('admin.update.image') }}"
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="row">

                                                            <input type="hidden" name="id"
                                                                value="{{ $admin->id }}">

                                                            <div class="col-lg-12">

                                                                <div class="mb-3 mb-0">
                                                                    <div class="form-file">
                                                                        <input type="file" name="image" id="image"
                                                                            class="form-file-input form-control">
                                                                    </div>
                                                                </div>

                                                                <div class="mb-3 mb-0">
                                                                    <div class="mb-3 image-preview" id="showImage">
                                                                    </div>
                                                                </div>

                                                                <button class="btn btn-primary" type="submit"> <i
                                                                        class="fa fa-camera m-0"></i> Update</button>

                                                            </div>


                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-tab">

                            <div class="custom-tab-1">

                                <ul class="nav nav-tabs">
                                    <li class="nav-item"><a href="#my-posts" data-bs-toggle="tab"
                                            class="nav-link">Posts</a>
                                    </li>
                                    <li class="nav-item"><a href="#about-me" data-bs-toggle="tab"
                                            class="nav-link active show">About
                                            Me</a>
                                    </li>
                                    <li class="nav-item"><a href="#profile-settings" data-bs-toggle="tab"
                                            class="nav-link ">Setting</a>
                                    </li>
                                    <li class="nav-item"><a href="#profile-password" data-bs-toggle="tab"
                                            class="nav-link ">Change Password</a>
                                    </li>
                                </ul>

                                <div class="tab-content">

                                    <div id="my-posts" class="tab-pane fade ">
                                        <div class="my-post-content pt-3">
                                            <div class="post-input">
                                                <textarea name="textarea" id="textarea" cols="30" rows="5" class="form-control bg-transparent"
                                                    placeholder="Please type what you want...."></textarea>
                                                <a href="javascript:void(0);" class="btn btn-primary light me-1 px-3"
                                                    data-bs-toggle="modal" data-bs-target="#linkModal"><i
                                                        class="fa fa-link m-0"></i> </a>
                                                <!-- Modal -->
                                                <div class="modal fade" id="linkModal">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Social Links</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal">
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <a class="btn-social facebook"
                                                                    href="javascript:void(0)"><i
                                                                        class="fa fa-facebook"></i></a>
                                                                <a class="btn-social google-plus"
                                                                    href="javascript:void(0)"><i
                                                                        class="fa fa-google-plus"></i></a>
                                                                <a class="btn-social linkedin"
                                                                    href="javascript:void(0)"><i
                                                                        class="fa fa-linkedin"></i></a>
                                                                <a class="btn-social instagram"
                                                                    href="javascript:void(0)"><i
                                                                        class="fa fa-instagram"></i></a>
                                                                <a class="btn-social twitter" href="javascript:void(0)"><i
                                                                        class="fa fa-twitter"></i></a>
                                                                <a class="btn-social youtube" href="javascript:void(0)"><i
                                                                        class="fa fa-youtube"></i></a>
                                                                <a class="btn-social whatsapp"
                                                                    href="javascript:void(0)"><i
                                                                        class="fa fa-whatsapp"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="javascript:void(0);" class="btn btn-primary light me-1 px-3"
                                                    data-bs-toggle="modal" data-bs-target="#cameraModal"><i
                                                        class="fa fa-camera m-0"></i> </a>
                                                <!-- Modal -->
                                                <div class="modal fade" id="cameraModal">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Upload images</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal">
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text">Upload</span>
                                                                    <div class="form-file">
                                                                        <input type="file"
                                                                            class="form-file-input form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="javascript:void(0);" class="btn btn-primary"
                                                    data-bs-toggle="modal" data-bs-target="#postModal">Post</a>
                                                <!-- Modal -->
                                                <div class="modal fade" id="postModal">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Post</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal">
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <textarea name="textarea" id="textarea2" cols="30" rows="5" class="form-control bg-transparent"
                                                                    placeholder="Please type what you want...."></textarea>
                                                                <a class="btn btn-primary btn-rounded"
                                                                    href="javascript:void(0)">Post</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="profile-uoloaded-post border-bottom-1 pb-5">
                                                <img src="images/profile/8.jpg" alt=""
                                                    class="img-fluid w-100 rounded">
                                                <a class="post-title" href="post-details.html">
                                                    <h3 class="text-black">Collection of textile samples lay spread</h3>
                                                </a>
                                                <p>A wonderful serenity has take possession of my entire soul like these
                                                    sweet morning of spare which enjoy whole heart.A wonderful serenity has
                                                    take possession of my entire soul like these sweet morning
                                                    of spare which enjoy whole heart.</p>
                                                <button class="btn btn-primary me-2"><span class="me-2"><i
                                                            class="fa fa-heart"></i></span>Like</button>
                                                <button class="btn btn-secondary" data-bs-toggle="modal"
                                                    data-bs-target="#replyModal"><span class="me-2"><i
                                                            class="fa fa-reply"></i></span>Reply</button>
                                            </div>
                                            <div class="profile-uoloaded-post border-bottom-1 pb-5">
                                                <img src="images/profile/9.jpg" alt=""
                                                    class="img-fluid w-100 rounded">
                                                <a class="post-title" href="post-details.html">
                                                    <h3 class="text-black">Collection of textile samples lay spread</h3>
                                                </a>
                                                <p>A wonderful serenity has take possession of my entire soul like these
                                                    sweet morning of spare which enjoy whole heart.A wonderful serenity has
                                                    take possession of my entire soul like these sweet morning
                                                    of spare which enjoy whole heart.</p>
                                                <button class="btn btn-primary me-2"><span class="me-2"><i
                                                            class="fa fa-heart"></i></span>Like</button>
                                                <button class="btn btn-secondary" data-bs-toggle="modal"
                                                    data-bs-target="#replyModal"><span class="me-2"><i
                                                            class="fa fa-reply"></i></span>Reply</button>
                                            </div>
                                            <div class="profile-uoloaded-post pb-3">
                                                <img src="images/profile/8.jpg" alt=""
                                                    class="img-fluid w-100 rounded">
                                                <a class="post-title" href="post-details.html">
                                                    <h3 class="text-black">Collection of textile samples lay spread</h3>
                                                </a>
                                                <p>A wonderful serenity has take possession of my entire soul like these
                                                    sweet morning of spare which enjoy whole heart.A wonderful serenity has
                                                    take possession of my entire soul like these sweet morning
                                                    of spare which enjoy whole heart.</p>
                                                <button class="btn btn-primary me-2"><span class="me-2"><i
                                                            class="fa fa-heart"></i></span>Like</button>
                                                <button class="btn btn-secondary" data-bs-toggle="modal"
                                                    data-bs-target="#replyModal"><span class="me-2"><i
                                                            class="fa fa-reply"></i></span>Reply</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="profile-settings" class="tab-pane fade">
                                        <div class="pt-3">
                                            <div class="settings-form">
                                                <h4 class="text-primary">Account Setting</h4>
                                                <form action="{{ route('update.admin.info') }}" method="POST">
                                                    @csrf

                                                    <input type="hidden" name="id" value="{{ $admin->id }}">

                                                    <div class="row">

                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label">Email</label>
                                                            <input type="email" placeholder="Email"
                                                                class="form-control" name="email"
                                                                value="{{ $admin->email }}" readonly>
                                                            @error('email')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>

                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label">Username</label>
                                                            <input type="text" placeholder="Username"
                                                                class="form-control" name="username"
                                                                value="{{ $admin->username }}" readonly>
                                                            @error('username')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>

                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">Address</label>
                                                        <input type="text" placeholder="1234 Main St"
                                                            class="form-control" value="{{ $admin->address }}"
                                                            name="address">
                                                        @error('address')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">Phone</label>
                                                        <input type="number" placeholder="+234-817-233-0621"
                                                            class="form-control" name="phone"
                                                            value="{{ $admin->phone }}">
                                                        @error('phone')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">Bio</label>
                                                        <textarea class="form-control" name="bio" id="ckeditor" cols="30" rows="10">{{ $admin->bio }}</textarea>
                                                        @error('bio')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>


                                                    <button class="btn btn-primary" type="submit">Update</button>

                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="about-me" class="tab-pane fade active show">

                                        <div class="profile-about-me">
                                            <div class="pt-4 border-bottom-1 pb-3">
                                                <h4 class="text-primary">About Me</h4>
                                                <p class="mb-2">{!! $admin->bio ?? 'No Bio' !!}</p>
                                            </div>

                                            <div class="profile-skills mb-5">
                                                <h4 class="text-primary mb-2">Role</h4>
                                                <a href="javascript:void(0);"
                                                    class="btn btn-primary light btn-xs mb-1">{{ $admin->role }}</a>
                                            </div>

                                            <div class="profile-lang  mb-5">
                                                <h4 class="text-primary mb-2">Language</h4>
                                                <a href="javascript:void(0);" class="text-muted pe-3 f-s-16"><i
                                                        class="flag-icon flag-icon-us"></i> English</a>
                                                <a href="javascript:void(0);" class="text-muted pe-3 f-s-16"><i
                                                        class="flag-icon flag-icon-fr"></i> French</a>
                                                <a href="javascript:void(0);" class="text-muted pe-3 f-s-16"><i
                                                        class="flag-icon flag-icon-bd"></i> Bangla</a>
                                            </div>

                                            <div class="profile-personal-info">
                                                <h4 class="text-primary mb-4">Personal Information</h4>

                                                <div class="row mb-2">
                                                    <div class="col-sm-3 col-5">
                                                        <h5 class="f-w-500">Name <span class="pull-end">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-sm-9 col-7"><span>{{ $admin->name }}</span>
                                                    </div>
                                                </div>

                                                <div class="row mb-2">
                                                    <div class="col-sm-3 col-5">
                                                        <h5 class="f-w-500">Email <span class="pull-end">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-sm-9 col-7"><span>{{ $admin->email }}</span>
                                                    </div>
                                                </div>

                                                <div class="row mb-2">
                                                    <div class="col-sm-3 col-5">
                                                        <h5 class="f-w-500">Username <span class="pull-end">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-sm-9 col-7"><span>{{ $admin->username }}</span>
                                                    </div>
                                                </div>

                                                <div class="row mb-2">
                                                    <div class="col-sm-3 col-5">
                                                        <h5 class="f-w-500">Status <span class="pull-end">:</span></h5>
                                                    </div>
                                                    @if ($admin->status == 1)
                                                        <div class="col-sm-9 col-7"><span><a href="javascript:void(0)"
                                                                    class="badge badge-xs badge-success d-inline"></a>
                                                                Active</span>
                                                        </div>
                                                    @else
                                                        <div class="col-sm-9 col-7"><span><a href="javascript:void(0)"
                                                                    class="badge badge-xs badge-danger d-inline"></a>
                                                                Inactive</span>
                                                        </div>
                                                    @endif
                                                </div>

                                                <div class="row mb-2">
                                                    <div class="col-sm-3 col-5">
                                                        <h5 class="f-w-500">Age <span class="pull-end">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-sm-9 col-7">
                                                        <span>{{ Carbon\Carbon::parse($admin->dob)->age }}</span>
                                                    </div>
                                                </div>

                                                <div class="row mb-2">
                                                    <div class="col-sm-3 col-5">
                                                        <h5 class="f-w-500">Location <span class="pull-end">:</span></h5>
                                                    </div>
                                                    <div class="col-sm-9 col-7"><span>{{ $admin->address }}</span>
                                                    </div>
                                                </div>

                                                <div class="row mb-2">
                                                    <div class="col-sm-3 col-5">
                                                        <h5 class="f-w-500">Phone <span class="pull-end">:</span></h5>
                                                    </div>
                                                    <div class="col-sm-9 col-7"><span>{{ $admin->phone }}</span>
                                                    </div>
                                                </div>

                                                <div class="row mb-2">
                                                    <div class="col-sm-3 col-5">
                                                        <h5 class="f-w-500">Year Experience <span
                                                                class="pull-end">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-sm-9 col-7"><span>Active Since,
                                                            {{ Carbon\Carbon::create($admin->created_at)->format('F j, Y') }}</span>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                    <div id="profile-password" class="tab-pane-fade">

                                        <div class="pt-3">
                                            <div class="settings-form">
                                                <h4 class="text-primary">Password Setting</h4>
                                                <form action="{{ route('update.admin.password') }}" method="post">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label class="form-label">Current Password</label>
                                                        <input type="password" class="form-control"
                                                            name="current_password">
                                                        @error('current_password')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">New Password</label>
                                                        <input type="password" class="form-control" name="password">
                                                        @error('password')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">Confirm Password</label>
                                                        <input type="password" class="form-control"
                                                            name="password_confirmation">
                                                        @error('password_confirmation')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>

                                                    <button class="btn btn-primary" type="submit">Update
                                                        Password</button>
                                                </form>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="replyModal">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Post Reply</h5>
                                                <button type="button" class="btn-close"
                                                    data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <textarea class="form-control" rows="4">Message</textarea>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger light"
                                                    data-bs-dismiss="modal">btn-close</button>
                                                <button type="button" class="btn btn-primary">Reply</button>
                                            </div>
                                        </div>
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
