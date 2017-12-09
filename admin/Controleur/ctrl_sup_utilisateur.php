<?php
		require ("Modele/modele_sup_utilisateur.php");
		
		$u= new Utilisateur();
		
		$lesUsers=$u->readAll();
		
		include("Vue/vue_sup_utilisateur.php");
?>	