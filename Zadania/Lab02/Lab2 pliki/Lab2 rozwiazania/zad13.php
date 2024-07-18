<?php
// Zad 2.13

class Point
{
    public function __construct(private float $x, private float $y) { }

    public function printPoint()
    {
        print "Point($this->x, $this->y)" . PHP_EOL;
    }

    public function setX(float $x)
    {
        $this->x = $x;
    }
    public function setY(float $y)
    {
        $this->y = $y;
    }

    public function shiftX(float $x)
    {
        $this->x += $x;
    }
    public function shifty(float $y)
    {
        $this->y += $y;
    }
}

$punkt = new Point(5, 7);
$punkt->printPoint();
print PHP_EOL;

$punkt->setX(3);
$punkt->printPoint();
$punkt->setY(1);
$punkt->printPoint();
print PHP_EOL;

$punkt->shiftX(2);
$punkt->printPoint();
$punkt->shiftX(-7);
$punkt->printPoint();
print PHP_EOL;

$punkt->shiftY(-2);
$punkt->printPoint();
$punkt->shiftY(13);
$punkt->printPoint();
