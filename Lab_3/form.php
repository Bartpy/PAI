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
			echo 'Nazywasz si� '.$name.' '.$sname.'<br>';
			echo 'Tw�j adres email to '.$email.'<br>';
			echo 'Twoja p�e� to: '.(($sex == 'm') ? 'm�czyzna' : 'kobieta').'<br>';
			echo 'Masz '.(($age == '20m') ? 'poni�ej' : 'powy�ej').' 20 lat<br>';
			echo 'Tw�j opis: '.$desc.'<br>';
		} else {
			echo 'Wype�nij formularz';
		}
		
		if($_GET){
			echo "</".$_GET['format'].">";
		}
	}
	
?>

<a href="index.html">Powr�t</a>