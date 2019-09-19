<?php 
$mat=$_GET["m"];
	$pdo=new pdo('mysql:host=localhost;dbname=employers','webroot','192797');
	   $p=$pdo->prepare("DELETE FROM employers WHERE matricule=? ");
	   $rep=$p->execute(array($mat));
		header("location:listes.php");


?>
