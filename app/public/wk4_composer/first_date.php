<?php
require '/var/www/html/vendor/autoload.php';
use Carbon\Carbon;
header("Content-Type: text/plain");

$birthday = Carbon::createFromDate(2004, 6, 4);

$today = Carbon::today();

$nextBirthday = $birthday->copy()->year($today->year);
if($nextBirthday->lt($today)){
    $nextBirthday->addYear();
}

$daysUntilBirthday = $today->diffInDays($nextBirthday);

echo "Days until my next birthday: $daysUntilBirthday days";

?>