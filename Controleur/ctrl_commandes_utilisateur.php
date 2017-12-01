<?php
if(isset($_SESSION['login']))
	{
		require ("Modele/modele_commandes_utilisateur.php");
		
		$cmd= new Commande();
				
		$lesCommandes=$cmd->read();
		
		include("Vue/vue_commandes_utilisateur.php");
	}
	else
	{
		?>		
		<script type="text/javascript">
			alert('Vous devez être connecté afin d\'accéder à votre espace membre!');
			window.history.back();
		</script>
		<?php
	}
?>