@extends('backend.layouts.master')
@section('title') @lang('translation.dashboards') @endsection

@section('content')
@component('backend.components.breadcrumb')
@slot('li_1')  Menu @endslot
@slot('title') Manage @endslot
@endcomponent

<div class="row">
<div class="col-6">
    <table class="table table-nowrap">
        <thead>
            <tr>
                <th scope="col">ID</th> 
                <th scope="col">Image</th> 
                <th scope="col">Category</th> 
                <th scope="col">Item Name</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($menus as $item)
                
            <tr>
                <th scope="row"><a href="#" class="fw-semibold">{{$loop->index}}</a></th>
                <td><img src="{{ asset('storage/' . substr($item->image, 7)) }}" alt="{{ $item->item_name }}" style="max-width: 100px;"></td>
                <td>{{$item->category->menu_category_name}}</td>
                <td>{{$item->item_name}}</td>
                <td>{{$item->description}}</td>
                <td>{{$item->price}}</td>
                <td>{{$item->status}}</td>
                <td><a href="javascript:void(0);" class="link-success">Change Status<i class="ri-arrow-right-line align-middle"></i></a></td>
            </tr>
            
            @endforeach
        </tbody>
    </table>
</div>

<div class="col-6">
    <form method="POST" action="{{ route('menu.store') }}" class="row g-3" enctype="multipart/form-data">
        @csrf
    <div class="card">
        <div class="card-header align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">Basic Details</h4>
        </div><!-- end card header -->

        <div class="card-body">
            <div class="live-preview">
                
                    <div class="col-md-12">
                        <select class="form-select" name="menu_category_id" data-choices aria-label="Default select example">
                            <option selected="">Select Category</option>
                            @foreach($categories as $item)
                                <option value="{{ $item->id }}">{{ $item->menu_category_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-12">
                        <label for="item_name" class="form-label">Item Name</label>
                        <input type="text" name="item_name" class="form-control" id="item_name" placeholder="Enter Item Name">
                    </div>

                    <div class="col-md-12">
                        <label for="description" class="form-label">Short Description</label>
                        <textarea name="description" class="form-control" id="description" rows="3" placeholder="Enter Short Description"></textarea>
                    </div>

                    <div class="col-md-12">
                        <label for="price" class="form-label">Price ($)</label>
                        <input type="number" step="any" name="price" class="form-control" id="price" placeholder="Enter Price">
                    </div>
               
            </div>
        </div>
    </div>

    {{-- 3rd Card --}}
    <div class="card">
        <div class="card-header">
            <h4 class="card-title mb-0">Menu Image</h4>
        </div><!-- end card header -->

        <div class="card-body">
            <p class="text-muted">Upload Menu Image</p>
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
</div>

@endsection

@section('script')

    <script src="{{ URL::asset('build/js/app.js') }}"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@endsection