<?php

class Movie
{

    protected string $title;
    protected string $studio;
    protected string $rating;

    public function __construct($title, $studio, $rating)
    {
        $this->title = $title;
        $this->studio = $studio;
        $this->rating = $rating;
    }

    public function getRating(): string
    {
        return $this->rating;
    }


}

class MovieList
{

    protected array $list;

    public function addMovie(Movie $movie)
    {
        $this->list[] = $movie;
    }

    public function sortMovies($rating): array
    {
        $output = [];
        foreach ($this->list as $item) {
            if ($item->getRating() == $rating) {
                $output[] = $item;
            }
        }
        return $output;
    }
}


$firstMovie = new Movie("Casino Royale", "Eon Productions", "PG13");
$secondMovie = new Movie("Glass", "Buena Vista International", "PG13");
$thirdMovie = new Movie("Spider-Man: Into The Spider Verse", "Columbia Pictures", "PG");

$ratedMovies = new MovieList();

$ratedMovies->addMovie($firstMovie);
$ratedMovies->addMovie($secondMovie);
$ratedMovies->addMovie($thirdMovie);

var_dump($ratedMovies->sortMovies("PG"));

