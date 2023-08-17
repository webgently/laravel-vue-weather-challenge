<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;

class SignUpTest extends TestCase
{
    /**
     * Test the sign up controller method
     *
     * @return void
     */
    public function testSignUp()
    {
        $response = $this->json('POST', '/api/auth/register', [
            'name' => 'Test User',
            'email' => 'test@user.com',
            'password' => 'testPassword'
        ]);

        $response
            ->assertStatus(201)
            ->assertJsonStructure([
                'id',
                'name',
                'email',
                'created_at',
                'updated_at'
             ]);
        $this->assertDatabaseHas('users', [
             'name' => 'Test User',
             'email' => 'test@user.com'
        ]);

        User::where('email', 'test@user.com')->delete();
    }
}
