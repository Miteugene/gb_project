<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserOrderTest extends TestCase
{
    public function testCheckUserOrderIndex()
    {
        $response = $this->get(route('user.order.index'));

        $response->assertStatus(200);
    }

    public function testCheckUserOrderStore()
    {
        $response = $this->get(route('user.order.store'));

        $response->assertStatus(200);
    }
}
