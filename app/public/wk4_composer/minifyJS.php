<?php
require '/var/www/html/vendor/autoload.php';
use MatthiasMullie\Minify;

$sourcePath = './JS/jquery-3.1.1.js';
$minifier = new Minify\CSS($sourcePath);

// we can even add another file, they'll then be
// joined in 1 output file
$sourcePath2 = './JS/bootstrap.js';
$minifier->add($sourcePath2);

// save minified file to disk
$minifiedPath = './JS/final.js';
$minifier->minify($minifiedPath);

// or just output the content
echo $minifier->minify();
?>