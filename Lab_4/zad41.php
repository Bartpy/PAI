<?php
	if($_COOKIE["zad41"]){
		echo "To ciasteczko zniknie o godzinie: ".date("H:i:s", $_COOKIE['zad41'])."<br>";
	} else {
		setcookie("zad41", time()+(60 * 3), time()+(60 * 3));
		echo "Stworzono nowe ciasteczko<br>";
	}
?>

<a href="index.php">Strona glowna</a>