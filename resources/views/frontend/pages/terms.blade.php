@extends('frontend.layouts.app')

@section('title', 'Terms And Conditions')

@section('title-seperator', '|')

@section('content')
    <!-- Start: Page Header Area -->
    @includeIf('frontend.components.page-header', [
        'header_classes' => 'terms_and_conditions_page_header',
        'header_bg_image' => setting('terms-and-conditions.header_bg_image'),
        'header_title' => setting('terms-and-conditions.header_title'),
        'header_tagline' => setting('terms-and-conditions.header_tagline'),
        'header_description' => setting('terms-and-conditions.header_description'),
    ])
    <!-- End: Page Header Area -->

    <!-- Start: Flight Content Area -->
    @include('frontend.components.faq-content', ['faqs' => $faqs])
    <!-- End: Flight Content Area -->
@endsection
