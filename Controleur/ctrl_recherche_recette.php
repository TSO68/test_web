<?php
		require ("Modele/modele_recette.php");
		
		$r= new Recette();
		
		$lesRecettes=$r->search($_POST['recherche']);

		include("Vue/vue_recherche_recette.php");
?>	