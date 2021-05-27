<?php
    show_source(__FILE__);

    class FileExplorer{
        public function __construct($file){
            echo "<hr/>";
            show_source($file);
        }
    }

    class NISRA{
        public $file = "hi.php";
        public function __wakeup(){
            $obj = new FileExplorer($this->file);
        }
    }

    $your_flag = unserialize($_GET["input"]);
?>