<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

use Carbon\Carbon;

Route::resource('inverter', 'InverterController');

Route::get('httpclient', function()
{
    $client = new GuzzleHttp\Client();
    $response = $client->get('http://www.google.at');

    echo "HTTP Response Code: " . $response->getStatusCode() . "<br>";
    echo "HTTP Body: " . $response->getBody() . "<br>";

    echo '<pre>';
    echo dd($response);
    echo '</pre>';
});