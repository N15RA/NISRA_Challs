<?php
    $upload = false;
    $uploadPath = null;
    $dir = 'upload/' . md5($_SERVER['REMOTE_ADDR']);
    umask(002);
    if (!file_exists($dir))
        mkdir($dir, 0770);
    chdir($dir);

    if(isset($_POST["submit"])){
        $path = "/var/www/html/".$dir."/".$_FILES["file"]["name"];
        move_uploaded_file($_FILES['file']['tmp_name'], $path);
        $upload = true;
        $uploadPath = "./".$dir."/".$_FILES["file"]["name"];
    }
?>

<html>
    <head>
    <script language="JavaScript">
        function OnUploadCheck(){
            var extall="jpg,jpeg,gif,png";
            file = document.upload_form.file.value.toLowerCase();
            ext = file.split('.').pop().toLowerCase();
            if(parseInt(extall.indexOf(ext)) < 0){
                alert('Extension only support : ' + extall);
                return false;
            }
            return true;
        }
    </script>
    </head>
    <body>
        <h2>Upload File v1</h2>
        <h4>Only allow jpg, jpeg, gif and png.</h4>
        <form name="upload_form" method="post" enctype="multipart/form-data" onSubmit="return OnUploadCheck();">
            <input type="file" name="file">
            <input type="submit" name="submit" value="Submit">
        </form>
        <?php
            if($upload){
                echo "<img src='".$uploadPath."'>";
            }
        ?>
    </body>
</html>