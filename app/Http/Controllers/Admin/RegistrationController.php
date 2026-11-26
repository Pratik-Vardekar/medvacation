<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class RegistrationController extends Controller
{
    public function index(Request $request)
    {
        $registrations = $this->filteredQuery($request)
            ->paginate(15)
            ->withQueryString();

        $paid = Registration::query();

        $summary = [
            'total' => (clone $paid)->count(),
            'thisMonth' => (clone $paid)->whereYear('created_at', now()->year)->whereMonth('created_at', now()->month)->count(),
            'revenue' => (clone $paid)->sum('amount'),
        ];

        return view('admin.registrations.index', compact('registrations', 'summary'));
    }


    public function show(Registration $registration)
    {
        return view('admin.registrations.show', compact('registration'));
    }


    public function edit(Registration $registration)
    {
        return view('admin.registrations.edit', compact('registration'));
    }


    public function document(Registration $registration, string $field)
    {
        $allowed = [
            'pan_document',
            'aadhaar_document',
            'gst_document',
            'business_registration_document',
            'signature',
        ];

        abort_unless(in_array($field, $allowed, true), 404);

        $path = $registration->{$field};

        abort_unless($path && Storage::disk('public')->exists($path), 404);

        return Storage::disk('public')->response($path);
    }


    public function update(Request $request, Registration $registration)
    {
        $validated = $request->validate([
            'payment_status' => 'required|in:pending,paid,failed,refunded',
        ]);

        $registration->update($validated);

        return redirect()
            ->route('admin.registrations.show', $registration)
            ->with('success', 'Registration updated successfully.');
    }


    public function destroy(Registration $registration)
    {
        $registration->delete();

        return redirect()
            ->route('admin.registrations.index')
            ->with('success', 'Registration deleted successfully.');
    }


    public function export(Request $request): StreamedResponse
    {
        $registrations = $this->filteredQuery($request)->get();

        $filename = 'iraaya-registrations-' .
            now()->format('Y-m-d-His') .
            '.xls';

        $headings = [
            'Name',
            'Date of Birth',
            'Age',
            'Email',
            'Phone',
            'WhatsApp',
            'Location',
            'Social Media',
            'Business Name',
            'Company Name',
            'Business Category',
            'Designation',
            'Business Address',
            'Website',
            'Business Age',
            'Business Description',
            'Products / Services',
            'Target Audience',
            'PAN',
            'Aadhaar Last 4',
            'GSTIN',
            'Business Constitution',
            'Registered Name',
            'Registered Address',
            'Emergency Contact Name',
            'Emergency Relationship',
            'Emergency Contact',
            'Preferred Circle',
            'Preferred Location',
            'How Heard',
            'Referred By',
            'Areas of Interest',
            'Expertise',
            'Active Participation',
            'Leadership Interest',
            'Code of Conduct',
            'Declaration',
            'Applicant Name',
            'Applicant Date',
            'Place',
            'Amount',
            'Payment Status',
            'Razorpay Order ID',
            'Razorpay Payment ID',
            'UTM Source',
            'UTM Medium',
            'UTM Campaign',
            'UTM Content',
            'UTM Term',
            'Campaign ID',
            'Adset ID',
            'Ad ID',
            'Placement',
            'Registered At',
        ];

        return response()->streamDownload(function () use ($registrations, $headings) {
            echo "\xEF\xBB\xBF";
            echo '<html><head><meta charset="UTF-8"></head><body><table border="1">';
            echo '<tr>';
            foreach ($headings as $heading) {
                echo '<th>' . e($heading) . '</th>';
            }
            echo '</tr>';

            foreach ($registrations as $registration) {
                $areas = is_array($registration->areas_of_interest)
                    ? implode(', ', $registration->areas_of_interest)
                    : $registration->areas_of_interest;

                $row = [
                    $registration->first_name,
                    $registration->date_of_birth?->format('d M Y'),
                    $registration->age,
                    $registration->email,
                    $registration->phone,
                    $registration->whatsapp,
                    $registration->location,
                    $registration->social_media,
                    $registration->business_name,
                    $registration->company_name,
                    $registration->business_category,
                    $registration->designation,
                    $registration->business_address,
                    $registration->website,
                    $registration->business_age,
                    $registration->business_description,
                    $registration->products_services,
                    $registration->target_audience,
                    $registration->pan,
                    $registration->aadhaar_last4,
                    $registration->gstin,
                    $registration->business_constitution,
                    $registration->registered_name,
                    $registration->registered_address,
                    $registration->emergency_contact_name,
                    $registration->emergency_relationship,
                    $registration->emergency_contact,
                    $registration->preferred_circle,
                    $registration->preferred_location,
                    $registration->how_heard,
                    $registration->referred_by,
                    $areas,
                    $registration->expertise,
                    $registration->active_participation,
                    $registration->leadership_interest,
                    $registration->agree_code,
                    $registration->declaration_agree ? 'Yes' : 'No',
                    $registration->applicant_name,
                    $registration->applicant_date?->format('d M Y'),
                    $registration->place,
                    $registration->amount,
                    $registration->payment_status,
                    $registration->razorpay_order_id,
                    $registration->razorpay_payment_id,
                    $registration->utm_source,
                    $registration->utm_medium,
                    $registration->utm_campaign,
                    $registration->utm_content,
                    $registration->utm_term,
                    $registration->campaign_id,
                    $registration->adset_id,
                    $registration->ad_id,
                    $registration->placement,
                    $registration->created_at
                        ? $registration->created_at->timezone('Asia/Kolkata')->format('d M Y h:i A')
                        : '',
                ];

                echo '<tr>';
                foreach ($row as $value) {
                    echo '<td>' . e((string) ($value ?? '')) . '</td>';
                }
                echo '</tr>';
            }

            echo '</table></body></html>';
        }, $filename, [
            'Content-Type' => 'application/vnd.ms-excel; charset=UTF-8',
        ]);
    }


    private function filteredQuery(Request $request)
    {
        $query = Registration::query();

        $allowedStatus = ['pending', 'paid', 'failed', 'refunded'];

        if ($request->filled('payment_status') && in_array($request->payment_status, $allowedStatus, true)) {
            $query->where('payment_status', $request->payment_status);
        }


        /*
        |--------------------------------------------------------------------------
        | Search
        |--------------------------------------------------------------------------
        */

        if ($request->filled('search')) {

            $search = trim($request->search);

            $query->where(function ($q) use ($search) {

                $q->where('first_name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%")
                    ->orWhere('business_name', 'like', "%{$search}%")
                    ->orWhere('business_category', 'like', "%{$search}%")
                    ->orWhere('designation', 'like', "%{$search}%")
                    ->orWhere('location', 'like', "%{$search}%")
                    ->orWhere('preferred_circle', 'like', "%{$search}%")
                    ->orWhere('preferred_location', 'like', "%{$search}%")
                    ->orWhere('utm_source', 'like', "%{$search}%")
                    ->orWhere('utm_medium', 'like', "%{$search}%")
                    ->orWhere('utm_campaign', 'like', "%{$search}%")
                    ->orWhere('utm_content', 'like', "%{$search}%")
                    ->orWhere('utm_term', 'like', "%{$search}%")
                    ->orWhere('campaign_id', 'like', "%{$search}%")
                    ->orWhere('adset_id', 'like', "%{$search}%")
                    ->orWhere('ad_id', 'like', "%{$search}%")
                    ->orWhere('placement', 'like', "%{$search}%");
            });
        }


        /*
        |--------------------------------------------------------------------------
        | Month
        |--------------------------------------------------------------------------
        */

        if ($request->filled('month')) {

            [$year, $month] = array_pad(
                explode('-', $request->month),
                2,
                null
            );

            if ($year && $month) {

                $query->whereYear('created_at', $year)
                    ->whereMonth('created_at', $month);
            }
        }


        /*
        |--------------------------------------------------------------------------
        | Date From
        |--------------------------------------------------------------------------
        */

        if ($request->filled('date_from')) {

            $query->whereDate(
                'created_at',
                '>=',
                $request->date_from
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Date To
        |--------------------------------------------------------------------------
        */

        if ($request->filled('date_to')) {

            $query->whereDate(
                'created_at',
                '<=',
                $request->date_to
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Sorting
        |--------------------------------------------------------------------------
        */

        $sortBy = $request->get('sort_by', 'created_at');

        $allowedSort = [
            'created_at',
            'first_name',
            'business_name',
            'business_category',
            'preferred_circle',
            'preferred_location',
            'payment_status',
            'amount',
        ];

        if (!in_array($sortBy, $allowedSort, true)) {
            $sortBy = 'created_at';
        }


        $sortDir = strtolower(
            $request->get('sort_dir', 'desc')
        ) === 'asc'
            ? 'asc'
            : 'desc';


        return $query->orderBy($sortBy, $sortDir);
    }
}