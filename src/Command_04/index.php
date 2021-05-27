<html>
    <head>
        <title>IP Check Service v4</title>
    </head>
    <body>
    <h1>IP Check Service v4</h1>
    <h3>Enter ip address to check ping info.</h3>
    <form method="POST">
        <input name="target" type="text">
        <input type="submit" name="Submit">
    </form>
    <?php
        if(isset($_POST['target']) && !empty($_POST['target'])){
            $target = $_POST['target'];
            // use regular expression to check ip format
            $check = preg_match('/^(([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.){3}([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])/', $target);
            if($check === 0){
                echo "Bad ip format (／‵Д′)／~ ╧╧";
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
