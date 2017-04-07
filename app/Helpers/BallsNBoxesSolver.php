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

        //sorting is not necessary but it does help when searching for the needed color
        asort($this->colorsNBalls);

        $this->nrOfColors = sizeof($colorsNBalls);

        $boxes = [];
        //while there are colors with balls left
        while (!$this->isEmpty()) {
            $box = [];
            //fill another box with n balls
            $this->fillBox($box);

            //add the box to the boxes list
            $boxes[] = $box;
        }

        return $boxes;

    }

    private function isEmpty(){
        return sizeof($this->colorsNBalls) == 0;
    }

    //get the next color with a number of balls smaller than n
    private function getNextMin(){
        //go to the beginning of the array and get the first
        $min = reset($this->colorsNBalls);
        $minKey = key($this->colorsNBalls);

        //while the number of balls is bigger than n go to the next color
        while($min > $this->nrOfColors){
            $min = next($this->colorsNBalls);
            $minKey = key($this->colorsNBalls);
        }
        //remove the color from the array
        unset($this->colorsNBalls[$minKey]);

        //return the color and number of balls
        return [$minKey, $min];
    }

    private function getNextMax($minKey, $min){

        //if the color has exactly n number of balls there's no need to search for a complementary color
        if($min == $this->nrOfColors) {
            return [$minKey, $min];
        }

        //if there's just one color left than this is by definition the complementary
        if(sizeof($this->colorsNBalls) == 1) {

            end($this->colorsNBalls);
            $maxKey = key($this->colorsNBalls);

            $this->colorsNBalls[$maxKey] -= ($this->nrOfColors - $min);
            return [$maxKey,  ($this->nrOfColors - $min)];
        }

        //go to the end of the array to find the next complementary color
        $max = end($this->colorsNBalls);
        $maxKey = key($this->colorsNBalls);

        //if the number of balls for that color is smaller than or equal to n search for a color with the number of balls bigger than n
        while ($max < $this->nrOfColors) {
            $max = prev($this->colorsNBalls);
            $maxKey = key($this->colorsNBalls);
        }

        $this->colorsNBalls[$maxKey] -= ($this->nrOfColors - $min);

        return [$maxKey, ($this->nrOfColors - $min)];
    }

    private function fillBox(&$box){

        list($minKey, $min) = $this->getNextMin();
        list($maxKey, $max) = $this->getNextMax($minKey, $min);

        $box[$minKey] = $min;
        //min == n the result will be the same (array being overwritten with the same key and value)
        $box[$maxKey] = $max;
    }

}