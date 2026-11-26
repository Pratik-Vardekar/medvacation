<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactEnquiry;
use App\Models\Newsletter;
use App\Models\Registration;
use App\Models\Slider;
use App\Models\Testimonial;

class DashboardController extends Controller
{
    public function index()
    {
        // Patient Enquiries stats
        $totalEnquiries = 0;
        $thisMonthEnquiries = 0;
        $recentEnquiries = collect([]);
        try {
            $totalEnquiries = ContactEnquiry::count();
            $thisMonthEnquiries = ContactEnquiry::whereYear('created_at', now()->year)
                ->whereMonth('created_at', now()->month)
                ->count();
            $recentEnquiries = ContactEnquiry::latest()->take(10)->get();
        } catch (\Throwable $e) {
            // Table might not exist yet
        }

        // Testimonials count
        $totalTestimonials = 0;
        try {
            $totalTestimonials = Testimonial::count();
        } catch (\Throwable $e) {
        }

        // Sliders count
        $totalSliders = 0;
        try {
            $totalSliders = Slider::count();
        } catch (\Throwable $e) {
        }

        // Newsletters count
        $totalNewsletters = 0;
        try {
            $totalNewsletters = Newsletter::count();
        } catch (\Throwable $e) {
        }

        // Registrations (backward compatibility)
        $totalRegistrations = 0;
        $thisMonthRegistrations = 0;
        $totalRevenue = 0;
        $thisMonthRevenue = 0;
        $recentRegistrations = collect([]);

        try {
            $paid = Registration::query();
            $totalRegistrations = (clone $paid)->count();
            $thisMonthRegistrations = (clone $paid)->whereYear('created_at', now()->year)
                ->whereMonth('created_at', now()->month)
                ->count();
            $totalRevenue = (clone $paid)->sum('amount') ?? 0;
            $thisMonthRevenue = (clone $paid)->whereYear('created_at', now()->year)
                ->whereMonth('created_at', now()->month)
                ->sum('amount') ?? 0;
            $recentRegistrations = (clone $paid)->latest()->take(8)->get();
        } catch (\Throwable $e) {
        }

        return view('dashboard', [
            'totalEnquiries'         => $totalEnquiries,
            'thisMonthEnquiries'     => $thisMonthEnquiries,
            'recentEnquiries'        => $recentEnquiries,
            'totalTestimonials'      => $totalTestimonials,
            'totalSliders'           => $totalSliders,
            'totalNewsletters'       => $totalNewsletters,
            'totalRegistrations'     => $totalRegistrations,
            'thisMonthRegistrations' => $thisMonthRegistrations,
            'totalRevenue'           => $totalRevenue,
            'thisMonthRevenue'       => $thisMonthRevenue,
            'recentRegistrations'    => $recentRegistrations,
        ]);
    }
}
