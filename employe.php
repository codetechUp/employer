<?php

$pdo=new pdo('mysql:host=localhost;dbname=employers','webroot','192797');

$req=$pdo->query('SELECT matricule FROM employers ORDER BY `matricule` DESC  LIMIT 1');
$a=$req->fetch();
if (!empty($a)) {
	
      $elmt=explode("-",$a["matricule"]);
      //recuperration de la partie number du matricule
     $ma=$elmt[1]+1;
     //Algorithme d incrementation
     if (($ma<10)){
     	$mat="EM-0000".$ma;
     }
     if (($ma>=10 && $ma<100)) {
     	$mat="EM-000".$ma;
     }
     if (($ma>=100 && $ma<1000)) {
     	$mat="EM-00".$ma;
     }
     if (($ma>=1000 && $ma<10000)) {
     	$mat="EM-0".$ma;
     }if (($ma>=10000 && $ma<100000)) {
     	$mat="EM-".$ma;
     }
}else{
	//si le fichier est vide
     	$mat="EM-00001";
     }
     //Si on a poste des donnees
	if (!empty($_POST)) {
		$errors=[];
		//Ecrasement de la date pour recuperrer le jour,mois et annees
		$date=explode("-", trim($_POST["date"])) ;
		//Algorithme de verification
		if (empty($_POST["prenom"]) || !preg_match("/^[a-zA-Z ]+$/", $_POST["prenom"])) {
			//Insertion de ERREURS
			$errors["prenom"]="Le prenom doit etre en aphabete et non vide!";
		}
		if (empty($_POST["nom"]) || !preg_match("/^[a-zA-Z]+$/", $_POST["nom"])) {
			$errors["nom"]="Le nom doit etre en aphabete et non vide!";
		}
		if (empty($_POST["salaire"]) || !(25000<=$_POST["salaire"] && $_POST["salaire"]<= 2000000 || !preg_match("/^[0-9]+$/", $_POST["salaire"]) ) ) {
			$errors["salaire"]="Le Salaire doit etre comprit entre 25000 et 2.000.000 et non vide!";
		}if (empty($_POST["email"]) || !preg_match("/^[a-zA-Z0-9]+@[a-zA-Z]+.?[a-zA-Z]+$/", $_POST["email"])) {
			$errors["email"]="L email doit etre valide et non vide!";
		}if (empty($_POST["date"]) || !(checkdate($date[2], $date[1], $date[0]))) {
      $errors["date"]="La date doit etre valide exemple 10∕11∕2019 et non vide!";
    }
		if (empty($_POST["telephone"]) || !preg_match("/^(76|77|78|70)[0-9]{7}$/", $_POST["telephone"])) {
			$errors["telephone"]="Le numero de telephone etre valide 9 chiffres commencant par 78 77 76 ou 70 et non vide!";
		}
       if (!empty($errors)) {
       	echo "<div class='error'>";
       	echo "<h4 >ERREURS</h4>";
       	echo "<ul >";
       	foreach ($errors as  $error) {
       		echo "<li>".$error."</li>";
       		
       	}
       	echo "</ul>";
       	echo "</div>";
       }else{ 
		   //si il y a pas d erreurs
		   $pdo=new pdo('mysql:host=localhost;dbname=employers','webroot','192797');
		   $p=$pdo->prepare('INSERT INTO employers(matricule,nom,prenom,email,date_naissance,salaire,telephone) VALUES(?,?,?,?,?,?,?) ');
		   $val=array($mat,$_POST["nom"],$_POST["prenom"],$_POST["email"],$_POST["date"],$_POST["salaire"],$_POST["telephone"]);
		   $req=$p->execute($val);

       	header("location: listes.php");
       	}
       	}
          ?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="employer.css">
	<title>EMPLOYERS</title>
</head>
<body>
	<h3>Enregistrer un Employer</h3>
	<form class="form" method="post">
		<div><label>Matricule</label><input type="text" value="<?= $mat ?>"  name="matricule" disabled="true"></div>
		<div><label>Prenom</label><input type="text" name="prenom"></div>
		<div><label>Nom</label><input type="text" name="nom"></div>
		<div><label>Date de naissance</label><input type="text" name="date"></div>
		<div><label>Salaire</label><input type="text" name="salaire"></div>
		<div>
			<label>Telephone</label>
			<input type="text" name="telephone">
		</div>
		<div><label>Email</label><input type="text" name="email"></div>
		<div><button class="a" type="submit"><a>Enregistrer</a></button></div>
	</form>
	<div><button style="background-color:blue;height: 45px;border:0;border-radius: 13px;position: relative;left: 666px;"><a href="listes.php">VOIR LA LISTES DES EMPLOYERS</a></button></div>

</body>
</html>
