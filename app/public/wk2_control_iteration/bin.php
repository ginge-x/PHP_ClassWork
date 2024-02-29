<?php

function generateRandomArray()
{
    $randomArray = [];
    for ($i = 0; $i < 50; $i++) {
        $randomArray[] = rand(1, 100);
    }
    return $randomArray;
}

$fixedValue = 50;

$matchCount = 0;
$lessCount = 0;
$greaterCount = 0;

$numbersArray = generateRandomArray();

foreach ($numbersArray as $number) {
    if ($number == $fixedValue){
        echo"\n$number is equal to the fixed value of 50.\n";
        $matchCount++;
    }
    elseif ($number < $lessCount){
        echo "\n$number is less than the fixed value of 50.\n";
        $lessCount++;
    }else{
        echo "\n$number is greater than the fixed value of 50.\n";
        $greaterCount++;
    }
}

echo "\nTotal Matches: $matchCount";
echo "\nTotal Less Than: $lessCount";
echo "\nTotal Greater Than: $greaterCount";

?>
