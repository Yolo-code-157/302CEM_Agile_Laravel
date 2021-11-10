<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Rating;
use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;


use Tests\TestCase;

class ResTest extends TestCase
{
    //use RefreshDatabase, WithFaker;
    use  WithFaker;
    use HasFactory;
    /**
     * A basic test example.
     * 
     * @return void
     * 
     */
    


    public function test_AddRestaurantRoute()
    {
        $this->user = User::factory()->create();

        $response = $this->actingAs($this->user)->get('addRes');
        $response->assertStatus(200);

        
    }

    public function test_addRating(){
        $this->user = User::factory()->create();
        $this->expectNotToPerformAssertions();

        $this->ratings = Rating::factory()->create([
            'resID' => "23",
            'userID' => $this->user->id,
            'service' => 4,
            'value'=> 3,
            'food' => 2,
            'review' => "Tasty"
        ]);


    }

    public function test_addRestaurant(){
        $this->user = User::factory()->create();
        $this->expectNotToPerformAssertions();

        $this->restaurant = Restaurant::factory()->create([
          
            'resName' => "Yuki's Chicken Rice",
            'resPostcode' => "14000",
            'resPicType' => base64_decode("yukichickennoodlesoup.jpg"),
            'resFoodType' => "Asian Food",
            'resPic' => base64_decode("yukichickennoodlesoup.jpg"),
            'resDescription' =>"Chicken Rice shop serve with full heart",
            'resOwnerName' =>$this->user->name
        ]);


    }

    
    
}