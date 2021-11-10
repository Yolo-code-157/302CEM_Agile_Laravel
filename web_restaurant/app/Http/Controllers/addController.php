<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class addController extends Controller
{
    public function index(Request $request)
    {
        $search = $request['search'] ?? ""; //for checking the search query is empty or not and assign to $search
        $users = DB::select('select * from restaurant'); //by default the view will be showing all the restaurant

        //when the seach query is not empty
        if ($search != "") {
            //retrieve the data based on the search query
            $searchRes = DB::table('restaurant')->where('resName', 'LIKE', '%' . $search . '%')->get();
            $searchCount = $searchRes->count();

            if (count($searchRes) > 0) {
                //if restaurant found
                return view('dashboard')->withQuery("<b>$searchCount</b> result(s) found for <b>$search</b>")->withSearchRes($searchRes)->withUsers($users);
            } else {
                //if restaurant not found
                return view('dashboard')->withQuery("<b>$searchCount</b> result(s) found for <b>$search</b>")->withSearchRes([])->withUsers($users);
            }
        } else {
            //when the search query is empty
            $users = DB::select('select * from restaurant');
        }

        //when the search query is empty just retrieve all the restaurant
        return view('dashboard')->withQuery("")->withSearchRes([])->withUsers($users);
    }

    public function viewRes($id)
    {
        //echo $id; testing purpose
        $row1 = DB::table('restaurant')->where('resID', $id)->first();
        $row2 = DB::table('rating')->where('resID', $id)->first();
        $data = [
            'Detail' => $row1,
            'RateDetail' => $row2,
            'Title' => 'Restaurant Detail'
        ];



        return view('viewRes', $data);
    }
    
    public function resRating($id)
    {
        $row = DB::table('restaurant')->where('resID', $id)->first();
        $data = [
            'Detail' => $row,
        ];

        return view('resRating', $data);
    }

    function logout(Request $request)
    {
        $r = $request->session()->flush();

        return redirect("/");
    }

    function add(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'postcode' => 'required | digits:5',
            'pic' => 'required',
            'foodtype' => 'required',
            'description' => 'required'
        ]);

        if ($request->hasFile('pic')) {
            $image = $request->file('pic');
            $type = pathinfo($image, PATHINFO_EXTENSION);
            $data = file_get_contents($image);
        }

        $name_val = $request->get('name');
        $postcode_val = $request->get('postcode');

        // Get system current date and time in Malaysia timezone
        $mytime = Carbon::now("Asia/Kuala_Lumpur");
        echo $mytime->toDateTimeString();

        if (DB::table('restaurant')->where('resName', $name_val)->where('resPostcode', $postcode_val)->exists()) {
            return back()->with('fail', 'Name and postcode of the restaurant are already in the system');
        } else {
            $query = DB::table('restaurant')->insert([
                'resName' => $request->input('name'),
                'resPostcode' => $request->input('postcode'),
                'resPicType' => $type,
                'resPic' => $data,
                'resFoodType' => $request->input('foodtype'),
                'resDescription' => $request->input('description'),
                'resOwnerName' => $request->input('username'),
                'serviceRating' => 0,
                'foodRating' => 0,
                'valueRating' => 0,
                'numReviews' => 0,                
                'createdAt' => $mytime
            ]);

            return back()->with('success', 'data saved');
        }
    }

    function rating(Request $request)
    {

        $request->validate([
            'service_vol' => 'required',
            'value_vol' => 'required',
            'food_vol' => 'required',
            'review' => 'required | min:100 | max:300'
        ]);

        $query = DB::table('rating')->insert([
            'resID' => $request->input('hidden_resID'),
            'userID' => $request->input('hidden_userID'),
            'service' => $request->input('service_vol'),
            'value' => $request->input('value_vol'),
            'food' => $request->input('food_vol'),
            'review' => $request->input('review')
        ]);

        if($query){
            //Get the total score from Service Rating in Restaurant Table
            $queryServiceRating = DB::table('restaurant')->where('resID', $request->input('hidden_resID'))->pluck('serviceRating');
            $serviceRating = $queryServiceRating[0] + $request->input('service_vol');

            //Get the total score from Food Rating in Restaurant Table
            $queryFoodRating = DB::table('restaurant')->where('resID', $request->input('hidden_resID'))->pluck('foodRating');
            $foodRating = $queryFoodRating[0] + $request->input('food_vol');

            //Get the total score from Value Rating in Restaurant Table
            $queryValueRating = DB::table('restaurant')->where('resID', $request->input('hidden_resID'))->pluck('valueRating');
            $valueRating = $queryValueRating[0] + $request->input('value_vol');

            //Get the total number of reviews from Restaurant Table
            $queryNumRating = DB::table('restaurant')->where('resID', $request->input('hidden_resID'))->pluck('numReviews');
            $numRating = $queryNumRating[0] + 1; //increment the number of reviews

            //Update to Restaurant Table
            $updateServeRating = DB::table('restaurant')->where('resID', $request->input('hidden_resID'))->update(['serviceRating' => $serviceRating]); 
            $updateFoodRating = DB::table('restaurant')->where('resID', $request->input('hidden_resID'))->update(['foodRating' => $foodRating]); 
            $updateValueRating = DB::table('restaurant')->where('resID', $request->input('hidden_resID'))->update(['valueRating' => $valueRating]); 
            $updateNumRating = DB::table('restaurant')->where('resID',$request->input('hidden_resID'))->update(['numReviews'=> $numRating]);

            if($updateServeRating){
                return back()->with('success', 'Rating updated');
            }
            
        }else{
            return back()->with('fail', 'Rating failed');
        }
    }
}
