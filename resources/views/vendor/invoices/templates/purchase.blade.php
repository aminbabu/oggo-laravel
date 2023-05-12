<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $invoice->name }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

    <style type="text/css" media="screen">
        html {
            font-family: 'Roboto', sans-serif;
            line-height: 1.15;
            margin: 0;
        }

        body {
            font-family: 'Roboto', sans-serif;
            font-weight: 400;
            line-height: 1.5;
            color: #0A2540;
            text-align: left;
            background-color: #fff;
            font-size: 10px;
            margin: 36pt;
        }

        h4 {
            margin-top: 0;
            margin-bottom: 0.5rem;
        }

        p {
            margin-top: 0;
            margin-bottom: 1rem;
        }

        strong {
            font-weight: bolder;
        }

        img {
            vertical-align: middle;
            border-style: none;
        }

        table {
            border-collapse: collapse;
        }

        th {
            text-align: inherit;
        }

        h4,
        .h4 {
            font-weight: 500;
            line-height: 1.2;
        }

        h4,
        .h4 {
            font-size: 1.25rem;
        }

        img {
            max-width: 100%;
            height: auto;
        }

        .fw-bold {
            font-weight: 700;
        }

        .text-12 {
            font-size: 0.75rem;
        }

        .text-14 {
            font-size: 0.875rem;
        }

        .text-18 {
            font-size: 1.125rem;
        }

        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #0A2540;
        }

        .table th,
        .table td {
            padding: 0.75rem;
            vertical-align: top;
        }

        .mt-5 {
            margin-top: 1.5rem !important;
        }

        .m-0 {
            margin: 0 !important;
        }

        .mb-2 {
            margin-bottom: .5rem !important;
        }

        .pr-0,
        .px-0 {
            padding-right: 0 !important;
        }

        .pl-0,
        .px-0 {
            padding-left: 0 !important;
        }

        .text-right {
            text-align: right !important;
        }

        .text-center {
            text-align: center !important;
        }

        .text-uppercase {
            text-transform: uppercase !important;
        }

        * {
            font-family: "DejaVu Sans";
        }

        body,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        table,
        th,
        tr,
        td,
        p,
        div {
            line-height: 1.1;
        }

        .party-header {
            font-size: 1.5rem;
            font-weight: 400;
        }

        .total-amount {
            font-size: 12px;
            font-weight: 700;
        }

        .border-0 {
            border: none !important;
        }

        .cool-gray {
            color: #6B7280 !important;
        }

        .brand-logo {
            width: 8rem;
        }

        .table-items-wrapper {
            border-radius: 0.25rem !important;
            overflow: hidden;
            border: 1px solid #DFE4EA;
        }

        .table-items-wrapper .table {
            margin-bottom: 0;
        }

        .table-items-wrapper thead {
            border: 0;
            box-shadow: 0;
        }

        .table-items-wrapper tbody tr {
            border-top: 1px solid #DFE4EA;
        }


        .table-items-wrapper tr>* {
            border-right: 1px solid #DFE4EA;
        }

        .table-items-wrapper tr>*:last-child {
            border-right: 0;
        }

        .table-total-wrapper {
            border: 1px solid #DFE4EA;
            background-color: #F9F9FA;
            border-radius: 0.25rem;
            max-width: 320px;
            margin-left: auto;
            margin-top: 1rem;
            margin-bottom: 1.5rem;
        }

        .table-total-wrapper .table {
            margin-bottom: 0;
        }

        .table-total-wrapper th,
        .table-total-wrapper td {
            padding-top: .25rem;
            padding-bottom: .25rem;
        }
    </style>
</head>

