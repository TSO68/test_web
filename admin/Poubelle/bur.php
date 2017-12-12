<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administration d'ELISA <?php echo $_SESSION['version']; ?></title>
<link rel="stylesheet" href="css/ajoutbur.css">
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
						document.getElementById('bureau').innerHTML = leselect;
					}
				}

				// Ici on va voir comment faire du post
				xhr.open("POST","../ajaxbur.php",true);
				// ne pas oublier ça pour le post
				xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
				// ne pas oublier de poster les arguments
				// ici, l'id de l'auteur
				sel = document.getElementById('service');
				idservice = sel.options[sel.selectedIndex].value;
				xhr.send("idServicemod="+idservice);
			}
			
			function go1(){
				var xhr = getXhr();
				// On défini ce qu'on va faire quand on aura la réponse
				xhr.onreadystatechange = function(){
					// On ne fait quelque chose que si on a tout reçu et que le serveur est ok
					if(xhr.readyState == 4 && xhr.status == 200){
						leselect = xhr.responseText;
						// On se sert de innerHTML pour rajouter les options a la liste
						document.getElementById('bureausup').innerHTML = leselect;
					}
				}

				// Ici on va voir comment faire du post
				xhr.open("POST","../ajaxbur.php",true);
				// ne pas oublier ça pour le post
				xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
				// ne pas oublier de poster les arguments
				// ici, l'id de l'auteur
				sel = document.getElementById('servicesup');
				idservice = sel.options[sel.selectedIndex].value;
				xhr.send("idServicesup="+idservice);
			}
		</script>



<script type="text/javascript">
//fonction qui vérifie que le formulaire est rempli
function VerifForm(){ 
 
                             // ici une serie de tests : (exmple si les champs sont vides)
                      frm=document.forms['ajoutbur'];
  if(frm.elements['nombur'].value != "" && frm.elements['prebur'].value != ""){
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
<?php 

					$req2="SELECT * FROM t_service";
						$result1= $mycnx->query($req2);
							
echo'<form name="ajoutbur" id="ajoutbur" method="post" action="ajoutmulti.php" alert onsubmit="return VerifForm()" />
	<h1>Ajout bureau</h1>

	<p>
		<label for="nombur">Bureau libellé court</label>
		<input id="nombur" name="nombur" type="text" />
	</p>
  
	<p>
		<label for="prebur">Bureau libellé long</label>
		<input id="prebur" name="prebur" type="text" />
	</p>
	
    <p>
		<label for="nomser">Service</label>
		<select id="nomser" name="nomser">';
		while ($ligne = $result1->fetch(PDO::FETCH_OBJ))
				{ 
						$nomser=$ligne->service_lib_court;
					echo'<option>'.$nomser.'</option>';
				} 
		echo'</select>
		</p>
		
    <p>
	   	<input type="submit" name="ajoutbur" value="Ajouter" /> ou <input name="efface" type="reset"  value="Effacer" /> 
	</p>
	
	<p>
	<a href="admin.php" title="">Page d\'accueil administration</a>
	</p>
</form>';


//Requete qui rempli la liste déroulante
		$req="SELECT * FROM t_bureau ORDER BY bureau_lib_court ASC";
				$result= $mycnx->query($req);
	 echo'<form name="modbur" id="modbur" method="post" action="ajoutmulti.php" />
	<h1>Modification(s) bureau(x)</h1>

	<p>
			<label for="service">Services</label>
			<select name="service" id="service" onchange="go()">
					<option value="0">Sélectionner un service</option>';
					
						$req5="SELECT service_id, service_lib_court FROM t_service ORDER BY service_lib_court ASC";
							$result4= $mycnx->query($req5);
					 while ($ligne = $result4->fetch(PDO::FETCH_OBJ))
				{
						$id=$ligne->service_id;
						$nom=$ligne->service_lib_court;
						
					echo'<option value="'.$id.'">'.$nom.'</option>';
				} 
				$result4->closeCursor();
				
		echo'</select>
		</p>
		
		<p>
			<label for="bureau">Bureau</label>
			<div name="bureau" id="bureau" style="display:inline">
				<select name="bureau" id="bureau">
					<option value="0">Choisir un service</option>
				</select>
				</div>
		</p>
		<br><br>
		
		
		<h1>Modifications</h1>
		
		<p>
		<label for="modnombur">Bureau libellé court</label>
		<input id="modnombur" name="modnombur" type="text" />
	</p>
  
	<p>
		<label for="modprebur">Bureau libellé long</label>
		<input id="modprebur" name="modprebur" type="text" />
	</p>
  
	
	
	<p>
		<label for="servisi">Visibilité</label><br><br><br>
		
			
				<input type="radio" name="burvisi" id="burvisi" value="0"> OUI	&nbsp;&nbsp;
				<input type="radio" name="burvisi" id="burvisi" value="1"> NON

		</p>
	<p>
    	<input type="submit" name="modbur" value="Modifier" />
   	</p>

	<p>
	<a href="admin.php" title="">Page d\'accueil administration</a>
	</p>
</form>';


//Requete qui rempli la liste déroulante
	
	echo'<form name="supbur" id="supbur" method="post" action="ajoutmulti.php" />
	<h1>Suppression(s) bureau(x)</h1>

	<p>
			<label for="servicesup">Services</label>
			<select name="servicesup" id="servicesup" onchange="go1()">
					<option value="0">Sélectionner un service</option>';
					
						$req5="SELECT service_id, service_lib_court FROM t_service ORDER BY service_lib_court ASC";
							$result4= $mycnx->query($req5);
					 while ($ligne = $result4->fetch(PDO::FETCH_OBJ))
				{
						$id=$ligne->service_id;
						$nom=$ligne->service_lib_court;
						
					echo'<option value="'.$id.'">'.$nom.'</option>';
				} 
				$result4->closeCursor();
				
		echo'</select>
		</p>
		
		<p>
			<label for="bureausup">Bureau</label>
			<div name="bureausup" id="bureausup" style="display:inline">
				<select name="bureausup" id="bureausup">
					<option value="0">Choisir un service</option>
				</select>
				</div>
		</p>
    	<input style="margin-top:15px; margin-left:100px;" type="submit" name="supbur" value="Supprimer" onclick="return confirm(\'Etes vous sûre de vouloir supprimer ce bureau ?\');"/>
   	</p>
	
	<p>
	<a href="admin.php" style="margin-top:10px;" title="">Page d\'accueil administration</a>
	</p>
</form>';
$result->closeCursor();

?>
<!--Fin du formulaire-->
</div>
</body>
</html>