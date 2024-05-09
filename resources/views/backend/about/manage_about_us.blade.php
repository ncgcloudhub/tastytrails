@extends('backend.layouts.master')
@section('title') @lang('translation.dashboards') @endsection

@section('content')
@component('backend.components.breadcrumb')
@slot('li_1')  About Us @endslot
@slot('title') Manage @endslot
@endcomponent


<div class="row">
    <div class="col-xxl-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Manage About Us</h5>
            </div>
            <div class="card-body">
                <table id="alternative-pagination" class="table responsive align-middle table-hover table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">Sl.</th>
                            <th scope="col">Title</th>
                            <th scope="col">Details</th>
                            <th scope="col">Side Image</th>
                            <th scope="col">Background Image</th>
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
                                {!! $item->header_title !!}
                            </td>

                            <td>
                                {!! $item->details !!}
                            </td>

                            <td>
                              <img src="{{ asset('storage/' . $item->side_image) }}" alt="{{ $item->title }}" style="max-width: 100px;">
                            </td>

                            <td>
                              <img src="{{ asset('storage/' . $item->background_image) }}" alt="{{ $item->title }}" style="max-width: 100px;">
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
    
    
</div>

@endsection



@section('script')

<script src="{{ URL::asset('/build/js/app.js') }}"></script>

@endsection