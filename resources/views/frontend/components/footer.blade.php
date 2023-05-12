<footer class="footer_area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @unless (Route::current()->getName() === 'home')
                    <div class="footer_top">
                        <h2>{{ setting('site.footer_title') }}</h2>
                        <div class="footer_button">
                            <a class="btn1 btn2"
                                href="{{ setting('site.footer_cta_link') }}">{{ setting('site.footer_cta_text') }}</a>
                        </div>
                    </div>
                @endunless
                <div class="footer_bottom">
                    <div class="footer_logo">
                        <a href="{{ route('home') }}">
                            <img src="/storage/{{ setting('site.logo') }}" alt="Oggo" />
                        </a>
                    </div>
                    <div class="footer_menu">
                        {{ menu('main', 'frontend/components/nav-menu') }}
                    </div>
                    <div class="social_icon">
                        {{ menu('social', 'frontend/components/social-menu') }}
                    </div>
                </div>
                <div class="footer_copy_right">
                    <div class="copy_right_left">
                        <p>{!! setting('site.copyright') !!}</p>
                    </div>
                    <div class="copy_right_right">
                        {{ menu('extra-menu') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
