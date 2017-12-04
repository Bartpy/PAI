<?php
	$l = $_SESSION['login'];
	$p = $_SESSION['pass'];
	
	if($l && $p){
		echo 'Zalogowano jako: <b>'.$l.'</b><br>';
		echo '<a href="?zad=32&case=logout">Wyloguj</a><br>';
	} else {
		echo 'Rejestracja:<br>';
		echo '<form action="?zad=32&case=register" method="post">';
		echo 'Login: <input type="text" name="login"><br>';
		echo 'Haslo: <input type="password" name="pass"><br>';
		echo '<input type="submit" value="Zarejestruj">';
		echo '</form>';
		echo '<br>';
		echo 'Logowanie:<br>';
		echo '<form action="?zad=32&case=login" method="post">';
		echo 'Login: <input type="text" name="login"><br>';
		echo 'Haslo: <input type="password" name="pass"><br>';
		echo '<input type="submit" value="Zaloguj">';
		echo '</form>';
		
		$login = htmlspecialchars(trim($_POST['login']));
		$pass = htmlspecialchars(trim($_POST['pass']));
		$case = $_GET['case'];
		
		if($_POST){
			if($login && $pass){
				if($case == "register") {
					$uzytkownicy = fopen("uzytkownicy.txt", "a+");
					
					fputs($uzytkownicy, $login."\n");
					fputs($uzytkownicy, md5($pass)."\n");
					
					fclose($uzytkownicy);
				} else {
					if(file_exists("uzytkownicy.txt"))	$uzytkownicy = fopen("uzytkownicy.txt", "r+");
					else								$uzytkownicy = fopen("uzytkownicy.txt", "w+");
					
					while(($linia = fgets($uzytkownicy)) !== false){
						$pass2 = fgets($uzytkownicy);
						if(trim($linia) == $login && md5($pass) == trim($pass2)){
							$_SESSION['login'] = $login;
							$_SESSION['pass'] = $pass2;
							break;
						}
					}
					
					fclose($uzytkownicy);
				}
					
				header('Location: ?zad=32');
			} else echo "Wypelnij wszystkie dane!<br>";
		}
	}
	
	if($_GET['case'] == "logout"){
		session_unset();
		session_destroy();
		header("location: ?zad=32");
	}
?>


<a href="index.php">Strona glowna</a>