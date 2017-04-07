<?php

namespace App\Http\Controllers;

use App\Helpers\BallsNBoxesSolver;
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

    public function post(ColorsNBallsFormValidator $request, BallsNBoxesSolver $ballsNBoxesSolver){

        $colorsNBallsList = $request->input('colorsNBallsList', '');

        preg_match_all('/\S=\d+/', $colorsNBallsList, $matches, PREG_PATTERN_ORDER);

        foreach ($matches[0] as $matchKey => $match) {
            unset($matches[$matchKey]);
            $colorNBalls = explode("=", $match);
            $matches[reset($colorNBalls)] = intval(end($colorNBalls));
        }

        $boxes = $ballsNBoxesSolver->solve($matches);

        return view('ballsNboxes.index', [
            'colorsNBallsList' => $colorsNBallsList,
            'boxes' => $boxes
        ]);

    }


}
