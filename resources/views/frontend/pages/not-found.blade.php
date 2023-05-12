@extends('frontend.layouts.app')

@section('title', '404 - Not Found')

@section('title-seperator', '|')

@section('content')

    <!-- Start: Page Header Area -->
    @includeIf('frontend.components.page-header', [
        'header_classes' => 'not_found_page_header',
        'header_bg_image' => setting('404-page.header_bg_image'),
    ])

    <section class="not_found_header_content">
        <div class="container">
            <p class="page_header_tagline">{{ setting('404-page.header_tagline') }}</p>
            <h1 class="page_header_title">{{ setting('404-page.header_title') }}</h1>
            <p class="page_header_description">{{ setting('404-page.header_description') }}</p>
            <div class="d-flex align-items-center justify-content-center">
                <a class="btn1 btn_outline_light me-4" href="{{ url()->previous() }}">
                    <i class="fa-solid fa-arrow-left"></i>
                    Go back
                </a>
                <a class="btn1" href="{{ route('home') }}">Take me home</a>
            </div>
        </div>
    </section>

    <!-- End: Page Header Area -->



    <!-- Start: Help Area -->
    <section class="help_area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="help_title">
                        <h2>{{ setting('contact.info_title') }}</h2>
                        <div>{!! setting('contact.info_description') !!}</div>
                    </div>
                    <div class="help_content">
                        @foreach ($contacts as $contact)
                            <div class="single_help">
                                <div class="help_icon">
                                    <img src="/storage/{{ $contact->icon_image }}" alt="contact icon" width="32"
                                        height="32" class="img-fluid" />
                                </div>
                                <h5>{{ $contact->title }}</h5>
                                <div>{!! $contact->description !!}</div>
                                <div class="reference_link">{!! $contact->reference !!}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End: Help Area -->
@endsection
