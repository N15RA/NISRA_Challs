<?php
	show_source(__FILE__);
	$check = false;
	if($_FILES['file']['error'] === UPLOAD_ERR_OK)
	{
		$dir = '/tmp/' . md5(strval(time()+rand()));
		if(!file_exists($dir))
			mkdir($dir, 0770);
		chdir($dir);
		$path = $dir . "/" . $_FILES["file"]["name"];
		move_uploaded_file($_FILES['file']['tmp_name'], $path);
		$check = true;
	}
?>

<html>
<body>
	<form method="post" enctype="multipart/form-data">
		<input type="file" name="file">
		<button type="submit">Submit</button>
	</form>
	<?php
		if($check)
			echo "Maybe you need it! " . $path;
	?>
</body>
</html>