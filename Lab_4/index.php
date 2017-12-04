<?php
	ob_start();
	
	include('connect.php');
	
	$zad = $_GET['zad'];
	
	switch($zad){
		default:
			echo '<a href="?zad=1">Zad 1</a><br>';
			echo '<a href="?zad=2">Zad 2</a><br>';
			echo '<a href="?zad=31">Zad 3.1</a><br>';
			echo '<a href="?zad=32">Zad 3.2</a><br>';
			echo '<a href="?zad=33">Zad 3.3</a><br>';
			echo '<a href="?zad=41">Zad 4.1</a><br>';
			echo '<a href="?zad=42">Zad 4.2</a><br>';
			echo '<a href="?zad=43">Zad 4.3</a><br>';
			break;
		case 1:
			include('zad1.php');
			break;
		case 2:
			include('zad2.php');
			break;
		case 31:
			include('zad31.php');
			break;
		case 32:
			include('zad32.php');
			break;
		case 33:
			include('zad33.php');
			break;
		case 41:
			include('zad41.php');
			break;
		case 42:
			include('zad42.php');
			break;
		case 43:
			include('zad43.php');
			break;
	}
	
	ob_end_flush();
?>