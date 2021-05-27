<?php
    show_source(__FILE__);
    include_once('flag.php');

    class Challenge{
        public $mod;

        public function __destruct(){
            $this->mod->test1();
        }
    }

    class Function1{
        public $mod;
        public function test1(){
            $this->mod->test2();
        }
    }

    class Function2{
        public $mod;
        public function __call($test2, $arr){
            $tmp = $this->mod;
            $tmp();
        }
    }

    class Function3{
        public $mod;
        public $mod2;
        public function __invoke(){
            $this->mod2 = "String: ".$this->mod;
        }
    }

    class CustomString{
        public $str;
        public function __toString(){
            $this->str->get_flag();
            return "";
        }
    }

    class Flag{
        public function get_flag(){
            show_source('flag.php');
        }
    }

    $your_flag = unserialize($_GET["input"]);
?>
<hr/>