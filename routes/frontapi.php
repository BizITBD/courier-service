<?php

use App\ProductSizeModel;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1', 'namespace' => 'FrontEnd\Api'], function () {
    Route::get('categories', 'CategoryApi');
    Route::get('delivery_fee/{id}', 'DeliveryFeeApi');
    Route::get('product_price/{id}', 'ProductPriceApi');
    Route::get('resellerwise_show_data/{id}', 'ResellerwiseShowController');
    Route::get('productwise_comission/{id}', 'GetCommissionController');
    Route::get('productwise_details/{id}', 'ProductwiseDetailsController');
});
