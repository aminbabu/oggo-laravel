<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use Illuminate\Http\Request;
use Illuminate\View\View;
use TCG\Voyager\Models\MenuItem;

class NotFoundController extends Controller
{
    /**
     * render 404 - not found page
     *
     * @return view
     *
     */
    public function index(): View
    {

        $page_ref = MenuItem::where('title', 'Contact')->first();

        $contacts = Feature::where('page_ref_id', $page_ref->id)->get();

        return view('frontend.pages.not-found', ['contacts' => $contacts]);
    }
}