<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Http;


class FrontendController extends Controller
{
  
    

    public function home()
{
    

    return view('frontend.home' );
}

public function about()
{
    

    return view('frontend.about' );
}
   
}