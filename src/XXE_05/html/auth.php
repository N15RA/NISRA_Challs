<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: text/html; charset=utf-8');
    error_reporting(E_ERROR | E_PARSE);  // turn off warning and error message
    try {
        libxml_disable_entity_loader(false);
        $xmlfile = file_get_contents('php://input');

        $dom = new DOMDocument();
        $dom->loadXML($xmlfile, LIBXML_NOENT | LIBXML_DTDLOAD);
        
        $user = simplexml_import_dom($dom);
        die("true");
    } catch (Exception $e) {
        die("false");
    }
} else die('This url only allow POST method.');
?>