<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewsletterController extends Controller
{
    /**
     * Subscribe a user to the newsletter.
     */
    public function subscribe(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
        ], [
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please provide a valid email address.',
        ]);

        if ($validator->fails()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => $validator->errors()->first('email'),
                ], 422);
            }
            return back()->withErrors($validator, 'newsletter')->withInput();
        }

        $email = strtolower(trim($request->email));

        try {
            $existing = Newsletter::where('email', $email)->first();

            if ($existing) {
                $msg = 'You are already subscribed to our newsletter!';
                if ($request->ajax() || $request->wantsJson()) {
                    return response()->json([
                        'success' => true,
                        'message' => $msg,
                    ]);
                }
                return back()->with('newsletter_info', $msg);
            }

            Newsletter::create([
                'email' => $email,
            ]);

            $msg = 'Thank you for subscribing to Med Vacation newsletter!';
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => $msg,
                ]);
            }

            return back()->with('newsletter_success', $msg);
        } catch (\Throwable $e) {
            $msg = 'Something went wrong. Please try again later.';
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => $msg,
                ], 500);
            }
            return back()->with('newsletter_error', $msg);
        }
    }

    /**
     * View all newsletter subscribers in admin panel.
     */
    public function index()
    {
        try {
            $newsletters = Newsletter::latest()->paginate(15);
            return view('admin.newsletters.index', compact('newsletters'));
        } catch (\Exception $e) {
            $newsletters = collect([]);
            return view('admin.newsletters.index', compact('newsletters'))
                ->with('error', 'Unable to load subscribers: ' . $e->getMessage());
        }
    }
}
