<?php
header("Content-Type: text/plain");

require("cards.php");

$deck = new Deck();
$deck->shuffle();
$lastCard = $deck->deal();
print($lastCard);

$snaps = 0;
$superSnaps = 0;

while (!$deck->isEmpty()) {
    $thisCard = $deck->deal();
    print($thisCard);
    if ($lastCard->getRank() == $thisCard->getRank()) {
        print("SNAP!!!\n");
        $snaps++;
    } elseif ($lastCard->getColour() == $thisCard->getColour()) {
        print("SUPERSNAP!!!\n");
        $superSnaps++;
    }
    $lastCard = $thisCard;
}
printf ("We had %s snaps including %s SuperSnaps\n",$snaps + $superSnaps, $superSnaps);

