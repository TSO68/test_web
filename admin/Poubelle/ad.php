<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include("redir.php")?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administration d'ELISA <?php echo $_SESSION['version']; ?></title>
<link rel="icon" type="image/png" href="../css/images/favicon.ico">
<link rel="stylesheet" href="css/ajoututil.css">
<script type="text/javascript">
//fonction qui vérifie que le formulaire est rempli
function VerifForm(){ 
 
                             // ici une serie de tests : (exmple si les champs sont vides)
                      frm=document.forms['ajoutad'];
  if(frm.elements['nomad'].value != "" && frm.elements['mdpad'].value != ""){
    return true;
  }
  else {
    alert("Tous les champs sont obligatoires");
    return false;
  }
}
</script>
</head>

<body>
<?php 

//Teste si c'est bien l'administrateur qui est enregistré 
		if ((isset($_SESSION['loginadmin'])) && (!empty($_SESSION['loginadmin']))){
	 
		}else{ redirige("0;URL='../admin.htm'");}
		
		include("connexion.php");
?>
<div id="deco"><a href="admin.php" title="">Page d'accueil administration</a></div>

<!--Début du formulaire d'ajout de nouveaux utilisateurs-->
<?php echo'<form name"ajoutad" id="ajoutad" method="post" action="ajoutmulti.php" alert onsubmit="return VerifForm()" />
	<h1>Ajout administrateur</h1>

	<p>
		<label for="nomad">Login administrateur</label>
		<input id="nomad" name="nomad" type="text" />
	</p>
  
	<p>
		<label for="mdpad">Mot de passe administrateur</label>
		<input id="mdpad" name="mdpad" type="text" />
	</p>
   
    <p>
    	<input type="submit" name="ajoutad" value="Ajouter" /> ou <input name="efface" type="reset"  value="Effacer" /> 
	</p>
	
	<p>
	<a href="admin.php" title="">Page d\'accueil administration</a>
	</p>
</form>';


//Requete qui rempli la liste déroulante
		$req="SELECT * FROM t_admin ORDER BY admin_log ASC";
				$result= $mycnx->query($req);
	 echo'<form name"supad" id="supad" method="post" action="ajoutmulti.php" />
	<h1>Suppression(s) administrateur(s)</h1>

	<p>
		<label for="ad">Administrateur</label>
		<select id="ad" name="ad">';
		while ($ligne = $result->fetch(PDO::FETCH_OBJ))
				{ 
						$nomad=$ligne->admin_log;
						
						
						
				echo'<option>'.$nomad.'</option>';
				} 
		echo'</select>
		</p>
  
	<p>
    	<input type="submit" name="supad" value="Supprimer" onclick="return confirm(\'Etes vous sûr de vouloir supprimer cet administrateur ?\');"/>
   	</p>
	
	<p>
	<a href="admin.php" title="">Page d\'accueil administration</a>
	</p>
</form>';
$result->closeCursor();
?>
<!--Fin du formulaire-->
</div>
</body>
</html>