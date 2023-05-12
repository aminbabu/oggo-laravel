@extends('frontend.layouts.app')

@section('title', 'Contact Us')

@section('title-seperator', '|')

@section('content')
    <!-- Start: Page Header Area -->
    @includeIf('frontend.components.page-header', [
        'header_classes' => 'contact_page_header',
        'header_bg_image' => setting('contact.header_bg_image'),
        'header_title' => setting('contact.header_title'),
        'header_tagline' => setting('contact.header_tagline'),
        'header_description' => setting('contact.header_description'),
    ])
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

    <!-- Start: Map Area -->
    <section class="map_area">
        <iframe src="{!! setting('contact.google_map') !!}" width="100%" style="border: 0" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>
    <!-- End: Map Area -->

    <!-- Start: Touch Area -->
    <section class="touch_area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="touch">
                        <div class="touch_title">
                            <h3>Get in touch</h3>
                            <p>
                                You can call us 24 hours a day, 7 days a week without
                                hesitation or get technical support from us.
                            </p>
                            @if (Session::has('success'))
                                <div class="alert alert-success alert-dismissible fade show position-fixed end-0 contact-alert bottom-0 text-start shadow"
                                    role="alert">
                                    {{ Session::get('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                        </div>
                        <div class="touch_from_area">
                            <form action="{{ route('contact.store') }}" method="POST" class="needs-validation" novalidate>
                                @csrf

                                <div class="touch_from_top">
                                    <div class="name_field">
                                        <label for="name">Full Name</label>
                                        <input type="text" name="name" id="name" placeholder="John"
                                            class="form-control @error('name'){{ 'is-invalid' }}@enderror"
                                            value="{{ old('name') }}" required />
                                    </div>
                                    <div class="email_field">
                                        <label for="email">E-mail Address</label>
                                        <input type="email" name="email" id="email" placeholder="you@company.com"
                                            class="form-control @error('email'){{ 'is-invalid' }}@enderror"
                                            value="{{ old('email') }}" required />
                                    </div>
                                </div>
                                <label for="subject">Subject</label>
                                <input type="text" name="subject" id="subject" placeholder="Type here..."
                                    class="form-control @error('subject'){{ 'is-invalid' }}@enderror"
                                    value="{{ old('subject') }}" required />

                                <label for="message">Message</label>
                                <textarea name="message" id="message" placeholder="Leave us a message..."
                                    class="form-control @error('message'){{ 'is-invalid' }}@enderror" required>{{ old('message') }}</textarea>

                                <button type="submit" class="btn1">Send Message</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End: Touch Area -->
@endsection
