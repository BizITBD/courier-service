<?php

use App\AppSettingsModel;
use App\ContactMessageModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/index.php', function () {
    return redirect('/');
});

Route::group(['namespace' => 'FrontEnd'], function () {
    Route::get('/', 'HomeController@index');

    //auth reseller routes
    Route::resource('/userregistration', 'Auth\RegistrationController');
    Route::get('/userlogin', 'Auth\LoginController@index');
    Route::post('/userlogin', 'Auth\LoginController@login');
    Route::get('/userlogout', 'Auth\LoginController@logout');

    // auth merchant routes
    Route::resource('/merchant_login', 'Auth\merchantRegistration');


    Route::get('/category/{slug}', 'CategoryWiseController');
    Route::get('/sub-category/{slug}', 'SubCategoryWiseController');
    Route::get('/products', 'AllProductController');
    Route::resource('/booking', 'BookingController');

    // Reseller Profile
    Route::resource('/reseller_profile', 'ProfileController');

    //Citywise zone && Zonewise Area
    Route::get('/categorywise_product/{id}', 'ProductDataGetController');
    Route::get('/citywise_zone/{id}', 'GetZoneController');
    Route::get('/zonewise_area/{id}', 'GetAreaController');
    Route::get('/subcategorywise/{id}', 'subcategoryWiseProductController');

    // reseller dashboard
    Route::get('/reseller_dashboard', 'resellerdashboardController');
    // merchant dashboard
    Route::get('/merchant_dashboard', 'MerchantDashboardController@table');
    Route::get('/merchant_dashboard/details/{id}', 'MerchantDashboardController@bookingDetails');


    // contact page
    Route::get('contact', function () {
        return view('/frontend.pages.contact_page');
    });
    // about page
    Route::get('about-us', function () {
        $aboutData = AppSettingsModel::first();
        return view('frontend.pages.aboutpage', compact('aboutData'));
    });
    // blogpage
    Route::get('blogs', function () {
        $blogData = AppSettingsModel::first();
        return view('frontend.pages.blogpage', compact('blogData'));
    });
    Route::get('privacy-policy', function () {
        $policyData = AppSettingsModel::first();
        return view('frontend.pages.privacy-policy', compact('policyData'));
    });
    Route::get('terms-&-conditions', function () {
        $termsData = AppSettingsModel::first();
        return view('frontend.pages.terms&conditions', compact('termsData'));
    });




    Route::post('contact_message', function (Request $request) {
        $contact = new ContactMessageModel();
        $messages = $request->all();
        $contact->fill($messages)->save();
        return redirect()->back();
    })->name('contact');

    // transaction
    Route::resource('/transaction', 'TransactionController');
    Route::post('/transaction_mobile', 'TransactionController@mobile');

    // payment dashboard
    Route::get('/reseller_payment_dashboard', 'ResellerPaymentDashboard');
    Route::get('/merchant_payment_dashboard', 'MerchantPaymentDashboardController');

    // coverage area
    Route::resource('/coverage_area', 'CoverageAreaController');

    // successful bookings
    Route::get('/successfull/bookings', 'SuccessfullDeliveryController');

    // coverage Area
    Route::resource('/coverage-area', 'CoverageAreaController');


    // merchant Booking
    Route::resource('/merchant-booking', 'MerchantBookingController');

    // get Area Id
    Route::get('/get_area', 'GetAreaIdController');


    // slug wise page
    Route::get('mega-menu/service/{slug}', 'SlugwiseMegaMenuController@index');
});
