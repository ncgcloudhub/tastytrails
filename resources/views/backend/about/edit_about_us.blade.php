@extends('backend.layouts.master')
@section('title') @lang('translation.dashboards') @endsection

@section('content')
@component('backend.components.breadcrumb')
@slot('li_1')  About Us @endslot
@slot('title') Edit @endslot
@endcomponent


<div class="row">
    <div class="col-xxl-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Manage About Us</h5>
            </div>
            <div class="card-body">
                <table id="alternative-pagination" class="table responsive align-middle table-hover table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">Sl.</th>
                            <th scope="col">Title</th>
                            <th scope="col">Details</th>
                            <th scope="col">Side Image</th>
                            <th scope="col">Background Image</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($about_us as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td>
                                {!! $item->header_title !!}
                            </td>

                            <td>
                                {!! $item->details !!}
                            </td>

                            <td>
                                <img src="{{ asset('storage/' . $item->side_image) }}" alt="{{ $item->title }}" style="max-width: 100px;">
                              </td>
  
                              <td>
                                <img src="{{ asset('storage/' . $item->background_image) }}" alt="{{ $item->title }}" style="max-width: 100px;">
                              </td>

                            <td>
                                <div class="hstack gap-3 flex-wrap"> 
                                    <a href="{{ route('edit.about.us', $item->id) }}" class="fs-15"><i class="ri-edit-2-line"></i></a> 
                                   
                                </div>
                            </td>
                          
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <div class="col-xxl-6">
        <form method="POST" action="{{route('update.about.us')}}" class="row g-3" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$about_uss->id}}">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Edit About Us</h4>
            </div><!-- end card header -->
    
            <div class="card-body">
                <div class="live-preview">
    
                    <div class="form-floating mb-3">
                        <input type="text" name="header_title" class="form-control" id="header_title" value="{{$about_uss->header_title}}" placeholder="Enter Icon">
                        <label for="header_title" class="form-label">Header Title</label>
                    </div>

                    <div class="col-md-12 mb-3">
                            <label class="form-label">Details</label>
                            <textarea name="details" value="{{$about_uss->details}}" class="form-control" id="tinymceExample" rows="30">{{$about_uss->details}}</textarea>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Side Image</h4>
                          
                        </div><!-- end card header -->
                
                        <div class="card-body">
                            <p class="text-muted">Upload Side Image: 800*650</p>
                            <div class="avatar-xl mx-auto">
                                <input type="file" name="side_image"/>
                            </div>
                            <img src="{{ asset('storage/' . $about_uss->side_image) }}" alt="{{ $about_uss->title }}" style="max-width: 100px;">
                        </div>
                        <!-- end card body -->
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Background Image</h4>
                        </div><!-- end card header -->
                
                        <div class="card-body">
                            <p class="text-muted">Upload Background Image: 1920*1000</p>
                            <div class="avatar-xl mx-auto">
                                <input type="file" name="background_image"/>
                            </div>
                            <img src="{{ asset('storage/' . $about_uss->background_image) }}" alt="{{ $about_uss->title }}" style="max-width: 100px;">
                        </div>
                        <!-- end card body -->
                    </div>


                </div>
            </div>
        </div>
    
        <div class="col-12">
            <div>
                <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
            </div>
        </div>
        </form>
    </div>
</div>

@endsection



@section('script')

<script src="{{ URL::asset('build/js/app.js') }}"></script>

@endsection