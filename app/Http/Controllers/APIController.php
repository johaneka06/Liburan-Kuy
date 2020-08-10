<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class APIController extends Controller
{
    public function RetrieveFlightData($booking_code, $last_name)
    {
        $client = new \GuzzleHttp\Client(['verify' => false]);
        $response = json_decode($client->request('GET', 'http://localhost:5000/api/v1/ticket/'.$booking_code, 
            ['json' => ['LastName' => $last_name, 'BookingCode' => $booking_code]])->getBody());

        
        return $response;
    }

    public function RetrieveFlightInfo($flightNo)
    {
        $client = new \GuzzleHttp\Client(['verify' => false]);
        return json_decode($client->request('GET', 'http://localhost:5000/api/v1/flight/'.$flightNo)->getBody());
    }
}
