<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Http\Controllers\WeatherController;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

class GetWeatherTest extends TestCase
{
    public function getWeather_returns_weather_data()
    {
        // Mock authenticated user
        $user = User::factory()->create();
        $this->actingAs($user, 'sanctum');

        // Mock HTTP client response
        $mockResponse = [
            'main' => [
                 'temp' => 23.45,
                 'feels_like' => 21.78
            ],
            'weather' => [[
                'main' => 'Clear',
                'description' => 'clear sky',
            ]]
        ];
        $http = $this->mockGuzzleResponseBody(json_encode($mockResponse));

        // Assert response structure
        $response = $this->postJson('/api/auth/getWeather', ['city' => 'London']);
        $response->assertJsonStructure(['main', 'weather']);
    }

    protected function mockGuzzleResponseBody($body)
    {
        $mock = new \GuzzleHttp\Handler\MockHandler([
            new \GuzzleHttp\Psr7\Response(200, [], $body),
        ]);

        $handlerStack = \GuzzleHttp\HandlerStack::create($mock);
        $client = new \GuzzleHttp\Client(['handler' => $handlerStack]);
        $this->app->instance(\GuzzleHttp\Client::class, $client);

        return $client;
    }
}
