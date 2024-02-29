<?php
header("Content-Type: text/plain");

// This is a php array of 10 elements that contains ints, floats, strings, booleans, and objects
$array = array();
for ($i = 0; $i < 10; $i++) {
  // Generate a random type for each element
  $type = mt_rand(1, 5);
  switch ($type) {
    case 1:
      // int
      $array[$i] = mt_rand(-1000, 1000);
      break;
    case 2:
      // float
      $array[$i] = mt_rand(-1000, 1000) / 10.0;
      break;
    case 3:
      // string
      $array[$i] = substr(str_shuffle("abcdefghijklmnopqrstuvwxyz"), 0, mt_rand(1, 10));
      break;
    case 4:
      // boolean
      $array[$i] = (bool)mt_rand(0, 1);
      break;
    case 5:
      // object
      $array[$i] = new stdClass();
      $array[$i]->name = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, mt_rand(1, 10));
      $array[$i]->age = mt_rand(1, 100);
      break;
  }
}
// Print the array
var_dump($array);

//Pseudocode part - rewrite as PHP 

// Initialize an array of five zeros
$counts = array(0, 0, 0, 0, 0);

// Loop through each element in the array
// Check the type of the element and increment the corresponding count
foreach ($array as $element){
  if(is_int($element)){
    $counts[0] += 1;
  }elseif (is_float($element)){
    $counts[1] += 1;
  }elseif (is_string($element)){
    $counts[2] += 1;
  }elseif (is_bool($element)){
    $counts[3] += 1;
  }elseif (is_object($element)){
    $counts[4] += 1;
  }
}


// Print the number of each type created
echo "Number of ints created: " . $counts[0] ."\n";
echo "Number of floats created: " . $counts[1] ."\n";
echo "Number of strings created: " . $counts[2] ."\n";
echo "Number of booleans created: " . $counts[3] ."\n";
echo "Number of objects created: " . $counts[4] ."\n";




?>