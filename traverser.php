<?php

class Wikibrowser {
    private $directory;
    public function __construct($path) {
        $this->directory = new DirectoryIterator($path);
        $this->func_iterate($this->directory);
    }

    private function func_iterate(DirectoryIterator $iterator) {
        foreach ($iterator as $file) {
            
        }
    }
}

?>