<form action="?zad=33" method="post" enctype="multipart/form-data">
    Wybierz plik: <input type="file" name="file"><br>
    <input type="submit" value="Wgraj">
</form>

<?php
	$file = $_FILES['file'];
	
	if($_FILES){
		$filedir = "files/".basename($file['name']);
		$type = pathinfo($file['name'], PATHINFO_EXTENSION);
		if($type == "zip" || $type == "rar")
			move_uploaded_file($file['tmp_name'], $filedir);
		header("Location: ?zad=33");
	}
?>

<a href="index.php">Strona glowna</a>