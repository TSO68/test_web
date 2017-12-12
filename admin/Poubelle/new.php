<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administration d'ELISA <?php echo $_SESSION['version']; ?></title>
<link rel="stylesheet" href="css/ajoututil.css">
<link rel="icon" type="image/png" href="../css/images/favicon.ico">
<?php include("redir.php")?>
<script type="text/javascript">
//fonction qui vérifie que le formulaire est rempli
function VerifForm(){ 
 
                             // ici une serie de tests : (exmple si les champs sont vides)
                      frm=document.forms['ajoutnew'];
  if(frm.elements['new'].value != ""){
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
if(!isset($_GET['ajout']))
{
echo'<form name"ajoutnew" id="ajoutnew" method="post" action="new.php?ajout" alert onsubmit="return VerifForm()" />
	<h1>Ajout d\'une news (255 caractères)</h1>

	<p>
		<label for="new">News</label>
		<TEXTAREA maxlength="255" name="new" id="new" rows="10" cols="37"></textarea>
	</p>
 
    	<input type="submit" name="ajoutnew" value="Ajouter" /> ou <input name="efface" type="reset"  value="Effacer" /> 
	</p>
	
	<p>
	<a href="admin.php" title="">Page d\'accueil administration</a>
	</p>
</form>';
}

if(isset($_GET['ajout']))
{
   $req="DELETE FROM t_news";
   $result=$mycnx->query($req);
   
   $req="INSERT INTO t_news (news_id, news_libelle) VALUES ('', '".$_POST['new']."')";
   $result=$mycnx->query($req);
   
   $result->closeCursor();
   
   echo '<DIV id=message style ="position: absolute; top:13em; left:22em; font-size:18pt; color: black"> Ajout effectué</DIV>';
redirige("2;URL='admin.php'");
}
?>
</body>
</html>