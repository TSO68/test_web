<?php
	class Commande{
		//attribut privé qui recevra une instance de la connexion
		private $cx;
		
		public function __construct(){
			require_once("Modele/modele_connexion_base.php");
			$this->cx = Connexion::getInstance();
		}

		public function read()
		{
			 // Requête SQL : affichage de tout les produits classé par date de commande
			 $req = "SELECT DISTINCT id, dateCommande FROM COMMANDE WHERE id_COMPTE = {$_SESSION['id']} ORDER BY dateCommande";
			 //Exécution de la requête
			 $curseur = $this->cx->query($req);
			 
			 return $curseur;
		}
	}
?>