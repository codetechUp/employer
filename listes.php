<?php
$pdo=new pdo('mysql:host=localhost;dbname=employers','webroot','192797');

$req=$pdo->query('SELECT * FROM employers');
$a=$req->fetchAll();
//echo "<pre>";
//var_dump($a);
//echo "<pre>";
 ?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="employer.css">
	<title></title>
</head>
<body>
<a href="listes.php">lllllliste</a>
<table>
		<tr>
			<td>Matricule</td>
			<td>Prenom</td>
			<td>Nom</td>
			<td>Date de Naissance</td>
			<td>Salaire</td>
			<td>Telephone</td>
			<td>Email</td>
			<td>Actions</td>
		</tr>
		<?php foreach( $a as $employer): ?>
		<tr>
		<td><?= $employer['matricule'] ?></td>
		<td><?= $employer['prenom'] ?></td>
		<td><?= $employer['nom'] ?></td>
		<td><?= $employer['date_naissance'] ?></td>
		<td><?= $employer['email'] ?></td>
		<td><?= $employer['telephone'] ?></td>
		<td><?= $employer['salaire'] ?></td>
		<td><a  href="editer.php?m=<?= $employer['matricule']?>"><button class="editer">Editer</button ></a><a href="delete.php?m=<?= $employer['matricule']?>"><button class="delete">Suprimer</button></a></td>
		</tr>
		<?php endforeach ?>

	</table>r
	<div><a href="employe.php"><BUTTON style="background-color:blue;
	height: 45px;border:0;border-radius: 13px;position: relative;top:-90px;left: 600px;">ENREGISTRER UN EMPLOYER</BUTTON></a></div>

</body>
</html>