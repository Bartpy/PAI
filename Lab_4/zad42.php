<?php
	if($_COOKIE['zad42login'] && $_COOKIE['zad42pass']){
		$_SESSION['login'] = $_COOKIE['zad42login'];
		$_SESSION['pass'] = base64_decode($_COOKIE['zad42pass']);
	}
	
	$login = $_SESSION['login'];
	$pass = $_SESSION['pass'];
	
	$user = mysql_query("SELECT * FROM 15a_users WHERE login='".$login."' and pass='".$pass."'") or die(mysql_query());
	
	if(mysql_num_rows($user) == 0){
?>

Logowanie:<br>
<form action="?zad=42&case=login" method="post">
	Login: <input type="text" name="login"><br>
	Haslo: <input type="password" name="pass"><br>
	<input type="submit" value="Zaloguj">
</form>

<?php
	} else {
		$u = mysql_fetch_array($user);
		echo 'Zalogowano jako: <b>'.$u['login'].'</b><br>';
		echo '<a href="?zad=42&case=logout">Wyloguj</a><br>';
		
		session_unset();
		session_destroy();
		session_start();
	}
	
	$case = $_GET['case'];
	
	switch($case){
		case 'login':
			$login2 = $_POST['login'];
			$pass2 = $_POST['pass'];
			
			if($_POST){
				if($login2 && $pass2){
					$login2 = htmlspecialchars(trim($login2));
					$pass2 = htmlspecialchars(trim(md5($pass2)));
					$user2 = mysql_query("SELECT * FROM 15a_users WHERE login='".$login2."' and pass='".$pass2."'") or die(mysql_query());
					echo mysql_num_rows($user2);
					if(mysql_num_rows($user2) != 0){
						$u2 = mysql_fetch_array($user2);
						
						$_SESSION['login'] = $u2['login'];
						$_SESSION['pass'] = $u2['pass'];
						
						setcookie("zad42login", "", time()-1);
						setcookie("zad42pass", "", time()-1);
						
						setcookie("zad42login", $u2['login'], time()+(60 * 24 * 7));
						setcookie("zad42pass", base64_encode($u2['pass']), time()+(60 * 24 * 7));
						
						header('Location: ?zad=42');
					} else {
						echo 'Taki uzytkownik nie istnieje lub podano zle dane!<br>';
					}
				} else {
					echo 'Wypelnij wszystkie pola!<br>';
				}
			}
			break;
		case 'logout':
			session_unset();
			session_destroy();
			setcookie("zad42login", "", time()-1);
			setcookie("zad42pass", "", time()-1);
			echo $_COOKIE['zad42login']." - ".$_COOKIE['zad42pass']."<br>";
			header("location: ?zad=42");
			break;
	}
?>

<a href="index.php">Strona glowna</a>