<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: text/html; charset=utf-8');
    // error_reporting(E_ERROR | E_PARSE);  // turn off warning and error message
    try {
        libxml_disable_entity_loader(false);
        $xmlfile = file_get_contents('php://input');

        if(stripos($xmlfile, "php://") !== false) {
            die("Hey! Don't use PHP wrapper anymore!");
        }

        $dom = new DOMDocument();
        $dom->loadXML($xmlfile, LIBXML_NOENT | LIBXML_DTDLOAD);
        
        $user = simplexml_import_dom($dom);
        die(sprintf("%s", $user));
    } catch (Exception $e) {
        die("Something is going wrong, please contact the admin.");
    }
} else die('This url only allow POST method.');
?>