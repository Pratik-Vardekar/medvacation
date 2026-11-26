<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::latest()->get();

        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
       $request->validate([
    'name' => 'required',
    'message' => 'required',
    'image' => 'nullable|image',
]);

        $image = '';

      if ($request->hasFile('image')) {

    $file = $request->file('image');

    $filename = time() . '_' . $file->getClientOriginalName();

    $file->move(public_path('public/uploads/testimonials'), $filename);

    $image = 'public/uploads/testimonials/' . $filename;
}

        Testimonial::create([

            'name' => $request->name,
            'location' => $request->location,
            'message' => $request->message,
            'image' => $image,

        ]);

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial Added Successfully');
    }

    public function edit($id)
    {
        $testimonial = Testimonial::findOrFail($id);

        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'message' => 'required',
        'image' => 'nullable|image',
    ]);

    $testimonial = Testimonial::findOrFail($id);

    $image = $testimonial->image;

   if ($request->hasFile('image')) {

    $file = $request->file('image');

    $filename = time() . '_' . $file->getClientOriginalName();

    $file->move(public_path('public/uploads/testimonials'), $filename);

    $image = 'public/uploads/testimonials/' . $filename;
}

    $testimonial->update([
        'name' => $request->name,
        'location' => $request->location,
        'message' => $request->message,
        'image' => $image,
    ]);

    return redirect()->route('admin.testimonials.index')
        ->with('success', 'Testimonial Updated Successfully');
}
    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);

        $testimonial->delete();

        return back()->with('success', 'Deleted Successfully');
    }
}