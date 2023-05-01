
<?php

class ParentClass
{
    protected $speed = 0;

    public function setSpeed($speed)
    {
        $this->speed = $speed;
    }

    public function getSpeed()
    {
        return $this->speed;
    }
}

class Child extends ParentClass
{
    public function setSpeed($speed)
    {
        $this->speed = $speed;

        // do some logic here...
    }

    public function getSpeed()
    {
        // do some logic here...

        return $this->speed . " m/s";
    }
}

$child = new Child();
// $child->setSpeed(500);
// $child->setSpeed("500");
// $child->setSpeed("500as");
// $child->setSpeed(new stdClass);
$child->setSpeed(true);
echo $child->getSpeed();