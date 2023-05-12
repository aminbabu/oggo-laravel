@extends('frontend.layouts.app')

@section('title', 'About')

@section('title-seperator', '|')

@section('content')
    <!-- Start: Page Header Area -->
    @includeIf('frontend.components.page-header', [
        'header_classes' => 'about_page_header',
        'header_bg_image' => setting('about.header_bg_image'),
        'header_title' => setting('about.header_title'),
        'header_tagline' => setting('about.header_tagline'),
        'header_description' => setting('about.header_description'),
    ])
    <!-- End: Page Header Area -->

    <!-- Start: About Offer Section -->
    <section class="about_offer_section">
        <div class="container">
            <div class="about_offer_heading">
                <h3 class="text-capitalize">{{ setting('about.offer_title') }}</h3>
                <div>
                    {!! setting('about.offer_description') !!}
                </div>
            </div>
            <div class="about_offer list-caret-success">
                {!! setting('about.offer_features') !!}
            </div>
        </div>
    </section>
    <!-- End: About Offer Section -->

    <!-- Start: About Choose Section -->
    <section class="about_choose_section">
        <div class="container">
            <div class="about_choose_header">
                <h3 class="text-capitalize">{{ setting('about.choose_us_title') }}</h3>
                <p>
                    {!! setting('about.choose_us_description') !!}
                </p>
            </div>
            <div class="row justify-content-center gy-4 gy-lg-0">
                <!-- single about choose -->
                @foreach ($features as $feature)
                    <div class="col-sm-9 col-md-6 col-lg-4">
                        <div class="single_about_choose">
                            <img src="/storage/{{ $feature->icon_image }}" alt="choose_img" width="160" height="180"
                                class="img-fluid" />
                            <h5>{{ $feature->title }}</h5>
                            <div>{!! $feature->description !!}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End: About Choose Section -->

    <!-- Start: About Cloud Section -->
    <section class="about_cloud_section">
        <div class="container">
            <div class="about_cloud">
                <!-- single cloud img -->
                <div class="single_cloud_img">
                    <img src="/storage/{{ setting('about.service_image') }}" alt="cloud_img" width="680" height="660"
                        class="img-fluid" />
                </div>
                <!-- single cloud contain -->
                <div class="single_cloud_contain">
                    <div class="cloud_titel">
                        <h3 class="text-capitalize">
                            {{ setting('about.service_title') }}
                        </h3>
                        <div>
                            {!! setting('about.service_description') !!}
                        </div>
                    </div>
                    <div class="about_cloud_list list-caret-success">
                        {!! setting('about.service_features') !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End: About Cloud Section -->

    <!-- End: About Largest -->
    <section class="about_largest">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="about_largest_content">
                        <div class="about_largest_title">
                            <h3 class="text-capitalize">
                                {{ setting('about.facilities_title') }}
                            </h3>
                            <div>{!! setting('about.facilities_description') !!}</div>
                        </div>
                        <div class="main_about_counter">
                            <div class="about_counter">
                                <!-- single counter -->
                                <div class="single_counter">
                                    <h4>{{ setting('about.facilities_stat_ref_1') }}</h4>
                                    <p>{{ setting('about.facilities_stat_title_1') }}</p>
                                </div>
                                <!-- single counter -->
                                <div class="single_counter">
                                    <h4>{{ setting('about.facilities_stat_ref_2') }}</h4>
                                    <p>{{ setting('about.facilities_stat_title_2') }}</p>
                                </div>
                                <!-- single counter -->
                                <div class="single_counter">
                                    <h4>{{ setting('about.facilities_stat_ref_3') }}</h4>
                                    <p>{{ setting('about.facilities_stat_title_3') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 abLg-1">
                    <div class="about_largest_img">
                        <img src="/storage/{{ setting('about.facilities_image') }}"
                            alt="Largest Numbers Of Accommodation Facilities" width="624" height="480"
                            class="img-fluid" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End: About Largest -->
@endsection
