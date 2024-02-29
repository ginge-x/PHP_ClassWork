<?php

use InvalidArgumentException;

class User
{
    private int $age;
    private array $favorite_movies = [];
    private string $name;

    /**
     * @param int $age
     * @param string $name
     */
    public function __construct(int $age, string $name)
    {
        if ($age < 1)
            $this->age = 1;
        else
            $this->age = $age;
        $this->name = $name;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getMovieList(): array
    {
        return $this->favorite_movies;
    }

    public function tellName(): string
    {
        return "My name is " . $this->name . ".";
    }

    public function tellAge(): string
    {
        if ($this->age = 100)
            return "I am a Centurian!";
        else
            return "I am " . $this->age . " years old.";
    }

    public function addFavoriteMovie(string $movie): bool
    {
        $this->favorite_movies[] = $movie;

        return true;
    }

    public function removeFavoriteMovie(string $movie): bool
    {
        if (!in_array($movie, $this->favorite_movies)) throw new InvalidArgumentException("Unknown movie: " . $movie);

        unset($this->favorite_movies[array_search($movie, $this->favorite_movies)]);

        return true;
    }
}

$movieBuff1 = new User(25, 'Joe');
$movieBuff2 = new User(19, "Fred");

echo $movieBuff1->getName();