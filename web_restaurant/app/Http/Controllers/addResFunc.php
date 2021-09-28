<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class addResFunc extends Controller
{
    //
    function add(Request $request){
        //return $request->input();
        $request->validate([
            'name'=>'required',
            'postcode'=>'required',
            'pic'=>'required',
            'foodtype'=>'required',
            'description'=>'required'

        ]);

        $query = DB::table('restaurant')->insert([
            'resName'=>$request->input('name'),
            'resPostcode'=>$request->input('postcode'),
            'resPic'=>$request->input('pic'),
            'resFoodType'=>$request->input('foodtype'),
            'resDescription'=>$request->input('description')

        ]);

        if($query){
            return back()->with('success', 'data saved');
        }
        else{
            return back()->with('fail', 'Failed to save');
        }
    }
}
