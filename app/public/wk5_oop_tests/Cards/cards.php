<?php

class Cards {
    private const ranks = [2,3,4,5,6,7,8,9,10,"Jack","Queen","King","Ace"];
    private const suits = ["Hearts","Diamonds","Clubs","Spades"];

    private $rank;
    private $suit;

    public static function eq(Cards $a, Cards $b)
    {
        if($a->rank == $b->rank){
            return true;
        }
        else {
            return false;
        }
    }
    public static function gt(Cards $a, Cards $b)
    {
        if($a->rank > $b->rank){
            return true;
        }
        else {
            return false;
        }
    }

    public static function lt(Cards $a, Cards $b)
    {
        if($a->rank < $b->rank){
            return true;
        }
        else {
            return false;
        }
    }

    public function __construct($rank = 0, $suit = 0){
        $this->rank=$rank;
        $this->suit=$suit;
    }

    public function getColour()
    {
        $colour = NULL;
        switch (Cards::suits[$this->suit]) {
            case "Hearts":
            case "Diamonds":
                $colour = "Red";
                break;
            case "Clubs":
            case "Spades":
                $colour = "Black";
                break;
            default: $colour = NULL;           
        }
        return $colour;
    }

    public function getRank()
    {
        return Cards::ranks[$this->rank];
    }

    public function getSuit()
    {
        return Cards::suits[$this->suit];
    }
    public function __toString()
    {
        return "{$this->getRank()} of {$this->getSuit()}\n";
    }
}

class Deck {

    protected $cards = [];

    public function __construct()   
    {
        for($suit=0; $suit<4; $suit++){
            for($rank=0; $rank<13; $rank++){
                $this->cards[] = new Cards($rank,$suit);
            }
        }
    }

    public function isEmpty()
    {
        return count($this->cards) == 0;
    }

    public function shuffle()
    {
        return shuffle($this->cards);
    }

    public function deal()
    {
        return array_pop($this->cards);
    }

    public function __toString()
    {
        $output = "";
        foreach($this->cards as $card){
            $output .= $card ."\n";
        }
        return $output;
    }

}

class Hand extends Deck
{
    public $label;

    public function __construct($label = '')
    {
        $this->label = $label;
        $this->cards = [];
    }
    public function addCard(Cards $card)
    {
        $this->cards[]=$card;
    }
    public function value()
    {
        $total = 0;
        foreach($this->cards as $card){
            switch ($card->getRank()) {
                case "Ace":
                    $total += 11;
                    break;
                case "Jack":
                case "Queen":
                case "King":
                $total += 10;
                break;
            default:
                $total += $card->getRank();
            }
        }
        return $total;
    }
}
