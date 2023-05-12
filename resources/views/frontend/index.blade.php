@extends('frontend.layouts.app')

@section('title', 'Home')

@section('title-seperator', '|')

@section('content')
    <!-- Start: Home Banner Area -->
    <section class="home_banner_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="home_banner_top">
                        <h1>
                            {{ setting('home.header_title') }}
                        </h1>
                        <div>{!! setting('home.header_description') !!}</div>
                        {!! setting('home.header_cta_btn') !!}
                        <div class="home_rating_section">
                            <div class="single_home_ratingImg">
                                <div class="home_ratingimg">
                                    <img src="{{ Vite::asset('resources/frontend/assets/images/home/Ellipse-1.png') }}"
                                        alt="ellipse-img" />
                                </div>
                                <div class="home_ratingimg_two">
                                    <img src="{{ Vite::asset('resources/frontend/assets/images/home/Ellipse-2.png') }}"
                                        alt="ellipse-img" />
                                </div>
                                <div class="home_ratingimg_three">
                                    <img src="{{ Vite::asset('resources/frontend/assets/images/home/Ellipse-3.png') }}"
                                        alt="ellipse-img" />
                                </div>
                            </div>
                            <div class="single_home_ratingText single_home_ratingText1">
                                <h4>2,291</h4>
                                <p>Happy Customers</p>
                            </div>
                            <div class="single_home_ratingText single_home_ratingText2">
                                <h4>4.8/5</h4>
                                <div class="home_rating">
                                    <ul>
                                        <li class="active"><i class="fa-solid fa-star"></i></li>
                                        <li class="active"><i class="fa-solid fa-star"></i></li>
                                        <li class="active"><i class="fa-solid fa-star"></i></li>
                                        <li class="active"><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                    </ul>
                                    <p>Rating</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="home_bannerImg">
                        <img src="/storage/{{ setting('home.header_image') }}" alt="Frame-img" class="img-fluid" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End: Home Banner Area -->

    <!-- Start: Home Features Section -->
    <section class="home_features_section">
        <div class="container">
            <div class="home_features">
                <h3>{{ setting('home.features_title') }}</h3>
            </div>
            <div class="home_features_contain">
                @foreach ($features as $feature)
                    <div class="home_featuresTitel">
                        <img src="/storage/{{ $feature->icon_image }}" alt="Feature Avatar" width="180" height="160"
                            class="img-fluid" />
                        <h4>{{ $feature->title }}</h4>
                        <div>{!! $feature->description !!}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End: Home Features Section -->

    <!-- Start: Home Slider -->
    <section class="home_slider">
        <div class="container">
            <div class="home_slider_header">
                <p>{{ setting('home.aitlines_title') }}</p>
            </div>
            <div class="home_slider_title owl-carousel">
                @foreach ($airlines as $airline)
                    <div class="single_home_slider">
                        <img src="/storage/{{ $airline->brand_logo }}" width="172" height="32" class="img-fluid"
                            alt="{{ $airline->name }}" />
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End: Home Slider Area -->

    <!-- Start: Home Services Area -->
    <section class="home_services_area">
        <div class="container">
            <div class="home_services_header">
                <h3>{{ setting('home.time_money_title') }}</h3>
                <div>{!! setting('home.time_money_description') !!}</div>
            </div>
            <div class="newtab-area">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link nav-link1 active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                            type="button" role="tab" aria-controls="home" aria-selected="true">
                            {{ setting('home.time_money_tab_1') }}
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link nav-link2" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                            type="button" role="tab" aria-controls="profile" aria-selected="false">
                            {{ setting('home.time_money_tab_2') }}
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link nav-link3" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact"
                            type="button" role="tab" aria-controls="contact" aria-selected="false">
                            {{ setting('home.time_money_tab_3') }}
                        </button>
                    </li>
                </ul>
                <div class="tab-content newtab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="tab_item">
                            @foreach ($tab_1 as $item)
                                <div class="single_tab_items">
                                    <div class="single_tab_heading">
                                        <img src="/storage/{{ $item->icon_image }}" alt="{{ $item->title }}"
                                            width="68" height="68" class="img-fluid" />
                                        <h4>{{ $item->title }}</h4>
                                    </div>
                                    <div>
                                        {!! $item->description !!}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        {{-- <div class="tab_button">
                            <a href="#">Read more <i class="fa-solid fa-angle-right"></i></a>
                        </div> --}}
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="tab_item">
                            @foreach ($tab_2 as $item)
                                <div class="single_tab_items">
                                    <div class="single_tab_heading">
                                        <img src="/storage/{{ $item->icon_image }}" alt="{{ $item->title }}"
                                            width="68" height="68" class="img-fluid" />
                                        <h4>{{ $item->title }}</h4>
                                    </div>
                                    <div>
                                        {!! $item->description !!}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        {{-- <div class="tab_button">
                            <a href="#">Read more <i class="fa-solid fa-angle-right"></i></a>
                        </div> --}}
                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="tab_item">
                            @foreach ($tab_3 as $item)
                                <div class="single_tab_items">
                                    <div class="single_tab_heading">
                                        <img src="/storage/{{ $item->icon_image }}" alt="{{ $item->title }}"
                                            width="68" height="68" class="img-fluid" />
                                        <h4>{{ $item->title }}</h4>
                                    </div>
                                    <div>
                                        {!! $item->description !!}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        {{-- <div class="tab_button">
                            <a href="#">Read more <i class="fa-solid fa-angle-right"></i></a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End: Home Services Area -->

    <!-- Start: Home Travel Planning -->
    <section class="home_travel_planning">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="home_travelImg">
                        <img src="/storage/{{ setting('home.travel_planing_image') }}" alt="travel_img" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="home_travelTitle">
                        <h3>{{ setting('home.travel_planing_title') }}</h3>
                        <h5>{{ setting('home.travel_planing_tagline') }}</h5>
                        <div>{!! setting('home.travel_planing_description') !!}</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End: Home Travel Planning -->

    <!-- Start: Home Customer Section -->
    <section class="home_customer_section">
        <div class="container">
            <div class="home_customer_heder">
                <h3>{{ setting('home.testimonial_title') }}</h3>
            </div>
            <div class="home_customer">
                <div class="owl-carousel testimonial_carousel">
                    @foreach ($testimonials as $testimonial)
                        <div class="owl_item">
                            <div class="single_home_kit">
                                <h4>
                                    {{ $testimonial->title }}
                                </h4>
                                <div>
                                    {!! $testimonial->comment !!}
                                </div>
                                <div class="single_there">
                                    <div class="single_there_img">
                                        <img src="/storage/{{ $testimonial->avatar }}" alt="{{ $testimonial->name }}"
                                            width="42" height="42" class="img-fluid" />
                                    </div>
                                    <div class="single_there_title">
                                        <h5>{{ $testimonial->name }}</h5>
                                        <p>{{ $testimonial->designation }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- End: Home Coustomer Section -->
@endsection
