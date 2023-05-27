@extends('frontend.layouts.app')

@section('title', 'Invoice Download')

@section('title-seperator', '|')

@section('content')

    <!-- Start: Page Header Area -->
    <section class="page_header invoice_page_header">
        <div class="bg_holder" style="background-image: url('{{ asset('frontend/assets/images/email/header_bg.png') }}');">
        </div>
    </section>

    <section class="not_found_header_content">
        <div class="container">
            <p class="page_header_tagline">Order Placed</p>
            <h1 class="page_header_title">Invoice</h1>
            <div class="d-flex align-items-center justify-content-center">
                <a class="btn1 btn_outline_light" href="{{ url()->previous() }}">
                    <i class="fa-solid fa-arrow-left"></i>
                    Go back
                </a>
                <a class="btn1 ms-4" href="{{ route('invoice.download', ['id' => $order_id]) }}">
                    Download Invoice
                </a>
            </div>
        </div>
    </section>

    <!-- End: Page Header Area -->
@endsection
