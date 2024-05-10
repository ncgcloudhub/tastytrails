@extends('backend.layouts.master')
@section('title') @lang('translation.dashboards') @endsection
@section('css')
<!--datatable css-->
<link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<!--datatable responsive css-->
<link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@component('backend.components.breadcrumb')
@slot('li_1')  Menu @endslot
@slot('title') Edit @endslot
@endcomponent

<a href="{{route('manage.menu')}}" class="btn btn-secondary btn-animation waves-effect waves-light mb-3" data-text="Add Menu"><span>Add Menu</span></a>

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
    <form method="POST" action="{{ route('update.menu') }}" class="row g-3" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$menu->id}}">
    <div class="card">
        <div class="card-header align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">Add Menu</h4>
        </div><!-- end card header -->

        <div class="card-body">
            <div class="live-preview">
                
                    <div class="col-md-12">
                        <select class="form-select" name="menu_category_id" data-choices aria-label="Default select example">
                            <option value="{{$menu->menu_category_id}}" selected>{{$menu->category->menu_category_name}}</option>
                            @foreach($categories as $item)
                                @if($item->id != $menu->menu_category_id)
                                    <option value="{{ $item->id }}">{{ $item->menu_category_name }}</option>
                                @endif
                            @endforeach
                        </select>
                        
                    </div>

                    <div class="col-md-12">
                        <label for="item_name" class="form-label">Item Name</label>
                        <input type="text" name="item_name" value="{{$menu->item_name}}" class="form-control" id="item_name" placeholder="Enter Item Name">
                    </div>

                    <div class="col-md-12">
                        <label for="description" class="form-label">Short Description</label>
                        <textarea name="description" class="form-control" value="{{$menu->description}}" id="description" rows="3" placeholder="Enter Short Description">{{$menu->description}}</textarea>
                    </div>

                    <div class="col-md-12">
                        <label for="price" class="form-label">Price ($)</label>
                        <input type="text" name="price" value="{{$menu->price}}" class="form-control" id="price" placeholder="Enter Price">
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
            <img src="{{ asset('storage/' . $menu->image) }}" style="max-width: 100px;">
        </div>
        <!-- end card body -->
    </div>
    {{-- 3rd Card End --}}
    <div class="col-12">
        <div class="text-end">
            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
        </div>
    </div>
</form>
</div>
</div>

@endsection

@section('script')

    <script src="{{ URL::asset('build/js/app.js') }}"></script>

    
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

<script src="{{ URL::asset('build/js/pages/datatables.init.js') }}"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@endsection