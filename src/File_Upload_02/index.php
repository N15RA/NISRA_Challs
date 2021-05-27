<?php
    $upload = false;
    $uploadPath = null;
    $dir = 'upload/' . md5($_SERVER['REMOTE_ADDR']);
    umask(002);
    if (!file_exists($dir))
        mkdir($dir, 0770);
    chdir($dir);

    if(isset($_POST['submit'])){
        $_FILES["file"]["name"] = strtolower($_FILES["file"]["name"]);
        $allow_exts = explode(',', strtolower($_POST['allow_exts']));
        $ext = explode('.', $_FILES["file"]["name"])[1];

        $check = false;
        foreach($allow_exts as $allow_ext){
            if($allow_ext === $ext)
                $check = true;
        }

        if($check === false){
            die("File extension is not allow.");
        }else{
            $path = "/var/www/html/".$dir."/".$_FILES["file"]["name"];
            move_uploaded_file($_FILES['file']['tmp_name'], $path);
            $upload = true;
            $uploadPath = "./".$dir."/".$_FILES["file"]["name"];
        }        
    }
?>

<html>
    <body>
        <h2>Upload File v2</h2>
        <h4>Only allow jpg, jpeg, gif and png.</h4>
        <form name="upload_form" method="post" enctype="multipart/form-data">
            <input type="file" name="file">
            <input type="hidden" name="allow_exts" value="jpg,png,gif,jpeg">
            <input type="submit" name="submit" value="Submit">
        </form>
        <?php
            if($upload)
                echo "<img src='".$uploadPath."'>";
        ?>
    </body>
</html>