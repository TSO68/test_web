<?php
	class Produit{
		//attribut privé qui recevra une instance de la connexion
		private $cx;
		
		public function __construct(){
			require_once("Modele/modele_connexion_base.php");
			$this->cx = Connexion::getInstance();
		}
		
		public function readAll(){
			
			$req = "SELECT PRODUIT.id, nom, lien, prix FROM PRODUIT INNER JOIN PHOTO ON PRODUIT.id_PHOTO=PHOTO.id";
			
			$curseur = $this->cx->query($req);
			
			return $curseur;
		}
		
		public function findByID($idProduit){
			//je conçois ma requête sql 
			$req = "SELECT PRODUIT.id, nom, lien, prix, description, libelle FROM PRODUIT 
					INNER JOIN PHOTO ON PRODUIT.id_PHOTO=PHOTO.id 
					INNER JOIN fait ON PRODUIT.id=fait.id
					INNER JOIN TAILLE ON fait.id_TAILLE=TAILLE.id
					WHERE PRODUIT.id = :id
					ORDER BY TAILLE.id";
			
			//je prépare ma requête
			$prep = $this->cx->prepare($req);
			
			//j'associe les paramètres
			$prep->bindValue(':id', $idProduit, PDO::PARAM_STR);
			
			//j'exécute
			$prep->execute();
			return $prep;
		}
	}
?>