<body>
    {{-- Header --}}
    <div class="text-center">
        @if ($invoice->logo)
            <img src="{{ $invoice->getLogo() }}" alt="logo" height="44" width="121" class="brand-logo">
        @endif
    </div>

    <table class="mt-5 table">
        <tbody>
            <tr>
                <td class="border-0 pl-0" width="70%">
                    <h4 class="text-uppercase mb-0">
                        <strong>{{ $invoice->name }} {{ $invoice->getSerialNumber() }}</strong>
                    </h4>
                    <p class="text-12">{{ __('invoices::invoice.date') }}: {{ $invoice->getDate() }}</p>
                </td>
            </tr>
        </tbody>
    </table>

    {{-- Seller - Buyer --}}
    <table class="table">
        <thead class="text-14">
            <tr>
                <th class="party-header border-0 pl-0" width="48.5%">
                    <strong class="text-18 text-uppercase">{{ __('invoices::invoice.seller') }}</strong>
                </th>
                <th class="border-0" width="3%"></th>
                <th class="party-header border-0 pl-0">
                    <strong class="text-18 text-uppercase">{{ __('invoices::invoice.buyer') }}</strong>
                </th>
            </tr>
        </thead>
        <tbody class="text-12">
            <tr>
                <td class="px-0">
                    @if ($invoice->seller->name)
                        <p class="seller-name mb-2">
                            <strong>{{ $invoice->seller->name }}</strong>
                        </p>
                    @endif

                    @if ($invoice->seller->address)
                        <p class="seller-address mb-2">
                            {{ __('invoices::invoice.address') }}: {{ $invoice->seller->address }}
                        </p>
                    @endif

                    @if ($invoice->seller->code)
                        <p class="seller-code mb-2">
                            {{ __('invoices::invoice.code') }}: {{ $invoice->seller->code }}
                        </p>
                    @endif

                    @if ($invoice->seller->vat)
                        <p class="seller-vat mb-2">
                            {{ __('invoices::invoice.vat') }}: {{ $invoice->seller->vat }}
                        </p>
                    @endif

                    @if ($invoice->seller->phone)
                        <p class="seller-phone mb-2">
                            {{ __('invoices::invoice.phone') }}: {{ $invoice->seller->phone }}
                        </p>
                    @endif

                    @foreach ($invoice->seller->custom_fields as $key => $value)
                        <p class="seller-custom-field mb-2">
                            <span>{{ ucfirst($key) }}:</span> {{ $value }}
                        </p>
                    @endforeach
                </td>
                <td class="border-0"></td>
                <td class="px-0">
                    @if ($invoice->buyer->name)
                        <p class="buyer-name mb-2">
                            <strong>{{ $invoice->buyer->name }}</strong>
                        </p>
                    @endif

                    @if ($invoice->buyer->address)
                        <p class="buyer-address mb-2">
                            {{ __('invoices::invoice.address') }}: {{ $invoice->buyer->address }}
                        </p>
                    @endif

                    @if ($invoice->buyer->code)
                        <p class="buyer-code mb-2">
                            {{ __('invoices::invoice.code') }}: {{ $invoice->buyer->code }}
                        </p>
                    @endif

                    @if ($invoice->buyer->vat)
                        <p class="buyer-vat mb-2">
                            {{ __('invoices::invoice.vat') }}: {{ $invoice->buyer->vat }}
                        </p>
                    @endif

                    @if ($invoice->buyer->phone)
                        <p class="buyer-phone mb-2">
                            {{ __('invoices::invoice.phone') }}: {{ $invoice->buyer->phone }}
                        </p>
                    @endif

                    @foreach ($invoice->buyer->custom_fields as $key => $value)
                        <p class="buyer-custom-field mb-2">
                            <span>{{ ucfirst($key) }}:</span> {{ $value }}
                        </p>
                    @endforeach
                </td>
            </tr>
        </tbody>
    </table>

    {{-- Table Items --}}
    <div class="table-items-wrapper">
        <table class="table-items table">
            <thead>
                <tr>
                    <th scope="col">{{ __('invoices::invoice.description') }}</th>
                    @if ($invoice->hasItemUnits)
                        <th scope="col" class="text-center">{{ __('invoices::invoice.units') }}</th>
                    @endif
                    <th scope="col" class="text-center">{{ __('invoices::invoice.quantity') }}</th>
                    <th scope="col" class="text-center">{{ __('invoices::invoice.price') }}</th>
                    @if ($invoice->hasItemDiscount)
                        <th scope="col" class="text-center">{{ __('invoices::invoice.discount') }}</th>
                    @endif
                    @if ($invoice->hasItemTax)
                        <th scope="col" class="text-center">{{ __('invoices::invoice.tax') }}</th>
                    @endif
                    <th scope="col" class="text-center">{{ __('Amount') }}</th>
                </tr>
            </thead>
            <tbody>
                {{-- Items --}}
                @foreach ($invoice->items as $item)
                    <tr>
                        <td>
                            {{ $item->title }}

                            @if ($item->description)
                                <p class="cool-gray">{!! $item->description !!}</p>
                            @endif
                        </td>
                        @if ($invoice->hasItemUnits)
                            <td class="text-center">{{ $item->units }}</td>
                        @endif
                        <td class="text-center">{{ $item->quantity }}</td>
                        <td class="text-center">
                            {{ $invoice->formatCurrency($item->price_per_unit) }}
                        </td>
                        @if ($invoice->hasItemDiscount)
                            <td class="text-center">
                                {{ $invoice->formatCurrency($item->discount) }}
                            </td>
                        @endif
                        @if ($invoice->hasItemTax)
                            <td class="text-center">
                                {{ $invoice->formatCurrency($item->tax) }}
                            </td>
                        @endif

                        <td class="text-center">
                            {{ $invoice->formatCurrency($item->sub_total_price) }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Table Total --}}
    <div class="table-total-wrapper text-12">
        <table class="table">
            <tbody>
                {{-- Summary --}}
                <tr>
                    <td>{{ __('invoices::invoice.sub_total') }} (excl. GST)</td>
                    <td class="text-right">
                        {{ $invoice->currency_symbol }}@php
                            $total = 0;
                            
                            foreach ($invoice->items as $item => $product) {
                                $total += $product->sub_total_price;
                            }
                            
                            echo number_format($total, 2, '.', ',');
                        @endphp
                    </td>
                </tr>
                @if ($invoice->hasItemOrInvoiceDiscount())
                    <tr>
                        <td>{{ __('invoices::invoice.total_discount') }}</td>
                        <td class="text-right">
                            {{ $invoice->formatCurrency($invoice->total_discount) }}
                        </td>
                    </tr>
                @endif
                @if ($invoice->taxable_amount)
                    <tr>
                        <td>{{ __('invoices::invoice.taxable_amount') }}</td>
                        <td class="text-right">
                            {{ $invoice->formatCurrency($invoice->taxable_amount) }}
                        </td>
                    </tr>
                @endif
                @if ($invoice->tax_rate)
                    <tr>
                        <td>{{ __('invoices::invoice.tax_rate') }}</td>
                        <td class="text-right">
                            {{ $invoice->tax_rate }}%
                        </td>
                    </tr>
                @endif
                @if ($invoice->hasItemOrInvoiceTax())
                    <tr>
                        <td>{{ __('invoices::invoice.total_taxes') }}</td>
                        <td class="text-right">
                            {{ $invoice->formatCurrency($invoice->total_taxes) }}
                        </td>
                    </tr>
                @endif
                @if ($invoice->shipping_amount)
                    <tr>
                        <td>{{ __('invoices::invoice.shipping') }}</td>
                        <td class="text-right">
                            {{ $invoice->formatCurrency($invoice->shipping_amount) }}
                        </td>
                    </tr>
                @endif
                <tr>
                    <td><strong>{{ __('invoices::invoice.total_amount') }}</strong></td>
                    <td class="total-amount text-right">
                        {{ $invoice->formatCurrency($invoice->total_amount) }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    @if ($invoice->notes)
        <p>
            {{ trans('invoices::invoice.notes') }}: {!! $invoice->notes !!}
        </p>
    @endif

    <p>
        {{ trans('invoices::invoice.amount_in_words') }}: {{ $invoice->getTotalAmountInWords() }}
    </p>
    {{-- <p>
        {{ trans('invoices::invoice.pay_until') }}: {{ $invoice->getPayUntilDate() }}
    </p> --}}

    <script type="text/php">
            if (isset($pdf) && $PAGE_COUNT > 1) {
                $text = "Page {PAGE_NUM} / {PAGE_COUNT}";
                $size = 10;
                $font = $fontMetrics->getFont("Verdana");
                $width = $fontMetrics->get_text_width($text, $font, $size) / 2;
                $x = ($pdf->get_width() - $width);
                $y = $pdf->get_height() - 35;
                $pdf->page_text($x, $y, $text, $font, $size);
            }
        </script>
</body>

</html>
