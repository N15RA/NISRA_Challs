<?php
    function getClientIP(){       
        if (array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER)){
            return  $_SERVER["HTTP_X_FORWARDED_FOR"];  
        }else if (array_key_exists('REMOTE_ADDR', $_SERVER)) { 
            return $_SERVER["REMOTE_ADDR"]; 
        }else if (array_key_exists('HTTP_CLIENT_IP', $_SERVER)) {
            return $_SERVER["HTTP_CLIENT_IP"]; 
        }
        return '';
   }

   $client_ip = getClientIP();
   $whitelist = array(
       "127.0.0.1",
       "localhost",
       "::1"
   );
   if(!empty($client_ip) && in_array($client_ip, $whitelist)){
        $flag = "NISRA{n3v3r_trust_cl13nt_d4t4}";
        die("Hi! This is your flag: $flag");
   }else{
        die("Hey! This page only allow local user to visit.");
   }