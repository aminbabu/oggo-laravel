    <section class="faq_content_area">
        <div class="container">
            <div class="faq_grid">
                <div class="faq_sidebar">
                    <div class="faq_sidebar_title">
                        <img src="{{ Vite::asset('resources/frontend/assets/images/flight/flight-frame.png') }}"
                            alt="img" />
                        <h5>Content</h5>
                    </div>
                    <ul>
                        @foreach ($faqs as $key => $faq)
                            <li {{ $key === 0 ? 'class=active_list' : '' }}>
                                <a href="#item{{ $faq->id }}">{{ $faq->question }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="faq_content">

                    @foreach ($faqs as $faq)
                        <div class="faq_content_pera" id="item{{ $faq->id }}">
                            <h4>{{ $faq->question }}</h4>
                            <div>{!! $faq->answer !!}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
