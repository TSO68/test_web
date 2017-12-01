<?php
		require ("Modele/modele_produit.php");
		
		$p= new Produit();
		
		$lesProduits=$p->readAll();

		include("Vue/vue_liste_produits.php");
?>		