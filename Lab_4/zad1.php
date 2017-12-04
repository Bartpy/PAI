<?php
	$login = $_SESSION['login'];
	$pass = $_SESSION['pass'];
	
	$user = mysql_query("SELECT * FROM 15a_users WHERE login='".$login."' and pass='".$pass."'") or die(mysql_query());
	
	if(mysql_num_rows($user) == 0){
?>

Rejestracja:<br>
<form action="?zad=1&case=register" method="post">
	Login: <input type="text" name="login"><br>
	Haslo: <input type="password" name="pass"><br>
	<input type="submit" value="Zarejestruj">
</form>
<br>
Logowanie:<br>
<form action="?zad=1&case=login" method="post">
	Login: <input type="text" name="login"><br>
	Haslo: <input type="password" name="pass"><br>
	<input type="submit" value="Zaloguj">
</form>

<?php
	} else {
		$u = mysql_fetch_array($user);
		echo 'Zalogowano jako: <b>'.$u['login'].'</b><br>';
		echo '<a href="?zad=1&case=logout">Wyloguj</a><br>';
	}
	
	$case = $_GET['case'];
	
	switch($case){
		case 'register':
			$login2 = htmlspecialchars(trim($_POST['login']));
			$pass2 = htmlspecialchars(trim(md5($_POST['pass'])));
			$date = date('Y.m.d');
			
			if($_POST){
				if($login2 && $pass2){		
					$user2 = mysql_query("SELECT * FROM 15a_users WHERE login='".$login2."'") or die(mysql_query());
					if(mysql_num_rows($user2) == 0){
						mysql_query("INSERT INTO 15a_users (login,pass,date) VALUES('".$login2."','".$pass2."','".$date."')") or die(mysql_error());
						header('Location: ?zad=1');
					} else {
						echo 'Taki uzytkownik juz istnieje! Wybierz inny login!<br>';
					}
				} else {
					echo 'Wypelnij wszystkie pola!<br>';
				}
			}
			break;
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
						header('Location: ?zad=1');
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
			header("location: ?zad=1");
			break;
			
	}
?>


<a href="index.php">Strona glowna</a>