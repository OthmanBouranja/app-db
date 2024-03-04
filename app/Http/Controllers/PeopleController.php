<?php

namespace App\Http\Controllers;

use App\Models\People;
use Illuminate\Http\Request;

class PeopleController extends Controller
{
    public function get_all_PeopleByCity(Request $request)
    {

        $id = $request->get('id');
        if ($id != null) {

            $peoples = People::where('city_id',$id)->get();

            return response()->json([
                'peoples' => $peoples
            ], 200);
        } else {
          
        }
    }
}
