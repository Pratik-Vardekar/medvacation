<?php

use App\Http\Controllers\Admin\AboutPageController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\ContactDetailController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FeatureCardController;
use App\Http\Controllers\Admin\RegistrationController as AdminRegistrationController;
use App\Http\Controllers\Admin\PropertySectionController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\RegistrationController as FrontendRegistrationController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [FrontendController::class, 'home'])->name('home');


Route::get('/about', [FrontendController::class, 'about'])->name('about');

Route::get('/services', [FrontendController::class, 'services'])->name('services');


Route::get('/affiliations', [FrontendController::class, 'affiliations'])->name('affiliations');

Route::get('/careers', [FrontendController::class, 'careers'])->name('careers');

Route::get('/faq', [FrontendController::class, 'faq'])->name('faq');
Route::get('/testimonials', [FrontendController::class, 'testimonials'])->name('testimonials');
Route::get('/treatments', [FrontendController::class, 'treatments'])->name('treatments');
Route::get('/treatment/{id}', [FrontendController::class, 'treatment'])->name('treatment');


Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::post('/contact-submit', [ContactController::class, 'submit'])->name('contact.submit');




Route::middleware(['auth', 'admin'])->group(function () {

 Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

    Route::prefix('admin')->name('admin.')->group(function () {

        Route::get('/registrations', [AdminRegistrationController::class, 'index'])
            ->name('registrations.index');
        Route::get('/registrations/export', [AdminRegistrationController::class, 'export'])
            ->name('registrations.export');
        Route::get('/registrations/{registration}/document/{field}', [AdminRegistrationController::class, 'document'])
            ->name('registrations.document');
        Route::get('/registrations/{registration}/edit', [AdminRegistrationController::class, 'edit'])
            ->name('registrations.edit');
        Route::put('/registrations/{registration}', [AdminRegistrationController::class, 'update'])
            ->name('registrations.update');
        Route::delete('/registrations/{registration}', [AdminRegistrationController::class, 'destroy'])
            ->name('registrations.destroy');

        Route::resource('slider', SliderController::class);

        Route::get('/enquiries', [ContactController::class, 'index'])
            ->name('enquiries.index');

        Route::get('/enquiries/contact', [ContactController::class, 'contactEnquiries'])
            ->name('enquiries.contact');

        Route::get('/enquiries/appraisal', [ContactController::class, 'appraisalEnquiries'])
            ->name('enquiries.appraisal');

Route::delete('/enquiries/delete/{id}', [ContactController::class, 'delete'])
    ->name('enquiries.delete');
    Route::get('/property-enquiries', [ContactController::class, 'propertyEnquiries'])
    ->name('enquiries.property');
     Route::get('/contact-details', [ContactDetailController::class, 'edit'])
        ->name('contact-details.edit');

    Route::post('/contact-details/update', [ContactDetailController::class, 'update'])
        ->name('contact-details.update');
           Route::get('/features', [FeatureCardController::class, 'index'])
        ->name('features.index');

    Route::get('/features/{id}/edit', [FeatureCardController::class, 'edit'])
        ->name('features.edit');

    Route::post('/features/{id}/update', [FeatureCardController::class, 'update'])
        ->name('features.update');
         Route::resource('testimonials', TestimonialController::class);
         // About Page Admin
Route::get('/about/edit', [AboutPageController::class, 'edit'])
    ->name('about.edit');

Route::post('/about/update', [AboutPageController::class, 'update'])
    ->name('about.update');
     Route::get(
            '/property-section/edit',
            [PropertySectionController::class, 'edit']
        )->name('property-section.edit');

        Route::post(
            '/property-section/update',
            [PropertySectionController::class, 'update']
        )->name('property-section.update');
        
        Route::get('/newsletters', [NewsletterController::class, 'index'])
    ->name('newsletters.index');
    });

});




/*
|--------------------------------------------------------------------------
| Profile Routes (Breeze default)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


/*
|--------------------------------------------------------------------------
| Auth Routes (IMPORTANT)
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';