<?php
function esMenor($a, $b){
    return $a > $b;
}


$arrayTest = ['a'=>10,'b'=>3,'c'=>2,'d'=>100];

uasort($arrayTest, 'esMenor');

print_r($arrayTest);


