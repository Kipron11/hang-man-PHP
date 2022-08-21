<?php

class Hangman
{
    private array $words = ["dog", "cat", "evil", "tokyo", "leviathan", "masterpiece", "hoe", "naruto"];

    public $wordArray;
    public array $hiddenWord;
    public int $tries = 5;


    public function __construct()
    {
        $randomWord = $this->words[rand(0, count($this->words) - 1)];

        $this->wordArray = str_split($randomWord);

        for ($i = 0; $i <= count($this->wordArray) - 1; $i++) {
            $this->hiddenWord[] = '_';
        }

    }

    public function createBoard()
    {
        echo "-=-=-=-=-=-=-=-=-=-=-=-=-=- \n";
        echo "Word : " . implode(' ', $this->hiddenWord) . "\n";
        echo "Tries left : " . $this->tries . "\n";
    }


    public function makeTurn()
    {
        $search = readline("Enter the letter to search for: \n");
        if (in_array($search, $this->wordArray)) {
            foreach ($this->wordArray as $key => $value) {
                if ($value == $search) {
                    $this->hiddenWord[$key] = $search;
                }
            }
        } else {
            $this->tries--;
        }

    }

    public function winner(): bool
    {
        if (array_values($this->hiddenWord) == array_values($this->wordArray)) {
            return true;
        }
        return false;
    }

    public function game()
    {
        while ($this->tries > 0) {
            system('clear');
            $this->createBoard();
            $this->makeTurn();

            if ($this->winner()) {
                system('clear');
                break;
            }
        }
        $this->createBoard();
        echo "-=-=-=-=-=-=-=-=-=-=-=-=-=- \n";
        die("Thank you for playing \n");
    }
}

$newGame = new Hangman();
$newGame->game();

