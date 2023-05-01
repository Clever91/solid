<?php

// pre condition and post condition

function increaseOne($number)
{
    // pre condition
    if (!is_numeric($number)) {
        throw new Exception("Input number must be number type");
    }

    $result = $number + 1;

    // post condition
    if (!is_numeric($result)) {
        throw new Exception("Return number must be number type");
    }

    return $result;
}

echo increaseOne(10) . PHP_EOL;
echo increaseOne(12.23) . PHP_EOL;
echo increaseOne("12") . PHP_EOL;
echo increaseOne("asd") . PHP_EOL;
