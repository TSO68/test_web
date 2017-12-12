<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include("redir.php")?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/ajoututil.css">
<title>Administration d'ELISA <?php echo $_SESSION['version']; ?></title>
<link rel="icon" type="image/png" href="../css/images/favicon.ico">
</head>
<script>
function VerifForm(){ 
frm=document.forms['arch']; 
if(frm.elements['an'].value != ""){
    return true;
	}
	else {
    alert("Veuillez entrer l'année à archiver !");
    return false;
  }
}
</script>

<body>
<div id="deco"><a href="admin.php" title="">Page d'accueil administration</a></div>

<?php 

//Teste si c'est bien l'administrateur qui est enregistré 
		if ((isset($_SESSION['loginadmin'])) && (!empty($_SESSION['loginadmin']))){
	 
		}else{ redirige("0;URL='../admin.htm'");}
		
		include("connexion.php");


echo'<form style="height:200px;" name="arch" id="arch" method="post" action="archive.php?ARCHIVAGE" onsubmit="return VerifForm()"/>
	<h1>Archivage de la base</h1>
	
	 <p>
		    <label for="annee">Année à archiver</label>
			<input id="annee" type="text" name="an" />
		</p>
	
	<p>
    	<input type="submit" style="margin-left:120px;" name="archivage" value="Archiver" />
	</p>
	
	<p>
	<a href="admin.php" title="">Page d\'accueil administration</a>
	</p>
</form>';

echo'<form style="height:200px;" name="arch" id="arch" method="post" action="archive.php?DEL"/>
	<h1>Suppression d\'archive</h1>
	
	 <p>
		<label for="supan">Année a supprimer</label>
		<select id="supan" name="supan">';
		$req2="SELECT * FROM t_archive ORDER BY annee_nb DESC";
				$result1= $mycnx->query($req2);
		while ($ligne = $result1->fetch(PDO::FETCH_OBJ))
				{ 
						$annee=$ligne->annee_nb;
						
						
				echo'<option value="'.$annee.'">'.$annee.'</option>';
				} 
				$result1->closeCursor();
		echo'</select>
		</p>
	
	<p>
    	<input type="submit" style="margin-left:120px;" name="supp" value="Supprimer" onclick="return confirm(\'Etes vous sûr de vouloir supprimer cette archive ?\');"/>
	</p>
	
	<p>
	<a href="admin.php" title="">Page d\'accueil administration</a>
	</p>
</form>';

if(isset($_GET['ARCHIVAGE'])){
	
	

	$req="CREATE TABLE IF NOT EXISTS elisa.".$_POST['an']."_t_enregistrement_s LIKE elisa.t_enregistrement_s ";
	$result=$mycnx->query($req);
	$req="INSERT INTO elisa.".$_POST['an']."_t_enregistrement_s SELECT * FROM elisa.t_enregistrement_s ";
	$result=$mycnx->query($req);
	
	$req="CREATE TABLE IF NOT EXISTS elisa.".$_POST['an']."_t_enregistrement_e LIKE elisa.t_enregistrement_e ";
	$result=$mycnx->query($req);
	$req="INSERT INTO elisa.".$_POST['an']."_t_enregistrement_e SELECT * FROM elisa.t_enregistrement_e ";
	$result=$mycnx->query($req);
	
	$req="SELECT annee_nb FROM t_archive WHERE annee_nb='$_POST[an]'";
	$result=$mycnx->query($req);
	$nb=$result->rowCount();
	if($nb==0){
	$req="INSERT INTO t_archive (annee_id, annee_nb) VALUES ('', '$_POST[an]')";
	$result=$mycnx->query($req);
	$req="TRUNCATE TABLE t_enregistrement_s";
	$result=$mycnx->query($req);
	$req="TRUNCATE TABLE t_enregistrement_e";
	$result=$mycnx->query($req);
	$result->closeCursor();
	
	
	echo'<SCRIPT LANGUAGE="JavaScript"> 
		 alert("La base de donnée a bien été archivée");
		 </SCRIPT>';
		 
		redirige("0;URL='admin.php'");}
		
		else{
			echo'<SCRIPT LANGUAGE="JavaScript"> 
		 alert("Année déjà archivée");
		 </SCRIPT>';}
	}
	
if(isset($_GET['DEL'])){
	
	$req="DROP TABLE elisa.".$_POST['supan']."_t_enregistrement_s";
	$result=$mycnx->query($req);
	$req="DROP TABLE elisa.".$_POST['supan']."_t_enregistrement_e";
	$result=$mycnx->query($req);
	
	$req="DELETE FROM t_archive WHERE annee_nb='$_POST[supan]'";
	$result=$mycnx->query($req);
	$result->closeCursor();
	
	echo'<SCRIPT LANGUAGE="JavaScript"> 
		 alert("La base de donnée a bien été supprimée");
		 </SCRIPT>';
		 
		redirige("0;URL='admin.php'"); 
}



?>

</body>
</html>