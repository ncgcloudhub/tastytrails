@extends('backend.layouts.master')
@section('title') @lang('translation.dashboards') @endsection

@section('content')
@component('backend.components.breadcrumb')
@slot('li_1')  Menu @endslot
@slot('title') Manage @endslot
@endcomponent

<div class="row">
<div class="col-12">
    <table class="table table-nowrap">
        <thead>
            <tr>
                <th scope="col">ID</th> 
                <th scope="col">Photo</th> 
                <th scope="col">Username</th> 
                <th scope="col">Email</th> 
                <th scope="col">Phone</th>
                <th scope="col">Role</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($moderators as $item)
                
            <tr>
                <th scope="row"><a href="#" class="fw-semibold">{{$loop->index}}</a></th>
                <td><img src="{{ asset('storage/' . substr($item->photo, 7)) }}" alt="{{ $item->username }}" style="max-width: 100px;"></td>
                <td>{{ $item->username }}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->phone}}</td>
                <td>{{$item->role}}</td>
                <td>{{$item->status}}</td>
                <td><a href="javascript:void(0);" class="link-success">Change Status<i class="ri-arrow-right-line align-middle"></i></a></td>
            </tr>
            
            @endforeach
        </tbody>
    </table>
</div>
</div>

@endsection

@section('script')

    <script src="{{ URL::asset('build/js/app.js') }}"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@endsection