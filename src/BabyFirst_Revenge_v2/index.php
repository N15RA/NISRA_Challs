<?php    
    $sandbox = '/var/www/html/sandbox/' . md5($_SERVER['REMOTE_ADDR']);
    umask(002);
    if ( !file_exists($sandbox) )
        @mkdir($sandbox, 0770);
    @chdir($sandbox);

    if (isset($_GET['cmd']) && strlen($_GET['cmd']) <= 4) {
        @exec($_GET['cmd']);
    } else if (isset($_GET['reset'])) {
        @exec('rm -rf ' . $sandbox);
    }
    highlight_file(__FILE__);