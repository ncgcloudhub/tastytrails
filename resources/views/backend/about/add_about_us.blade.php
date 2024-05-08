@extends('backend.layouts.master')
@section('title') @lang('translation.dashboards') @endsection

@section('content')
@component('backend.components.breadcrumb')
@slot('li_1')  Add @endslot
@slot('title') About Us @endslot
@endcomponent


<div class="row">
    <div class="col-xxl-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Manage Privacy Policy</h5>
            </div>
            <div class="card-body">
                <table id="alternative-pagination" class="table responsive align-middle table-hover table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">Sl.</th>
                            <th scope="col">Details</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($about_us as $item)
                        <tr>
                            <td>
                               
                                {{ $loop->iteration }}
                            </td>
                            <td>
                              
                                {!! $item->details !!}
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
        <form method="POST" action="{{route('store.about.us')}}" class="row g-3">
            @csrf
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Add About US</h4>
            </div><!-- end card header -->
    
            <div class="card-body">
                <div class="live-preview">
    
                    <div class="form-floating mb-3">
                        <input type="text" name="title" class="form-control" id="title" placeholder="Enter Icon">
                        <label for="title" class="form-label">Header Title</label>
                    </div>
                        <div class="col-md-12">
                            <label class="form-label">Details</label>
                            <textarea name="details" class="form-control" id="tinymceExample" rows="30"></textarea>
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
</div>

@endsection



@section('script')

<script src="{{ URL::asset('/build/js/app.js') }}"></script>

@endsection