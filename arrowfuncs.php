<?php

$y = 1;
$fn1 = fn($x) => $x + $y;

// equivalent to using $y by value:
$fn2 = function ($x) use ($y) {
    return $x + $y;
};

var_dump($fn1(3));
var_dump($fn2(3));

$z = 1;
$fn3 = fn($x) => fn($y) => $x * $y + $z;

// Outputs 51
var_dump($fn3(5)(10));

$x = 1;
$fn = fn() => $x++; // Has no effect
$fn();
var_dump($x);  // Outputs 1

$x = 1;
$fn = fn(&$x) => $x++;
$fn($x);
var_dump($x);

?>