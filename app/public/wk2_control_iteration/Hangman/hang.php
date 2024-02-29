<?php
const LIVES = 6;
    function getWords($number_of_letters){
        $wordsFound = [];
        $file = fopen("words.txt", "rb");

        while ($word = fgets($file)) {
            if(strlen(trim($word)) == $number_of_letters){
                $wordsFound[] = trim($word);
            }
        }
        fclose($file);
        return $wordsFound;
    }

    function replaceAll($guessString, $guessWord, $thisLetter){
        foreach (array_keys($guessWord, $thisLetter) as $index) {
            $guessString[$index] = $thisLetter;
        }
        return $guessString;
    }

    function generateAvailableLetters(){
        return range('a', 'z');
    }

    $lives = LIVES;
    $number_of_letters = readline("Enter the word length: ");
    $words = getWords($number_of_letters);

    printf("There are %s words with %s letters\n", count($words), $number_of_letters);

    $guessWord = str_split($words[rand(0, count($words) -1)]);
    // printf("Guessing the word: %s\n", implode("",$guessWord));

    $guessString = array_fill(0, $number_of_letters, "_");
    $availableLetters = generateAvailableLetters();

    while($lives > 0){
        echo "Available letters: " . implode(" ", $availableLetters) . "\n";
        $thisLetter = strtolower(readline("Guess a letter: "));
        if(in_array($thisLetter, $availableLetters)){
            if (in_array($thisLetter, $guessWord)){
                $guessString = replaceAll($guessString, $guessWord, $thisLetter);

                if (implode($guessString) == implode($guessWord)){
                    printf("You guessed the word!\n");
                    break;
                }
            }else{
                $lives = $lives - 1;
                printf("Letter not found. You have %s Lives remaining: \n", $lives);
            }
            $availableLetters = array_values(array_diff($availableLetters, [$thisLetter]));
        }else{
            echo "Invalid letter or letter already guessed. Please choose a letter from the ones remanining\n.";
        }
        echo implode($guessString) . " \n";

        if ($lives == 0){
            echo "You ran out of lives, the word was: " . implode($guessWord) . "\n";
            break;
        }
    }

    function updateScores($player, $score){
        $lines = file("hangmanScores.txt");
        $updated = false;

        foreach($lines as $line){
            $parts = explode("\t", $line);
            if ($parts[0] == $player){
                $parts[1] = intval($parts[1]) + $score;
                $line = implode("\t", $parts);
                $updated = true;
                break;
            }
        }
        unset($line);

        if(!$updated){
            $lines[] = "$player\t$score\n";
        }

        file_put_contents("hangmanScores.txt", implode("",$lines));
    }


    if ($lives > 0){
        $player = readline("Enter the player name for a high score table: ");
        $score = $lives * $number_of_letters;
        updateScores($player, $score);
        echo "Score updated for $player\n";
    }

?>