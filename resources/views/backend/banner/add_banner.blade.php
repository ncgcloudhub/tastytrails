@extends('backend.layouts.master')
@section('title') Banner Add @endsection

@section('content')
@component('backend.components.breadcrumb')
@slot('li_1')  Banner @endslot
@slot('title') Add @endslot
@endcomponent

<div class="col-xxl-6">
    <form method="POST" action="{{ route('store.banner') }}" class="row g-3" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Add Banner</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="live-preview">
                    
                        <div class="col-md-12">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" id="expert_name" placeholder="Enter Banner Title">
                        </div>

                        <div class="col-md-12">
                            <label for="description" class="form-label">Short Description</label>
                            <textarea name="description" class="form-control" id="description" rows="3" placeholder="Enter Short Description"></textarea>
                        </div>
                
                </div>
            </div>
        </div>

        {{-- 3rd Card --}}
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Banner Image</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <p class="text-muted">Upload Banner Image</p>
                <div class="avatar-xl mx-auto">
                    <input type="file" name="image"/>
                </div>

            </div>
            <!-- end card body -->
        </div>
        {{-- 3rd Card End --}}
        <div class="col-12">
            <div class="text-end">
                <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add">
            </div>
        </div>
    </form>
</div>

@endsection

@section('script')
<script src="{{ URL::asset('build/libs/dropzone/dropzone-min.js') }}"></script>

    <script src="{{ URL::asset('build/js/app.js') }}"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@endsection