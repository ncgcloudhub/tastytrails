@extends('backend.layouts.master')
@section('title') @lang('translation.dashboards') @endsection
@section('css')
<link href="{{ URL::asset('build/libs/dropzone/dropzone.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ URL::asset('build/libs/filepond/filepond.min.css') }}" type="text/css" />
<link rel="stylesheet"
    href="{{ URL::asset('build/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css') }}">
@endsection

@section('content')
@component('backend.components.breadcrumb')
@slot('li_1')  Site Settings @endslot
@slot('title') Add @endslot
@endcomponent

<div class="col-xxl-6">
    <form method="POST" action="{{route('update.settings')}}" class="row g-3" enctype="multipart/form-data">
        @csrf
    <div class="card">
        <div class="card-header align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">Site Settings</h4>
        </div><!-- end card header -->

        <div class="card-body">
            <div class="live-preview">
                
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Favicon Picture Selection</h4>
                    </div><!-- end card header -->
                    
                    <div class="card-body">
                      
                        <div class="avatar-xl mx-auto">
                            <input type="file"
                                   class="filepond filepond-input-circle"
                                   name="favicon"
                                   accept="image/png, image/jpeg, image/gif"/>
                        </div>
                
                        <!-- Display current favicon image -->
                        <div class="mt-3">
                            @if($setting->favicon)
                                <img style="border-radius: 50%" src="{{ asset('storage/app/public/upload/site/' . $setting->favicon) }}" alt="Current Favicon" width="100px" class="img-fluid"/>
                            @else
                                <p></p>
                            @endif
                        </div>

                    </div>
                    <!-- end card body -->
                </div>

                    <div class="col-md-12">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control mb-3" id="title" value="{{$setting->title}}" placeholder="Enter Character Name">
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Logo</h4>
                        </div><!-- end card header -->
                
                        <div class="card-body">
                          
                            <div class="avatar-xl mx-auto">
                                <input type="file"
                                class="filepond filepond-input-circle"
                                name="logo"
                                accept="image/png, image/jpeg, image/gif"/>
                            </div>
                            <!-- Display current favicon image -->
                            <div class="mt-3">
                                {{-- @if($setting->header_logo_light)
                                    <img style="border-radius: 50%" src="{{ asset('backend/uploads/site/' . $setting->header_logo_light) }}" alt="Current Favicon" width="100px" class="img-fluid"/>
                                @else
                                    <p></p>
                                @endif --}}
                            </div>
                
                        </div>
                        <!-- end card body -->
                    </div>


                    <div class="col-md-12">
                        <label for="Footer Text" class="form-label">Footer Text</label>
                        <input type="text" name="footer_text" class="form-control mb-3" id="footer_text" value="{{$setting->footer_text}}" placeholder="Enter Role">
                    </div>
                    <div class="col-md-12">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" name="phone" class="form-control mb-3" id="phone" value="{{$setting->phone}}" placeholder="Enter Phone">
                    </div>
                    <div class="col-md-12">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" name="email" class="form-control mb-3" id="email" value="{{$setting->email}}" placeholder="Enter Email">
                    </div>

                    <div class="col-md-12">
                        <label for="footer_text" class="form-label">Footer Text</label>
                        <input type="text" name="footer_text" class="form-control mb-3" id="footer_text" value="{{$setting->footer_text}}" placeholder="Enter Role">
                    </div>
                    <div class="col-md-12">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" name="address" class="form-control mb-3" id="address" value="{{$setting->address}}" placeholder="Enter Address">
                    </div>

                    <div class="col-md-12">
                        <label for="facebook" class="form-label">Facebook</label>
                        <input type="text" name="facebook" class="form-control mb-3" id="facebook" placeholder="Enter Role">
                    </div>

                    <div class="col-md-12">
                        <label for="instagram" class="form-label">Instagram</label>
                        <input type="text" name="instagram" class="form-control mb-3" id="instagram" placeholder="Enter Role">
                    </div>

                    <div class="col-md-12">
                        <label for="youtube" class="form-label">Youtube</label>
                        <input type="text" name="youtube" class="form-control mb-3" id="youtube" placeholder="Enter Role">
                    </div>

                    <div class="col-md-12">
                        <label for="linkedin" class="form-label">LinkedIn</label>
                        <input type="text" name="linkedin" class="form-control mb-3" id="linkedin" placeholder="Enter Role">
                    </div>

                    <div class="col-md-12">
                        <label for="twitter" class="form-label">Twitter</label>
                        <input type="text" name="twitter" class="form-control mb-3" id="twitter" placeholder="Enter Role">
                    </div>
               
            </div>
        </div>
    </div>


    
    <div class="col-12">
        <div class="text-end">
            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Save">
        </div>
    </div>
</form>
</div>

@endsection



@section('script')
<script src="{{ URL::asset('build/libs/dropzone/dropzone-min.js') }}"></script>
<script src="{{ URL::asset('build/libs/filepond/filepond.min.js') }}"></script>
<script src="{{ URL::asset('build/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js') }}">
</script>
<script
    src="{{ URL::asset('build/libs/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js') }}">
</script>
<script
    src="{{ URL::asset('build/libs/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js') }}">
</script>
<script src="{{ URL::asset('build/libs/filepond-plugin-file-encode/filepond-plugin-file-encode.min.js') }}"></script>

<script src="{{ URL::asset('build/js/pages/form-file-upload.init.js') }}"></script>
<script src="{{ URL::asset('build/js/app.js') }}"></script>

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/mammoth/1.4.3/mammoth.browser.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

@endsection