<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class RegistrationController extends Controller
{
    public function index(Request $request)
    {
        $registrations = $this->filteredQuery($request)->paginate(15)->withQueryString();

        return view('admin.registrations.index', compact('registrations'));
    }

    public function export(Request $request): StreamedResponse
    {
        $registrations = $this->filteredQuery($request)->get();

        $filename = 'iraaya-registrations-' . now()->format('Y-m-d-His') . '.csv';

        return response()->streamDownload(function () use ($registrations) {
            $handle = fopen('php://output', 'w');

            fputcsv($handle, [
                'Name',
                'Email',
                'Phone',
                'Location',
                'Business Name',
                'Amount',
                'Payment Status',
                'Razorpay Payment ID',
                'Registered At',
            ]);

            foreach ($registrations as $registration) {
                fputcsv($handle, [
                    $registration->first_name,
                    $registration->email,
                    $registration->phone,
                    $registration->location,
                    $registration->business_name,
                    $registration->amount,
                    $registration->payment_status,
                    $registration->razorpay_payment_id,
                    $registration->created_at->format('d M Y h:i A'),
                ]);
            }

            fclose($handle);
        }, $filename, [
            'Content-Type' => 'text/csv',
        ]);
    }

    public function edit(Registration $registration)
    {
        return view('admin.registrations.edit', compact('registration'));
    }

    public function update(Request $request, Registration $registration)
    {
        $validated = $request->validate([
            'payment_status' => 'required|in:pending,paid,failed,refunded',
            'lead_type'      => 'required|in:warm,hot,cold',
        ]);

        $registration->update($validated);

        return redirect()
            ->route('admin.registrations.index')
            ->with('success', 'Registration updated successfully.');
    }

    public function destroy(Registration $registration)
    {
        $registration->delete();

        return back()->with('success', 'Registration deleted successfully.');
    }

    private function filteredQuery(Request $request)
    {
        $query = Registration::query();

        if ($request->filled('search')) {
            $search = trim($request->search);

            $query->where(function ($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%")
                    ->orWhere('business_name', 'like', "%{$search}%")
                    ->orWhere('location', 'like', "%{$search}%")
                    ->orWhere('locality', 'like', "%{$search}%");
            });
        }

        if ($request->filled('month')) {
            [$year, $month] = array_pad(explode('-', $request->month), 2, null);

            if ($year && $month) {
                $query->whereYear('created_at', $year)
                    ->whereMonth('created_at', $month);
            }
        }

        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }

        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        if ($request->filled('payment_status')) {
            $query->where('payment_status', $request->payment_status);
        }

        if ($request->filled('lead_type')) {
            $query->where('lead_type', $request->lead_type);
        }

        $sortBy = $request->get('sort_by', 'created_at');
        $allowedSort = ['created_at', 'first_name', 'payment_status', 'lead_type', 'rating'];

        if (! in_array($sortBy, $allowedSort, true)) {
            $sortBy = 'created_at';
        }

        $sortDir = strtolower($request->get('sort_dir', 'desc')) === 'asc' ? 'asc' : 'desc';

        return $query->orderBy($sortBy, $sortDir);
    }
}
