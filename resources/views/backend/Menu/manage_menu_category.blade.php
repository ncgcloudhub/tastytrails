@extends('backend.layouts.master')
@section('title') @lang('translation.dashboards') @endsection

@section('content')
@component('backend.components.breadcrumb')
@slot('li_1')  Menu Category @endslot
@slot('title') Manage @endslot
@endcomponent

<div class="row">
<div class="col-6">
    <table class="table table-nowrap">
        <thead>
            <tr>
                <th scope="col">ID</th> 
                <th scope="col">Category Name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $item)
                
            <tr>
                <th scope="row"><a href="#" class="fw-semibold">{{$loop->index}}</a></th>
                <td>{{$item->menu_category_name}}</td>
                <td><a href="javascript:void(0);" class="link-success">Change Status<i class="ri-arrow-right-line align-middle"></i></a></td>
            </tr>
            
            @endforeach
        </tbody>
    </table>
</div>

<div class="col-6">
    <form method="POST" action="{{ route('menu.category.store') }}" class="row g-3">
        @csrf
    <div class="card">
        <div class="card-header align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">Menu Category</h4>
        </div><!-- end card header -->

        <div class="card-body">
            <div class="live-preview">
                    <div class="col-md-12">
                        <label for="menu_category_name" class="form-label">Category Name</label>
                        <input type="text" name="menu_category_name" class="form-control" id="menu_category_name" placeholder="Enter Menu Category">
                    </div>
            </div>
        </div>
    </div>

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