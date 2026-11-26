<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutFounder;
use App\Models\AboutPage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AboutPageController extends Controller
{
    /**
     * Show the form for editing the About Page.
     */
    public function edit()
    {
        $about = AboutPage::with(['founders' => function ($query) {
            $query->orderBy('sort_order', 'asc');
        }])->first();

        if (!$about) {
            $about = AboutPage::create([
                'meta_title' => 'About Us | Med Vacation - India Healthcare Excellence',
                'meta_description' => 'Med Vacation connects international patients with India\'s premier hospitals and specialist doctors.',
                'about_subtitle' => 'ABOUT MED VACATION',
                'main_title' => 'Connecting the World to <span>India\'s Healthcare Excellence.</span>',
                'about_image' => 'frontend/images/about-pg.jpg',
                'about_description_1' => 'MED VACATION is a Medical Value Tourism company dedicated to connecting international patients with India\'s exceptional doctors, hospitals, and healthcare facilities.',
                'about_description_2' => 'We combine India\'s medical expertise with global patient needs to deliver world-class treatments at the most affordable prices, while ensuring a seamless and personalized healthcare journey.',
                'about_description_3' => 'From identifying the right medical specialists and healthcare facilities to coordinating the patient\'s journey, our focus is to make medical travel simple, reliable, and comfortable.',
                'purpose_subtitle' => 'OUR PURPOSE',
                'purpose_title' => 'Vision & <span>Mission</span>',
                'vision' => "To be India's leading Medical Value Tourism company, connecting the world to the country's exceptional doctors and healthcare facilities.\n\nWe aim to combine India's medical expertise with global patient needs, delivering world-class treatments at the most affordable prices.",
                'mission' => "• To ensure uncompromising quality in every aspect of the patient's medical journey.\n• To provide a hassle-free, end-to-end experience, from the patient's home country to India and back.\n• To identify and collaborate with top doctors and healthcare facilities, continuously expanding our network.\n• To integrate these medical experts into a well-organized system that elevates the overall standard of care for international patients.",
                'founders_subtitle' => 'OUR LEADERSHIP',
                'founders_title' => 'Meet Our <span>Founders</span>',
                'founders_description' => 'Meet the experienced professionals driving MED VACATION towards a more connected and patient-focused healthcare experience.',
            ]);

            $defaultFounders = [
                ['name' => 'Swati Lodha', 'designation' => 'Vice President', 'image' => 'frontend/images/profile/swati.webp', 'sort_order' => 1],
                ['name' => 'Anita Bajaj', 'designation' => 'Chief Coordinator Global Sales', 'image' => 'frontend/images/profile/anita.webp', 'sort_order' => 2],
                ['name' => 'Dr. Ramanand Yadaw', 'designation' => 'Chief Medical Strategy and Alliance Officer', 'image' => 'frontend/images/profile/ramanand.webp', 'sort_order' => 3],
                ['name' => 'Deepak Singhania', 'designation' => 'CFO / Chief Financial Officer', 'image' => 'frontend/images/profile/user.jpg', 'sort_order' => 4],
                ['name' => 'Mahip Agarwal', 'designation' => 'Travel Agent - International', 'image' => 'frontend/images/profile/mahip.webp', 'sort_order' => 5],
            ];

            foreach ($defaultFounders as $founder) {
                $about->founders()->create($founder);
            }

            $about->load('founders');
        } elseif ($about->founders->isEmpty()) {
            // If about page exists but no founders yet, populate initial leadership
            $defaultFounders = [
                ['name' => 'Swati Lodha', 'designation' => 'Vice President', 'image' => 'frontend/images/profile/swati.webp', 'sort_order' => 1],
                ['name' => 'Anita Bajaj', 'designation' => 'Chief Coordinator Global Sales', 'image' => 'frontend/images/profile/anita.webp', 'sort_order' => 2],
                ['name' => 'Dr. Ramanand Yadaw', 'designation' => 'Chief Medical Strategy and Alliance Officer', 'image' => 'frontend/images/profile/ramanand.webp', 'sort_order' => 3],
                ['name' => 'Deepak Singhania', 'designation' => 'CFO / Chief Financial Officer', 'image' => 'frontend/images/profile/user.jpg', 'sort_order' => 4],
                ['name' => 'Mahip Agarwal', 'designation' => 'Travel Agent - International', 'image' => 'frontend/images/profile/mahip.webp', 'sort_order' => 5],
            ];

            foreach ($defaultFounders as $founder) {
                $about->founders()->create($founder);
            }

            $about->load('founders');
        }

        return view('admin.about.edit', compact('about'));
    }

    /**
     * Update the About Page and its founders.
     */
    public function update(Request $request)
    {
        $about = AboutPage::first();
        if (!$about) {
            $about = new AboutPage();
        }

        $validated = $request->validate([
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'about_subtitle' => 'nullable|string|max:255',
            'main_title' => 'nullable|string|max:255',
            'about_image' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:5120',
            'about_description_1' => 'nullable|string',
            'about_description_2' => 'nullable|string',
            'about_description_3' => 'nullable|string',
            'purpose_subtitle' => 'nullable|string|max:255',
            'purpose_title' => 'nullable|string|max:255',
            'vision' => 'nullable|string',
            'mission' => 'nullable|string',
            'founders_subtitle' => 'nullable|string|max:255',
            'founders_title' => 'nullable|string|max:255',
            'founders_description' => 'nullable|string',
        ]);

        $data = $request->only([
            'meta_title',
            'meta_description',
            'about_subtitle',
            'main_title',
            'about_description_1',
            'about_description_2',
            'about_description_3',
            'purpose_subtitle',
            'purpose_title',
            'vision',
            'mission',
            'founders_subtitle',
            'founders_title',
            'founders_description',
        ]);

        // Ensure upload directories exist
        $uploadDir = public_path('uploads/about');
        if (!file_exists($uploadDir)) {
            @mkdir($uploadDir, 0777, true);
        }
        $rootUploadDir = base_path('uploads/about');
        if (!file_exists($rootUploadDir)) {
            @mkdir($rootUploadDir, 0777, true);
        }

        // Section 1 Image Upload
        if ($request->hasFile('about_image')) {
            $image = $request->file('about_image');
            $imageName = time() . '_about.' . $image->getClientOriginalExtension();
            $image->move($uploadDir, $imageName);
            @copy($uploadDir . '/' . $imageName, $rootUploadDir . '/' . $imageName);
            $data['about_image'] = 'uploads/about/' . $imageName;
        }

        if ($about->exists) {
            $about->update($data);
        } else {
            $about = AboutPage::create($data);
        }

        // Update Existing Founders
        if ($request->has('founders') && is_array($request->founders)) {
            foreach ($request->founders as $id => $founderData) {
                $founder = AboutFounder::find($id);
                if ($founder && $founder->about_page_id == $about->id) {
                    $updatePayload = [
                        'name' => $founderData['name'] ?? $founder->name,
                        'designation' => $founderData['designation'] ?? $founder->designation,
                        'sort_order' => isset($founderData['sort_order']) ? (int) $founderData['sort_order'] : $founder->sort_order,
                    ];

                    // Check if new image uploaded for this founder
                    if ($request->hasFile("founders.{$id}.image")) {
                        $fImage = $request->file("founders.{$id}.image");
                        $fImageName = time() . '_founder_' . $id . '.' . $fImage->getClientOriginalExtension();
                        $fImage->move($uploadDir, $fImageName);
                        @copy($uploadDir . '/' . $fImageName, $rootUploadDir . '/' . $fImageName);
                        $updatePayload['image'] = 'uploads/about/' . $fImageName;
                    }

                    $founder->update($updatePayload);
                }
            }
        }

        // Add New Founders
        if ($request->has('new_founders') && is_array($request->new_founders)) {
            foreach ($request->new_founders as $index => $newFounderData) {
                if (!empty($newFounderData['name'])) {
                    $newPayload = [
                        'about_page_id' => $about->id,
                        'name' => $newFounderData['name'],
                        'designation' => $newFounderData['designation'] ?? null,
                        'sort_order' => isset($newFounderData['sort_order']) ? (int) $newFounderData['sort_order'] : 0,
                        'is_active' => true,
                    ];

                    if ($request->hasFile("new_founders.{$index}.image")) {
                        $nImage = $request->file("new_founders.{$index}.image");
                        $nImageName = time() . '_founder_new_' . $index . '.' . $nImage->getClientOriginalExtension();
                        $nImage->move($uploadDir, $nImageName);
                        @copy($uploadDir . '/' . $nImageName, $rootUploadDir . '/' . $nImageName);
                        $newPayload['image'] = 'uploads/about/' . $nImageName;
                    }

                    AboutFounder::create($newPayload);
                }
            }
        }

        return redirect()->back()->with('success', 'About Page & Leadership updated successfully!');
    }

    /**
     * Delete an individual founder.
     */
    public function deleteFounder($id)
    {
        $founder = AboutFounder::findOrFail($id);
        $founder->delete();

        if (request()->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Founder deleted successfully']);
        }

        return redirect()->back()->with('success', 'Founder removed successfully.');
    }
}
