<?php 
	session_start();
	unset($_SESSION['name_user']);
	unset($_SESSION['name_id']);
	unset($_SESSION['cart']);
	unset($_SESSION['sosp']);
	header("location: index.php");
?>