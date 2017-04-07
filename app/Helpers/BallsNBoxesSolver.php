<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 07.04.2017
 * Time: 01:35
 */

namespace App\Helpers;


class BallsNBoxesSolver
{

    private $colorsNBalls;
    private $nrOfColors;

    public function solve($colorsNBalls){

        $this->colorsNBalls = $colorsNBalls;
        asort($this->colorsNBalls);

        $this->nrOfColors = sizeof($colorsNBalls);

        $boxes = [];
        while (!$this->isEmpty()) {
            $box = [];
            $this->fillBox($box);

            $boxes[] = $box;
        }

        return $boxes;

    }

    private function isEmpty(){
        return sizeof($this->colorsNBalls) == 0;
    }

    private function getNextMin(){
        $min = reset($this->colorsNBalls);
        $minKey = key($this->colorsNBalls);

        if($min > $this->nrOfColors)
            $this->colorsNBalls[$minKey] = $min - $this->nrOfColors;
        else
            unset($this->colorsNBalls[$minKey]);

        return [$minKey, $min];
    }

    private function getNextMax($minKey, $min){

        if($min == $this->nrOfColors) {
            return [$minKey, $min];
        }

        if(sizeof($this->colorsNBalls) == 1) {
            $maxKey = key($this->colorsNBalls);
            $this->colorsNBalls[$maxKey] -= ($this->nrOfColors - $min);
            return [$maxKey,  ($this->nrOfColors - $min)];
        }

        $max = end($this->colorsNBalls);
        $maxKey = key($this->colorsNBalls);

        while ($max <= $this->nrOfColors) {
            $max = prev($this->colorsNBalls);
            $maxKey = key($this->colorsNBalls);
        }

        $this->colorsNBalls[$maxKey] -= ($this->nrOfColors - $min);

        return [$maxKey, ($this->nrOfColors - $min)];
    }

    private function fillBox(&$box){

        list($minKey, $min) = $this->getNextMin();
        list($maxKey, $max) = $this->getNextMax($minKey, $min);

        $balls[$minKey] = $min;
        $balls[$maxKey] = $max;

        $box = $balls;

    }

}