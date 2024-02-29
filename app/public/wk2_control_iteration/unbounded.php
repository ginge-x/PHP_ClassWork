<?php
function generateRandomArray(){
    $randomArray = [];
    for ($i = 0; $i < 50; $i++){
        $randomArray[] = rand(1,100);
    }
    return $randomArray;
}

function countEvenValues($array){
    $count = 0;
    $index = 0;

    echo"<pre>";

    while (true){
        $currentValue = $array[$index];

        echo "Step $index: Current value is $currentValue\n";

        if($currentValue % 2 == 0){
            $count++;
        }

        if($index ==count($array) - 1 || $currentValue == 42){
            break;
        }

        $index++;
    }

    echo "Total even values: $count\n";

    echo"</pre>";

}

$randomArray = generateRandomArray();

echo "Generated Array: " . implode(', ', $randomArray). "\n\n";

countEvenValues($randomArray);

?>