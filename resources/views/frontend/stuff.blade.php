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
            <h1>Stuff</h1>
          </div>
        </div>
      </div>
    </div>
    <!-- End All Pages -->

    <!-- Start Stuff -->
    <div class="stuff-box">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="heading-title text-center">
              <h2>Stuff</h2>
              <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting
              </p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 col-sm-6">
            <div class="our-team">
              <div class="pic">
                <img src="/frontend/images/stuff-img-01.jpg" />
                <ul class="social">
                  <li><a href="#" class="fa fa-facebook"></a></li>
                  <li><a href="#" class="fa fa-google-plus"></a></li>
                  <li><a href="#" class="fa fa-instagram"></a></li>
                  <li><a href="#" class="fa fa-linkedin"></a></li>
                </ul>
              </div>
              <div class="team-content">
                <h3 class="title">Williamson</h3>
                <span class="post">Web Developer</span>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-sm-6">
            <div class="our-team">
              <div class="pic">
                <img src="/frontend/images/stuff-img-02.jpg" />
                <ul class="social">
                  <li><a href="#" class="fa fa-facebook"></a></li>
                  <li><a href="#" class="fa fa-google-plus"></a></li>
                  <li><a href="#" class="fa fa-instagram"></a></li>
                  <li><a href="#" class="fa fa-linkedin"></a></li>
                </ul>
              </div>
              <div class="team-content">
                <h3 class="title">Kristiana</h3>
                <span class="post">Web Designer</span>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-sm-6">
            <div class="our-team">
              <div class="pic">
                <img src="/frontend/images/stuff-img-03.jpg" />
                <ul class="social">
                  <li><a href="#" class="fa fa-facebook"></a></li>
                  <li><a href="#" class="fa fa-google-plus"></a></li>
                  <li><a href="#" class="fa fa-instagram"></a></li>
                  <li><a href="#" class="fa fa-linkedin"></a></li>
                </ul>
              </div>
              <div class="team-content">
                <h3 class="title">Steve Thomas</h3>
                <span class="post">Web Developer</span>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-sm-6">
            <div class="our-team">
              <div class="pic">
                <img src="/frontend/images/stuff-img-04.jpg" />
                <ul class="social">
                  <li><a href="#" class="fa fa-facebook"></a></li>
                  <li><a href="#" class="fa fa-google-plus"></a></li>
                  <li><a href="#" class="fa fa-instagram"></a></li>
                  <li><a href="#" class="fa fa-linkedin"></a></li>
                </ul>
              </div>
              <div class="team-content">
                <h3 class="title">Williamson</h3>
                <span class="post">Web Developer</span>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-sm-6">
            <div class="our-team">
              <div class="pic">
                <img src="/frontend/images/stuff-img-05.jpg" />
                <ul class="social">
                  <li><a href="#" class="fa fa-facebook"></a></li>
                  <li><a href="#" class="fa fa-google-plus"></a></li>
                  <li><a href="#" class="fa fa-instagram"></a></li>
                  <li><a href="#" class="fa fa-linkedin"></a></li>
                </ul>
              </div>
              <div class="team-content">
                <h3 class="title">Kristiana</h3>
                <span class="post">Web Designer</span>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-sm-6">
            <div class="our-team">
              <div class="pic">
                <img src="/frontend/images/stuff-img-06.jpg" />
                <ul class="social">
                  <li><a href="#" class="fa fa-facebook"></a></li>
                  <li><a href="#" class="fa fa-google-plus"></a></li>
                  <li><a href="#" class="fa fa-instagram"></a></li>
                  <li><a href="#" class="fa fa-linkedin"></a></li>
                </ul>
              </div>
              <div class="team-content">
                <h3 class="title">Steve Thomas</h3>
                <span class="post">Web Developer</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Stuff -->

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
