<?php
    require_once 'parser/Parsedown.php';

    class Wiki {
        public $parser;
        private $directory;
        
        public function __construct() {
            $this->parser = new Parsedown();
            $path = $_SERVER['DOCUMENT_ROOT'].'/wiki';
            $this->directory = new DirectoryIterator($path);
        }

        public function iterate() {
            $returnable = array();
            foreach ($this->directory as $file) {
                if($file->isDot()) {
                    continue;
                } else {
                    $returnable[preg_replace('#.md#', '', $file)] = $file->getPathname();
                }
            }
            return $returnable;
        }
    }
?>