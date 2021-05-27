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
        $mime = $_FILES['file']['type'];
        $allow_mimes = array("image/jpg", "image/jpeg", "image/png", "image/gif");
        if(!in_array($mime, $allow_mimes))
            die("Upload file is not an image.");

        $path = "/var/www/html/".$dir."/".$_FILES["file"]["name"];
        move_uploaded_file($_FILES['file']['tmp_name'], $path);
        $upload = true;
        $uploadPath = "./".$dir."/".$_FILES["file"]["name"];
    }
?>

<html>
    <body>
        <h2>Upload File v4</h2>
        <h4>Not allow to upload PHP file.</h4>
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