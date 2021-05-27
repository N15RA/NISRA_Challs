<?php
    if (isset($_GET["source_code"])) {
        show_source(__FILE__);
        exit();
    }

    $upload = false;
    $uploadPath = null;
    $dir = 'upload/' . md5($_SERVER['REMOTE_ADDR']);
    umask(002);
    if (!file_exists($dir))
        mkdir($dir, 0770);
    chdir($dir);

    if(isset($_POST['submit'])){
        $_FILES["file"]["name"] = strtolower($_FILES["file"]["name"]);
        $allow_exts = array("jpg", "jpeg", "gif", "png");
        $ext = explode('.', $_FILES["file"]["name"]);
        $ext = $ext[count($ext) - 1];

        $check = false;
        if(in_array($ext, $allow_exts)) $check = true;

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
        <h2>Upload File v3</h2>
        <h4>Only allow jpg, jpeg, gif and png.</h4>
        <!-- <a href="?source_code">Source Code</a> -->
        <form name="upload_form" method="post" enctype="multipart/form-data">
            <input type="file" name="file">
            <!-- No more hidden input anymore! -->
            <input type="submit" name="submit" value="Submit">
        </form>
        <?php
            if($upload)
                echo "<img src='".$uploadPath."'>";
        ?>
    </body>
</html>