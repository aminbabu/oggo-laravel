@extends('frontend.layouts.app')

@section('title', 'Flight Suppliers')

@section('title-seperator', '|')

@section('content')
    <!-- Start: Page Header Area -->
    @includeIf('frontend.components.page-header', [
        'header_classes' => 'flight_suppliers_page_header',
        'header_bg_image' => setting('flight-suppliers.header_bg_image'),
        'header_title' => setting('flight-suppliers.header_title'),
        'header_tagline' => setting('flight-suppliers.header_tagline'),
        'header_description' => setting('flight-suppliers.header_description'),
    ])
    <!-- End: Page Header Area -->

    <!-- Start: Flight Content Area -->
    @include('frontend.components.faq-content', ['faqs' => $faqs])
    <!-- End: Flight Content Area -->
@endsection
