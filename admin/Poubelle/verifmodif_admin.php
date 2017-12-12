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

include("connexion.php");

//Mise en place des variable 
$result=false;
$login = $_POST['loginadmin'];
$mdp = $_POST['amdp'];
$nmdp = $_POST['nmdp'];
$vmdp = $_POST['vmdp'];
if ($login == NULL)
{
//Messages d'erreurs
echo '<DIV id=message style ="position: absolute; top:12em; left:20em; font-size:18pt; color: black"> Veuillez entrer un identifiant</DIV>';
redirige("2;URL='modif_mdadmin.html'");

}
elseif ($mdp == NULL)
{
echo '<DIV id=message style ="position: absolute; top:12em; left:20em; font-size:18pt; color: black"> Veuillez entrer un mot de passe</DIV>';
redirige("2;URL='modif_mdpadmin.html'");

exit;
}
else
{
//connexion à la base et teste si l'utilisateur est enregistré 
$requete = ("SELECT admin_mdp FROM t_admin WHERE admin_log='$login'" );
$result= $mycnx->query($requete);
while ($ligne = $result->fetch(PDO::FETCH_OBJ))
{
	$vraiemdp=$ligne->admin_mdp;
	
if ($vraiemdp == $mdp)
{
	if($nmdp!='' AND $vmdp!='')
	{
		if($nmdp==$vmdp)
		{
			$sql="UPDATE t_admin SET admin_mdp='$nmdp' WHERE admin_log='$login'"; 
			$result1= $mycnx->query($sql);
			
			echo '<DIV id=message style ="position: absolute; top:12em; left:15em; font-size:18pt; color: black">Modification du mot de passe effectuee avec succes</div>';
			$_SESSION['loginadmin'] = $_POST['loginadmin'];
			redirige("2;URL='admin.php'");
			$result->closeCursor();
			$result1->closeCursor();
		}
		
		else{
			echo '<DIV id=message style ="position: absolute; top:12em; left:15em; font-size:18pt; color: black">Erreur entre le nouveau mot de passe entr&eacute; et la verification</div>';
			redirige("2;URL='modif_mdpadmin.html'");
			}
			
	}else{ 
			echo '<DIV id=message style ="position: absolute; top:12em; left:20em; font-size:18pt; color: black">Veuillez remplir tous les champs</div>';
			redirige("2;URL='modif_mdpadmin.html'");
		 }
}else{
		echo '<DIV id=message style ="position: absolute; top:12em; left:20em; font-size:18pt; color: black">Le mot de passe actuel n\'est pas valide</div>'; 
		redirige("2;URL='modif_mdpadmin.html'");
	 }

}
}
?> 
</body>
</html>