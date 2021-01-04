<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LessonControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/shops/index');

        $response->assertStatus(Response::HTTP_OK);
        $response->assertSee('楽しいヨガレッスン');
        $response->assertSee('×');
    }
}
