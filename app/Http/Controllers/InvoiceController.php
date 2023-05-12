<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InvoiceController extends Controller
{
    /**
     * generate invoice download link
     *
     */

    public function download($id)
    {
        $invoiceItem = Invoice::where('order_id', $id)->first();

        $file = storage_path() . '/app/invoices/' . $invoiceItem->invoice;

        return response()->download($file);

    }
}