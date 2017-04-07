### Request

Given n different colors, n boxes and nxn balls with a random distribution, find a way to fill every box given the rule that only a maximum of 2 different colors can be put in one box and each box should have n balls.


### Algorithm
<p>Given that the number of balls is n squared by adding one ball to any color results in a different color having one less.</p> 

<p>Generally by adding more than one ball to any color the total number of balls missing from the orther colors is equal to the amount added to the first. </p>

<p>This means that for colors with a number of balls smaller than n (needed to fill a box) you can find a complementary in the existing colors with balls bigger than n</p>

<p>What the algorithm does</p>

Gets the color with the smallest amount of balls (smaller or equal than n)
 
1. if the number of balls for the color is equal to n then there's no need for a complementary so it just puts it in its own box, resulting in n - 1 colors and n - 1 boxes
2. if the number of balls for the color is smaller than n it complements it with balls from the color with the most balls and puts them in a box (!this could also mean that the resulting number of balls in the second color can be smaller than n thus becoming a color that will be chosen to be complemented), this resulting in n - 1 colors and n -1 boxes (again).

#### Powered by

<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

#### License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
