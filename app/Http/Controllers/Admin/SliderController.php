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
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
        ], [
            'sr_no.required' => 'Serial number is required.',
            'sr_no.unique' => 'This serial number is already taken.',
            'image.required' => 'Please upload a slider image.',
            'image.image' => 'The uploaded file must be an image.',
            'image.mimes' => 'Allowed image formats: JPG, JPEG, PNG, WEBP.',
            'image.max' => 'Image size must not exceed 5MB.',
        ]);

        $imageName = time() . '_' . uniqid() . '.' . $request->image->getClientOriginalExtension();

        // 1. Move to public/uploads/sliders
        $publicUploadDir = public_path('uploads/sliders');
        if (!file_exists($publicUploadDir)) {
            @mkdir($publicUploadDir, 0777, true);
        }
        $request->image->move($publicUploadDir, $imageName);

        // 2. Mirror copy to base_path('uploads/sliders') and public/public/uploads/sliders
        $rootUploadDir = base_path('uploads/sliders');
        if (!file_exists($rootUploadDir)) {
            @mkdir($rootUploadDir, 0777, true);
        }
        @copy($publicUploadDir . '/' . $imageName, $rootUploadDir . '/' . $imageName);

        $doublePublicDir = public_path('public/uploads/sliders');
        if (!file_exists($doublePublicDir)) {
            @mkdir($doublePublicDir, 0777, true);
        }
        @copy($publicUploadDir . '/' . $imageName, $doublePublicDir . '/' . $imageName);

        Slider::create([
            'sr_no' => $request->sr_no,
            'image' => 'uploads/sliders/' . $imageName,
        ]);

        return redirect()->route('admin.slider.index')->with('success', 'Slider added successfully');
    }

    // (optional, not used)
    public function show(Slider $slider)
    {
        return redirect()->route('admin.slider.index');
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
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ], [
            'sr_no.required' => 'Serial number is required.',
            'sr_no.unique' => 'This serial number is already taken.',
            'image.image' => 'The uploaded file must be an image.',
            'image.mimes' => 'Allowed image formats: JPG, JPEG, PNG, WEBP.',
            'image.max' => 'Image size must not exceed 5MB.',
        ]);

        $data = [
            'sr_no' => $request->sr_no,
        ];

        // If new image uploaded
        if ($request->hasFile('image')) {
            // Delete old image files safely
            $cleanOld = ltrim(preg_replace('#^public/#', '', $slider->image ?? ''), '/');
            if (!empty($cleanOld)) {
                @unlink(public_path($cleanOld));
                @unlink(base_path($cleanOld));
                @unlink(public_path('public/' . $cleanOld));
            }

            $imageName = time() . '_' . uniqid() . '.' . $request->image->getClientOriginalExtension();

            $publicUploadDir = public_path('uploads/sliders');
            if (!file_exists($publicUploadDir)) {
                @mkdir($publicUploadDir, 0777, true);
            }
            $request->image->move($publicUploadDir, $imageName);

            $rootUploadDir = base_path('uploads/sliders');
            if (!file_exists($rootUploadDir)) {
                @mkdir($rootUploadDir, 0777, true);
            }
            @copy($publicUploadDir . '/' . $imageName, $rootUploadDir . '/' . $imageName);

            $doublePublicDir = public_path('public/uploads/sliders');
            if (!file_exists($doublePublicDir)) {
                @mkdir($doublePublicDir, 0777, true);
            }
            @copy($publicUploadDir . '/' . $imageName, $doublePublicDir . '/' . $imageName);

            $data['image'] = 'uploads/sliders/' . $imageName;
        }

        $slider->update($data);

        return redirect()->route('admin.slider.index')->with('success', 'Slider updated successfully');
    }

    // Delete slider
    public function destroy(Slider $slider)
    {
        // Delete image files safely
        $cleanOld = ltrim(preg_replace('#^public/#', '', $slider->image ?? ''), '/');
        if (!empty($cleanOld)) {
            @unlink(public_path($cleanOld));
            @unlink(base_path($cleanOld));
            @unlink(public_path('public/' . $cleanOld));
        }

        $slider->delete();

        return back()->with('success', 'Slider deleted successfully');
    }
}
