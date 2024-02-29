<?php

header("Content-Type: text/plain");

$fruits = array("apple", "banana", "orange", "grape");

// Part a - Display the array
var_dump($fruits);

// //Part b- Get an element by its position
var_dump($fruits[0]);

// //Part c - Add a new element to the end of the array
echo "\n";
$fruits[] = "pear";
var_dump($fruits);

// //Part d - Remove the first element from the array
echo "\n";
unset($fruits[0]);
var_dump($fruits);
// //Part e - Arrange the array in alphabetical order
sort($fruits);
var_dump($fruits);
// //Part f - Repeat for each element in the array
foreach ($fruits as $fruit){
  echo $fruit . "\n";
}

?>