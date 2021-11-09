<?php

namespace Tests\Feature;

use App\Models\User;
//use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;


use Tests\TestCase;

class ResTest extends TestCase
{
    //use RefreshDatabase, WithFaker;
    use  WithFaker;
    /**
     * A basic test example.
     *
     * @return void
     */
    /**public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(302);
    }*/

    public function test_AddRestaurantRoute()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('addRes');
        $response->assertStatus(200);

        
    }

    
    
}