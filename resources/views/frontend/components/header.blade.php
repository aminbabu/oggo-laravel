<header class="home_header_area">
    <div class="header-area">
        <div class="container">
            <div class="header-menu">
                <div class="header-logo">
                    <a href="{{ route('home') }}">
                        <img src="/storage/{{ setting('site.logo') }}" alt="Oggo" />
                    </a>
                </div>
                <div class="header-display">
                    <div class="header-nav-area">
                        <div class="header-nav">
                            <nav>
                                {{ menu('main', 'frontend/components/nav-menu') }}
                            </nav>
                        </div>
                        <div class="header-button">
                            <a class="btn1" href="{{ route('contact') }}">
                                Get In Touch
                            </a>
                        </div>
                    </div>
                </div>
                <!-- language menu -->
                <div class="dropdown language_dropdown">
                    <button class="btn1 btn_outline_light dropdown-toggle notranslate" type="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('frontend/assets/images/flags/us.svg') }}"
                            alt="United States of America" width="32" height="24" class="img-fluid">
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow">
                        <li>
                            <a class="dropdown-item notranslate" href="#" data-lang="en">
                                <img src="{{ asset('frontend/assets/images/flags/us.svg') }}"
                                    alt="United States of America" width="32" height="24" class="img-fluid">
                                <span>English</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item notranslate" href="#" data-lang="tr">
                                <img src="{{ asset('frontend/assets/images/flags/tr.svg') }}"
                                    alt="United States of America" width="32" height="24" class="img-fluid">
                                <span>Turkish</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- cta button -->
                <a class="btn1 cta-btn" href="{{ route('contact') }}">
                    Get In Touch
                </a>
                <!-- mobile menu -->
                <div class="mobile-menu">
                    <div id="nav-icon4" class="menu_icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="google_translate_element" class="d-none"></div>
</header>
