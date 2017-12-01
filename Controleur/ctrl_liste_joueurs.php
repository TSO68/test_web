<?php
		require ("Modele/modele_joueur.php");
		
		$j= new Joueur();
		
		$lesJoueurs=$j->readAll();

		include("Vue/vue_liste_joueurs.php");
?>	