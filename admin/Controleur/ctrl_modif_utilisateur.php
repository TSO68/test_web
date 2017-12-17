<?php
		require ("../Modele/modele_utilisateur.php");
		
		$u= new Utilisateur();
		
		$lesUsers=$u->readAll();
		
		if($_POST != null)
		{
			if($_POST['prenom_modif'] != "")
			{
				$upd=$u->updatePrenom($_POST['util']);
			}
			
			if($_POST['nom_modif'] != "")
			{
				$upd2=$u->updateNom($_POST['util']);
			}
			
			if($_POST['login_modif'] != "")
			{
				$upd3=$u->updateLogin($_POST['util']);
			}
			
			if($_POST['mail_modif'] != "")
			{
				$upd4=$u->updateMail($_POST['util']);
			}
			
			if($_POST['mdp_modif'] != "")
			{
				$upd5=$u->updateMdp($_POST['util']);
			}
				
			if($upd || $upd2 || $upd3 || $upd4 || $upd5)
			{
				echo"<script> alert ('Utilisateur modifié');</script>";
				// et redirection vers la page d'accueil
				print ("<script language = \"JavaScript\">");
				print ("location.href = 'ctrl_modif_utilisateur.php';");
				print ("</script>");
			}
			else
			{
				echo"<script> alert('Echec de la modification');</script>";
				// et redirection vers la page d'inscription
				print ("<script language = \"JavaScript\">");
				print ("location.href = 'ctrl_modif_utilisateur.php';");
				print ("</script>");				
			}
		}
	
		include("../Vue/vue_modif_utilisateur.php");
?>	