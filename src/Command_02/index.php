<html>
    <head>
        <title>IP Check Service v2</title>
    </head>
    <body>
    <h1>IP Check Service v2</h1>
    <h3>Enter domain or ip to check ping info.</h3>
    <form method="POST">
        <input name="target" type="text">
        <input type="submit" name="Submit">
    </form>
    <?php
        if(isset($_POST['target']) && !empty($_POST['target'])){
            $target = $_POST['target'];
            $blacklists = array("|", ";");
            $hacker = false;
            foreach($blacklists as $blacklist){
                if(strpos($target, $blacklist) !== false){
                    $hacker = true;
                    break;
                }
            }
            if($hacker){
                echo "Bad hacker (／‵Д′)／~ ╧╧";
            }else{
                $result = shell_exec("ping -c1 ".$target);
                echo "<pre>".$result."</pre>";
            }
            echo "<hr />";
        }
    ?>
    </body>
</html>
<?php highlight_file(__FILE__); ?>
