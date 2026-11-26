<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use Illuminate\Http\Request;

class FeatureCardController extends Controller
{
    public function index()
    {
        $cards = Feature::orderBy('sr_no', 'asc')->get();

        return view('admin.features.index', compact('cards'));
    }

    public function edit($id)
    {
        $feature = Feature::findOrFail($id);

        return view('admin.features.edit', compact('feature'));
    }

    public function update(Request $request, $id)
    {
        $card = Feature::findOrFail($id);

        $icon = $card->icon;

        if ($request->hasFile('icon')) {

            $file = $request->file('icon');

            $filename = time() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('uploads/feature-cards'), $filename);

            $icon = 'uploads/feature-cards/' . $filename;
        }

        $card->update([

            'title' => $request->title,
            'description' => $request->description,
            'icon' => $icon,
            'sr_no' => $request->sr_no,
            'status' => $request->status ?? 1,

        ]);

        return redirect()->route('admin.features.index')
            ->with('success', 'Feature Card Updated Successfully');
    }
}