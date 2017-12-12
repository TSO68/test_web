<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include("redir.php")?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administration d'ELISA <?php echo $_SESSION['version']; ?></title>
<link rel="icon" type="image/png" href="../css/images/favicon.ico">
</head>

<body>
<?php 
//Test si c'est bien l'administrateur qui est enregistré 
		if ((isset($_SESSION['loginadmin'])) && (!empty($_SESSION['loginadmin']))){
	 
		}else{ redirige("0;URL='../admin.htm'");}
		
		include("connexion.php");

$nom=$_POST['name'];
//Fonction permettant de rajouter des apostrophes
$nom = addslashes($nom);
$mdp=$_POST['mdp'];

if(isset($_POST['service1'])){
	
		$req1="INSERT INTO t_utilisateur (util_id, util_prenom_nom, util_mdp,util_super_util) VALUES('','$nom','$mdp','1')";
				$result= $mycnx->query($req1);
				if($result!=NULL){
				$result->closeCursor();
				echo '<DIV id=message style ="position: absolute; top:13em; left:22em; font-size:18pt; color: black"> Ajout effectué</DIV>';
redirige("2;URL='ajoututil.php'");

//Message si le fichier existe déjà dans la base
				}else{echo '<DIV id=message style ="position: absolute; top:13em; left:20em; font-size:18pt; color: black"> Nom d\'utilisateur déjà existant</DIV>';
redirige("2;URL='ajoututil.php'");}}


else{ $req1="INSERT INTO t_utilisateur (util_id, util_prenom_nom, util_mdp, util_super_util) VALUES('','$nom','$mdp','0')";
				$result= $mycnx->query($req1);
				$lastid=$mycnx->lastInsertId();
				if($result!=NULL){
				$result->closeCursor();
				
	$req2="SELECT service_lib_court FROM t_service";
 	$result1= $mycnx->query($req2);
 	$nb=$result1->rowCount();
 	$nb=$nb+1;
 	$result1->closeCursor();
	
	$ok=1;

for ($i=2; $i<=$nb; $i++){
				
				if(isset($_POST['service'.$i.''])){
	
	$idS=$_POST['service'.$i.''];
	$idD=$_POST['choix'.$i.''];

				$req1="INSERT INTO t_droit_util (droit_id, util_id, service_id) VALUES('$idD','$lastid','$idS')";
				$result= $mycnx->query($req1);
				if($result!=NULL){
				$result->closeCursor();}}}


				echo '<DIV id=message style ="position: absolute; top:13em; left:22em; font-size:18pt; color: black"> Ajout effectué</DIV>';
redirige("2;URL='ajoututil.php'");

//Message si le fichier existe déjà dans la base
				}else{echo '<DIV id=message style ="position: absolute; top:13em; left:20em; font-size:18pt; color: black"> Nom d\'utilisateur déjà existant</DIV>';
redirige("2;URL='ajoututil.php'");}}


?>
</body>
</html>