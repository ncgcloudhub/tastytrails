@include('frontend.common.header')

@php
    $buttons = [
        [
            'text' => 'Menu',
            'route' => route('menu')
        ],
        [
            'text' => 'Gallery',
            'route' => route('gallery')
        ],
        [
            'text' => 'Contact Us',
            'route' => route('contact')
        ]
    ];
@endphp

<body>
	<!-- Start header -->
	@include('frontend.common.navbar')
	<!-- End header -->
	
	<!-- Start slides -->
	<div id="slides" class="cover-slides">
		<ul class="slides-container">
			@foreach ($banners as $key => $item)
				<li class="text-left">
					<img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<h1 class="m-b-20"><strong>{{$item->title}}</strong></h1>
								<p class="m-b-40">{{$item->description}}.</p>
								@if(isset($buttons[$key]))
									<p><a class="btn btn-lg btn-circle btn-outline-new-white" href="{{ $buttons[$key]['route'] }}">{{ $buttons[$key]['text'] }}</a></p>
								@endif
							</div>
						</div>
					</div>
				</li>
			@endforeach
		</ul>
		<div class="slides-navigation">
			<a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
			<a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
		</div>
	</div>
	<!-- End slides -->
	
	<!-- Start About -->
	@include('frontend.common.about_common')
	<!-- End About -->
	
	<!-- Start QT -->
	<div class="qt-box qt-background">
		<div class="container">
			<div class="row">
				<div class="col-md-8 ml-auto mr-auto text-center">
					<p class="lead ">
						" If you're not the one cooking, stay out of the way and compliment the chef. "
					</p>
					<span class="lead">Michael Strahan</span>
				</div>
			</div>
		</div>
	</div>
	<!-- End QT -->
	
	<!-- Start Menu -->
	@include('frontend.common.menu_common')
	<!-- End Menu -->
	
	<!-- Start Gallery -->
	@include('frontend.common.gallery_common')
	<!-- End Gallery -->
	
	<!-- Start Customer Reviews -->
	@include('frontend.common.review')
	<!-- End Customer Reviews -->
	

	
	<!-- Start Footer -->
    @include('frontend.common.footer')
	<!-- End Footer -->
	
	<a href="#" id="back-to-top" title="Back to top" style="display: none;"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></a>

	@include('frontend.common.script')

</body>
</html>