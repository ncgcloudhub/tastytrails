@extends('backend.layouts.master')
@section('title') @lang('translation.dashboards') @endsection

@section('content')
@component('backend.components.breadcrumb')
@slot('li_1')  Banner @endslot
@slot('title') Manage @endslot
@endcomponent

<a href="{{route('add.banner')}}">Add</a>

<div class="col">
    <table class="table table-nowrap">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Image</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($banners as $item)
                
            <tr>
                <th scope="row"><a href="#" class="fw-semibold">{{$loop->index}}</a></th>
                <td><img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" style="max-width: 100px;"></td>
                <td>{{$item->title}}</td>
                <td>{{$item->description}}</td>
                <td>{{$item->status}}</td>
                <td><a href="javascript:void(0);" class="link-success">Change Status<i class="ri-arrow-right-line align-middle"></i></a></td>
            </tr>
            
            @endforeach
        </tbody>
    </table>
</div>

@endsection

@section('script')

    <script src="{{ URL::asset('build/js/app.js') }}"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@endsection