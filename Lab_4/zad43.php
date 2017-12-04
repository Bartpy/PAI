<?php
	if($_COOKIE["zad43"]){
		echo "Witaj ponownie! Ostatnio byles na naszej stronie ".date("d.m.Y H:i:s", $_COOKIE['zad43'])."<br>";
		setcookie("zad43", time());
	} else {
		setcookie("zad43", time(), time()+(60 * 60 * 24 * 365));
		header("Location: ?zad=43");
	}
	
?>

<a href="index.php">Strona glowna</a>