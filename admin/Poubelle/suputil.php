<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include("redir.php")?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administration d'ELISA <?php echo $_SESSION['version']; ?></title>
<link rel="stylesheet" href="css/suputil.css">
<link rel="icon" type="image/png" href="../css/images/favicon.ico">
</head>

<body>
<?php 
//Teste si c'est bien l'administrateur qui est enregistré 
		if ((isset($_SESSION['loginadmin'])) && (!empty($_SESSION['loginadmin']))){
	 
		}else{ redirige("0;URL='../admin.htm'");}
		
		include("connexion.php");
		//Requete qui rempli la liste déroulante
		$req2="SELECT * FROM t_utilisateur ";
				$result1= $mycnx->query($req2);
		echo'<div id="deco"><a href="admin.php" title="">Page d\'accueil administration</a></div>
';
	 echo'<form name"suputil" id="suputil" method="post" action="sup.php"/>
	<h1>Suppression(s) utilisateur(s)</h1>

	<p>
		<label for="util">Prenom.Nom de l\'utilisateur</label>
		<select id="util" name="util" >';
		while ($ligne = $result1->fetch(PDO::FETCH_OBJ))
				{ 
						$id=$ligne->util_id;
						$nomutil=$ligne->util_prenom_nom;
						
				echo'<option value="'.$id.'">'.$nomutil.'</option>';
				} 
		echo'</select>
		</p>
  
	<p>
    	<input type="submit" name="ajout" value="Supprimer" onclick="return confirm(\'Etes vous sûr de vouloir supprimer cet utilisateur ?\');" />
   	</p>
	
	<p>
	<a href="admin.php" title="">Page d\'accueil administration</a>
	</p>
</form>';
?>
</div>
</body>
</html>