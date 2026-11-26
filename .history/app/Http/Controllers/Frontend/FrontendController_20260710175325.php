<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ContactDetail;
use App\Models\Feature;
use App\Models\Slider;
use App\Services\ZenuService;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Http;
use App\Models\AboutPage;
use App\Models\PropertySection;

class FrontendController extends Controller
{
  
    

    public function home()
{
    

    return view('frontend.home' );
}

   
}