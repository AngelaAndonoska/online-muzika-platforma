<?php
class Song {
    public $title, $genre, $releaseYear, $album;

    public function __construct($title, $genre, $releaseYear, $album) {
        $this->title = $title;
        $this->genre = $genre;
        $this->releaseYear = $releaseYear;
        $this->album = $album;
    }
}
?>
