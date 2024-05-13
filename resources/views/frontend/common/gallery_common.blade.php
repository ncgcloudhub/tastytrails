@php
    $gallery = \App\Models\Gallery::all();
    $galleryLimit = 9; // Set the default limit
@endphp

@if(request()->routeIs('home')) {{-- Check if it's the home page --}}
    @php
        $gallery = $gallery->take($galleryLimit); // Limit the gallery items to 6
    @endphp
@endif

<style>
    .fixed-size img {
    width: 200px; /* Set a fixed width for the images */
    height: 200px; /* Set a fixed height for the images */
    object-fit: cover; /* Ensure that the images cover the entire container */
}

</style>

<div class="gallery-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="heading-title text-center">
                    <h2>Gallery</h2>
                    <p>Our Gallery</p>
                </div>
            </div>
        </div>
        <div class="tz-gallery">
            <div class="row">
                @foreach ($gallery as $item)
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <a class="lightbox" href="{{ asset('storage/' . $item->image) }}">
                        <img style="width: 400px; height: 280px;" class="img-fluid fixed-size" src="{{ asset('storage/' . $item->image) }}" alt="Gallery Images">
                    </a>
                </div>
                
                @endforeach
            </div>
           
        </div>
        <div class="text-center">
            <a class="btn btn-lg btn-circle btn-outline-new-white" href="{{route('gallery')}}">Show More</a>
          </div>
          
    </div>
</div>
