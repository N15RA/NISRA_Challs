<?php
    show_source(__FILE__);
    include "flag.php";

    $key = "N15RA";
    $input = $_GET["input"];
    if(unserialize($input) === $key)
        echo $flag;
?>

