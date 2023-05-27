@extends('frontend.layouts.app')

@section('title', 'Privacy Policies')

@section('title-seperator', '|')

@section('content')
    <!-- Start: Page Header Area -->
    @includeIf('frontend.components.page-header', [
        'header_classes' => 'privacy_policy_page_header',
        'header_bg_image' => setting('privacy-policy.header_bg_image'),
        'header_title' => setting('privacy-policy.header_title'),
        'header_tagline' => setting('privacy-policy.header_tagline'),
        'header_description' => setting('privacy-policy.header_description'),
    ])
    <!-- End: Page Header Area -->

    <!-- Start: Flight Content Area -->
    @include('frontend.components.faq-content', ['faqs' => $faqs])
    <!-- End: Flight Content Area -->
@endsection
