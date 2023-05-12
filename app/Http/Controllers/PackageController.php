<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PackageController extends Controller
{
    /**
     * render pricing page
     *
     * @return view
     */
    public function index(): View
    {
        $packages = Package::all();

        return view('frontend.pages.pricing', ['packages' => $packages]);
    }
}