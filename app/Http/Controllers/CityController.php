<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{

    public function get_all_CityByCountry(Request $request)
    {

        $id = $request->get('id');
        if ($id != null) {

            $citys = City::where('country_id',$id)->get();

            return response()->json([
                'citys' => $citys
            ], 200);
        } else {
          
        }
    }

}
