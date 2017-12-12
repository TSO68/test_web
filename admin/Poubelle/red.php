<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include("redir.php")?>
<?php
include("connexion.php");

$req="SELECT * FROM t_service";
		$result=$mycnx->query($req);
		$nb3=$result->rowCount();
		?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administration d'ELISA <?php echo $_SESSION['version']; ?></title>
<link rel="stylesheet" href="css/ajoututil.css">
<link rel="icon" type="image/png" href="../css/images/favicon.ico">
<script type="text/javascript">
//fonction qui vérifie que le formulaire est rempli
function verif_formulaire()
{
 if(document.red.nomred.value == "")  {
   alert("Veuillez entrer un nom!");
   document.red.nomred.focus();
   return false;
  }
 if(document.red.prered.value == "") {
   alert("Veuillez entrer un prénom!");
   document.red.prered.focus();
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
<?php echo'<form  name="red" id="red" method="post" action="ajoutmulti.php" onSubmit="return verif_formulaire();"/>
	<h1>Ajout rédacteur</h1>

	<p>
		<label for="nomred">Nom rédacteur</label>
		<input id="nomred" name="nomred" type="text" />
	</p>
  
	<p>
		<label for="prered">Prénom rédacteur</label>
		<input id="prered" name="prered" type="text" />
	</p>
	
	<p>
		<label for="droi">Services</label>
		<div id="check">';
	
		$req="SELECT * FROM t_service";
		$result=$mycnx->query($req);
		$i=2;
		while ($ligne = $result->fetch(PDO::FETCH_OBJ))
				{ 
				
				$id=$ligne->service_id;
				$nom=$ligne->service_lib_court;
	
				echo '<input type="checkbox" name="service'.$i.'" id="service'.$i.'" value="'.$id.'"> '.$nom.'<br><br>';
				$i=$i+1;	
				}
$result->closeCursor();

echo'
		</div>
		</p>
   
    <p>
    	<input type="submit" name="ajoutred" value="Ajouter" /> ou <input name="efface" type="reset"  value="Effacer" /> 
	</p>
	
	<p>
	<a href="admin.php" title="">Page d\'accueil administration</a>
	</p>
</form>';


  		//Requete qui rempli la liste déroulante
		$req2="SELECT * FROM t_redacteur ORDER BY redacteur_nom ASC ";
				$result1= $mycnx->query($req2);
	 echo'<form name="modred" id="modred" method="post" action="ajoutmulti.php" />
	<h1>Modification(s) rédacteur(s)</h1>

	<p>
		<label for="red">Sélectionner le rédacteur</label>
		<select id="red" name="red">';
		while ($ligne = $result1->fetch(PDO::FETCH_OBJ))
				{ 
						$id=$ligne->redacteur_id;
						$nomred=$ligne->redacteur_nom;
						$prered=$ligne->redacteur_prenom;
						
						
				echo'<option value="'.$id.'">'.$nomred.' '.$prered.'</option>';
				} 
		echo'</select>
		</p>
		
		<h1>Modifications</h1>
		
		<p>
		<label for="modnomred">Nom rédacteur</label>
		<input id="modnomred" name="modnomred" type="text" />
	</p>
  
	<p>
		<label for="modprered">Prénom rédacteur</label>
		<input id="modprered" name="modprered" type="text" />
	</p>
  
	
	
	<p>
		<label for="redvisi">Visibilité</label><br><br><br>
		
			
				<input type="radio" name="redvisi" id="redvisi" value="0"> OUI	&nbsp;&nbsp;
				<input type="radio" name="redvisi" id="redvisi" value="1"> NON

		</p>
	<p>
		<label>Services</label>
		<div id="check">';
	
		$req="SELECT * FROM t_service";
		$result=$mycnx->query($req);
		$i=2;
		while ($ligne = $result->fetch(PDO::FETCH_OBJ))
				{ 
				
				$id=$ligne->service_id;
				$nom=$ligne->service_lib_court;
				$visi=$ligne->service_visible;
				
				if(isset($visi) && $visi==0){
				echo '<input type="checkbox" name="service'.$i.'" id="service'.$i.'" value="'.$id.'"> '.$nom.'<br><br>';
				$i=$i+1;	
				}}
$result->closeCursor();

echo'
		</div>
		</p>

<p>
    	<input type="submit" name="modred" value="Modifier" />
   	</p>

	<p>
	<a href="admin.php" title="">Page d\'accueil administration</a>
	</p>
</form>';



//Requete qui rempli la liste déroulante
		$req="SELECT * FROM t_redacteur ORDER BY redacteur_nom ASC";
				$result= $mycnx->query($req);
	 echo'<form name="supred" id="supred" method="post" action="ajoutmulti.php" />
	<h1>Suppression(s) rédacteur(s)</h1>

	<p>
		<label for="util">Rédacteurs</label>
		<select id="red" name="red">';
		while ($ligne = $result->fetch(PDO::FETCH_OBJ))
				{ 
						$id=$ligne->redacteur_id;
						$nomred=$ligne->redacteur_nom;
						$prered=$ligne->redacteur_prenom;
						
						
				echo'<option value="'.$id.'">'.$nomred.' '.$prered.'</option>';
				} 
		echo'</select>
		</p>
  
	<p>
    	<input type="submit" name="supred" value="Supprimer" onclick="return confirm(\'Etes vous sûre de vouloir supprimer cet enregistrement ?\');" />
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