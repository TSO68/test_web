<?php
		require ("Modele/modele_match.php");
		
		$m= new Match();
		
		$lesMatchs=$m->readAll();

		include("Vue/vue_liste_matchs.php");
?>	