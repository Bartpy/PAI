<style type="text/css">
/* <![CDATA[ */
table tr td { border: 1px solid black; text-align: center; padding: 3px; }
/* ]]> */
</style>

<?php
	$order = $_GET['order'];
	$mod = $_GET['mod'];
	$data = mysql_query("SELECT * FROM 15a_zad2 ORDER BY ".(($order) ? $order : 'id ASC'));
	
	if(!$mod){
		echo "<table>";
		echo "<tr>";
		echo "<td>ID<br><a href='?zad=2&order=id asc'>rosnaco</a> <a href='?zad=2&order=id desc'>malejaco</a></td>";
		echo "<td>P1<br><a href='?zad=2&order=p1 asc'>rosnaco</a> <a href='?zad=2&order=p1 desc'>malejaco</a></td>";
		echo "<td>P2<br><a href='?zad=2&order=p2 asc'>rosnaco</a> <a href='?zad=2&order=p2 desc'>malejaco</a></td>";
		echo "<td>P3<br><a href='?zad=2&order=p3 asc'>rosnaco</a> <a href='?zad=2&order=p3 desc'>malejaco</a></td>";
		echo "</tr>";
		while($d = mysql_fetch_array($data)){	
			echo "<tr>";
			echo "<td>".$d['id']."</td>";
			echo "<td>".$d['p1']."</td>";
			echo "<td>".$d['p2']."</td>";
			echo "<td>".$d['p3']."</td>";
			echo "</tr>";
		}
		echo "</table>";
		
		echo "<br><a href='?zad=2&mod=1'>Modyfikuj</a><br>";
	} else {
		echo "<table>";
		echo "<tr>";
		echo "<td>ID<br><a href='?zad=2&order=id asc&mod=1'>rosnaco</a> <a href='?zad=2&order=id desc&mod=1'>malejaco</a></td>";
		echo "<td>P1<br><a href='?zad=2&order=p1 asc&mod=1'>rosnaco</a> <a href='?zad=2&order=p1 desc&mod=1'>malejaco</a></td>";
		echo "<td>P2<br><a href='?zad=2&order=p2 asc&mod=1'>rosnaco</a> <a href='?zad=2&order=p2 desc&mod=1'>malejaco</a></td>";
		echo "<td>P3<br><a href='?zad=2&order=p3 asc&mod=1'>rosnaco</a> <a href='?zad=2&order=p3 desc&mod=1'>malejaco</a></td>";
		echo "<td>Modyfikuj</td>";
		echo "<td>Usun</td>";
		echo "</tr>";
		while($d = mysql_fetch_array($data)){
			echo "<form action='?zad=2&mod=1' method='post'>";	
			echo "<tr>";
			echo "<td><input type='text' name='id' value='".$d['id']."' readonly></td>";
			echo "<td><input type='text' name='p1' value='".$d['p1']."'></td>";
			echo "<td><input type='text' name='p2' value='".$d['p2']."'</td>";
			echo "<td><input type='text' name='p3' value='".$d['p3']."'</td>";
			echo "<td><input type='submit' value='Modyfikuj' name='mod2'></td>";
			echo "<td><input type='submit' value='Usun' name='del'></td>";
			echo "</tr>";
			echo "</form>";
		}
		echo "</table>";
		
		$id = htmlspecialchars(trim($_POST['id']));
		$p1 = htmlspecialchars(trim($_POST['p1']));
		$p2 = htmlspecialchars(trim($_POST['p2']));
		$p3 = htmlspecialchars(trim($_POST['p3']));
		$mod2 = htmlspecialchars(trim($_POST['mod2']));
		$del = htmlspecialchars(trim($_POST['del']));
		
		if($_POST){
			if($id && $p1 && $p2 && $p3){
				if($mod2){
					echo "UPDATE 15a_zad2 SET p1='".$p1."', p2='".$p2."', p3='".$p3."' WHERE id='".$id."'";
					mysql_query("UPDATE 15a_zad2 SET p1='".$p1."', p2='".$p2."', p3='".$p3."' WHERE id='".$id."'") or die(mysql_error());
					header('Location: ?zad=2&mod=1');
				} else {
					mysql_query("DELETE FROM 15a_zad2 WHERE id='".$id."'") or die(mysql_error());
					header('Location: ?zad=2&mod=1');
				}
			}
		}
		
		echo "<br><a href='?zad=2'>Wyswietl</a><br>";
	}
	
	echo "<br><br>Dodaj dane:<br>";
	
	echo "<form action='?zad=2&mod=".$mod."' method='post'>";	
	
	echo "<table>";
	echo "<tr>";
	echo "<td>P1</td>";
	echo "<td>P2</td>";
	echo "<td>P3</td>";
	echo "<td>P3</td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td><input type='text' name='p1'></td>";
	echo "<td><input type='text' name='p2'></td>";
	echo "<td><input type='text' name='p3'></td>";
	echo "<td><input type='submit' name='add' value='Dodaj'></td>";
	echo "</tr>";
	echo "</table>";
	
	echo "</form>";
	
	$p1 = htmlspecialchars(trim($_POST['p1']));
	$p2 = htmlspecialchars(trim($_POST['p2']));
	$p3 = htmlspecialchars(trim($_POST['p3']));
	$add = htmlspecialchars(trim($_POST['add']));
	
	if($_POST){
			if($p1 && $p2 && $p3 && $add){
				mysql_query("INSERT INTO 15a_zad2 SET p1='".$p1."', p2='".$p2."', p3='".$p3."'");
				header('Location: ?zad=2&mod='.$mod);
			}
		}
?>

<a href="index.php">Strona glowna</a>