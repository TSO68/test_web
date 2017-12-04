<?php
	class AjoutRecette{
		//attribut privé qui recevra une instance de la connexion
		private $cx;
		
		public function __construct(){
			require_once("Modele/modele_connexion_base.php");
			$this->cx = Connexion::getInstance();
		}
    
		//initialise l'instance d'inscription
		public function create(){
			//Booléen permettant de vérifier l'éxécution de la requête
			$valid=true;
		  
			//récupération des valeurs des champs:
			 $nom=$_POST['nom'];
			 $descriptif=$_POST['descriptif'];
			 $difficulte=$_POST['difficulte'];
			 $prix=$_POST['prix'];
			 $personnes=$_POST['personnes'];
			 $preparation=$_POST['preparation'];
			 $cuisson=$_POST['cuisson'];
			 $idUtil=$_SESSION['idUtil'];
			//création de la requête SQL:
			$sql ="INSERT INTO recette(nom, descriptif, difficulte, prix, nbPersonnes, dureePreparation,
			dureeCuisson, dureeTotale, qteCalories, qteProteines, qteGlucides, qteLipides, qteProtides, idUtil)
			VALUES (:nom, :descriptif, :difficulte, :prix, :personnes, :dureePreparation, :dureeCuisson, (:dureePreparation+:dureeCuisson), 0, 0, 0, 0, 0 :idUtil)";
				
			$requete = $this->cx->prepare($sql);
				
			//J'associe les valeur
			$requete->bindValue(":nom",$nom,PDO::PARAM_STR);
			$requete->bindValue(":descriptif",$descriptif,PDO::PARAM_STR);
			$requete->bindValue(":difficulte",$difficulte,PDO::PARAM_STR);	
			$requete->bindValue(":prix",$prix,PDO::PARAM_STR);	
			$requete->bindValue(":personnes",$personnes,PDO::PARAM_STR);	
			$requete->bindValue(":preparation",$preparation,PDO::PARAM_STR);	
			$requete->bindValue(":cuisson",$cuisson,PDO::PARAM_STR);	
			$requete->bindValue(":idUtil",$idUtil,PDO::PARAM_STR);	

			//exécution de la requête SQL:
			$requete->execute();
			if(!$requete1){
				$valid=false;
			}
			return $valid;
		}
	}
?>