<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminNewsTest extends TestCase
{
    public function testCheckAdminNewsIndex()
    {
        $response = $this->get(route('admin.news.index'));

        $response->assertStatus(200);
    }

    public function testCheckAdminNewsShow()
    {
        $response = $this->get(route('admin.news.show', 1));

        $response->assertStatus(200);
    }
}
