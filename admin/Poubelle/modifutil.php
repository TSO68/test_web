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
<script type='text/javascript'>
	 
			function getXhr(){
                                var xhr = null; 
				if(window.XMLHttpRequest) // Firefox et autres
				   xhr = new XMLHttpRequest(); 
				else if(window.ActiveXObject){ // Internet Explorer 
				   try {
			                xhr = new ActiveXObject("Msxml2.XMLHTTP");
			            } catch (e) {
			                xhr = new ActiveXObject("Microsoft.XMLHTTP");
			            }
				}
				else { // XMLHttpRequest non supporté par le navigateur 
				   alert("Votre navigateur ne supporte pas les objets XMLHTTPRequest"); 
				   xhr = false; 
				} 
                                return xhr;
			}
			
			/**
			* Méthode qui sera appelée sur le click du bouton
			*/
			function go(){
				var xhr = getXhr();
				// On défini ce qu'on va faire quand on aura la réponse
				xhr.onreadystatechange = function(){
					// On ne fait quelque chose que si on a tout reçu et que le serveur est ok
					if(xhr.readyState == 4 && xhr.status == 200){
						leselect = xhr.responseText;
						// On se sert de innerHTML pour rajouter les options a la liste
						document.getElementById('check').innerHTML = leselect;
					}
				}
				// Ici on va voir comment faire du post
				xhr.open("POST","ajaxutil.php",true);
				// ne pas oublier ça pour le post
				xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
				// ne pas oublier de poster les arguments
				// ici, l'id du service
				sel = document.getElementById('util');
				idutil = sel.options[sel.selectedIndex].value;
				xhr.send("idUtil="+idutil);
			}
		</script>

<script type="text/javascript">
//fonction qui vérifie que le formulaire est rempli
function verif_formulaire()
{
 if(document.modifutil.util.value == "0")  {
   alert("Veuillez entrer un nom!");
   document.modifutil.util.focus();
   return false;
  }
 if(document.modifutil.mdp.value == "") {
   alert("Veuillez entrer un mot de passe!");
   document.modifutil.mdp.focus();
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
		
		echo'<div id="deco"><a href="admin.php" title="">Page d\'accueil administration</a></div>
';
		//Requete qui rempli la liste déroulante
		$req2="SELECT * FROM t_utilisateur ";
				$result1= $mycnx->query($req2);
		
	 echo'<form name="modifutil" id="modifutil" method="post" action="mod.php" onSubmit="return verif_formulaire(); " />
	<h1>Modification(s) utilisateur(s)</h1>

	
	<p>
		<label for="util">Prenom.Nom de l\'utilisateur</label>
		<select id="util" name="util" onchange="go()">
		<option value="0">Sélectionner un utilisateur</option>';
		while ($ligne = $result1->fetch(PDO::FETCH_OBJ))
				{ 
						$id=$ligne->util_id;
						$nomutil=$ligne->util_prenom_nom;
						
				echo'<option value='.$id.'>'.$nomutil.'</option>';
				} 
		echo'</select>
		</p>
  
	<p>
		<label for="mdp">Nouveau mot de passe</label>
		<input id="mdp" name="mdp" type="text" value="elisa" />
	</p>
   
   <p>
		<label for="droi">Droit/Services</label><br>
		<div id="check">
	
		
		</div>
		</p>
		  
    <p>
    	<input type="submit" style="margin-left:110px;" name="modif" value="Modifier" />
   	</p>
	
	<p>
	<a href="admin.php" title="">Page d\'accueil administration</a>
	</p>
</form>';
?>

</div>
</body>
</html>