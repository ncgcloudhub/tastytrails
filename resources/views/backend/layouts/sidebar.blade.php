<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ URL::asset('build/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('build/images/logo-dark.png') }}" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ URL::asset('build/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('build/images/logo-light.png') }}" alt="" height="17">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span>@lang('translation.menu')</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('admin.dashboard')}}">
                        <i data-feather="home" class="icon-dual"></i> <span >Dashboard</span>
                    </a>
                </li>

                <li class="menu-title"><i class="ri-more-fill"></i> <span >Pages</span></li>

                  {{-- Fixed Template --}}

                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('manage.banner')}}">
                        <i class=" las la-user-circle"></i> <span >Banner</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="">
                        <i class=" las la-user-circle"></i> <span >About Us</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="">
                        <i class=" las la-user-circle"></i> <span >Menu</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="">
                        <i class=" las la-user-circle"></i> <span >Gallery</span>
                    </a>
                </li>
     
            
                <li class="nav-item">
                    <a class="nav-link menu-link" href="">
                        <i class=" las la-user-circle"></i> <span >Reservation</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="">
                        <i class=" las la-user-circle"></i> <span >Stuff</span>
                    </a>
                </li>

                <li class="menu-title"><i class="ri-more-fill"></i> <span >Settings</span></li>
               
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#settings" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="AITools">
                        <i class="las la-cog"></i> <span >Settings</span>
                    </a>
                    <div class="collapse menu-dropdown mega-dropdown-menu" id="settings">
                        <div class="row">
                            <div class="col-lg-4">
                                <ul class="nav nav-sm flex-column">

                                

                                    <li class="nav-item">
                                        <a href="" class="nav-link" >Site Settings</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="" class="nav-link" >SEO Settings</a>
                                    </li>
                                    
                                  
                                 
                                </ul>
                            </div>
                            
                            
                        </div>
                    </div>
                </li>
    
         </ul>
        </div>
        <!-- Sidebar -->
    </div>
    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
