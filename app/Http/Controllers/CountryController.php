<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    

    public function get_all_Country()
    {

        $countrys = Country::get();

        return response()->json([
            'countrys' => $countrys
        ], 200);
    }
}
