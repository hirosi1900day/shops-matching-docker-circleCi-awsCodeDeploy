<?php

namespace Tests\Feature\Http\Controllers;

use App\User;
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
        use RefreshDatabase;
    public function testExample()
    {
        $response = $this->get('/');
  
        $response->assertStatus(Response::HTTP_OK);
        $response->assertJsonStructure(['shop_favorite', 'prefecture_array']); 
    }
}
