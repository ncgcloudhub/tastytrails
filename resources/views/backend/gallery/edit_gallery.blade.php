@extends('backend.layouts.master')
@section('title') @lang('translation.dashboards') @endsection

@section('content')
@component('backend.components.breadcrumb')
@slot('li_1')  Gallery @endslot
@slot('title') Edit @endslot
@endcomponent


<div class="row">
    <div class="col-xxl-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Edit Gallery</h5>
            </div>
            <div class="card-body">
                <table id="alternative-pagination" class="table responsive align-middle table-hover table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">Sl.</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($gallery as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>

                              <td>
                                <a class="lightbox" href="{{ asset('storage/' . $item->image) }}">
                                    <img class="img-fluid" src="{{ asset('storage/' . $item->image) }}" alt="Gallery Images" style="max-width: 150px;">
                                </a>
                              </td>

                            <td>
                                <div class="hstack gap-3 flex-wrap"> 
                                    <a href="{{ route('edit.gallery', $item->id) }}" class="fs-15"><i class="ri-edit-2-line"></i></a> 
                                    <a href="{{ route('delete.gallery', $item->id) }}" onclick="return confirm('Are you sure you want to delete this Image')" class="link-danger fs-15"><i class="ri-delete-bin-line"></i></a>
                                   
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
        <form method="POST" action="{{route('update.gallery')}}" class="row g-3" enctype="multipart/form-data">
            @csrf
           <input type="hidden" name="id" value="{{$gallerys->id}}">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Add Gallery</h4>
            </div><!-- end card header -->
    
            <div class="card-body">
                <div class="live-preview">

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Image</h4>
                          
                        </div><!-- end card header -->
                
                        <div class="card-body">
                            <p class="text-muted">Upload Image: 1200*800</p>
                            <div class="avatar-xl mx-auto">
                                <input type="file" name="image"/>
                            </div>
                            <img src="{{ asset('storage/' . $gallerys->image) }}" style="max-width: 100px;">
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