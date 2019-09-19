<?php 
$mat=$_GET["m"];
echo($mat);
$pdo=new pdo('mysql:host=localhost;dbname=employers','webroot','192797');

$req=$pdo->prepare('SELECT * FROM employers WHERE matricule= ? ');
$a=$req->execute(array($mat));
$res=$req->fetch();

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="employer.css">
	<title>Editer un Employer</title>
</head>
<body>
	<h3>Editer un Employer</h3>
	<form class="form" method="post">
		<div><label>Matricule</label><input type="text" value="<?= $mat ?>"  name="matricule"  disabled="true"></div>
		<div><label>Prenom</label><input type="text" value="<?= $res['prenom']?>" name="prenom"></div>
		<div><label>Nom</label><input type="text" value="<?=$res['nom']?>" name="nom"></div>
		<div><label>Date de naissance</label><input value="<?=$res['date_naissance']?>" type="text" name="date"></div>
		<div><label>Salaire</label><input type="text" value="<?=$res['salaire']?>"  name="salaire"></div>
		<div>
			<label>Telephone</label>
			<input type="text" value="<?=$res['telephone']?>" name="telephone">
		</div>
		<div><label>Email</label><input type="text" value="<?=$res['email']?>" name="email"></div>
		<div><button class="a" type="submit">Enregistrer</button></div>
	</form>
</body>
</html>
<?php

if (!empty($_POST)) {
		$errors=[];
		$date=explode("-", $_POST["date"]) ;
		
		if (empty($_POST["prenom"]) || !preg_match("/^[a-zA-Z ]+$/", $_POST["prenom"])) {
			$errors["prenom"]="Le prenom doit etre en aphabete et non vide!";
		}
		if (empty($_POST["nom"]) || !preg_match("/^[a-zA-Z]+$/", $_POST["nom"])) {
			$errors["nom"]="Le nom doit etre en aphabete et non vide!";
		}
		if (empty($_POST["salaire"]) || !(25000<=$_POST["salaire"] && $_POST["salaire"]<= 2000000 || preg_match("/^[0-9]+$/", $_POST["salaire"]) ) ) {
			$errors["salaire"]="Le Salaire doit etre comprit entre 25000 et 2.000.000 et non vide!";
		}if (empty($_POST["email"]) || !preg_match("/^[a-zA-Z0-9.]+@[a-zA-Z]+.?[a-zA-Z]+$/", $_POST["email"])) {
			$errors["email"]="L email doit etre valide et non vide!";
		}if (empty($_POST["date"]) || !(checkdate($date[2], $date[1], $date[0]))) {
			$errors["date"]="La date doit etre valide exemple 10∕11∕2019 et non vide!";
		}
		if (empty($_POST["telephone"]) || !preg_match("/^(76|77|78|70)[0-9]{7}$/", $_POST["telephone"])) {
			$errors["telephone"]="Le numero de telephone etre valide 9 chiffres commencant par 78 77 76 ou 70 et non vide!";
		}
       if (!empty($errors)) {
       	echo "<ul class='error'>";
       	foreach ($errors as  $error) {
       		echo "<li>".$error."</li>";
       		
       	}
       	echo "</ul>";
       }else{
		$pdo=new pdo('mysql:host=localhost;dbname=employers','webroot','192797');
			$p=$pdo->prepare("UPDATE employers 
			SET nom=?,
			prenom=?,
			email=?,
			date_naissance=?,
			salaire=?,
			telephone=?
			 WHERE matricule=?  ");
			$val=array($_POST["nom"],$_POST["prenom"],$_POST["email"],$_POST["date"],$_POST["salaire"],$_POST["telephone"],$mat);
		   $req=$p->execute($val);

       header("location:listes.php");
	   }
	}
 ?>