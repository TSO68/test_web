<?php
	class Recette{
		//attribut privé qui recevra une instance de la connexion
		private $cx;
		
		public function __construct(){
			require_once("Modele/modele_connexion_base.php");
			$this->cx = Connexion::getInstance();
		}
		
		//Retourne un curseur contenant toutes les recettes
		public function readAll(){
			$req = "SELECT recette.idRec, recette.nom, descriptif, difficulte, prix, nbPersonnes, dureePreparation, dureeCuisson, dureeTotale, qteCalories, qteProteines, qteGlucides, qteLipides, utilisateur.nom, utilisateur.prenom, illustration.adresse
					FROM recette 
					INNER JOIN utilisateur
					ON recette.idUtil = utilisateur.idUtil
					INNER JOIN illustration
					ON recette.idRec = illustration.idRec
					ORDER BY recette.nom ASC";
			$curseur=$this->cx->query($req);
			return $curseur;
		}
		
		//retourne un curseur contenant l'objet associer à l'identifiant passé en paramètre
		//on utilise ici la technique des requêtes préparées qui permettent d'éviter les injonctions SQL
		public function findById($idRecette){
			//je reçois ma requête SQL
			$req = "SELECT nom, descriptif, difficulte, prix, nbPersonnes, adresse
					FROM recette 
					INNER JOIN illustration
					ON recette.idRec = illustration.idRec
                    WHERE recette.idRec = :id";
			
			//je prépare ma requête
			$prep = $this->cx->prepare($req);
			
			//j'associe les paramètres
			$prep->bindValue(':id', $idRecette, PDO::PARAM_STR);
			
			//j'exécute
			$prep->execute();
			
			//je rempli le curseur
			$curseur = $prep->fetchObject();
			return $curseur;
		}
	}
?>