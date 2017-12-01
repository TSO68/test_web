<?php
	if(isset($_SESSION['login']))
	{
		require ("Modele/modele_fonctions_panier.php");

		$fp= new PanierDAO();
		
		//creer un panier 
		$creationPanier=$fp->creationPanier();
		
		//action en cas d'ajout de suppresion de modification du panier
		if (isset($_GET['action']))
		{
			Switch($_GET['action']){
			  Case "ajout":
					$ajouterArticle=$fp->ajouterArticle($_GET['pdt_ref'],$_GET['pdt_designation'],$_GET['taille'],$_GET['pdt_prix'],$_GET['quantite'],$creationPanier);
					break;
					
			  Case "suppression":
					$supprimerArticle=$fp->supprimerArticle($_GET['pdt_ref'],$_GET['taille'],$creationPanier);
					break;

			  Case "delete":
					$supprimerPanier=$fp->supprimePanier();
					break;
				  
			  Case "refresh":
					foreach($_POST['panier'] as $_GET['cle']=>$_GET['valeur']){
						$modifierQTeArticle=$fp->modifierQTeArticle($_GET['cle'],$_GET['valeur'],$creationPanier);
					}
					break;  

			  Default:
			  break;
			}
		}
		
		//Calcul le montant global
		$MontantGlobal=$fp->MontantGlobal();
		
		//et je passe la main à la vue
		include("Vue/vue_panier.php");
	}
	else{
?>		
		<script type="text/javascript">
			alert('Vous devez être connecté afin d\'accéder à votre panier!');
			window.history.back();
		</script>
<?php
	}
?>