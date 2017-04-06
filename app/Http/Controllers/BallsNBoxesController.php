<?php

namespace App\Http\Controllers;

use App\Http\Requests\ColorsNBallsFormValidator;
use Illuminate\Http\Request;

class BallsNBoxesController extends Controller
{
    //

    public function index(){


        return view('ballsNboxes.index', [
            'colorsNBallsList' => ''
        ]);
    }

    public function post(ColorsNBallsFormValidator $request){

        $colorsNBallsList = $request->input('colorsNBallsList', '');

        return view('ballsNboxes.index', [
            'colorsNBallsList' => $colorsNBallsList
        ]);

    }


}
