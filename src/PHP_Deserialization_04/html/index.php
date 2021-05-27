<?php
    show_source(__FILE__);

    class NISRA{
        public $target;

        public function __construct(){
            $this->target = new Loser();
        }

        public function __destruct(){
            $this->target->action();
        }
    }

    class Loser{
        public function action(){
            echo "You are a loser. Try harder!";
        }
    }

    class Hacker{
        protected $code = 0;
        public function action(){
            if($this->code == 0xdeadbeef){
                show_source('flag.php');
            }else{
                show_source('fake_flag.php');
            }
        }
    }

    $your_flag = unserialize($_GET["input"]);
?>
<hr/>