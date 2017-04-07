<?php

namespace App\Http\Controllers;

use App\Helpers\BallsNBoxesSolver;
use App\Http\Requests\ColorsNBallsFormValidator;
use Illuminate\Contracts\Support\MessageProvider;
use Illuminate\Support\Facades\Validator;

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

        $nrColors = 0; $nrOfBalls = 0;
        foreach ($matches[0] as $matchKey => $match) {
            unset($matches[$matchKey]);
            $colorNBalls = explode("=", $match);
            $matches[reset($colorNBalls)] = intval(end($colorNBalls));

            $nrColors++;
            $nrOfBalls += intval(end($colorNBalls));
        }

        if($nrColors * $nrColors != $nrOfBalls) {

            return view('ballsNboxes.index', [
                'colorsNBallsList' => $colorsNBallsList,
            ])->withErrors(['colorsNBallsList' => 'Total number of balls should be the number of colors squared']);
        }

        $boxes = $ballsNBoxesSolver->solve($matches);

        return view('ballsNboxes.index', [
            'colorsNBallsList' => $colorsNBallsList,
            'boxes' => $boxes
        ]);

    }


}
