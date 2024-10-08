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
            <h1>Contact</h1>
          </div>
        </div>
      </div>
    </div>
    <!-- End All Pages -->

    <!-- Start Contact -->
    
   
    <div class="contact-box">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="heading-title text-center">
              <h2>Contact</h2>
              <p>
                Contact Us
              </p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <form method="POST" action="{{ route('send.email') }}">
              @csrf
              <div class="row">

                <div class="col-md-12">
                  <div class="form-group">
                    <input
                      type="text"
                      class="form-control"
                      id="name"
                      name="name"
                      placeholder="Your Name"
                      required
                      data-error="Please enter your name"
                    />
                    <div class="help-block with-errors"></div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                    <input
                      type="text"
                      placeholder="Your Email"
                      id="email"
                      class="form-control"
                      name="email"
                      required
                      data-error="Please enter your email"
                    />
                    <div class="help-block with-errors"></div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                    <input
                      type="text"
                      placeholder="Your Phone Number"
                      id="phone"
                      class="form-control"
                      name="phone"
                      required
                      data-error="Please enter your number"
                    />
                    <div class="help-block with-errors"></div>
                  </div>
                </div>

                <div class="col-md-12">

                  <div class="form-group">
                    <input
                      type="text"
                      placeholder="Your Message"
                      id="message"
                      class="form-control"
                      name="message"
                      required
                      data-error="Please enter your message"
                    />
                    <div class="help-block with-errors"></div>
                  </div>

                  <div class="submit-button text-center">
                    <button class="btn btn-common" id="submit" type="submit">
                      Send Message
                    </button>
                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                    <div class="clearfix"></div>
                  </div>

                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- End Contact -->

    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2921.219221625981!2d-78.8912178234744!3d42.931505098807584!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89d3132671c729cb%3A0x2bec4a07e9f61d16!2s643%20Grant%20St%2C%20Buffalo%2C%20NY%2014213%2C%20USA!5e0!3m2!1sen!2sbd!4v1715177240237!5m2!1sen!2sbd" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

    <!-- Start Footer -->
    @include('frontend.common.footer')
    <!-- End Footer -->

    <a href="#" id="back-to-top" title="Back to top" style="display: none"
      ><i class="fa fa-paper-plane-o" aria-hidden="true"></i
    ></a>

    @include('frontend.common.script')
   
  </body>
</html>
