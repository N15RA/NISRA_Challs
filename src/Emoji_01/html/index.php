<?php
highlight_file(__FILE__);
$_ = $_GET['💻'];
if( strpos($_, '"') || strpos($_, "'")) 
    die('Bad Hacker :(');
eval('die("' . substr($_, 0, 16) . '");');