<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class WeatherController extends Controller
{
    public function getWeather(Request $request)
    {
        $apiKey = config('services.openweathermap.api_key');
        $city = $request->input('city', 'New York'); // Default city if not provided in request

        $client = new Client();
        $response = $client->get("https://api.openweathermap.org/data/2.5/weather?q=$city&appid=$apiKey&units=metric");

        $data = json_decode($response->getBody(), true);

        return response()->json($data);
    }
}
