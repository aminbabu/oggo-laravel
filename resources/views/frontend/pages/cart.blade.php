@extends('frontend.layouts.app')

@section('title', 'Cart')

@section('title-seperator', '|')

@section('content')
    <!-- Start: Cart Area -->
    <section class="cart_area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="cart">
                        <div class="cart_title">
                            <h2>Cart</h2>
                        </div>
                        <div class="price_details">
                            <h4>Price details</h4>
                            <div class="corporate">
                                <h4>{{ $package->title }}</h4>
                                <span></span>
                                <div class="cart_price">
                                    <h4><sup class="fw-normal" style="font-size: 1.5rem;">&#8378;</sup>{{ $package->price }}
                                        <p>TL</p>
                                    </h4>
                                </div>
                            </div>
                        </div>

                        <form action="{{ route('cart.store.plan', ['plan_id' => $package->id]) }}" method="POST"
                            class="needs-validation" novalidate>
                            @csrf

                            <div class="form-main-container">
                                <div class="top-form">
                                    <div class="billing_Info_area">
                                        <h4>Billing Information</h4>
                                        <div class="touch_from_top">
                                            <div class="name_field">
                                                <label for="fname">First name</label>
                                                <input type="text" name="fname" id="fname" placeholder="XYZ"
                                                    class="form-control @error('fname'){{ 'is-invalid' }}@enderror"
                                                    value="{{ old('fname') }}" />
                                            </div>
                                            <div class="name_field">
                                                <label for="lname">Last Name</label>
                                                <input type="text" name="lname" id="lname" placeholder="ABC"
                                                    class="form-control @error('lname'){{ 'is-invalid' }}@enderror"
                                                    value="{{ old('lname') }}" />
                                            </div>
                                        </div>
                                        <label for="email">Email address</label>
                                        <input type="email" name="email" id="email" placeholder="tam@email.net"
                                            class="form-control @error('email'){{ 'is-invalid' }}@enderror"
                                            value="{{ old('email') }}" />

                                        <label for="country">Country</label>
                                        <select data-display="Select"
                                            class="select-option notranslate form-select @error('country'){{ 'is-invalid' }}@enderror"
                                            name="country" id="country">
                                            <option hidden value="">Select Country</option>
                                            @php
                                                foreach ($countries as $code => $name) {
                                                    $selected_class = '';
                                                
                                                    if (old('country') and strtolower(old('country')) == strtolower($name)) {
                                                        $selected_class = 'selected';
                                                    }
                                                    echo '<option value="' . $name . '"' . $selected_class . '>' . $name . '</option>';
                                                }
                                            @endphp
                                        </select>

                                        <div class="touch_from_top">
                                            <div class="name_field">
                                                <label for="city">City</label>
                                                <input type="text" name="city" id="city" placeholder="Turkey"
                                                    class="form-control @error('city'){{ 'is-invalid' }}@enderror"
                                                    value="{{ old('city') }}" />
                                            </div>
                                            <div class="name_field">
                                                <label for="street">Street</label>
                                                <input type="text" name="street" id="street" placeholder="Bostancı"
                                                    class="form-control @error('street'){{ 'is-invalid' }}@enderror"
                                                    value="{{ old('street') }}" />
                                            </div>
                                        </div>

                                        <div class="touch_from_top">
                                            <div class="name_field">
                                                <label for="state">State</label>
                                                <input type="text" name="state" id="state" placeholder="Istanbul"
                                                    class="form-control @error('state'){{ 'is-invalid' }}@enderror"
                                                    value="{{ old('state') }}" />
                                            </div>
                                            <div class="name_field">
                                                <label for="zip_code">Zip Code</label>
                                                <input type="text" name="zip_code" id="zip_code" placeholder="XXXXX"
                                                    class="form-control @error('zip_code'){{ 'is-invalid' }}@enderror"
                                                    value="{{ old('zip_code') }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bottom-form">
                                    <div class="billing_Info_area pay_area">
                                        <div class="pay_title">
                                            <h4>Pay with</h4>
                                            <div class="cradite_card">
                                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                                    <li class="nav-item" role="presentation">
                                                        <input type="checkbox" name="pay_with" id="credit_card" hidden
                                                            value="credit_card"
                                                            @if (old('pay_with') === 'credit_card' or !old('pay_with')) {{ 'checked' }} @endif />
                                                        <label for="credit_card"
                                                            class="nav-link notranslate @if (old('pay_with') === 'credit_card' or !old('pay_with')) {{ 'active' }} @endif"
                                                            id="pills-home-tab" data-bs-toggle="pill"
                                                            data-bs-target="#pills-home" type="button" role="tab"
                                                            aria-controls="pills-home" aria-selected="true">
                                                            Credit Card
                                                        </label>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <input type="checkbox" name="pay_with" id="paypal" hidden
                                                            value="paypal"
                                                            @if (old('pay_with') === 'paypal') {{ 'checked' }} @endif />
                                                        <label for="paypal"
                                                            class="nav-link notranslate @if (old('pay_with') === 'paypal') {{ 'active' }} @endif"
                                                            id="pills-profile-tab" data-bs-toggle="pill"
                                                            data-bs-target="#pills-profile" type="button" role="tab"
                                                            aria-controls="pills-profile" aria-selected="false">
                                                            Paypal
                                                        </label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="tab-content" id="pills-tabContent">
                                            <div class="tab-pane fade @if (old('pay_with') === 'credit_card' or !old('pay_with')) {{ 'show active' }} @endif"
                                                id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                                <div class="cradite_card2">
                                                    <p>Credit Card</p>
                                                    <div class="card_img">
                                                        <img src="{{ Vite::asset('resources/frontend/assets/images/pricingCart/Visa.png') }}"
                                                            alt="logo" />
                                                        <img class="card_icon2"
                                                            src="{{ Vite::asset('resources/frontend/assets/images/pricingCart/layer1.png') }}"
                                                            alt="logo" />
                                                    </div>
                                                </div>

                                                <label for="card_number">Card Number</label>
                                                <input type="number" name="card_number" id="card_number"
                                                    class="form-control @error('card_number'){{ 'is-invalid' }}@enderror"
                                                    value="{{ old('card_number') }}" placeholder="XXXX XXXX XXXX XXXX" />

                                                <label for="holder">Card Holder</label>
                                                <input type="text" name="holder" id="holder"
                                                    placeholder="John Doe"
                                                    class="form-control @error('holder'){{ 'is-invalid' }}@enderror"
                                                    value="{{ old('holder') }}" />

                                                <div class="touch_from_top">
                                                    <div class="name_field">
                                                        <label for="exp_date">Expiration Date</label>
                                                        <input type="text" name="exp_date" id="exp_date"
                                                            placeholder="MM/YY"
                                                            class="form-control @error('exp_date'){{ 'is-invalid' }}@enderror"
                                                            value="{{ old('exp_date') }}" />
                                                    </div>
                                                    <div class="name_field">
                                                        <label for="cvc">CVC</label>
                                                        <input type="text" name="cvc" id="cvc"
                                                            placeholder="XXX"
                                                            class="form-control @error('cvc'){{ 'is-invalid' }}@enderror"
                                                            value="{{ old('cvc') }}" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade @if (old('pay_with') === 'paypal') {{ 'show active' }} @endif"
                                                id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                                <div class="cradite_card2">
                                                    <p>Paypal</p>
                                                    <div class="card_img">
                                                        <img class="paypal"
                                                            src="{{ Vite::asset('resources/frontend/assets/images/pricingCart/paypal.png') }}"
                                                            alt="" />
                                                    </div>
                                                </div>

                                                <label for="paypal_email">Email</label>
                                                <input type="text" name="paypal_email" id="paypal_email"
                                                    class="form-control @error('paypal_email'){{ 'is-invalid' }}@enderror"
                                                    value="{{ old('paypal_email') }}" placeholder="Email" />

                                                <label for="paypal_password">Password</label>
                                                <input type="password" name="paypal_password" id="paypal_password"
                                                    placeholder="Passwor"
                                                    class="form-control @error('paypal_password'){{ 'is-invalid' }}@enderror"
                                                    value="{{ old('paypal_password') }}" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="confirm_btn">
                                        <button type="submit" class="btn1 btn3">
                                            Confirm {{ $package->price }} TL
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End: Touch Area -->
@endsection
