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
@slot('li_1')  Menu Category @endslot
@slot('title') Manage @endslot
@endcomponent

<a href="{{route('manage.menu.category')}}" class="btn btn-secondary btn-animation waves-effect waves-light mb-3" data-text="Add Menu Category"><span>Add Menu Category</span></a>


<div class="row">

    <div class="col-xxl-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Manage Menu Category</h5>
            </div>
            <div class="card-body">
                <table id="alternative-pagination" class="table responsive align-middle table-hover table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">Sl.</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($category as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>

                              <td>
                                {{$item->menu_category_name}}
                              </td>

                            <td>
                                <div class="hstack gap-3 flex-wrap"> 
                                    <a href="{{ route('edit.menu.category', $item->id) }}" class="fs-15"><i class="ri-edit-2-line"></i></a> 
                                    <a href="{{ route('delete.menu.category', $item->id) }}" onclick="return confirm('Are you sure you want to delete this Menu Category')" class="link-danger fs-15"><i class="ri-delete-bin-line"></i></a>
                                   
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
        <form method="POST" action="{{ route('update.menu.category') }}" class="row g-3">
            @csrf
            <input type="hidden" name="id" value="{{$categories->id}}">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Edit Menu Category</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="live-preview">
                        <div class="col-md-12">
                            <label for="menu_category_name" class="form-label">Category Name</label>
                            <input type="text" name="menu_category_name" value="{{$categories->menu_category_name}}" class="form-control" id="menu_category_name" placeholder="Enter Menu Category">
                        </div>
                </div>

                <div class="live-preview">
                    <div class="col-md-12">
                        <label for="description" class="form-label">Category Description</label>
                        <input type="text" name="description" value="{{$categories->description}}" class="form-control" id="description" placeholder="Enter Menu Description">
                    </div>
                </div>
            </div>
        
        </div>

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