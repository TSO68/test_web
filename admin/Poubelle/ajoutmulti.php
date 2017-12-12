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
	
	
/*MODIFICATION
 *
 *
 *
 */
		
	
		if(isset($_POST['modsec'])){
			$id=$_POST['sec'];
			
			if(isset($_POST['modnomsec']) && isset($_POST['modpresec']) && $_POST['modpresec']!=NULL && $_POST['modnomsec']!=NULL){
							
			$nom=$_POST['modnomsec'];
 			$pre=$_POST['modpresec'];
 		$req1="UPDATE t_secretaire SET secretaire_prenom='$pre', secretaire_nom='$nom' WHERE secretaire_id='$id'";
				$result= $mycnx->query($req1);
				if($result!=NULL){
				$result->closeCursor();}}
				
			if(isset($_POST['secvisi'])){
	
			$req1="UPDATE t_secretaire SET secretaire_visible='$_POST[secvisi]' WHERE secretaire_id='$id'";
				$result= $mycnx->query($req1);
				if($result!=NULL){
				$result->closeCursor();}}
				
			
	$req2="SELECT service_lib_court FROM t_service";
 	$result1= $mycnx->query($req2);
 	$nb=$result1->rowCount();
 	$nb=$nb+1;
 	$result1->closeCursor();
	
	$ok=1;

for ($i=2; $i<=$nb; $i++){
				
				if(isset($_POST['service'.$i.''])){
					if($ok==1){
						$req1="DELETE FROM t_secret_servi WHERE secret_id='$id'";
				$result= $mycnx->query($req1);
				if($result!=NULL){
				$result->closeCursor();}}
	$ok=0;
	
	$idS=$_POST['service'.$i.''];
	
				$req1="INSERT INTO t_secret_servi (secret_id, servi_id) VALUES('$id','$idS')";
				$result= $mycnx->query($req1);
				if($result!=NULL){
				$result->closeCursor();}}}
				
				echo '<DIV id=message style ="position: absolute; top:13em; left:22em; font-size:18pt; color: black"> Modifications effectuée</DIV>';
		redirige("2;URL='sec.php'");
		}


if(isset($_POST['modred'])){
			$id=$_POST['red'];
			
			if(isset($_POST['modnomred']) && isset($_POST['modprered']) && $_POST['modprered']!=NULL && $_POST['modnomred']!=NULL){
							
			$nom=$_POST['modnomred'];
 			$pre=$_POST['modprered'];
 		$req1="UPDATE t_redacteur SET redacteur_prenom='$pre', redacteur_nom='$nom' WHERE redacteur_id='$id'";
				$result= $mycnx->query($req1);
				if($result!=NULL){
				$result->closeCursor();}}
				
			if(isset($_POST['redvisi'])){
	
			$req1="UPDATE t_redacteur SET redacteur_visible='$_POST[redvisi]' WHERE redacteur_id='$id'";
				$result= $mycnx->query($req1);
				if($result!=NULL){
				$result->closeCursor();}}
				
			
	$req2="SELECT service_lib_court FROM t_service";
 	$result1= $mycnx->query($req2);
 	$nb=$result1->rowCount();
 	$nb=$nb+1;
 	$result1->closeCursor();
	
	$ok=1;

for ($i=2; $i<=$nb; $i++){
				
				if(isset($_POST['service'.$i.''])){
					if($ok==1){
						$req1="DELETE FROM t_red_servi WHERE red_id='$id'";
				$result= $mycnx->query($req1);
				if($result!=NULL){
				$result->closeCursor();}}
	$ok=0;
	
	$idS=$_POST['service'.$i.''];
	
				$req1="INSERT INTO t_red_servi (red_id, servi_id) VALUES('$id','$idS')";
				$result= $mycnx->query($req1);
				if($result!=NULL){
				$result->closeCursor();}}}
				
				echo '<DIV id=message style ="position: absolute; top:13em; left:22em; font-size:18pt; color: black"> Modifications effectuée</DIV>';
		redirige("2;URL='red.php'");
		}
		
		if(isset($_POST['modsig'])){
			$id=$_POST['sig'];
			
			if(isset($_POST['modnomsig']) && isset($_POST['modpresig']) && $_POST['modpresig']!=NULL && $_POST['modnomsig']!=NULL){
							
			$nom=$_POST['modnomsig'];
 			$pre=$_POST['modpresig'];
 		$req1="UPDATE t_signataire SET signataire_prenom='$pre', signataire_nom='$nom' WHERE signataire_id='$id'";
				$result= $mycnx->query($req1);
				if($result!=NULL){
				$result->closeCursor();}}
				
			if(isset($_POST['sigvisi'])){
	
			$req1="UPDATE t_signataire SET signataire_visible='$_POST[sigvisi]' WHERE signataire_id='$id'";
				$result= $mycnx->query($req1);
				if($result!=NULL){
				$result->closeCursor();}}
				
			
	$req2="SELECT service_lib_court FROM t_service";
 	$result1= $mycnx->query($req2);
 	$nb=$result1->rowCount();
 	$nb=$nb+1;
 	$result1->closeCursor();
	
	$ok=1;

for ($i=2; $i<=$nb; $i++){
				
				if(isset($_POST['service'.$i.''])){
					if($ok==1){
						$req1="DELETE FROM t_sign_servi WHERE sign_id='$id'";
				$result= $mycnx->query($req1);
				if($result!=NULL){
				$result->closeCursor();}}
	$ok=0;
	
	$idS=$_POST['service'.$i.''];
	
				$req1="INSERT INTO t_sign_servi (sign_id, servi_id) VALUES('$id','$idS')";
				$result= $mycnx->query($req1);
				if($result!=NULL){
				$result->closeCursor();}}}
				
				echo '<DIV id=message style ="position: absolute; top:13em; left:22em; font-size:18pt; color: black"> Modifications effectuée</DIV>';
		redirige("2;URL='sig.php'");
		}


