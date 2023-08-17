<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Artisan;

class LogOutTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test user logout
     *
     * @return void
     */
    public function testLogout()
    {
        // Create a user
        $user = User::factory()->create();

        // Simulate a login (getting a valid token)
        $token = $user->createToken('Bearer')->plainTextToken;
        $header = ['Authorization' => 'Bearer ' . $token];

        // Make a post request to logout using the token in the headers
        $response = $this->post('/api/auth/logout', [], $header);

        // Assert that a successful message has been returned
        $response->assertStatus(200);
        $response->assertJson(['message' => 'Logged out successfully']);

        // Assert cookie 'jwt' is forgotten (expired)
        $cookie = $response->headers->get('Set-Cookie');
        $this->assertStringContainsString('jwt', $cookie);
        $this->assertStringContainsString('expires', $cookie);

        // Extra check: confirm that the expiry date is in the past
        preg_match('/expires=([^;]*);/', $cookie, $matches);
        if (isset($matches[1])) {
            $expiryDate = new \DateTime($matches[1]);
            $this->assertTrue($expiryDate < new \DateTime());
        } else {
            $this->fail('Cookie expiry not found');
        }
    }
}
