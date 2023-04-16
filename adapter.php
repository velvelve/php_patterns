<?php

interface ICircle
{
    function circleArea(int $circumference);
}

interface ISquare
{
    function squareArea(int $sideSquare);
}

class CircleAreaLib
{
    public function getCircleArea(int $diagonal)
    {
        $area = (M_PI * $diagonal ** 2) / 4;
        return $area;
    }
}
class SquareAreaLib
{
    public function getSquareArea(int $diagonal)
    {
        $area = ($diagonal ** 2) / 2;
        return $area;
    }
}

class SquareAdapter implements ISquare
{
    private SquareAreaLib $lib;

    public function __construct()
    {
        $this->lib = new SquareAreaLib();
    }

    public function squareArea(int $sideSquare)
    {
        $diagonal = sqrt(2 * $sideSquare ** 2);
        $this->lib->getSquareArea($diagonal);
    }
}

class CircleAdapter implements ICircle
{
    private CircleAreaLib $lib;

    public function __construct()
    {
        $this->lib = new CircleAreaLib();
    }

    public function circleArea(int $circumference)
    {
        $diagonal = $circumference / M_PI;
        $this->lib->getCircleArea($diagonal);
    }
}
