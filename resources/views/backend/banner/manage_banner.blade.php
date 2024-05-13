@extends('backend.layouts.master')
@section('title') Banner Manage @endsection

@section('content')
@component('backend.components.breadcrumb')
@slot('li_1')  Banner @endslot
@slot('title') Manage @endslot
@endcomponent

<a href="{{route('add.banner')}}" class="btn btn-secondary btn-animation waves-effect waves-light mb-3" data-text="Add Banner"><span>Add Banner</span></a>

<div class="col-xxl-12">
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
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($banners as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>

                        <td><img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" style="max-width: 100px;"></td>
                        <td>{{$item->title}}</td>
                        <td>{{$item->description}}</td>
                        <td>{{$item->status}}</td>

                        <td>
                            <div class="hstack gap-3 flex-wrap"> 
                                <a href="{{ route('edit.banner', $item->id) }}" class="fs-15"><i class="ri-edit-2-line"></i></a> 
                                <a href="{{ route('delete.banner', $item->id) }}" onclick="return confirm('Are you sure you want to delete this Banner')" class="link-danger fs-15"><i class="ri-delete-bin-line"></i></a>
                               
                            </div>
                        </td>
                      
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection

@section('script')

    <script src="{{ URL::asset('build/js/app.js') }}"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@endsection