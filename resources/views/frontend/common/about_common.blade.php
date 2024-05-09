
@php
    $about_us = \App\Models\AboutUs::findOrFail(1);
@endphp



<div class="about-section-box" style="background: #ffffff url('{{ asset('storage/' . $about_us->background_image) }}') no-repeat bottom center; background-size: cover; padding: 70px 0px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 text-center">
                <div class="inner-column">
                    <h1>Welcome To <span>{{$about_us->header_title}}</span></h1>
                   
                    <p>{!!$about_us->details!!}</p>
                    <a class="btn btn-lg btn-circle btn-outline-new-white" href="#">Reservation</a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <img src="{{ asset('storage/' . $about_us->side_image) }}" alt="" class="img-fluid">
            </div>
        </div>
    </div>
</div>