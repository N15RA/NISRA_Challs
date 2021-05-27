<?php
   $client_referer = $_SERVER["HTTP_REFERER"];
   $whitelist = array(
       "http://www.nisra.net",
       "http://www.nisra.net/",
       "http://nisra.net",
       "http://nisra.net/"
   );
   if(!empty($client_referer) && in_array($client_referer, $whitelist)){
        $flag = "NISRA{n3v3r_trust_cl13nt_d4t4_y0u_sh0uld_k33p_1n_m1nd}";
        die("Hi! This is your flag: $flag");
   }else{
        die("Hey! This page is only allow referer from NISRA's official website.");
   }