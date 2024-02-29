<?php
require '/var/www/html/vendor/autoload.php';
use MatthiasMullie\Minify;

$sourcePath = './css/style.css';
$minifier = new Minify\CSS($sourcePath);

// we can even add another file, they'll then be
// joined in 1 output file
$sourcePath2 = './css/navigation.css';
$minifier->add($sourcePath2);

// save minified file to disk
$minifiedPath = './css/final.css';
$minifier->minify($minifiedPath);

// or just output the content
echo $minifier->minify();
?>