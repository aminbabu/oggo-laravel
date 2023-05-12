@extends('frontend.layouts.app')

@section('title', 'Pricing')

@section('title-seperator', '|')

@section('content')
    <!-- Start: Page Header Area -->
    @includeIf('frontend.components.page-header', [
        'header_classes' => 'pricing_page_header',
        'header_bg_image' => setting('pricing.header_bg_image'),
        'header_title' => setting('pricing.header_title'),
        'header_tagline' => setting('pricing.header_tagline'),
        'header_description' => setting('pricing.header_description'),
    ])
    <!-- End: Page Header Area -->

    <!-- Start: Pricing Area -->
    <section>
        <div class="container">
            <div class="pricing-title">
                <h3>{{ setting('pricing.plans_title') }}</h3>
            </div>
            <div class="pricing-area">
                @foreach ($packages as $package)
                    <div class="pricing-single {{ $package->is_active ? 'active' : '' }}">
                        <div class="pricing-logo">
                            <img src="/storage/{{ $package->icon_image }}" alt="pricing" height="248" width="178"
                                class="img-fluid" />
                        </div>
                        <div class="pricing-type">
                            <h4>{{ $package->title }} {!! $package->is_popular ? '<span>popular</span>' : '' !!}</h4>
                        </div>
                        <div class="pricing-price">
                            <h3><sup class="fw-normal">&#8378;</sup>{{ $package->price }} <span>TL</span></h3>
                        </div>
                        <div class="package-list">
                            {!! $package->features !!}
                        </div>
                        <div class="pricing-button">
                            <a class="btn1 btn3"
                                href="{{ route('cart.select.plan', ['plan_id' => $package->id]) }}">{{ $package->link_text }}</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End: Pricing Area -->
@endsection
