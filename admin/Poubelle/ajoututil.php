<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administration d'ELISA <?php echo $_SESSION['version']; ?></title>
<link rel="icon" type="image/png" href="../css/images/favicon.ico">
<link rel="stylesheet" href="css/ajoututil.css">
<?php
include("connexion.php");

$req="SELECT * FROM t_service";
		$result=$mycnx->query($req);
		$nb3=$result->rowCount();
		?>
        

<script type="text/javascript">
//fonction qui vérifie que le formulaire est rempli
function verif_formulaire()
{
 if(document.ajoututil.name.value == "")  {
   alert("Veuillez entrer un nom!");
   document.ajoututil.name.focus();
   return false;
  }
 if(document.ajoututil.mdp.value == "") {
   alert("Veuillez entrer un mot de passe!");
   document.ajoututil.mdp.focus();
   return false;
  }
  for(i=1;i<<?php echo $nb3+2;?>;i++){

		if(document.getElementById('service'+i+'').checked){
			return true;}
		else{
			var faux=1;			
		}}
		
if(faux == 1)
{alert('Sélectionner un service au minimum!');
return false;}
}
		
</script>
</head>

<body>
<?php 
//Teste si c'est bien l'administrateur qui est enregistré 
		if ((isset($_SESSION['loginadmin'])) && (!empty($_SESSION['loginadmin']))){
	 
		}else{ redirige("0;URL='../admin.htm'");}
		
		
?>
<div id="deco"><a href="admin.php" title="">Page d'accueil administration</a></div>
<!--Début du formulaire d'ajout de nouveaux utilisateurs-->
<?php echo'<form name="ajoututil" id="ajoututil" method="post" action="trait_ajoututil.php" onSubmit="return verif_formulaire(); "/>
	<h1>Ajout d\'utilisateur</h1>

	<p>
		<label for="name">Prenom.Nom de l\'utilisateur</label>
		<input id="name" name="name" type="text" />
	</p>
  
	<p>
		<label for="mdp">Mot de passe</label>
		<input id="mdp" name="mdp" type="text" value="elisa" />
	</p>
	
	<p>
		<label for="droi">Droit/Services</label>
		<div id="check">
		<input type="checkbox" name="service1" id="service1" value="Super Utilisateur"> Super Utilisateur<br><br>';
		
		$req="SELECT * FROM t_service";
		$result=$mycnx->query($req);
		$i=2;
		while ($ligne = $result->fetch(PDO::FETCH_OBJ))
				{ 
				
				$id=$ligne->service_id;
				$nom=$ligne->service_lib_court;
	
				echo '<input type="checkbox" name="service'.$i.'" id="service'.$i.'" value="'.$id.'"> '.$nom.'&nbsp;&nbsp;&nbsp;<div id="radio1"><input type="radio" name="choix'.$i.'" id="choixl'.$i.'" value="1" > Lecture &nbsp;&nbsp;&nbsp;<input type="radio" name="choix'.$i.'" id="choixe'.$i.'" value="2" > Ecriture/Modification<br><br></div>';
				$i=$i+1;	
				}
$result->closeCursor();

echo'
		</div>
		</p>
	
   
    <p>
    	<input type="submit" name="ajout" value="Ajouter" /> ou <input name="efface" type="reset"  value="Effacer" /> 
	</p>
	
	<p>
	<a href="admin.php" title="">Page d\'accueil administration</a>
	</p>
</form>';
?>
<!--Fin du formulaire-->
</div>
</body>
</html>