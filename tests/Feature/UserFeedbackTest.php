<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserFeedbackTest extends TestCase
{
    public function testCheckUserFeedbackIndex()
    {
        $response = $this->get(route('user.feedback.index'));

        $response->assertStatus(200);
    }

    public function testCheckUserFeedbackStore()
    {
        $response = $this->get(route('user.feedback.store'));

        $response->assertStatus(200);
    }
}
