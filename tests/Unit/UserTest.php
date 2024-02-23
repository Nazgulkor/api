<?php

namespace Tests\Unit;

use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_get_users(): void
    {
        $response = $this->get('/api/users');
        $response->assertStatus(200);
    }
    public function test_get_user(): void
    {
        $response = $this->get('/api/users/1');
        $response->assertStatus(200);
    }
}
