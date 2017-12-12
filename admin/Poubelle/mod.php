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
//Teste si c'est bien l'administrateur qui est enregistré 

		if ((isset($_SESSION['loginadmin'])) && (!empty($_SESSION['loginadmin']))){
	 
		}else{ redirige("0;URL='../admin.htm'");}
		
		include("connexion.php");
		
$id=$_POST['util'];
$mdp=$_POST['mdp'];

if(isset($_POST['service1'])){
	
		$req1="UPDATE t_utilisateur SET util_mdp='$mdp', util_super_util='1' WHERE util_id='$id'";
		$result= $mycnx->query($req1);
		if($result!=NULL){
		$result->closeCursor();
				
		$req1="DELETE FROM t_droit_util WHERE util_id='$id'";
		$result= $mycnx->query($req1);
		if($result!=NULL){
		$result->closeCursor();}
				
				echo '<DIV id=message style ="position: absolute; top:13em; left:22em; font-size:18pt; color: black"> Modification(s) effectuée(s)</DIV>';
redirige("2;URL='modifutil.php'");

		}
}


else{ 
		//Modifications apportées stagaire 2013
		//On met à jour l'enregistrement de l'utilisateur avec le nouveau mot de passe récupéré
		$req1="UPDATE t_utilisateur SET util_mdp='$mdp', util_super_util='0' WHERE util_id='$id'";
		$result= $mycnx->query($req1);
		//Si la requête a été effectuée, on compte le nombre de services
		if($result!=NULL){
			$result->closeCursor();			
			$req2="SELECT service_lib_court FROM t_service";
			$result1= $mycnx->query($req2);
			$nb=$result1->rowCount();
			$nb=$nb+1;
			$result1->closeCursor();
			
			$ok=1;
			
			//On vérifie du service numéro 2 au dernier service
			for ($i=2; $i<=$nb; $i++){
			
				//On teste si un service a été coché
				if(isset($_POST['service'.$i.''])){
						//et si le droit correspondant aussi, on supprime les droits
					if (!empty($_POST['choix'.$i.''])){
						$req1="DELETE FROM t_droit_util WHERE util_id='$id'";
						$result= $mycnx->query($req1);
						//On récupère le service et le droit lié
						if($result!=NULL){
							$result->closeCursor();
							$idS=$_POST['service'.$i.''];
							$idD=$_POST['choix'.$i.''];
							
							//On l'ajoute dans les droits
							$req1="INSERT INTO t_droit_util (droit_id, util_id, service_id) VALUES('$idD','$id','$idS')";
							$result= $mycnx->query($req1);
							if($result!=NULL){
								$result->closeCursor();
								echo '<DIV id=message style ="position: absolute; top:13em; left:22em; font-size:18pt; color: black"> Modification(s) effectuée(s)</DIV>';
							}
						}
					}
					//Si le droit correspondant n'a pas été coché, on affiche un message d'erreur
					else
					{
					?>
						<script type="text/javascript">
						alert("Vous n'avez pas renseigné le droit correspondant au service.");
						</script>
					<?php
					}
				}
				//Si aucun servie n'a été coché
				else
				{
					//Mais qu'un droit a été coché, on affiche un message d'erreur
					if (!empty($_POST['choix'.$i.''])){
					?>
						<script type="text/javascript">
						alert("Vous n'avez pas renseigné le service correspondant au droit.");
						</script>
					<?php
					}
				}
			}
			
		}
}
//Redirection		
redirige("2;URL='modifutil.php'");
		
?>
</body>
</html>


