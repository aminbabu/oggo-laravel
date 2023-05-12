@extends('frontend.layouts.app')

@section('title', 'Travel Protal')

@section('title-seperator', '|')

@section('content')
    <!-- Start: Page Header Area -->
    @includeIf('frontend.components.page-header', [
        'header_classes' => 'travel_portal_page_header',
        'header_bg_image' => setting('travel-portal.header_bg_image'),
        'header_title' => setting('travel-portal.header_title'),
        'header_tagline' => setting('travel-portal.header_tagline'),
        'header_description' => setting('travel-portal.header_description'),
    ])
    <!-- End: Page Header Area -->

    <!-- Start: B2B Area -->
    <section>
        <div class="container">
            <div class="b2b-section-title">
                <h3>{{ setting('travel-portal.b2b_title') }}</h3>
                <div>{!! setting('travel-portal.b2b_description') !!}</div>
            </div>
            <div class="b2b-chart">
                <div class="b2b-chart-image">
                    <img src="/storage/{{ setting('travel-portal.b2b_bg_image') }}" alt="b2b module" width="769"
                        height="480" class="img-fluid" />
                </div>
                {!! setting('travel-portal.b2b_features') !!}
            </div>
        </div>
    </section>
    <!-- End: B2B Area -->

    <!-- Start: B2C Area -->
    <section class="b2c-area">
        <div class="container">
            <div class="b2c-section-title">
                <h3>{{ setting('travel-portal.b2c_title') }}</h3>
                <div>{!! setting('travel-portal.b2c_description') !!}</div>
            </div>
            <div class="b2c-list-area">
                <div class="b2c-left-list">
                    {!! setting('travel-portal.b2c_features_left') !!}
                </div>
                <div class="b2c-right-list">
                    {!! setting('travel-portal.b2c_features_right') !!}
                </div>
            </div>
        </div>
    </section>
    <!-- End: B2C Area -->

    <!-- Start: B2E Area -->
    <section>
        <div class="container">
            <div class="b2e-heading">
                <h3>{{ setting('travel-portal.b2e_title') }}</h3>
            </div>
            <div class="b2e-content-area">
                <div class="b2e-list">
                    {!! setting('travel-portal.b2e_features') !!}
                </div>
                <div class="b2e-banner">
                    <img src="/storage/{{ setting('travel-portal.b2e_image') }}" alt="b2e Module" width="520"
                        height="480" height="img-fluid" />
                </div>
            </div>
        </div>
    </section>
    <!-- End: B2E Area -->
@endsection
