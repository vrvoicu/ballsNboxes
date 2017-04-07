<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 07.04.2017
 * Time: 00:33
 */

/* @var string $colorsNBallsList */
/* @var array $boxes */


?>

@extends('welcome')

@section('title', 'BallsNBoxes')

@section('content')

    <form method="POST" >
        <div class="form-group <?= $errors->has('colorsNBallsList') ? "has-error" : "" ?>">
            <label for="colorsNBallsList">Colors and Balls list</label>
            <input type="text" class="form-control" id="colorsNBallsList" placeholder="e.g: r=1, g=3, b=5" name="colorsNBallsList" value="<?= $colorsNBallsList ?>">
            @if ($errors->has('colorsNBallsList'))
                <div class="help-block">{{ $errors->first('colorsNBallsList') }}</div>
            @endif
        </div>
        <button type="submit" class="btn btn-default">Submit</button>

        {{ csrf_field() }}
    </form>

    @if(isset($boxes))
        <div style="padding: 10px 0 10px 0">

        @foreach($boxes as $boxIndex => $box)
            <?= 'Box: ' . $boxIndex ?>
            @foreach($box as $color => $number)
                <?= $color . ':' . $number ?>
            @endforeach
            <?= '<br/>' ?>
        @endforeach

        </div>
    @endif

@endsection