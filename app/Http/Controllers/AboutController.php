<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use Illuminate\Http\Request;
use Illuminate\View\View;
use TCG\Voyager\Models\MenuItem;

class AboutController extends Controller
{
    /**
     * render about page
     *
     * @return View
     */
    public function index(): View
    {
        $page_ref = MenuItem::where('title', 'About')->first();

        $features = Feature::where('page_ref_id', $page_ref->id)->get();

        return view('frontend.pages.about', ['features' => $features]);
    }
}