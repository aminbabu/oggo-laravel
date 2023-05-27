@extends('frontend.layouts.app')

@section('title', 'Package Confirmation')

@section('title-seperator', '|')

@section('content')
    <!-- Start: Cart Area -->
    <section class="cart_area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="cart cart_confirmation">
                        <div class="cart_title">
                            <h2>Order Review</h2>
                        </div>
                        <div class="price_details mb-5">
                            <h4>Billing Information</h4>
                            <div class="corporate">
                                <h4 class="title">
                                    <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <ellipse cx="12.5" cy="17.5369" rx="7" ry="3.5"
                                            stroke="#777E90" stroke-width="1.5" stroke-linejoin="round" />
                                        <circle cx="12.5" cy="7.03687" r="4" stroke="#777E90"
                                            stroke-width="1.5" stroke-linejoin="round" />
                                    </svg>
                                    Customer Name
                                </h4>
                                <div class="cart_price">
                                    <h4>{{ $data['fname'] }} {{ $data['lname'] }}</h4>
                                </div>
                            </div>
                            <div class="corporate">
                                <h4 class="title">
                                    <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M19.5 2.03687H21.5C22.0523 2.03687 22.5 2.48458 22.5 3.03687V5.03687M21.5 3.03687C13.5585 9.42823 9.44212 11.1498 2.5 12.0369M18.5 10.0369V20.0369C18.5 21.1414 19.3954 22.0369 20.5 22.0369C21.6046 22.0369 22.5 21.1414 22.5 20.0369V10.0369C22.5 8.9323 21.6046 8.03687 20.5 8.03687C19.3954 8.03687 18.5 8.9323 18.5 10.0369ZM2.5 18.0369L2.5 20.0369C2.5 21.1414 3.39543 22.0369 4.5 22.0369C5.60457 22.0369 6.5 21.1414 6.5 20.0369L6.5 18.0369C6.5 16.9323 5.60457 16.0369 4.5 16.0369C3.39543 16.0369 2.5 16.9323 2.5 18.0369ZM10.5 14.0369V20.0369C10.5 21.1414 11.3954 22.0369 12.5 22.0369C13.6046 22.0369 14.5 21.1414 14.5 20.0369V14.0369C14.5 12.9323 13.6046 12.0369 12.5 12.0369C11.3954 12.0369 10.5 12.9323 10.5 14.0369Z"
                                            stroke="#777E90" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                    Email
                                </h4>
                                <div class="cart_price">
                                    <h4>{{ $data['email'] }}</h4>
                                </div>
                            </div>
                            <div class="corporate">
                                <h4 class="title">
                                    <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M8.5 18.0369H16.5M8.5 18.0369C8.5 20.246 10.2909 22.0369 12.5 22.0369C14.7091 22.0369 16.5 20.246 16.5 18.0369M8.5 18.0369V15.8256C8.5 15.1718 8.16659 14.5732 7.69153 14.124C6.34201 12.848 5.5 11.0407 5.5 9.03687C5.5 5.17087 8.63401 2.03687 12.5 2.03687C16.366 2.03687 19.5 5.17087 19.5 9.03687C19.5 11.0407 18.658 12.848 17.3085 14.124C16.8334 14.5732 16.5 15.1718 16.5 15.8256V18.0369M10.5 9.03687L12.5 11.0369M12.5 11.0369L14.5 9.03687M12.5 11.0369V18.0369"
                                            stroke="#777E90" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                    Package
                                </h4>
                                <div class="cart_price">
                                    <h4>{{ $package->title }}</h4>
                                </div>
                            </div>
                            {{-- <div class="corporate">
                                <h4 class="title">
                                    <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M19.5 16.0369V22.0369" stroke="#777E90" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path
                                            d="M22.5 14.0369V6.03687H6.5C4.29086 6.03687 2.5 7.82773 2.5 10.0369V18.0369C2.5 20.246 4.29086 22.0369 6.5 22.0369H14.5"
                                            stroke="#777E90" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M22.5 6.03687C22.5 3.82773 20.7091 2.03687 18.5 2.03687H12.5C10.2909 2.03687 8.5 3.82773 8.5 6.03687V6.03687H22.5V6.03687Z"
                                            stroke="#777E90" stroke-width="1.5" stroke-linejoin="round" />
                                        <path
                                            d="M2.5 12.0369L2.5 16.0369L6.5 16.0369C7.60457 16.0369 8.5 15.1414 8.5 14.0369V14.0369C8.5 12.9323 7.60457 12.0369 6.5 12.0369L2.5 12.0369Z"
                                            stroke="#777E90" stroke-width="1.5" stroke-linejoin="round" />
                                        <path d="M22.5 19.0369L16.5 19.0369" stroke="#777E90" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    Order Number
                                </h4>
                                <div class="cart_price">
                                    <h4>{{ $order_id }}</h4>
                                </div>
                            </div> --}}
                            <div class="corporate">
                                <h4 class="title">
                                    <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="12.5" cy="12.0369" r="10" stroke="#777E90"
                                            stroke-width="1.5" />
                                        <path
                                            d="M14 12.0369C14 12.8653 13.3284 13.5369 12.5 13.5369C11.6716 13.5369 11 12.8653 11 12.0369C11 11.2084 11.6716 10.5369 12.5 10.5369C13.3284 10.5369 14 11.2084 14 12.0369Z"
                                            stroke="#777E90" stroke-width="1.5" />
                                        <path d="M12.5 10.5369V6.03687" stroke="#777E90" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    Payment with
                                </h4>
                                <div class="cart_price">
                                    <h4>

                                        {{ $data['pay_with'] === 'paypal' ? 'Paypal' : 'Credit Card' }}
                                    </h4>
                                </div>
                            </div>
                            <div class="corporate">
                                <h4 class="title">
                                    <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect x="2.5" y="4.03687" width="20" height="16" rx="4"
                                            stroke="#777E90" stroke-width="1.5" />
                                        <path
                                            d="M14.5 10.0369C14.5 8.9323 13.6046 8.03687 12.5 8.03687C11.3954 8.03687 10.5 8.9323 10.5 10.0369C10.5 11.1414 11.3954 12.0369 12.5 12.0369"
                                            stroke="#777E90" stroke-width="1.5" stroke-linecap="round" />
                                        <path
                                            d="M12.5 12.0369C13.6046 12.0369 14.5 12.9323 14.5 14.0369C14.5 15.1414 13.6046 16.0369 12.5 16.0369C11.3954 16.0369 10.5 15.1414 10.5 14.0369"
                                            stroke="#777E90" stroke-width="1.5" stroke-linecap="round" />
                                        <path d="M12.5 6.53687V8.03687" stroke="#777E90" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M12.5 16.0369V17.5369" stroke="#777E90" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    Amount
                                </h4>
                                <div class="cart_price">
                                    <h4>
                                        <sup class="fw-normal" style="font-size: 1rem">&#8378;</sup> {{ $package->price }}
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-center">
                            <a class="btn1 btn_outline_light" href="{{ url()->previous() }}">
                                <i class="fa-solid fa-arrow-left"></i>
                                Go back
                            </a>

                            <form action="{{ route('cart.confirmation', ['plan_id' => $package->id]) }}">
                                <input type="hidden" name="data" id="data" hidden>
                                <button type="submit" class="btn1 btn3 ms-4">
                                    Proceed to Pay
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End: Touch Area -->

    <script>
        const data = JSON.stringify({{ Js::from($data) }});
        document.getElementById('data').value = data;
    </script>
@endsection
