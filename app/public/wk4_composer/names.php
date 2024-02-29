<?php

require '/var/www/html/vendor/autoload.php';
use Ramsey\Collection\Collection;
header("Content-Type: text/plain");

$collection = new Collection('string');
$numberOfNames = mt_rand(1, 10);

for ($i = 0; $i < $numberOfNames; $i++){
    $name = generateRandomName(5);
    $collection->add($name);
}

$names = $collection->toArray();
sort($names);

foreach ($names as $word){
    echo $word;
    echo "\n";
}
echo "Number of names is ",count($names);

function generateRandomName($length){
    $characters = 'abcdefghijklmnopqrstuvwxyz';
    $name = '';
    for ($i = 0; $i < $length; $i++) {
        $name .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $name;
}
?>