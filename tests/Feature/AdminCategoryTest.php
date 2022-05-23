<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminCategoryTest extends TestCase
{
    public function testCheckAdminCategoryIndex()
    {
        $response = $this->get(route('admin.categories.index'));

        $response->assertStatus(200);
    }

    public function testCheckAdminCategoryShow()
    {
        $response = $this->get(route('admin.categories.show', 1));

        $response->assertStatus(200);
    }
}
