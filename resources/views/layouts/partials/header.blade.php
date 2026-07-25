<!-- Header Start -->
<header class="main-header">
    <div class="header-sticky bg-section">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <!-- Logo Start -->
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" width="185">
                </a>
                <!-- Logo End -->

                <!-- Main Menu Start -->
                <div class="collapse navbar-collapse main-menu">
                    <div class="nav-menu-wrapper">
                        <ul class="navbar-nav mr-auto" id="menu">
                            <li class="nav-item"><a class="nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                            </li>                                
                            <li class="nav-item"><a class="nav-link {{ Route::currentRouteName() == 'about-us' ? 'active' : '' }}" href="{{ route('about-us') }}">About Us</a>
                            <li class="nav-item"><a class="nav-link" href="#">Contact Us</a></li>
                            <li class="nav-item submenu">
                                <a class="nav-link" href="#">
                                @if(app()->getLocale() == 'vi')
                                    <img src="./assets/images/svg/vn.svg" alt="Language VI" width="18">
                                @else
                                    <img src="./assets/images/svg/us.svg" alt="Language EN" width="18">
                                @endif
                                </a>
                                <ul class="language">                                        
                                    <li class="nav-item"><a class="nav-link" href="/"><img src="./assets/images/svg/us.svg" alt="Language EN" width="18"></a></li>
                                    <li class="nav-item"><a class="nav-link" href="/vi"><img src="./assets/images/svg/vn.svg" alt="Language VN" width="18"></a></li>
                                </ul>
                            </li>
                            <li class="nav-item highlighted-menu"><a class="nav-link" href="#"></a></li>
                        </ul>
                    </div>

                    <!-- Header Btn Start -->
                    <div class="header-btn">
                        <a class="btn-default" href="#appointmentForm">{{ __('home.button') }}</a>
                    </div>
                    <!-- Header Btn End -->                      
                </div>
                <!-- Main Menu End -->
                <div class="navbar-toggle"></div>
            </div>
        </nav>
        <div class="responsive-menu"></div>
    </div>
</header>
<!-- Header End -->