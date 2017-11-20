<?php
	$name = $_POST['name'];
	$sname = $_POST['sname'];
	$email = $_POST['email'];
	$sex = $_POST['sex'];
	$age = $_POST['age'];
	$desc = htmlspecialchars(trim($_POST['desc']));
	
	if($_POST){
		if($_GET){
			echo "<".$_GET['format'].">";
		}
		
		if($name && $sname && $email && $sex && $age && $desc){
			echo 'Nazywasz siê '.$name.' '.$sname.'<br>';
			echo 'Twój adres email to '.$email.'<br>';
			echo 'Twoja p³eæ to: '.(($sex == 'm') ? 'mê¿czyzna' : 'kobieta').'<br>';
			echo 'Masz '.(($age == '20m') ? 'poni¿ej' : 'powy¿ej').' 20 lat<br>';
			echo 'Twój opis: '.$desc.'<br>';
		} else {
			echo 'Wype³nij formularz';
		}
		
		if($_GET){
			echo "</".$_GET['format'].">";
		}
	}
	
?>

<a href="index.html">Powrót</a>