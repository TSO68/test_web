<?php
	require_once ("Modele/modele_joueur.php");
	
	$j=new Joueur();
	
	//Je récupère tous les objets
	$unJoueur=$j->findById($_GET['idJoueur']);
	
	if($unJoueur != null){
	    //je passe la main à la vue
	    include("Vue/vue_detail_joueur.php");
	}
	else
	{
		?>		
		<script type="text/javascript">
			alert('Le joueur demandé n\'existe pas');
			window.history.back();
		</script>
		<?php
	}
?>