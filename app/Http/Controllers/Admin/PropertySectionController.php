<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PropertySection;

class PropertySectionController extends Controller
{
    public function edit()
    {
        $propertySection = PropertySection::first();

        return view(
            'admin.property-section.edit',
            compact('propertySection')
        );
    }

    public function update(Request $request)
    {
        $propertySection = PropertySection::first();

        if (!$propertySection)
        {
            $propertySection = new PropertySection();
        }

        // Sell Section
        $propertySection->sell_title = $request->sell_title;
        $propertySection->sell_sub_title = $request->sell_sub_title;
        $propertySection->sell_description = $request->sell_description;
        $propertySection->sell_button_text = $request->sell_button_text;

        // Buy Section
        $propertySection->buy_title = $request->buy_title;
        $propertySection->buy_sub_title = $request->buy_sub_title;
        $propertySection->buy_description = $request->buy_description;
        $propertySection->buy_button_text = $request->buy_button_text;

        // Sell Image Upload
        if ($request->hasFile('sell_image'))
        {
            $file = $request->file('sell_image');

            $filename = time() . '_sell.' . $file->getClientOriginalExtension();

            $file->move(
                public_path('uploads/property-sections'),
                $filename
            );

            $propertySection->sell_image =
                'uploads/property-sections/' . $filename;
        }

        // Buy Image Upload
        if ($request->hasFile('buy_image'))
        {
            $file = $request->file('buy_image');

            $filename = time() . '_buy.' . $file->getClientOriginalExtension();

            $file->move(
                public_path('uploads/property-sections'),
                $filename
            );

            $propertySection->buy_image =
                'uploads/property-sections/' . $filename;
        }

        $propertySection->save();

        return redirect()
            ->back()
            ->with('success', 'Property Sections Updated Successfully');
    }
}