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
//Teste si c'est bien l'administrateur qui est enregistré 
		if ((isset($_SESSION['loginadmin'])) && (!empty($_SESSION['loginadmin']))){
	 
		}else{ redirige("0;URL='../admin.htm'");}
		
		include("connexion.php");
		

$id=$_POST['util'];


$req="DELETE FROM t_utilisateur WHERE util_id='$id'";
$req1="DELETE FROM t_droit_util WHERE util_id='$id'";
			$result1= $mycnx->query($req1);
			$result= $mycnx->query($req);
			// on ferme la connexion à la base
			$result -> closeCursor();
			$result1-> closeCursor();
			echo'<DIV id=message style ="position: absolute; top:12em; left:20em; font-size:18pt; color: black"> Suppression de l\'utilisateur</DIV>';
redirige("2;URL='suputil.php'");

?>
</body>
</html>