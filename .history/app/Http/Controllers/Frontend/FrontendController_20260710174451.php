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

    public function buy()
    {
        $contact = ContactDetail::first();

        $response = $this->zenu->listings();

        $properties = $response['data'] ?? [];

        // Buy Properties
        $properties = collect($properties)->filter(function ($property) {
            return strtolower($property['listing_status'] ?? '') != 'sold';
        });

        return view('frontend.buy', compact('properties', 'contact'));
    }
 public function propertySearch(Request $request)
{
    $contact = ContactDetail::first();
    $search = strtolower(trim($request->search));
    
    // Fetch listings from Zenu API
    $response = $this->zenu->listings();
    
    // Get properties from response
    $properties = collect($response['data'] ?? []);
    
    // Filter properties if search term exists
    if (!empty($search)) {
        $filtered = $properties->filter(function ($property) use ($search) {
            // Search in relevant fields
            $searchableText = strtolower(implode(' ', [
                $property['address']['suburb'] ?? '',
                $property['address']['street_name'] ?? '',
                $property['address']['state'] ?? '',
                $property['address']['postcode'] ?? '',
                $property['heading'] ?? '',
                $property['description'] ?? '',
                $property['property_type'] ?? ''
            ]));
            
            return str_contains($searchableText, $search);
        })->values();
    } else {
        // Show all properties if no search term
        $filtered = $properties;
    }
    
    // Debug: Check if we have results
    \Log::info('Search: ' . $search . ' | Found: ' . $filtered->count() . ' properties');
    
    return view('frontend.search-results', [
        'properties' => $filtered,
        'search' => $request->search,
        'contact' => $contact
    ]);
}
    public function sale()
    {
        $contact = ContactDetail::first();

        $response = $this->zenu->listings();

        $properties = $response['data'] ?? [];

        // Sold Properties
        $properties = collect($properties)->filter(function ($property) {
            return strtolower($property['listing_status'] ?? '') == 'sold';
        });

        return view('frontend.sale', compact('properties', 'contact'));
    }

    public function saleDetail($id)
    {
        $contact = ContactDetail::first();

        $response = $this->zenu->listing($id);

        $property = $response['data'] ?? [];

        return view('frontend.sale-detail', compact('property', 'contact'));
    }

   public function about()
{
    $contact = ContactDetail::first();

    $about = AboutPage::first();

    return view('frontend.about-us', compact(
        'contact',
        'about'
    ));
}

    public function contact()
    {
        $contact = ContactDetail::first();

        return view('frontend.contact', compact('contact'));
    }
}