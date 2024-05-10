@extends('backend.layouts.master')
@section('title') @lang('translation.dashboards') @endsection

@section('content')
@component('backend.components.breadcrumb')
@slot('li_1')  Menu @endslot
@slot('title') Manage @endslot
@endcomponent

<div class="row">

    <div class="col-xxl-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Manage Menu</h5>
            </div>
            <div class="card-body">
                <table id="alternative-pagination" class="table responsive align-middle table-hover table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">Sl.</th>
                            <th scope="col">Image</th> 
                            <th scope="col">Category</th> 
                            <th scope="col">Item Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Price</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($menus as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td><img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->item_name }}" style="max-width: 100px;"></td>
                            <td>{{$item->category->menu_category_name}}</td>
                            <td>{{$item->item_name}}</td>
                            <td>{{$item->description}}</td>
                            <td>{{$item->price}}</td>
                            <td>{{$item->status}}</td>

                            <td>
                                <div class="hstack gap-3 flex-wrap"> 
                                    <a href="{{ route('edit.menu', $item->id) }}" class="fs-15"><i class="ri-edit-2-line"></i></a> 
                                    <a href="{{ route('delete.menu', $item->id) }}" onclick="return confirm('Are you sure you want to delete this Menu')" class="link-danger fs-15"><i class="ri-delete-bin-line"></i></a>
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
    <form method="POST" action="{{ route('store.menu') }}" class="row g-3" enctype="multipart/form-data">
        @csrf
    <div class="card">
        <div class="card-header align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">Add Menu</h4>
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
                        <input type="text" name="price" class="form-control" id="price" placeholder="Enter Price">
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="{{ URL::asset('build/js/app.js') }}"></script>

@endsection