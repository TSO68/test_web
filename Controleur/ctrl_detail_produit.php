<?php
	require_once ("Modele/modele_produit.php");
	
	$p=new Produit();
	
	//Je récupère tous les objets
	$lesProduits=$p->findById($_GET['idProduit']);
	
	//je passe la main à la vue
	include("Vue/vue_detail_produit.php");
?>