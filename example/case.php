<?php

require __DIR__ . '/../vendor/autoload.php';

use BracesChecker\Braces;
use BracesChecker\Checker;




$string = '{()[]{}}';
//$string =  "{[]{[}((}){[(}(}}}]]{{})(}(]{(]";
$braces = new Braces();
$checker = new Checker($braces);
$checker->check($string);

