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
                <img src="{{ asset('storage/upload/site/' . $siteSettings->logo) }}" alt="" height="50">
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



                <li class="nav-item">
                    <a class="nav-link menu-link" href="#banner" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="AITools">
                        <i class=" las la-clipboard-list"></i> <span >Banner</span>
                    </a>
                    <div class="collapse menu-dropdown mega-dropdown-menu" id="banner">
                        <div class="row">
                            <div class="col-lg-4">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{route('add.banner')}}" class="nav-link" >Add Banner</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{route('manage.banner')}}" class="nav-link" >Manage Banner</a>
                                    </li>
                
                                </ul>
                            </div>
                           
                        </div>
                    </div>
                </li>


                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('manage.about.us')}}">
                        <i class="las la-paperclip"></i> <span >About Us</span>
                    </a>
                </li>

    
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#menu" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="AITools">
                        <i class="las la-hamburger"></i> <span >Menu</span>
                    </a>
                    <div class="collapse menu-dropdown mega-dropdown-menu" id="menu">
                        <div class="row">
                            <div class="col-lg-4">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{route('manage.menu.category')}}" class="nav-link" >Menu Category</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{route('manage.menu')}}" class="nav-link" >Menu</a>
                                    </li>
                
                                </ul>
                            </div>
                           
                        </div>
                    </div>
                </li>

               
                
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('add.gallery')}}">
                        <i class="las la-image"></i> <span >Gallery</span>
                    </a>
                </li>

             
            
                {{-- Moderator --}}

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#moderator" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="AITools">
                        <i class=" las la-user-tie"></i> <span >Moderator</span>
                    </a>
                    <div class="collapse menu-dropdown mega-dropdown-menu" id="moderator">
                        <div class="row">
                            <div class="col-lg-4">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{route('add.moderator')}}" class="nav-link" >Add Moderator</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{route('manage.moderator')}}" class="nav-link" >Manage Moderator</a>
                                    </li>
                
                                </ul>
                            </div>
                           
                        </div>
                    </div>
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
                                        <a href="{{route('site.settings.add')}}" class="nav-link" >Site Settings</a>
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
