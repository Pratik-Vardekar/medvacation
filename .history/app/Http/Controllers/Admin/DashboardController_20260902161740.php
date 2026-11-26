<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Registration;

class DashboardController extends Controller
{
    public function index()
    {
        $paid = Registration::query();

        return view('dashboard', [
            'totalRegistrations'     => (clone $paid)->count(),
            'thisMonthRegistrations' => (clone $paid)->whereYear('created_at', now()->year)->whereMonth('created_at', now()->month)->count(),
            'totalRevenue'           => (clone $paid)->sum('amount'),
            'thisMonthRevenue'       => (clone $paid)->whereYear('created_at', now()->year)->whereMonth('created_at', now()->month)->sum('amount'),
            'recentRegistrations'    => (clone $paid)->latest()->take(8)->get(),
        ]);
    }
}
