<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('auth/login');
// });
//Order pdf
Route::get('admin/order-pdf/{id}', [App\Http\Controllers\OrderController::class, 'generate_pdF'])->name('order.pdf');

//Create payment
Route::get('/checkout', [App\Http\Controllers\OrderController::class, 'checkout'])->name('order.checkout');
Route::post('/process-order', [App\Http\Controllers\OrderController::class, 'processOrder'])->name('order.process');

Route::get('/generate-pdf', [App\Http\Controllers\PDFController::class, 'generatePDF']);
//Create real chat
Route::get('/testing', [App\Http\Controllers\MessagesController::class, 'testing']);
Route::get('/load-latest-messages', [App\Http\Controllers\MessagesController::class, 'getLoadLatestMessages']);
Route::post('/send', [App\Http\Controllers\MessagesController::class, 'postSendMessage']);
Route::get('/fetch-old-messages', [App\Http\Controllers\MessagesController::class, 'getOldMessages']);


//SuperAdmin Only
Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'Super_Admin'], function () {
        //SuperAdmin dashboard
        Route::get('super-admin-dashboard', [App\Http\Controllers\SuperAdmin\DashboardController::class, 'dashboard']);
    });

    //Admin Only
    Route::group(['middleware' => 'Admin'], function () {
        //Admin dashboard
        Route::get('admin/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'dashboard']);
        //Profile
        Route::get('admin/edit-profile', [App\Http\Controllers\Admin\ProfileController::class, 'edit_profile']);
        Route::post('admin/update-profile/{id}', [App\Http\Controllers\Admin\ProfileController::class, 'update_profile'])->name('admin.update.profile'); 
        Route::get('admin/change-password', [App\Http\Controllers\Admin\ProfileController::class, 'change_password']);
        Route::post('admin/submit-change-password', [App\Http\Controllers\Admin\ProfileController::class, 'submit_change_password'])->name('admin.submit.change.password');
        //Password reset 
        Route::get('password/reset', [CustomPasswordResetController::class, 'showLinkRequestForm'])->name('password.request');
        Route::post('password/email', [CustomPasswordResetController::class, 'sendResetLinkEmail'])->name('password.email');
        Route::get('password/reset/{token}', [CustomPasswordResetController::class, 'showResetForm'])->name('password.reset');
        Route::post('password/reset', [CustomPasswordResetController::class, 'reset'])->name('password.update');
        //Slider
        Route::get('admin/add-new-slider', [App\Http\Controllers\Admin\SliderController::class, 'add_slider']);  
        Route::post('admin/submit-slider', [App\Http\Controllers\Admin\SliderController::class, 'submit_slider'])->name('admin.submit.slider');
        Route::get('admin/all-sliders-list', [App\Http\Controllers\Admin\SliderController::class, 'all_sliders']); 
        Route::get('admin/all-sliders-trash-list', [App\Http\Controllers\Admin\SliderController::class, 'all_sliders_trash']); 
        Route::get('admin/edit-slider/{id}', [App\Http\Controllers\Admin\SliderController::class, 'edit_slider']);
        Route::post('admin/update-slider/{id}', [App\Http\Controllers\Admin\SliderController::class, 'update_slider'])->name('admin.update.slider');
        Route::get('admin/delete-slider', [App\Http\Controllers\Admin\SliderController::class, 'delete_slider']);
        Route::get('admin/delete-parament-slider', [App\Http\Controllers\Admin\SliderController::class, 'delete_parament_slider']);
        //Blog
        Route::get('admin/add-new-blog', [App\Http\Controllers\Admin\BlogController::class, 'add_blog']);
        Route::post('admin/submit-blog', [App\Http\Controllers\Admin\BlogController::class, 'submit_blog'])->name('admin.submit.blog');
        Route::get('admin/all-blogs', [App\Http\Controllers\Admin\BlogController::class, 'all_blogs']);
        Route::get('admin/edit-blog/{id}', [App\Http\Controllers\Admin\BlogController::class, 'edit_blog']);
        //Service
        Route::get('admin/add-new-service', [App\Http\Controllers\Admin\ServiceController::class, 'add_service']); 
        Route::post('admin/submit-service', [App\Http\Controllers\Admin\ServiceController::class, 'submit_service'])->name('admin.submit.service');
        Route::get('admin/all-services', [App\Http\Controllers\Admin\ServiceController::class, 'all_services']);
        Route::get('admin/all-services-trash-list', [App\Http\Controllers\Admin\ServiceController::class, 'all_services_trash']);
        Route::get('admin/edit-service/{id}', [App\Http\Controllers\Admin\ServiceController::class, 'edit_service']);
        Route::post('admin/update-service/{id}', [App\Http\Controllers\Admin\ServiceController::class, 'update_service'])->name('admin.update.service');
        Route::get('admin/trash-service', [App\Http\Controllers\Admin\ServiceController::class, 'trash_service']);
        Route::get('admin/delete-parament-service', [App\Http\Controllers\Admin\ServiceController::class, 'delete_parament_service']);
        //Testimonial
        Route::get('admin/add-new-testimonial', [App\Http\Controllers\Admin\TestimonialController::class, 'add_testimonial']);
        Route::post('admin/submit-testimonial', [App\Http\Controllers\Admin\TestimonialController::class, 'submit_testimonial'])->name('admin.submit.testimonial');
        Route::get('admin/all-testimonials', [App\Http\Controllers\Admin\TestimonialController::class, 'all_testimonials']);
        Route::get('admin/all-testimonials-trash-list', [App\Http\Controllers\Admin\TestimonialController::class, 'all_testimonials_trash']);  
        Route::get('admin/edit-testimonial/{id}', [App\Http\Controllers\Admin\TestimonialController::class, 'edit_testimonial']);
        Route::post('admin/update-testimonial/{id}', [App\Http\Controllers\Admin\TestimonialController::class, 'update_testimonial'])->name('admin.update.testimonial');
        Route::get('admin/trash-testimonial', [App\Http\Controllers\Admin\TestimonialController::class, 'trash_testimonial']);
        Route::get('admin/delete-parament-testimonial', [App\Http\Controllers\Admin\TestimonialController::class, 'delete_parament_testimonial']);        
        //Contact
        Route::get('admin/all-contacts', [App\Http\Controllers\Admin\ContactController::class, 'all_contacts']); 
        Route::get('admin/all-contacts-trash-list', [App\Http\Controllers\Admin\ContactController::class, 'all_contacts_trash']);
        Route::get('admin/edit-contact/{id}', [App\Http\Controllers\Admin\ContactController::class, 'edit_contact']);  
        Route::post('admin/update-contact/{id}', [App\Http\Controllers\Admin\ContactController::class, 'update_contact'])->name('admin.update.contact'); 
        Route::get('admin/delete-contact', [App\Http\Controllers\Admin\ContactController::class, 'delete_contact']);
        Route::get('admin/delete-parament-contact', [App\Http\Controllers\Admin\ContactController::class, 'delete_parament_contact']);
    });

    //Customer Only
    Route::group(['middleware' => 'Customer'], function () {
        //Customer dashboard
        Route::get('customer-dashboard', [App\Http\Controllers\Customer\DashboardController::class, 'dashboard']);
    });
});

//Front site
Route::get('/', [App\Http\Controllers\FrontSiteController::class, 'front_page']);
Route::get('about', [App\Http\Controllers\FrontSiteController::class, 'about']);
Route::get('blog', [App\Http\Controllers\FrontSiteController::class, 'blog']);
Route::get('blog-detail', [App\Http\Controllers\FrontSiteController::class, 'blog_detail']);
Route::get('price', [App\Http\Controllers\FrontSiteController::class, 'price']);
Route::get('service', [App\Http\Controllers\FrontSiteController::class, 'service']);
Route::get('team', [App\Http\Controllers\FrontSiteController::class, 'team']);
Route::get('testimonial', [App\Http\Controllers\FrontSiteController::class, 'testimonial']);
Route::get('contact', [App\Http\Controllers\FrontSiteController::class, 'contact']);
Route::post('/submit-contact', [App\Http\Controllers\ContactController::class, 'submit_contact_us'])->name('submit.contact.us');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


