<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
});

// Get list of Enquiries
Route::get('enquirie','EnquiryController@index');

// Get specific Enquiry
Route::get('enquiries/{id}','EnquiryController@show');

// Delete a Enquiry
Route::delete('enquiries/{id}','EnquiryController@destroy');

// Update existing Enquiry
Route::put('enquiries/{id}','EnquiryController@update');

// Create new Enquiry
Route::post('enquiry','EnquiryController@store');