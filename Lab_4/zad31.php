<?php
	if(file_exists("ksiegagosci.txt")){	
		$ksiegagosci = fopen("ksiegagosci.txt", "r+");
	} else {
		$ksiegagosci = fopen("ksiegagosci.txt", "w+");
	}
	
	$count = 0;
	while(($linia = fgets($ksiegagosci)) !== false){
		if($count == 0)					echo "Autor: ".$linia." ";
		else if($count == 1)			echo "(".$linia.")<br>Wpis:<br>";
		else if(strlen($linia) != 1) 	echo $linia."<br>";
		
		$count++;
		
		if(strlen($linia) == 1) {
			$count = 0;
			echo "<br>";
		}
	}

	echo "<br><hr>";
	
	echo "<form action='?zad=31' method='post'>";
	echo "Autor: <input type=text name=autor><br>";
	echo "Wiadomosc: <textarea cols=50 rows=10 name=wiadomosc></textarea><br>";
	echo "<input type=submit value=Napisz><br>";
	echo "</form>";
	
	$autor = htmlspecialchars(trim($_POST['autor']));
	$wiadomosc = htmlspecialchars(trim($_POST['wiadomosc']));
	$data = date('Y.m.d');
	
	if($_POST){
			if($autor && $wiadomosc){
				fputs($ksiegagosci, $autor."\n");
				fputs($ksiegagosci, $data."\n");
				fputs($ksiegagosci, $wiadomosc."\n");
				fputs($ksiegagosci, "\n");
				
				header('Location: ?zad=31');
			} else echo "Wypelnij wszystkie dane!<br>";
		}
		
	fclose($ksiegagosci);
?>


<a href="index.php">Strona glowna</a>