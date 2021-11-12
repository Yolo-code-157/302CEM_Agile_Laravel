<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Tests\TestCase;

class SearchTest extends TestCase
{

    use WithFaker;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_search_database_found()
    {
        $response = $this->assertDatabaseHas('restaurant',[
            'resName' => 'KFC'
        ]);

        $this->assertTrue(true); 
    }

    public function test_search_database_not_found()
    {
        $this->assertDatabaseMissing('restaurant',[
            'resName' => 'Hello'
        ]);
    }

    /**
     * Test on searching restaurant name found
     * 
     * @return void
     */
    public function test_search_by_restaurant_name(){
        //Return the view with the search restaurant
        $user = $this->get('/dashboard?search=MCD');
        $user->assertViewHas('searchRes', function($searchRes) {    
            $imageData = base64_encode($searchRes[0]->resPic);
            $check = true;
            $check = $searchRes[0]->resID == "3" && $check;
            $check = $searchRes[0]->resName == "MCD" && $check;
            $check = $searchRes[0]->resPostcode == "10200" && $check;
            return $check;
        });
    }

    /**
     * Test on searching restaurant name not found
     * 
     * @return void
     */
    public function test_search_by_restaurant_name_not_found(){
        //Return the view with full restaurants
        $user = $this->get('/dashboard?search=Hello');
        $user->assertViewHas('users', function($users) {      
            $check = true;

            for($i=0; $i < count($users); $i++){
                $check = $users[0]->resID && $check;
                $check = $users[0]->resName && $check;
                $check = $users[0]->resPostcode && $check;
                $check = $users[0]->resPic && $check;
                $check = $users[0]->resPicType && $check;
            }

            return $check;
        });
    }

}
