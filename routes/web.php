<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/enquiry', 'HomeController@show');
// Route::get('/enquiry', function() {
//     return view('enquiry');
// });

// POST URL to handle form submission and make outbound call
Route::post('/call', function () {
    // Get form input
    $userPhone = Input::get('userPhone');
    $encodedSalesPhone = urlencode(str_replace(' ','',Input::get('salesPhone')));
    // Set URL for outbound call - this should be your public server URL
    $host = parse_url(Request::url(), PHP_URL_HOST);

    // Create authenticated REST client using account credentials in
    // <project root dir>/.env.php
    $client = new Twilio\Rest\Client(
        getenv('TWILIO_ACCOUNT_SID'),
        getenv('TWILIO_AUTH_TOKEN')
    );

    try {
        $client->calls->create(
            $userPhone, // The visitor's phone number
            getenv('TWILIO_NUMBER'), // A Twilio number in your account
            array(
                "url" => "http://$host/outbound/$encodedSalesPhone"
            )
        );
    } catch (Exception $e) {
        // Failed calls will throw
        return $e;
    }

    // return a JSON response
    return array('message' => 'Call incoming!');
});


// POST URL to handle form submission and make outbound call
Route::post('/outbound/{salesPhone}', function ($salesPhone) {
    // A message for Twilio's TTS engine to repeat
    $sayMessage = 'Thanks for contacting our sales department. Our
        next available representative will take your call.';

    $twiml = new Twilio\Twiml();
    $twiml->say($sayMessage, array('voice' => 'alice'));
    $twiml->dial($salesPhone);

    $response = Response::make($twiml, 200);
    $response->header('Content-Type', 'text/xml');
    return $response;
});