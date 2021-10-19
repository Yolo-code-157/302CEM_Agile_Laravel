<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use GrahamCampbell\ResultType\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class addController extends Controller
{
    // public function index(){
    //     $users = DB::select('select * from restaurant');
    //     return view('dashboard',['users'=>$users]);
    // }

    public function index(Request $request){
        $search = $request['search'] ?? ""; //for checking the search query is empty or not and assign to $search
        $users = DB::select('select * from restaurant'); //by default the view will be showing all the restaurant

        //when the seach query is not empty
        if($search != ""){
            //retrieve the data based on the search query
            $searchRes = DB::table('restaurant')->where('resName','LIKE','%'.$search.'%')->get();

            if(count($searchRes)>0){
                //if restaurant found
                return view('dashboard')->withQuery("Search results for your query are: <b>$search</b>")->withSearchRes($searchRes)->withUsers($users);
            }else{
                //if restaurant not found
                return view('dashboard')->withQuery("Sorry We Couldn't Find What You Want...")->withSearchRes([])->withUsers($users);
            }
        }else{
            //when the search query is empty
            $users = DB::select('select * from restaurant');
        }
        
        //when the search query is empty just retrieve all the restaurant
        return view('dashboard')->withQuery("")->withSearchRes([])->withUsers($users);
    }

    public function viewRes($id){
        //echo $id; testing purpose
        $row = DB::table('restaurant')->where('resID', $id)->first();
        $data = [
            'Detail' => $row,
            'Title' => 'Restaurant Detail'
        ];

        return view('viewRes',$data);

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

        if($request->hasFile('pic')){
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
                'createdAt' => $mytime
            ]);

            return back()->with('success', 'data saved');
        }
    }
}
