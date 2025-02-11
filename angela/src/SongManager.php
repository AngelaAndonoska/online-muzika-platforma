<?php
class SongManager {
    private $songsFile = "../data/songs.json";

    public function getSongs() {
        return json_decode(file_get_contents($this->songsFile), true) ?? [];
    }

    public function saveSongs($songs) {
        file_put_contents($this->songsFile, json_encode($songs, JSON_PRETTY_PRINT));
    }
}
?>
