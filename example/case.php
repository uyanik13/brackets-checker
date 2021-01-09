<?php

require __DIR__ . '/../vendor/autoload.php';

use BracesChecker\Braces;
use BracesChecker\Checker;




$string = "{{{}[]}}";
//$string =  "{[]{[}((}){[(}(}}}]]{{})(}(]{(]";
$braces = new Braces();
$checker = new Checker($braces);
$checker->check($string);



// function check_brackets_balance($string, $bracket_map = false) {
//     $bracket_map = $bracket_map ?: [ '[' => ']', '{' => '}', '(' => ')' ];

//     $bracket_map_flipped = array_flip($bracket_map);

//     $length = mb_strlen($string);
//     $brackets_stack = [];
    
//     for ($i = 0; $i < $length; $i++) {
//         $current_char = $string[$i];
        
//         if (isset($bracket_map[$current_char])) {

//             $brackets_stack[] = $bracket_map[$current_char];

//         } else if (isset($bracket_map_flipped[$current_char])) {

//             $expected = array_pop($brackets_stack);

//             if (($expected === NULL) || ($current_char != $expected)) {
//                 echo 'error';
//             }

//         }
//     }
//     return empty($brackets_stack);
// }


// check_brackets_balance($string);