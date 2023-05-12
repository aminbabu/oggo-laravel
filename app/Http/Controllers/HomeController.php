<?php

namespace App\Http\Controllers;

use App\Models\Airline;
use App\Models\Feature;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\View\View;
use TCG\Voyager\Models\MenuItem;

class HomeController extends Controller
{
    /**
     * render home page
     *
     * @return view
     *
     */
    public function index(): View
    {
        $page_ref = MenuItem::where('title', 'Home')->first();
        $items = Feature::where(['page_ref_id' => $page_ref->id])->get();
        $airlines = Airline::all();
        $testimonials = Testimonial::all();

        $features = [];
        $tab_1 = [];
        $tab_2 = [];
        $tab_3 = [];

        foreach ($items as $item => $value) {
            switch ($value->section_ref_key) {
                case 'features':
                    array_push($features, $value);
                    break;
                case 'time_money_tab_1':
                    array_push($tab_1, $value);
                    break;
                case 'time_money_tab_2':
                    array_push($tab_2, $value);
                    break;
                case 'time_money_tab_3':
                    array_push($tab_3, $value);
                    break;
                default:
                    break;
            }
        }

        return view('frontend.index', ['features' => $features, 'airlines' => $airlines, 'tab_1' => $tab_1, 'tab_2' => $tab_2, 'tab_3' => $tab_3, 'testimonials' => $testimonials]);
    }
}