<?php

namespace Tests\Feature;

use Tests\TestCase;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class viewRatDatabaseTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function test_rating_found()
    {
        $response = $this->assertDatabaseHas('rating',[
            'review' => 'delicious food'
        ]);

        $this->assertTrue(true); 
    }
    public function test_rating_not_found()
    {
        $response = $this->assertDatabaseHas('rating',[
            'review' => 'bad food'
        ]);

        $this->assertTrue(true); 
    }

  

    

}