if(isset($_POST['modser'])){
			$id=$_POST['ser'];
			
			if(isset($_POST['modnomser']) && isset($_POST['modpreser']) && $_POST['modpreser']!=NULL && $_POST['modnomser']!=NULL){
							
			$nom=addslashes($_POST['modnomser']);
 			$pre=addslashes($_POST['modpreser']);
 		$req1="UPDATE t_service SET service_lib_long='$pre', service_lib_court='$nom' WHERE service_id='$id'";
				$result= $mycnx->query($req1);
				if($result!=NULL){
				$result->closeCursor();}}
				
			if(isset($_POST['servisi'])){
				
				$req2="UPDATE t_bureau SET bureau_visible='$_POST[servisi]' WHERE bureau_service_id='$id'";
				$result= $mycnx->query($req2);
				if($result!=NULL){
				$result->closeCursor();}
	
			$req1="UPDATE t_service SET service_visible='$_POST[servisi]' WHERE service_id='$id'";
				$result= $mycnx->query($req1);
				if($result!=NULL){
				$result->closeCursor();}}
	
					
				echo '<DIV id=message style ="position: absolute; top:13em; left:22em; font-size:18pt; color:black"> Modifications effectuée</DIV>';
		redirige("2;URL='ser.php'");
		}
		
		if(isset($_POST['modbur'])){
			$id=$_POST['bureau'];
			
			if(isset($_POST['modnombur']) && isset($_POST['modprebur']) && $_POST['modprebur']!=NULL && $_POST['modnombur']!=NULL){
							
			$nom=addslashes($_POST['modnombur']);
 			$pre=addslashes($_POST['modprebur']);
 		$req1="UPDATE t_bureau SET bureau_lib_long='$pre', bureau_lib_court='$nom' WHERE bureau_id='$id'";
				$result= $mycnx->query($req1);
				if($result!=NULL){
				$result->closeCursor();}}
				
			if(isset($_POST['burvisi'])){
				
				$req2="UPDATE t_bureau SET bureau_visible='$_POST[burvisi]' WHERE bureau_id='$id'";
				$result= $mycnx->query($req2);
				if($result!=NULL){
				$result->closeCursor();}}
	
					
				echo '<DIV id=message style ="position: absolute; top:13em; left:22em; font-size:18pt; color:black"> Modifications effectuée</DIV>';
		redirige("2;URL='bur.php'");
		}

		
/*AJOUT
 *
 *
 *
 */
 
 

if(isset($_POST["ajoutsec"])){
	
 $nom=$_POST['nomsec'];
 $pre=$_POST['presec'];
 $req1="INSERT INTO t_secretaire (secretaire_id , secretaire_prenom, secretaire_nom) VALUES('','$pre','$nom')";
				$result= $mycnx->query($req1);
				if($result!=NULL){
				$lastid=$mycnx->lastInsertId();
				$result->closeCursor();
					
 $req2="SELECT service_lib_court FROM t_service";
 $result1= $mycnx->query($req2);
 $nb=$result1->rowCount();
 $nb=$nb+1;
 $result1->closeCursor();

for ($i=2; $i<=$nb; $i++){
				
				if(isset($_POST['service'.$i.''])){
	
	$idS=$_POST['service'.$i.''];

				$req1="INSERT INTO t_secret_servi (secret_id, servi_id) VALUES('$lastid','$idS')";
				$result= $mycnx->query($req1);
				if($result!=NULL){
				$result->closeCursor();}}}
								
				echo '<DIV id=message style ="position: absolute; top:13em; left:22em; font-size:18pt; color: black"> Ajout effectué</DIV>';
redirige("2;URL='sec.php'");
			}}
			
