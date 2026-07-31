        <!-- Footer Start -->
        <footer class="main-footer bg-section dark-section">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4">
                        <!-- Footer About Start -->
                        <div class="footer-about">
                            <!-- Footer Logo Start -->
                            <div class="footer-logo">
                                <img src="{{ asset('assets/images/footer_logo.png') }}" alt="">
                            </div>
                            <!-- Footer Logo End -->

                            <!-- About Footer Content Start -->
                            <div class="about-footer-content">
                                <p>{{ __('home.footer_title') }}</p>
                            </div>           
                            <!-- About Footer Content End -->
                                
                            <!-- Footer Social Link Start -->
                            <div class="footer-social-links">
                                <ul>
                                    <li><a href="#"><i class="fa-brands fa-pinterest-p"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-x-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                                </ul>
                            </div>
                            <!-- Footer Social Link End -->
                        </div>
                        <!-- Footer About End -->
                    </div>

                    <div class="col-xl-8">
                    <!-- Footer Links Box Start -->
                    <div class="footer-links-box">
                        <!-- Footer Links Start -->
                        <div class="footer-links">
                            <h3>{{ __('home.quick_links') }}</h3>
                            <ul>
                                <li><a href="{{ localized_route('home') }}">{{ __('home.home') }}</a></li>
                                <li><a href="{{ localized_route('about-us') }}">{{ __('home.about_us') }}</a></li>
                                <li><a href="{{ localized_route('contact-us') }}">{{ __('home.contact_us') }}</a></li>
                            </ul>
                        </div>
                        <!-- Footer Links End -->

                        <!-- Footer Links Start -->
                        <div class="footer-links">
                            <h3>{{ __('home.support') }}</h3>
                            <ul>
                                <li><a href="#">{{ __('home.terms_condition') }}</a></li>
                                <li><a href="#">{{ __('home.privacy_policy') }}</a></li>
                                <li><a href="{{ localized_route('contact-us') }}">{{ __('home.contact_us') }}</a></li>
                            </ul>
                        </div>
                        <!-- Footer Links End -->

                        <!-- Footer Links Start -->
                        <div class="footer-links footer-contact-links">
                            <h3>{{ __('home.contact_us') }}</h3>
                            <!-- Footer Contact Box Start -->
                            <div class="footer-contact-box">
                                <div class="footer-contact-box-title">
                                    <h3><a class="fontsize13" href="mailto:support@vietnamdentalcare.vn">support@vietnamdentalcare.vn</a></h3>
                                    <h3><a class="fontsize14" href="tel:+84799108727">+84 799 108 727</a></h3>
                                </div>
                                <div class="footer-contact-box-hour">
                                    <p>{{ __('home.working_hours') }} <span>{{ __('home.hours_detail') }}</span></p>
                                </div>
                            </div>
                            <!-- Footer Contact Box End -->
                        </div>
                        <!-- Footer Links End -->
                    </div>
                    <!-- Footer Links Box End -->
                </div>

                <div class="col-lg-12">
                    <!-- Footer Copyright Text Start -->
                    <div class="footer-copyright-text">
                        <p>{{ __('home.copyright1', ['year' => date('Y')]) }}</p>
                    </div>
                    <!-- Footer Copyright Text End -->
                </div>
                </div>
            </div>
        </footer>
        <!-- Footer End -->