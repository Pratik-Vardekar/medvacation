<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    // List sliders
    public function index()
    {
        $sliders = Slider::orderBy('sr_no', 'asc')->get();
        return view('admin.slider.index', compact('sliders'));
    }

    // Show create form
    public function create()
    {
        return view('admin.slider.create');
    }

    // Store slider
    public function store(Request $request)
    {
        $request->validate([
            'sr_no' => 'required|integer|unique:sliders,sr_no',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Upload image
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('public/uploads/sliders'), $imageName);

        Slider::create([
            'sr_no' => $request->sr_no,
            'image' => 'public/uploads/sliders/'.$imageName,
        ]);

        return redirect()->route('admin.slider.index')->with('success', 'Slider added successfully');
    }

    // (optional, not used)
    public function show(Slider $slider)
    {
        return redirect()->route('slider.index');
    }

    // Edit form
    public function edit(Slider $slider)
    {
        return view('admin.slider.edit', compact('slider'));
    }

    // Update slider
    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'sr_no' => 'required|integer|unique:sliders,sr_no,' . $slider->id,
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = [
            'sr_no' => $request->sr_no,
        ];

        // If new image uploaded
        if ($request->hasFile('image')) {

            // Delete old image
            if ($slider->image && file_exists(public_path($slider->image))) {
                unlink(public_path($slider->image));
            }

            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('public/uploads/sliders'), $imageName);

            $data['image'] = 'public/uploads/sliders/'.$imageName;
        }

        $slider->update($data);

        return redirect()->route('admin.slider.index')->with('success', 'Slider updated successfully');
    }

    // Delete slider
    public function destroy(Slider $slider)
    {
        // Delete image
        if ($slider->image && file_exists(public_path($slider->image))) {
            unlink(public_path($slider->image));
        }

        $slider->delete();

        return back()->with('success', 'Slider deleted successfully');
    }
}