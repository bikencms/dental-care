        <!-- Header Start -->
        <header class="main-header">
            <div class="header-sticky bg-section">
                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid">
                        <!-- Logo Start -->
                        <a class="navbar-brand" href="{{ localized_route('home') }}">
                            <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" width="185">
                        </a>
                        <!-- Logo End -->

                        <!-- Main Menu Start -->
                        <div class="collapse navbar-collapse main-menu">
                            <div class="nav-menu-wrapper">
                                <ul class="navbar-nav mr-auto" id="menu">
                                    <!-- Home Menu -->
                                    <li class="nav-item">
                                        <a class="nav-link {{ in_array(Route::currentRouteName(), ['home', 'locale.home']) ? 'active' : '' }}" 
                                            href="{{ localized_route('home') }}">
                                            {{ __('about.home') ?? 'Home' }}
                                        </a>
                                    </li>                                        

                                    <!-- About Us Menu -->
                                    <li class="nav-item">
                                        <a class="nav-link {{ in_array(Route::currentRouteName(), ['about-us', 'locale.about-us']) ? 'active' : '' }}" 
                                            href="{{ localized_route('about-us') }}">
                                            {{ __('home.about_us') ?? 'About Us' }}
                                        </a>
                                    </li>

                                    <!-- Contact Us Menu -->
                                    <li class="nav-item">
                                        <a class="nav-link {{ in_array(Route::currentRouteName(), ['contact-us', 'locale.contact-us']) ? 'active' : '' }}" 
                                            href="{{ localized_route('contact-us') }}">
                                            {{ __('home.contact_us') ?? 'Contact Us' }}
                                        </a>
                                    </li>

                                    <!-- Language Dropdown Switcher -->
                                    <li class="nav-item submenu">
                                        <a class="nav-link" href="#">
                                            @if(app()->getLocale() == 'vi')
                                                <img src="{{ asset('assets/images/svg/vn.svg') }}" alt="Language VI" width="18">
                                            @else
                                                <img src="{{ asset('assets/images/svg/us.svg') }}" alt="Language EN" width="18">
                                            @endif
                                        </a>
                                        <ul class="language">                                        
                                            <!-- Tiếng Anh (Default) -->
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ switch_locale_url('en') }}">
                                                    <img src="{{ asset('assets/images/svg/us.svg') }}" alt="Language EN" width="18">
                                                </a>
                                            </li>
                                            <!-- Tiếng Việt -->
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ switch_locale_url('vi') }}">
                                                    <img src="{{ asset('assets/images/svg/vn.svg') }}" alt="Language VN" width="18"> 
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
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