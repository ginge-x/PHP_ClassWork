<?php
header("Content-Type: text/plain");

$fruits = array("apple", "banana", "orange", "grape");
$vowelFruits = array();

foreach ($fruits as $fruit){
    $fc = strtolower(substr($fruit, 0, 1));
    if ($fc == 'a' || $fc == 'e' || $fc == 'i' || $fc == 'o' || $fc == 'u'){
        $vowelFruits[] = $fruit;
    }
}

var_dump($vowelFruits);
?>