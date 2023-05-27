<?php

namespace App\Http\Controllers;

use App\Mail\SenderInvoiceMail;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Invoice;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\View\View;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Facades\Invoice as InvoiceDocument;
use PragmaRX\Countries\Package\Services\Countries;

class CartController extends Controller
{
    /**
     * render cart page
     *
     * @return view
     */
    public function index($plan_id): View|RedirectResponse
    {
        // check selected package availability
        $package = $this->package_available($plan_id);

        $countries_instance = new Countries();
        $countries = $countries_instance->all()->pluck('name.common')->toArray();

        // sort countries according to country name
        asort($countries);

        return view('frontend.pages.cart', ['package' => $package, 'countries' => $countries]);
    }


    /**
     * render an order invoice document
     *
     * @return view
     */
    public function store(Request $request, $plan_id): RedirectResponse|Response|View
    {
        // check selected package availability
        $package = $this->package_available($plan_id);

        // validate form request
        $data = $this->validated($request);
        $data['pay_with'] = $request->pay_with;

        return view('frontend.pages.cart-confirmation', ['package' => $package, 'data' => $data]);
    }

    /**
     * store invoice and send confirmation email to the customer
     *
     */
    public function confirmation(Request $request, $plan_id): RedirectResponse|Response|View
    {
        // check selected package availability
        $package = $this->package_available($plan_id);
        $data = json_decode($request->data);

        /* TODO: Payment system integration */

        // do some transaction stuffs
        $transaction_successful = true;

        if (!$transaction_successful) {
            // redirect back
            return redirect()->back()->with('failed', 'Transaction could not successful. Please check the payment details and try again later!');
        }

        // store customer details
        $order = $package->orders()->create([
            'payment_system' => $data->pay_with,
            'first_name' => $data->fname,
            'last_name' => $data->lname,
            'email' => $data->email,
            'country' => $data->country,
            'city' => $data->city,
            'state' => $data->state,
            'zip_code' => $data->zip_code,
            'street' => $data->street,
        ]);


        // generate invoice
        $invoice = $this->generateInvoice($data, $package, $order->id);

        // store invoice
        $order->invoice()->create([
            'invoice' => $invoice->filename,
        ]);

        // send the sender email
        Mail::send(new SenderInvoiceMail($invoice));

        return view('frontend.pages.invoice-confirmation', ['order_id' => $order->id]);
    }

    /**
     * package availability
     *
     */
    protected function package_available($plan_id)
    {
        $package = Package::find($plan_id);

        if (!$package) {
            return redirect()->route('pricing');
        }

        return $package;
    }

    /**
     * validat purchase request
     *
     */
    protected function validated(Request $request)
    {
        $validatedData = [
            'fname' => ['required', 'max:255'],
            'lname' => ['required', 'max:255'],
            'email' => ['required', 'email:rfc,dns'],
            'country' => ['required'],
            'city' => ['required', 'max:255'],
            'street' => ['required', 'max:255'],
            'state' => ['required', 'max:255'],
            'zip_code' => ['required'],
        ];

        if ($request->pay_with === 'paypal') {
            $validatedData = $request->validate([
                ...$validatedData,
                'paypal_email' => ['required', 'email:rfc,dns'],
                'paypal_password' => ['required'],
            ]);
        } else {
            $validatedData = $request->validate([
                ...$validatedData,
                'card_number' => ['required', 'min:8', 'max:19'],
                'holder' => ['required', 'max:255'],
                'exp_date' => ['required', 'date_format:m/y', 'after_or_equal:today'],
                'cvc' => ['required', 'min:3', 'max:4'],
            ]);

        }

        return $validatedData;
    }

    /**
     * generate order invoice
     *
     */
    protected function generateInvoice($data, $package, $order_id)
    {
        // create seller
        $seller = new Party([
            'name' => config('app.name'),
            'custom_fields' => [
                'email' => config('mail.reply_to.address'),
            ]
        ]);

        // create buyer
        $buyer = new Party([
            'name' => $data->fname . ' ' . $data->lname,
            'email' => $data->email,
            'address' => "$data->street, $data->state-$data->zip_code, $data->city, $data->country",
            'custom_fields' => [
                'email' => $data->email,
                'order number' => '>>>' . $order_id . '<<<',
            ]
        ]);

        // includes items
        $items = [
            (new InvoiceItem())
                ->title($package->title)
                ->description($package->features)
                ->pricePerUnit($package->price)
        ];

        // create invoice receipt
        $invoice = InvoiceDocument::make('invoice')
            ->series(env('INVOICE_SERIES', '#TR'))
            ->sequence($order_id)
            ->sequencePadding(8)
            ->delimiter('-')
            ->seller($seller)
            ->buyer($buyer)
            ->date(now())
            ->dateFormat('M d, Y')
            ->currencySymbol('$')
            ->currencyCode('USD')
            ->currencyFormat('{SYMBOL}{VALUE}')
            ->currencyThousandsSeparator(',')
            ->currencyDecimalPoint('.')
            ->filename('invoice-' . $package->title . '-' . $data->fname . '-' . time())
            ->taxRate(setting('site.shipping_cost') || 0)
            ->discountByPercent(setting('site.discount_percentage') || 0)
            ->shipping(setting('site.shipping_cost') || 0)
            ->addItems($items)
            ->template('purchase')
            ->logo(public_path() . '/storage/' . setting('site.logo'))
            ->save('invoices');

        return $invoice;
    }
}
