<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BallsNBoxesController extends Controller
{
    //

    public function index(Request $request){

        $colorsNBallsList = $request->input('colorsNBallsList', '');


        return view('ballsNboxes.index', [
            'colorsNBallsList' => $colorsNBallsList
        ]);
    }


}
