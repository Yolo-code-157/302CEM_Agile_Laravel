<?php

namespace Tests\Feature;

use Tests\TestCase;

use App\Models\User;

class LinkTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_link_unauth()
    {
        $response = $this->get('/dashboard');
        $response->assertOk();
        $response->assertViewIs('dashboard');
    }

    public function test_link_auth()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/dashboard');
        $response->assertOk();
        $response->assertViewIs('dashboard');
    }

    public function test_link_addres_unauth()
    {
        $response = $this->get('/addRes');
        $response->assertRedirect('/login');
    }

    public function test_link_addres_auth()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/addRes');
        $response->assertOk();
        $response->assertViewIs('addRes');
    }

    public function test_link_viewres_unauth()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('viewRes/1');
        $response->assertOk();
        $response->assertViewIs('viewRes');
    }

    public function test_link_viewres_auth()
    {
        $response = $this->get('viewRes/1');
        $response->assertOk();
        $response->assertViewIs('viewRes');
    }

    public function test_link_rateres_unauth()
    {
        $response = $this->get('resRating/1');
        $response->assertRedirect('/login');
    }

    public function test_link_rateres_auth()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('resRating/1');
        $response->assertOk();
        $response->assertViewIs('resRating');
    }
}
