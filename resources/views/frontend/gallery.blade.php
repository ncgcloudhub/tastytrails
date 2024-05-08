@include('frontend.common.header')

  <body>
    <!-- Start header -->
    @include('frontend.common.navbar')
    <!-- End header -->

    <!-- Start All Pages -->
    <div class="all-page-title page-breadcrumb">
      <div class="container text-center">
        <div class="row">
          <div class="col-lg-12">
            <h1>Gallery</h1>
          </div>
        </div>
      </div>
    </div>
    <!-- End All Pages -->

    <!-- Start Gallery -->
    @include('frontend.common.gallery_common')
    <!-- End Gallery -->

    <!-- Start Customer Reviews -->
    @include('frontend.common.review')
    <!-- End Customer Reviews -->

    <!-- Start Footer -->
    @include('frontend.common.footer')
    <!-- End Footer -->

    <a href="#" id="back-to-top" title="Back to top" style="display: none"
      ><i class="fa fa-paper-plane-o" aria-hidden="true"></i
    ></a>

    @include('frontend.common.script')
  </body>
</html>
