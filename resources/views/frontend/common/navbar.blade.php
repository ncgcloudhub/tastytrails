<header class="top-navbar">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{route('home')}}">
                <img src="{{ asset('storage/upload/site/' . $siteSettings->logo) }}" alt="" height="60" />
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbars-rs-food">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item {{ Request::route()->named('home') ? 'active' : '' }}"><a class="nav-link" href="{{route('home')}}">Home</a></li>
                    <li class="nav-item {{ Request::route()->named('menu') ? 'active' : '' }}"><a class="nav-link" href="{{route('menu')}}">Menu</a></li>
                    <li class="nav-item {{ Request::route()->named('about') ? 'active' : '' }}"><a class="nav-link" href="{{route('about')}}">About</a></li>
                    <li class="nav-item {{ Request::route()->named('gallery') ? 'active' : '' }}"><a class="nav-link" href="{{route('gallery')}}">Gallery</a></li>
                    {{-- <li class="nav-item dropdown {{ Request::route()->named(['reservation', 'stuff', 'gallery']) ? 'active' : '' }}">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown-a">
                            <a class="dropdown-item" href="{{route('reservation')}}">Reservation</a>
                            <a class="dropdown-item" href="{{route('stuff')}}">Stuff</a>
                            <a class="dropdown-item" href="{{route('gallery')}}">Gallery</a>
                        </div>
                    </li> --}}
                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Blog</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown-a">
                            <a class="dropdown-item" href="{{route('blog')}}">blog</a>
                            <a class="dropdown-item" href="blog-details.html">blog Single</a>
                        </div>
                    </li> --}}
                    <li class="nav-item {{ Request::route()->named('contact') ? 'active' : '' }}"><a class="nav-link" href="{{route('contact')}}">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>