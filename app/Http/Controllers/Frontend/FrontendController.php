<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutPage;
use Illuminate\Support\Facades\Http;

class FrontendController extends Controller
{
    public function home()
    {
        try {
            $about = AboutPage::first();
        } catch (\Throwable $e) {
            $about = null;
        }

        return view('frontend.home', compact('about'));
    }

    public function about()
    {
        try {
            $about = AboutPage::with(['founders' => function ($query) {
                $query->where('is_active', true)->orderBy('sort_order', 'asc');
            }])->first();
        } catch (\Throwable $e) {
            $about = null;
        }

        return view('frontend.about-us', compact('about'));
    }

    public function services()
    {
        return view('frontend.services');
    }

    public function affiliations()
    {
        return view('frontend.affiliations');
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function careers()
    {
        return view('frontend.careers');
    }

    public function testimonials()
    {
        return view('frontend.testimonials');
    }

    public function faq()
    {
        return view('frontend.faq');
    }
}
