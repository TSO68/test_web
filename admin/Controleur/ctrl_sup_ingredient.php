<?php
		require ("Modele/modele_sup_ingredient.php");
		
		$i= new Ingredient();
		
		$lesIngredients=$i->readAll();
		
		if($_POST != null)
			{		
				$delIngre=$i->deleteIngre($_POST['ingre']);
				
				if($delIngre)
				{
					echo"<script> alert ('Ingrédient supprimé');</script>";
					// et redirection vers la page d'accueil
					print ("<script language = \"JavaScript\">");
					print ("location.href = 'admin.php?do=sup_ingredient';");
					print ("</script>");
				}
				else
				{
					echo"<script> alert('Echec de la suppression');</script>";
					// et redirection vers la page d'inscription
					print ("<script language = \"JavaScript\">");
					print ("location.href = 'admin.php';");
					print ("</script>");				
				}
			}
	
		include("Vue/vue_sup_ingredient.php");
?>	