<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') exit(0);

$USERNAME = 'n1sr4_supers3cr3t_us3r_y0u_c4n_n0t_gu3ss3d';
$result = null;

libxml_disable_entity_loader(false);
$xmlfile = file_get_contents('php://input');

try{
	$dom = new DOMDocument();
	$dom->loadXML($xmlfile, LIBXML_NOENT | LIBXML_DTDLOAD);
	$creds = simplexml_import_dom($dom);
	$username = $creds->username;

	if($username == $USERNAME){
		$result = sprintf("<result><code>%d</code><msg>%s</msg></result>",1 ,$username);
	}else{
		$result = sprintf("<result><code>%d</code><msg>%s</msg></result>",0 ,$username);
	}	
}catch(Exception $e){
	$result = sprintf("<result><code>500</code><msg>Something going wrong, please contact admin.</msg></result>");
}

header('Content-Type: text/html; charset=utf-8');
echo $result;
?>