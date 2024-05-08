@include('frontend.common.header')

<body>
	<!-- Start header -->
	@include('frontend.common.navbar')
	<!-- End header -->
	
	<!-- Start header -->
	<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>About Us</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End header -->
	
	<!-- Start About -->
	@include('frontend.common.about_common')
	<!-- End About -->
	
	<!-- Start Menu -->
	@include('frontend.common.menu_common')
	<!-- End Menu -->
	
	
	<!-- Start Footer -->
	@include('frontend.common.footer')
	<!-- End Footer -->
	
	<a href="#" id="back-to-top" title="Back to top" style="display: none;"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></a>

	@include('frontend.common.script')
</body>
</html>