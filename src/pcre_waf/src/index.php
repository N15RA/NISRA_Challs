<?php
    $dir = 'sandbox/' . $_SERVER['REMOTE_ADDR'];
    umask(002);
    if (!file_exists($dir))
        mkdir($dir, 0770);
    chdir($dir);

    function is_php($input){
        return preg_match('/<\?.*[(`;?>].*/is', $input);
    }

    highlight_file(__FILE__);

    if(!empty($_FILES)){
        $data = file_get_contents($_FILES['file']['tmp_name']);
        if(!is_php($data)){
            $path = "/var/www/html/".$dir."/".$_FILES["file"]["name"];
            move_uploaded_file($_FILES['file']['tmp_name'], $path);
        }else echo "PHP pattern found!";
    }   
?>
<html>
<body>
    <!-- <a href="info.php">info</a> -->
    <form method="post" enctype="multipart/form-data">
        File Name:<input type="file" name="file" id="file" /><br />
        <input type="submit" name="submit" value="Upload" />
    </form>
</body>
</html>
