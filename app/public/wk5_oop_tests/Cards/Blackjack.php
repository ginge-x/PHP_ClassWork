<?php

header("Content-Type: text/plain");
require("cards.php");

class Player{
    private $hand = [];

    public function addCard($card){
        $this->hand[] = $card;
    }

    public function getHand(){
        return $this->hand;
    }

    public function calculateHandValue(){
        $total = 0;
        $num_aces = 0;
        foreach ($this->hand as $card){
            $rank = $card->getRank();
            if ($rank == 'Ace'){
                $num_aces++;
                continue;
            }
            if(is_numeric($rank)){
                $total += $rank;
            }else{
                $total += 10;
            }
        }

        for($i = 0; $i < $num_aces; $i++){
            if ($total + 11 <= 21){
                $total += 11;
            }
            else{
                $total += 1;
            }
        }
        return $total;
    }
}

class Dealer extends Player {
    public function showHand() {
        // Display all cards in the dealer's hand
        echo "Dealer's hand:\n";
        foreach ($this->getHand() as $card) {
            echo $card;
        }
    }

    public function calculateVisibleHandValue() {
        // Calculate the total value of the dealer's visible cards (excluding the hidden card)
        $total = 0;
        $num_aces = 0;
        $hand = $this->getHand();
        // Start from the second card to skip the hidden card
        for ($i = 1; $i < count($hand); $i++) {
            $rank = $hand[$i]->getRank();
            if ($rank == 'Ace') {
                $num_aces++;
                continue; // Skip Aces for now, handle them separately
            }
            if (is_numeric($rank)) {
                $total += $rank; // Numeric cards
            } else {
                $total += 10; // Face cards
            }
        }
        // Handle Aces
        for ($i = 0; $i < $num_aces; $i++) {
            if ($total + 11 <= 21) {
                $total += 11; // Use Ace as 11 if it doesn't bust
            } else {
                $total += 1; // Otherwise, use Ace as 1
            }
        }
        return $total;
    }

    public function revealHiddenCard() {
        // Display the hidden card and update the total value of the dealer's hand
        echo "Dealer reveals their hidden card:\n";
        $hidden_card = $this->getHand()[1]; // Get the hidden card
        echo $hidden_card;
        // Calculate the total value of the dealer's hand including the hidden card
        echo "Total value: " . $this->calculateHandValue() . "\n";
    }

    public function shouldHit() {
        // Implement dealer's decision-making logic (e.g., hit if total hand value is less than 17)
        return $this->calculateHandValue() < 17;
    }
}




$deck = new Deck();
$deck->shuffle();

$player = new Player();
$dealer = new Dealer();

$player->addCard($deck->deal());
$player->addCard($deck->deal());
$dealer->addCard($deck->deal());
$dealer->addCard($deck->deal());

echo "Player's turn:\n";
$player_total = $player->calculateHandValue();
while ($player_total < 21) {
    // Display player's hand and total value
    echo "Player's hand:\n";
    foreach ($player->getHand() as $card) {
        echo $card;
    }
    echo "Total value: $player_total\n";

    // Ask player for action
    $action = readline("Do you want to (h)it or (s)tand? ");
    if ($action == 'h') {
        // Player hits, deal another card
        $player->addCard($deck->deal());
        $player_total = $player->calculateHandValue();
    } elseif ($action == 's') {
        // Player stands, end turn
        break;
    }
}

// Dealer's turn
echo "\nDealer's turn:\n";
$dealer->revealHiddenCard();
while ($dealer->shouldHit()) {
    // Dealer hits, deal another card
    $dealer->addCard($deck->deal());
    $dealer_total = $dealer->calculateHandValue();
    echo "Dealer hits and receives another card.\n";
    echo "Dealer's hand:\n";
    foreach ($dealer->getHand() as $card) {
        echo $card;
    }
    echo "Total value: $dealer_total\n";
}

// Determine the winner
$player_total = $player->calculateHandValue();
$dealer_total = $dealer->calculateHandValue();
echo "\nPlayer's total value: $player_total\n";
echo "Dealer's total value: $dealer_total\n";

if ($player_total > 21) {
    echo "Player busts. Dealer wins!\n";
} elseif ($dealer_total > 21) {
    echo "Dealer busts. Player wins!\n";
} elseif ($player_total > $dealer_total) {
    echo "Player wins!\n";
} elseif ($player_total < $dealer_total) {
    echo "Dealer wins!\n";
} else {
    echo "It's a tie!\n";
}

?>