
<?php

class ParentClass
{
    protected float $speed = 0;

    public function setSpeed(float $speed)
    {
        $this->speed = $speed;
    }

    public function getSpeed(): float
    {
        return $this->speed;
    }
}

class Child extends ParentClass
{
    // Child function arguments must match function arguments of parent
    public function setSpeed(float $speed)
    {
        $this->speed = $speed;

        // do some logic here...
    }

    // Child function return type must match parent function return type
    public function getSpeed(): float
    {
        // do some logic here...

        return $this->speed . " m/s";
    }
}

$child = new Child();
// $child->setSpeed(500);
// $child->setSpeed("500");
$child->setSpeed("500as");
// $child->setSpeed(true);
// $child->setSpeed(new stdClass);
echo $child->getSpeed();