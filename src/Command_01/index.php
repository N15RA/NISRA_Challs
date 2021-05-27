<html>
    <head>
        <title>IP Check Service</title>
    </head>
    <body>
    <h1>IP Check Service</h1>
    <h3>Enter domain or ip to check ping info.</h3>
    <form method="POST">
        <input name="target" type="text">
        <input type="submit" name="Submit">
    </form>
    <?php
        if(isset($_POST['target']) && !empty($_POST['target'])){
            $target = $_POST['target'];
            $result = shell_exec("ping -c1 ".$target);
            echo "<pre>".$result."</pre>";
            echo "<hr />";
        }
    ?>
    </body>
</html>
<?php highlight_file(__FILE__); ?>
