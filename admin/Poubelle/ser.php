<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include("redir.php")?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administration d'ELISA <?php echo $_SESSION['version']; ?></title>
<link rel="stylesheet" href="css/ajoututil.css">
<link rel="icon" type="image/png" href="../css/images/favicon.ico">
<script type="text/javascript">
//fonction qui vérifie que le formulaire est rempli
function VerifForm(){ 
 
                             // ici une serie de tests : (exmple si les champs sont vides)
                      frm=document.forms['ajoutser'];
  if(frm.elements['nomser'].value != "" && frm.elements['preser'].value != ""){
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
<?php echo'<form name="ajoutser" id="ajoutser" method="post" action="ajoutmulti.php" alert onsubmit="return VerifForm()" />
	<h1>Ajout Service</h1>

	<p>
		<label for="nomsec">Service libellé court</label>
		<input id="nomser" name="nomser" type="text" />
	</p>
  
	<p>
		<label for="presec">Service libellé long</label>
		<input id="preser" name="preser" type="text" />
	</p>
   
    <p>
    	<input type="submit" name="ajoutser" value="Ajouter" /> ou <input name="efface" type="reset"  value="Effacer" /> 
	</p>
	
	<p>
	<a href="admin.php" title="">Page d\'accueil administration</a>
	</p>
</form>';


  		//Requete qui rempli la liste déroulante
		$req="SELECT * FROM t_service ORDER BY service_lib_court ASC";
				$result= $mycnx->query($req);
	 echo'<form name="modser" id="modser" method="post" action="ajoutmulti.php" />
	<h1>Modification(s) service(s)</h1>

	<p>
		<label for="ser">Services</label>
		<select id="ser" name="ser">';
		while ($ligne = $result->fetch(PDO::FETCH_OBJ))
				{ 
						$id=$ligne->service_id;
						$serc=$ligne->service_lib_court;
						
				echo'<option value="'.$id.'">'.$serc.'</option>';
				} 
		echo'</select>
		</p>
		
		<h1>Modifications</h1>
		
		<p>
		<label for="modnomser">Service libellé court</label>
		<input id="modnomser" name="modnomser" type="text" />
	</p>
  
	<p>
		<label for="modpreser">Service libellé long</label>
		<input id="modpreser" name="modpreser" type="text" />
	</p>
  
	
	
	<p>
		<label for="servisi">Visibilité</label><br><br><br>
		
			
				<input type="radio" name="servisi" id="servisi" value="0"> OUI	&nbsp;&nbsp;
				<input type="radio" name="servisi" id="servisi" value="1"> NON

		</p>
	<p>
    	<input type="submit" name="modser" value="Modifier" />
   	</p>

	<p>
	<a href="admin.php" title="">Page d\'accueil administration</a>
	</p>
</form>';




//Requete qui rempli la liste déroulante
		$req="SELECT * FROM t_service ORDER BY service_lib_court ASC";
				$result= $mycnx->query($req);
	 echo'<form name="supser" id="supser" method="post" action="ajoutmulti.php" />
	<h1>Suppression(s) service(s)</h1>

	<p>
		<label for="ser">Services</label>
		<select id="ser" name="ser">';
		while ($ligne = $result->fetch(PDO::FETCH_OBJ))
				{ 
						$id=$ligne->service_id;
						$serc=$ligne->service_lib_court;
						
				echo'<option value="'.$id.'">'.$serc.'</option>';
				} 
		echo'</select>
		</p>
  
	<p>
    	<input type="submit" name="supser" value="Supprimer" onclick="return confirm(\'Etes vous sûre de vouloir supprimer ce service ?\');"/>
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