if(isset($_POST["ajoutred"])){
 $nom=$_POST['nomred'];
 $pre=$_POST['prered'];
 $req1="INSERT INTO t_redacteur (redacteur_id , redacteur_prenom, redacteur_nom) VALUES('','$pre','$nom')";
				$result= $mycnx->query($req1);
				if($result!=NULL){
				$lastid=$mycnx->lastInsertId();
				$result->closeCursor();
				
 $req2="SELECT service_lib_court FROM t_service";
 $result1= $mycnx->query($req2);
 $nb=$result1->rowCount();
 $nb=$nb+1;
 $result1->closeCursor();

for ($i=2; $i<=$nb; $i++){
				
				if(isset($_POST['service'.$i.''])){
	
	$idS=$_POST['service'.$i.''];

				$req1="INSERT INTO t_red_servi (red_id, servi_id) VALUES('$lastid','$idS')";
				$result= $mycnx->query($req1);
				if($result!=NULL){
				$result->closeCursor();}}}
				
				echo '<DIV id=message style ="position: absolute; top:13em; left:22em; font-size:18pt; color: black"> Ajout effectué</DIV>';
redirige("2;URL='red.php'");
			}}
			
if(isset($_POST["ajoutsig"])){
 $nom=$_POST['nomsig'];
 $pre=$_POST['presig'];
 $req1="INSERT INTO t_signataire (signataire_id , signataire_prenom, signataire_nom) VALUES('','$pre','$nom')";
				$result= $mycnx->query($req1);
				if($result!=NULL){
				$lastid=$mycnx->lastInsertId();
				$result->closeCursor();
				
 $req2="SELECT service_lib_court FROM t_service";
 $result1= $mycnx->query($req2);
 $nb=$result1->rowCount();
 $nb=$nb+1;
 $result1->closeCursor();

for ($i=2; $i<=$nb; $i++){
				
				if(isset($_POST['service'.$i.''])){
	
	$idS=$_POST['service'.$i.''];

				$req1="INSERT INTO t_sign_servi (sign_id, servi_id) VALUES('$lastid','$idS')";
				$result= $mycnx->query($req1);
				if($result!=NULL){
				$result->closeCursor();}}}
				
				echo '<DIV id=message style ="position: absolute; top:13em; left:22em; font-size:18pt; color: black"> Ajout effectué</DIV>';
redirige("2;URL='sig.php'");
			}}
			
if(isset($_POST["ajoutbur"])){
 $nom=addslashes($_POST['nombur']);
 $pre=addslashes($_POST['prebur']);
 $ser=$_POST['nomser'];
 
 $req3="SELECT service_id FROM t_service WHERE service_lib_court='$ser'";
							 $result2= $mycnx->query($req3);
								while ($ligne = $result2->fetch(PDO::FETCH_OBJ))
									{
										$idser=$ligne->service_id;
 
 $req1="INSERT INTO t_bureau (bureau_id , bureau_lib_court, bureau_lib_long, bureau_service_id ) VALUES('','$nom','$pre','$idser')";
				$result= $mycnx->query($req1);
				if($result!=NULL){
				$result->closeCursor();
				
				echo '<DIV id=message style ="position: absolute; top:13em; left:22em; font-size:18pt; color: black"> Ajout effectué</DIV>';

redirige("2;URL='bur.php'");
$result2->closeCursor();
			}}}
			
if(isset($_POST["ajoutser"])){
 $nom=addslashes($_POST['nomser']);
 $pre=addslashes($_POST['preser']);
 $req1="INSERT INTO t_service (service_id , service_lib_court, service_lib_long) VALUES('','$nom','$pre')";
				$result= $mycnx->query($req1);
				if($result!=NULL){
				$result->closeCursor();
				
				echo '<DIV id=message style ="position: absolute; top:13em; left:22em; font-size:18pt; color: black"> Ajout effectué</DIV>';
redirige("2;URL='ser.php'");
			}}
			
			
/*SUPPRESSION
 *
 *
 *
 */



			
			
if(isset($_POST["supsec"])){
 $sec=$_POST['sec'];

 $req2="DELETE FROM t_secret_servi WHERE secret_id='$sec'";
 				$result1=$mycnx->query($req2);
				if($result1!=NULL){
				$result1->closeCursor();}	
 $req1="DELETE FROM t_secretaire WHERE secretaire_id='$sec'";
				$result= $mycnx->query($req1);
				if($result!=NULL){
				$result->closeCursor();
				
				echo '<DIV id=message style ="position: absolute; top:13em; left:22em; font-size:18pt; color: black"> Suppression effectué</DIV>';
redirige("2;URL='sec.php'");

			}else{echo '<DIV id=message style ="position: absolute; top:13em; left:12em; font-size:18pt; color: black"> Impossible de supprimer la secrétaire qui est utilisée dans des enregistrements</DIV>';
			redirige("2;URL='sec.php'");}}
			
			
