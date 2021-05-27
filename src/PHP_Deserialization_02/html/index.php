<?php
    include("flag.php");

    class Flag{
        public $key = "deadbeef";
    
        function __destruct(){
            global $flag;
            echo $flag;
        }
    
        function __wakeup(){
            if($this->key !== $serect){
                global $flag;
                $flag = "You can not read the flag.";
            }
        }
    }

    show_source(__FILE__);
    $your_flag = unserialize($_GET["input"]);
?>

