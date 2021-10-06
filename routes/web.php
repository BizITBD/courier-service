<?php

use App\Reseller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::group(['middleware' => ['auth'], 'prefix' => 'admin'], function () {
    // Route::get('/', function () {
    //     return view('home');
    // });
    Route::get('/', 'HomeController@index')->name('home');

    // Product Category And SubCategory
    Route::resource('category', 'CategoyController');
    Route::get('category/status/{id}', 'CategoyController@status');

    Route::resource('/product', 'ProductController');
    Route::get('product/status/{id}', 'ProductController@status');




    Route::resource('product_sub_category', 'ProductSubCategoryController');
    Route::get('product_sub_category/status/{id}', 'ProductSubCategoryController@status');
    Route::get('product/subcategory/{id}', 'ProductController@subcategory');



    Route::resource('/delivery_details', 'BookingController');
    Route::get('/delivery_details/status/{id}', 'BookingController@status');
    Route::resource('/profile', 'ProfileController');


    // delivery City
    Route::resource('/deliverycity', 'CityModelController');
    Route::get('/deliverycity/status/{id}', 'CityModelController@status');
    // delivery zone
    Route::resource('/delivery_zone', 'DeliveryZoneController');
    Route::get('/delivery_zone/status/{id}', 'DeliveryZoneController@status');
    // Delivery Area
    Route::resource('/delivery_area', 'DeliveryAreaController');
    Route::get('/delivery_area/status/{id}', 'DeliveryAreaController@status');

    // contact messages
    Route::resource('/contact_messages', 'ContactMessageController');


    // reseller List
    Route::get('/reseller_list', function () {
        $resellerData = Reseller::where('type', 1)->orderBy('id', 'DESC')->get();
        // dd($resellerData->toArray());
        return view('admin.reseller_details.reseller_list', compact('resellerData'));
    });
    // merchant List
    Route::get('/merchant_list', function () {
        $merchantData = Reseller::where('type', 2)->orderBy('id', 'DESC')->get();
        return view('admin.merchant-details.merchant_list', compact('merchantData'));
    });

    // product size
    Route::resource('/product_size', 'ProductSizeController');
    Route::get('/product_size/status/{id}', 'ProductSizeController@status');
    // Reseller Payment
    Route::resource('/reseller_payment', 'ResellerPaymentController');
    Route::get('/reseller_payment/history/{id}', 'ResellerPaymentController@history');
    Route::get('/reseller_payment/bank/{id}', 'ResellerPaymentController@getBankDetails');
    Route::get('/reseller_payment/mobile/{id}', 'ResellerPaymentController@getMobileDetails');
    Route::post('/reseller_pay', 'ResellerPayController@pay');
    // Route::post('/reseller_pay/from_due', 'PayFromDueController');

    // merchant-payment
    Route::resource('/merchant-payment', 'MerchantPaymentController');
    Route::get('/merchant-payment/history/{id}', 'MerchantPaymentController@history');
    Route::post('/Merchant-pay', 'MerchantPayController@pay');


    // app settings
    Route::resource('/app_settings', 'AppSettingsController');
    // our services
    Route::resource('our_services', 'OurServicesController');
    Route::get('/our_services/status/{id}', 'OurServicesController@status');
    Route::resource('/about_us', 'AboutUsController');
    Route::get('/about_us/status/{id}', 'AboutUsController@status');

    // coverage area
    Route::get('/coverage_area/area/{id}', 'InportExportController@area');
    Route::get('/coverage_area/status/{id}', 'InportExportController@status');
    Route::get('/coverage_area/export', 'InportExportController@export');
    Route::resource('/coverage_area', 'InportExportController');


    // Charge Type
    Route::resource('/charge-type', 'ChargeTypeController');
    Route::get('/charge-type/status/{id}', 'ChargeTypeController@status');
    // coverage area charge
    Route::resource('/area-charge', 'CoverageAreaChargeController');

    // merchant booking list
    Route::get('merchant-bookings', 'MerchantbookingsController@index');
    Route::get('merchant-bookings/details/{id}', 'MerchantbookingsController@getBookingDetails');
    Route::get('merchant-bookings/status/{id}', 'MerchantbookingsController@status');

    //interests
    Route::resource('/interests', 'InterestsController');
    Route::get('/interests/status/{id}', 'InterestsController@status');

    Route::resource('/merchant-interests', 'MerchantInterestController');
    Route::get('/merchant-interests/status/{id}', 'MerchantInterestController@status');

    // print routes
    Route::get('/printex/{id}', 'ResellerBookingPrintController@index');
    Route::get('/merchant-print/{id}', 'MerchantBookingPrintController@index');
    // route for printing reseller payment history invoice
    Route::get('/reseller-payment/history-print/{id}', 'ResellerPrintHistoryController@index');
    // route for printing merchant payment history invoice
    Route::get('/merchant-payment/history-print/{id}', 'MerchantPrintHistoryController@index');

    // reseller & merchant payment history
    Route::get('/reseller-payment/history', 'ResellerPaymentHistoryController@index');
    Route::get('/reseller-payment/history/{id}', 'ResellerPaymentHistoryController@getInfo');
    Route::get('/merchant-payment-history', 'MerchantPaymentHistoryController@index');
    Route::get('/merchant-payment-history/{id}', 'MerchantPaymentHistoryController@getInfo');

    // Mega Menu
    Route::resource('mega-menu', 'MegaMenuController');
    Route::get('mega-menu-status/{id}', 'MegaMenuController@status');

    // dashboard routes
    Route::get('/active-reseller', 'DashBoardController@activeReseller');
    Route::get('/popular_product', 'DashBoardController@popular');
    Route::get('/most_city', 'DashBoardController@mostDeliveredCity');
    Route::get('/counter', 'DashBoardController@counter');
});
