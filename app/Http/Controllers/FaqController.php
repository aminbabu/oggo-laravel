<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Faq as FaqModel;

class FaqController extends Controller
{
    /**
    | read hotel suppliers' data
    |
    */
    public function hotel_suppliers(): View
    {
        $supplier_type = Supplier::where('supplier_type', 'hotel')->first();

        $faqs = FaqModel::where('supplier_id', $supplier_type->id)->get();

        return view('frontend.pages.hotel-suppliers', ['faqs' => $faqs]);
    }


    /**
    | read flight suppliers' data
    |
    */
    public function flight_suppliers(): View
    {
        $supplier_type = Supplier::where('supplier_type', 'flight')->first();

        $faqs = FaqModel::where('supplier_id', $supplier_type->id)->get();

        return view('frontend.pages.flight-suppliers', ['faqs' => $faqs]);
    }
}