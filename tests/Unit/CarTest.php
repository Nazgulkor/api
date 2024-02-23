<?php

namespace Tests\Unit;

use Tests\TestCase;

class CarTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_get_cars(): void
    {

        $response = $this->get('/api/cars');

        $response->assertStatus(200);
    }
    public function test_get_car(): void
    {
        $response = $this->get('/api/cars/1');
        $response->assertStatus(200);
    }
}
