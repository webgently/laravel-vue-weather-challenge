<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;

class SignInTest extends TestCase
{
    /**
     * Test the sign-in controller method
     *
     * @return void
     */
    public function testSignIn()
    {
        $user = User::create([
            'name' => 'Test User',
            'email' => 'test@user.com',
            'password' => bcrypt('testPassword'),
        ]);

        $response = $this->json('POST', '/api/auth/login', [
             'email' => 'test@user.com',
             'password' => 'testPassword',
        ]);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'message',
                'token'
             ]);
        $user->delete();
    }
}
