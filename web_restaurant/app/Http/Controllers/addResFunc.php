<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class addResFunc extends Controller
{
    function add(Request $request) {
        $request->validate([
            'name' => 'required',
            'postcode' => 'required | digits:5',
            'pic' => 'required',
            'foodtype' => 'required',
            'description' => 'required'
        ]);

        $name_val = $request->get('name');
        $postcode_val = $request->get('postcode');

        if (DB::table('restaurant')->where('resName', $name_val)->where('resPostcode', $postcode_val)->exists()) {
            return back()->with('fail', 'Name and postcode of the restaurant are already in the system');
        }
        else {
            $query = DB::table('restaurant')->insert([
                'resName' => $request->input('name'),
                'resPostcode' => $request->input('postcode'),
                'resPic' => $request->input('pic'),
                'resFoodType' => $request->input('foodtype'),
                'resDescription' => $request->input('description')
            ]);

            return back()->with('success', 'data saved');
        }
    }
}
