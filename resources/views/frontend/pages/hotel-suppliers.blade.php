@extends('frontend.layouts.app')

@section('title', 'Hotel Suppliers')

@section('title-seperator', '|')

@section('content')
    <!-- Start: Page Header Area -->
    @includeIf('frontend.components.page-header', [
        'header_classes' => 'hotel_suppliers_page_header',
        'header_bg_image' => setting('hotel-suppliers.header_bg_image'),
        'header_title' => setting('hotel-suppliers.header_title'),
        'header_tagline' => setting('hotel-suppliers.header_tagline'),
        'header_description' => setting('hotel-suppliers.header_description'),
    ])
    <!-- End: Page Header Area -->


    <!-- Start: Hotel Content Area -->
    @include('frontend.components.faq-content', ['faqs' => $faqs])
    <!-- End: Hotel Content Area -->
@endsection
