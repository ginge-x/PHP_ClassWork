<?php

//Set up the board
$board =[];
const BOARDSIZE = 5;
const GUESSES = 5;
$wins = 0;
$losses = 0;

/** This function calculates  a random position */
function random_pos(){
    return rand(0,BOARDSIZE-1);
}

/**  This helper function will print out the board */
function print_board($board){
    foreach($board as $row){
        foreach($row as $element){
            print ("$element");
        }
        print ("\n");
    }
}

/** This helper function checks a position is valid */
function on_board($row,$col){
    if(($row < 0 ) || ($row >= BOARDSIZE ) ||
    ($col < 0 ) || ($col >= BOARDSIZE) ||
    ($col == NULL) || ($row == NULL)){
        return false;
    }
    else {
        return true;
    }
}

// Function to ask user if they want to play again
function ask_play_again() {
    $answer = readline("Do you want to play again? (yes/no): ");
    return strtolower(trim($answer)) === 'yes';
}

// Game loop
do {
    // Reset board
    $board = array_fill(0, BOARDSIZE, array_fill(0, BOARDSIZE, "*"));

    // Initialise a ship in the board
    $ship_row = random_pos();
    $ship_col = random_pos();

    // Initialiase game with a greetingS
    print ("Let's play Battleships\n");
    print_board ($board);
    // Uncomment below when debugging to display ship position
    printf("battleship at (%s, %s)\n", $ship_row,$ship_col);

    // Start of the game loop
    $win = false; // Variable to track if the user has won this game
    for($turn=1; $turn <= GUESSES; $turn++){
        // Get player guess
        $guess_row = readline("Guess a row: ");
        $guess_col = readline("Guess a column: ");

        // Validate Player guess against board size
        if(!on_board($guess_col,$guess_row))
        {
            print (" Oops, that's not even in the ocean. \n");
        }
        else // Has the players guessed our ship's position?
        if (($guess_col == $ship_col) && ($guess_row == $ship_row)){
            $board[$guess_row][$guess_col] = '💥';
            print "Congratulations!, you sank my ship!\n";
            print_board($board);
            $win = true; // Set win flag to true
            $wins++; // Increment win count
            //Exit Game Loop
            break;
        }    
        else  //Has the player guessed this position already?
        if ($board[$guess_row][$guess_col] == '🌊') {
            print("You guessed that one already. \n");
        }
        
        else {
            //  Player has not guessed correctly - Update Board with player guess
            print "You missed my battleship!\n";
            $board[$guess_row][$guess_col] = '🌊';
            if ($turn == GUESSES){ 
                // Game over = Update game board to reveal ship location
                print ("Game Over!\n");
                $board[$ship_row][$ship_col] = '⛴';
                $losses++; // Increment loss count
            }
        }
        // Prepare for next turn
        printf("This was turn %s of %s:\n", $turn, GUESSES);
        print_board($board);
    }

    // Display win/loss count
    printf("Wins: %d, Losses: %d\n", $wins, $losses);

} while (ask_play_again());

?>
