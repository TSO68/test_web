<?php
		require ("Modele/modele_recette.php");
		
		if($_POST != null)
		{		
			$r= new Recette();
			
			$lesRecettes=$r->search($_POST['recherche']);
			
			// et redirection vers la page d'accueil
			print ("<script language = \"JavaScript\">");
			print ("location.href = 'index.php?do=resultats';");
			print ("</script>");
		}
		
		include("Vue/vue_recherche.php");
?>	