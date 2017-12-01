<?php
	require_once ("Modele/modele_match.php");
	
	$m=new Match();
	
	//Je récupère tous les objets
	$lesMatchs=$m->findById($_GET['idMatch']);
	
	//je passe la main à la vue
	include("Vue/vue_detail_match.php");
?>