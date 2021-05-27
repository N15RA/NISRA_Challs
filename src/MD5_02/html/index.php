<?php
  highlight_file(__FILE__);
  $FROM_INCLUDE = true;
  include("flag.php");

  if(isset($_GET["username"]) && isset($_GET["password"])){
    $username = $_GET["username"];
    $pwd = $_GET["password"];

    if($username == $pwd){
      $msg = "username can not equal to password!";
    }else{
      if(strcmp(md5($username), md5($pwd)) == 0)
        $msg = "Flag: ".$flag;
      else
        $msg = "Keep trying!";
    }
  }
  echo $msg;
?>
