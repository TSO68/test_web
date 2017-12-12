<?php
include("connexion.php");
	
	if(isset($_POST["idUtil"]) && $_POST["idUtil"]!=0){
			
			$req="SELECT util_super_util FROM t_utilisateur WHERE util_id='$_POST[idUtil]'";
			$result= $mycnx->query($req);
			$ligne=$result->fetch(PDO::FETCH_OBJ);
			$nb=$ligne->util_super_util;
	if($nb==1){
				echo'<input type="checkbox" checked="checked" name="service1" id="service1" value="Super Utilisateur"> Super Utilisateur<br>';
				
				$req="SELECT * FROM t_service";
		$result=$mycnx->query($req);
		$i=2;
		echo '<br>';
		while ($ligne = $result->fetch(PDO::FETCH_OBJ))
				{ 
				
				$id=$ligne->service_id;
				$nom=$ligne->service_lib_court;
	
				echo '<input type="checkbox" name="service'.$i.'" id="service'.$i.'" value="'.$id.'"> '.$nom.'&nbsp;&nbsp;&nbsp;<div id="radio1"><input type="radio" name="choix'.$i.'" id="choixl'.$i.'" value="1" > Lecture &nbsp;&nbsp;&nbsp;<input type="radio" name="choix'.$i.'" id="choixe'.$i.'" value="2" > Ecriture/Modification<br><br></div>';
				$i=$i+1;	
				}
$result->closeCursor();}
		
		else{
						echo'<input type="checkbox" name="service1" id="service1" value="Super Utilisateur"> Super Utilisateur<br><br>';

		$req="SELECT * FROM t_service";
		$result=$mycnx->query($req);
		$i=2;
		while ($ligne = $result->fetch(PDO::FETCH_OBJ))
				{ 
				
				$id=$ligne->service_id;
				$nom=$ligne->service_lib_court;
				
						$req1="SELECT service_id FROM t_droit_util WHERE util_id='$_POST[idUtil]'";
						$result1=$mycnx->query($req1);
						$tab=array();
						while ($ligne1 = $result1->fetch(PDO::FETCH_OBJ))
						{ 
								$ids=$ligne1->service_id;
								array_push($tab,$ids);
						}
													
								
				echo '<input type="checkbox"'; if(isset($ids)){ foreach($tab as $valeur){
    if($valeur==$id){echo 'checked="checked"';}}} echo' name="service'.$i.'" id="service'.$i.'" value="'.$id.'"> '.$nom.'&nbsp;&nbsp;&nbsp;
	<div id="radio1"><input type="radio" name="choix'.$i.'" id="choixl'.$i.'" value="1"> Lecture &nbsp;&nbsp;&nbsp;		
		<input type="radio" name="choix'.$i.'" id="choixe'.$i.'" value="2" > Ecriture/Modification<br><br></div>';
	$i=$i+1;
				}}
$result->closeCursor();				
if(isset ($result1)){$result1->closeCursor();}


}
?>