if(isset($_POST["supred"])){
 $red=$_POST['red'];

 $req2="DELETE FROM t_red_servi WHERE red_id='$red'";
 				$result1=$mycnx->query($req2);
				if($result1!=NULL){
				$result1->closeCursor();}	

 $req1="DELETE FROM t_redacteur WHERE redacteur_id='$red'";
				$result= $mycnx->query($req1);
				if($result!=NULL){
				$result->closeCursor();
				
				echo '<DIV id=message style ="position: absolute; top:13em; left:22em; font-size:18pt; color: black"> Suppression effectué</DIV>';
redirige("2;URL='red.php'");

		}else{echo '<DIV id=message style ="position: absolute; top:13em; left:12em; font-size:18pt; color: black"> Impossible de supprimer le rédacteur qui est utilisé dans des enregistrements</DIV>';
			redirige("2;URL='red.php'");}}

if(isset($_POST["supser"])){
 $idser=$_POST['ser'];
 
$req1="DELETE FROM t_bureau WHERE bureau_service_id='$idser'";
				$result= $mycnx->query($req1);
				if($result!=NULL){
				$result->closeCursor();
				
 $req1="DELETE FROM t_service WHERE service_id='$idser'";
				$result= $mycnx->query($req1);
				if($result!=NULL){
				$result->closeCursor();
				
				echo '<DIV id=message style ="position: absolute; top:13em; left:22em; font-size:18pt; color: black"> Suppression effectué</DIV>';
redirige("2;URL='ser.php'");

				}}else{echo '<DIV id=message style ="position: absolute; top:13em; left:12em; font-size:18pt; color: black"> Impossible de supprimer le service qui est utilisé dans des enregistrements</DIV>';
			redirige("2;URL='ser.php'");}}
			
if(isset($_POST["supbur"])){
 $idbur=$_POST['bureausup'];

 $req1="DELETE FROM t_bureau WHERE bureau_id='$idbur'";
				$result= $mycnx->query($req1);
				if($result!=NULL){
				$result->closeCursor();
				
				echo '<DIV id=message style ="position: absolute; top:13em; left:22em; font-size:18pt; color: black"> Suppression effectué</DIV>';
redirige("2;URL='bur.php'");

			}else{echo '<DIV id=message style ="position: absolute; top:13em; left:12em; font-size:18pt; color: black"> Impossible de supprimer le bureau qui est utilisé dans des enregistrements</DIV>';
			redirige("2;URL='bur.php'");}}
			
			
if(isset($_POST["supsig"])){
 $sig=$_POST['sig'];
 
$req2="DELETE FROM t_sign_servi WHERE sign_id='$sig'";
 				$result1=$mycnx->query($req2);
				if($result1!=NULL){
				$result1->closeCursor();}	

 $req1="DELETE FROM t_signataire WHERE signataire_id='$sig'";
				$result= $mycnx->query($req1);
				if($result!=NULL){
				$result->closeCursor();
				
				echo '<DIV id=message style ="position: absolute; top:13em; left:22em; font-size:18pt; color: black"> Suppression effectué</DIV>';
redirige("2;URL='sig.php'");

			}else{echo '<DIV id=message style ="position: absolute; top:13em; left:12em; font-size:18pt; color: black"> Impossible de supprimer le signataire qui est utilisé dans des enregistrements</DIV>';
			redirige("2;URL='sig.php'");}}
			

/*ADMIN
 *
 *
 *
 */



if(isset($_POST["ajoutad"])){
 $nom=$_POST['nomad'];
 $mdp=$_POST['mdpad'];
 $req1="INSERT INTO t_admin (admin_id , admin_log, admin_mdp) VALUES('','$nom','$mdp')";
				$result= $mycnx->query($req1);
				if($result!=NULL){
				$result->closeCursor();
				
				echo '<DIV id=message style ="position: absolute; top:13em; left:22em; font-size:18pt; color: black"> Ajout effectué</DIV>';
redirige("2;URL='ad.php'");
			}}
			
			
if(isset($_POST["supad"])){
 $ad=$_POST['ad'];
 $req1="DELETE FROM t_admin WHERE admin_log='$ad'";
				$result= $mycnx->query($req1);
				if($result!=NULL){
				$result->closeCursor();
				
				echo '<DIV id=message style ="position: absolute; top:13em; left:22em; font-size:18pt; color: black"> Suppression effectué</DIV>';
redirige("2;URL='ad.php'");
			}}
?>
</body>
</html>