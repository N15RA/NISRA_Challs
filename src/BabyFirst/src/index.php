<?php
    highlight_file(__FILE__);

    $dir = 'sandbox/' . $_SERVER['REMOTE_ADDR'];
    umask(002);
    if ( !file_exists($dir) )
        mkdir($dir, 0770);
    chdir($dir);

    if (isset($_GET['args'])){
        $args = $_GET['args'];
        for ( $i=0; $i<count($args); $i++ ){
            if ( !preg_match('/^\w+$/', $args[$i]) )
                exit();
        }
        exec("/bin/nisra " . implode(" ", $args));
    }
?>