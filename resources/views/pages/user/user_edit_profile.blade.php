<style>
    span.isvalid::after {
        content: '✓';
        color: #198754;
        top: 25px !important;
        right: 20px !important;
        position: absolute;
        font-size: 30px;
    }

    span.notvalid:after {
        content: '×';
        color: #dc3545;
        top: 25px !important;
        right: 20px !important;
        position: absolute;
        font-size: 30px;

    }

    .isvalid input[name=current_password] {
        border: 2px solid green;
    }

    .notvalid input[name=current_password] {
        border: 2px solid red;
    }
</style>
<x-backend-layout>
    <!-- Hero -->
    <div class="bg-image" style="background-image: url('assets/images/photo8@2x.jpg');">
        <div class="bg-black-75">
            <div class="content content-full text-center">
                <div class="my-3">
                    <img class="img-avatar img-avatar-thumb" src="assets/images/avatar13.jpg" alt="">
                </div>
                <h1 class="h2 text-white mb-0">Edit Account</h1>
                <h2 class="h4 font-w400 text-white-75">
                    John Parker
                </h2>
                <a class="btn btn-light" href="be_pages_generic_profile.html">
                    <i class="fa fa-fw fa-arrow-left text-danger"></i> Back to Profile
                </a>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content content-boxed">
        <!-- User Profile -->
        <div class="block block-rounded">
            <div class="block-header">
                <h3 class="block-title">User Profile</h3>
            </div>
            <div class="block-content">
                <form action="{{route('user.update.profile')}}" method="POST" id="profile-form-id" enctype="multipart/form-data">
                    <div class="row push">
                        <div class="col-lg-4">
                            <p class="font-size-sm text-muted">
                                Your account’s vital info. Your username will be publicly visible.
                            </p>
                        </div>
                        <div class="col-lg-8 col-xl-5">
                            <div class="form-group">
                                <!-- <input type="text" class="form-control" id="id" name="id" 
                                       placeholder="Enter your username.." value="{{$user_data->id??''}}"> -->
                                <label for="first_name">First Name</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter your username.." value="{{$user_data->first_name??''}}">
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter your name.." value="{{$user_data->last_name??''}}">
                            </div>
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email.." value="{{$user_data->email??''}}">
                            </div>
                            <div class="form-group">
                                <label for="phone_number">Phone Number</label>
                                <input type="text" oninput="this.value = this.value.replace(/[^0-9+]/g, '').replace(/(\..*)\./g, '$1');" class="form-control" id="phone_number" name="phone_number" placeholder="Enter your Contact Number.." value="{{$user_data->phone_number??''}}">
                            </div>
                            <div class="form-group">
                                <!-- <label>Your Avatar</label>
                                <div class="push">
                                    <img class="img-avatar" src="assets/images/avatar13.jpg" alt="">
                                </div> -->

                                <input type="file" name="image_file" id="image-file" value="" class="filepond">

                                <input type="hidden" name="current_profile_image" value="{{basename($user_data->image_path??'')}}">
                                <!-- <input type="text" name="temp_value[]" value="" id="temp_value">
 -->

                            </div>
                            <div class="form-group">
                                <x-button class="btn btn-alt-primary" onclick="validateFieldsByFormId(this)" data-validation="validation-span-id" id="validation-span-id">
                                    {{ __('Update') }}
                                </x-button>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- END User Profile -->

        <!-- Change Password -->
        <div class="block block-rounded">
            <div class="block-header">
                <h3 class="block-title">Change Password</h3>
            </div>
            <div class="block-content">
                <form id="password-form-id" action="{{route('user.update.password')}}" method="POST">
                    <div class="row push">
                        <div class="col-lg-4">
                            <p class="font-size-sm text-muted">
                                Changing your sign in password is an easy way to keep your account secure.
                            </p>
                        </div>
                        <div class="col-lg-8 col-xl-5">
                            <div class="form-group">
                                <label for="current-password">Current Password</label>
                                <span id="isValid" class=""><input type="password" class="form-control position-relative" id="current_password" name="current_password"></span>
                                <p id="password_result"></p>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="password">New Password</label>
                                    <input type="password" class="form-control" id="new_password" name="new_password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="confirm-password">Confirm New Password</label>
                                    <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                                </div>
                            </div>
                            <div class="form-group">
                                <x-button class="btn btn-alt-primary" onclick="validateFieldsByFormId(this)" data-validation="validation-span-id-2" id="validation-span-id-2">
                                    {{ __('Update') }}
                                </x-button>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- END Change Password -->


    </div>
    <!-- END Page Content -->
    @section('css_after')
    <link href="{{asset('assets/css/filepond.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/filepond-plugin-image-preview.css')}}" rel="stylesheet">
    @endsection
    @push('js_after_stack')
    <script src="{{asset('assets/js/filepond-polyfill.min.js')}}"></script>
    <script src="{{asset('assets/js/filepond-plugin-file-validate-size.js')}}"></script>
    <script src="{{asset('assets/js/filepond-plugin-file-validate-type.js')}}"></script>
    <script src="{{asset('assets/js/filepond-plugin-image-exif-orientation.js')}}"></script>
    <script src="{{asset('assets/js/filepond-plugin-image-preview.js')}}"></script>
    <script src="{{asset('assets/js/filepond.min.js')}}"></script>

    <script>
        $(document).ready(function() {
            FilePond.registerPlugin(FilePondPluginFileValidateSize);
            FilePond.registerPlugin(FilePondPluginFileValidateType);
            FilePond.registerPlugin(FilePondPluginImageExifOrientation);
            FilePond.registerPlugin(FilePondPluginImagePreview);
            FilePond.setOptions({
                name: "image_file",
                allowMultiple: false,
                acceptedFileTypes: [
                    'image/png',
                    'image/jpeg',
                    'image/gif'
                ],
                fileValidateTypeLabelExpectedTypesMap: {
                    'image/jpeg': null,
                    'image/png': null,
                    'image/gif': null
                },

                maxFileSize: "8MB",
                server: {
                    process: function(fieldName, file, metadata, load, error, progress, abort) {
                        // fieldName is the name of the input field
                        // file is the actual file object to send

                        const formData = new FormData();
                        formData.append('image_file', file, file.name);
                        const request = new XMLHttpRequest();
                        request.open('POST', '/api/image/process/' + authUserId);

                        // Should call the progress method to update the progress to 100% before calling load
                        // Setting computable to false switches the loading indicator to infinite mode
                        request.upload.onprogress = function(e) {
                            progress(e.lengthComputable, e.loaded, e.total);

                        };
                        // Should call the load method when done and pass the returned server file id
                        // this server file id is then used later on when reverting or restoring a file
                        // so your server knows which file to return without exposing that info to the client
                        request.onload = function(scope) {
                            if (request.status >= 200 && request.status < 300) {
                                // the load method accepts either a string (id) or an object
                                load(JSON.parse(request.responseText));
                                console.log("ok");
                            } else {
                                // Can call the error method if something is wrong, should exit after
                                error('Failed to upload image.');
                            }
                        };
                        request.send(formData);
                        // Should expose an abort method so the request can be cancelled
                        return {
                            abort: function() {
                                // This function is entered if the user has tapped the cancel button
                                request.abort();
                                // Let FilePond know the request has been cancelled
                                abort();
                            }
                        };

                    },
                    load: '/api/profile/images/',
                    revert: '/api/image/process/',
                    // restore: '/api/profile/images/',
                }
            });
            $('input[type="file"]').each(function() {
                var tempImageId = $(this).nextAll("input[name='temp_value[]']:first").val();
                var imageId = $(this).next("input[type='hidden']").val();
                var filePond;
                if (tempImageId) {
                    filePond = FilePond.create(this, {
                        files: [{
                            source: tempImageId,
                            options: {
                                type: 'limbo'
                            }
                        }],
                    });
                } else if (imageId) {
                    filePond = FilePond.create(this, {
                        files: [{
                            source: imageId,
                            options: {
                                type: 'local'
                            }
                        }],
                    });
                } else {
                    filePond = FilePond.create(this);
                }
                var parent = filePond;
                filePond.onprocessfile = function(error, file) {
                    if (!error) {

                        $(parent.element).nextAll("input[name='temp_value[]']:first").val(file.serverId);
                    }
                    console.log("double ok");
                    // document.getElementById("temp_value").value = file.serverId;
                };
                // filePond.onremovefile = function(error, file){
                //     console.log("chala k nai"+ file.serverId);
                //     filePond.removeFile(file.serverId);
                // };
                filePond.onprocessfilerevert = function(file) {
                    $(parent.element).nextAll("input[name='temp_value[]']:first").val(null);
                    console.log('test this');
                }
            });
        })
    </script>
    @endpush
</x-backend-layout>