<div class="contact-imfo-box">
    <div class="container">
        <div class="row">
            <div class="col-md-4 arrow-right">
                <i class="fa fa-volume-control-phone"></i>
                <div class="overflow-hidden">
                    <h4>Phone</h4>
                    <p class="lead">
                        {{$siteSettings->phone }}
                    </p>
                </div>
            </div>
            <div class="col-md-4 arrow-right">
                <i class="fa fa-envelope"></i>
                <div class="overflow-hidden">
                    <h4>Email</h4>
                    <p class="lead">
                        {{$siteSettings->email }}
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <i class="fa fa-map-marker"></i>
                <div class="overflow-hidden">
                    <h4>Location</h4>
                    <p class="lead">
                        {{$siteSettings->address }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="footer-area bg-f">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <h3>About Us</h3>
                <p>{{$siteSettings->footer_aboutus }}</p>
            </div>
            <div class="col-lg-3 col-md-6">
                <h3>Subscribe</h3>
                <div class="subscribe_form">
                    <form action="{{ route('newsletter.store') }}" method="POST">
                        @csrf
                        <input name="email" id="email" class="form_input" placeholder="Email Address..." type="email">
                        <button type="submit" class="submit">SUBSCRIBE</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
                <ul class="list-inline f-social">
                    <li class="list-inline-item"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6">
                <h3>Contact information</h3>
                <p class="lead">{{$siteSettings->address }}</p>
                <p class="lead"><a href="#">{{$siteSettings->phone }}</a></p>
                <p><a href="#"> {{$siteSettings->email }}</a></p>
            </div>
            <div class="col-lg-3 col-md-6">
                <h3>Opening hours</h3>
                <p>{!!$siteSettings->opening_hours!!}</p>
            </div>
        </div>
    </div>
    
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="company-name">{{$siteSettings->footer_text }}</p>
                </div>
            </div>
        </div>
    </div>
    
</footer>