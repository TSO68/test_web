<?php
	class Match{
		//attribut privé qui recevra une instance de la connexion
		private $cx;
		
		public function __construct(){
			require_once("Modele/modele_connexion_base.php");
			$this->cx = Connexion::getInstance();
		}
		
		//Retourne un curseur contenant tous les joueurs et leurs role
		public function readAll(){
			$req = "SELECT MATCHS.id, dateMatch, heure, exterieurON, scoreDom, scoreExt, STADE.libelle, ADVERSAIRE.libelle AS adversaire, logo
					FROM MATCHS INNER JOIN STADE
					ON MATCHS.id_STADE = STADE.id
					INNER JOIN ADVERSAIRE
					ON MATCHS.id_ADVERSAIRE = ADVERSAIRE.id
					ORDER BY MATCHS.id";
			$curseur=$this->cx->query($req);
			return $curseur;
		}
		
		//retourne un curseur contenant l'objet associer à l'identifiant passé en paramètre
		//on utilise ici la technique des requêtes préparées qui permettent d'éviter les injonctions SQL
		public function findById($idMatch){
			//je reçois ma requête SQL
			$req = "SELECT MATCHS.id, dateMatch, heure, exterieurON, scoreDom, scoreExt, STADE.libelle, ADVERSAIRE.libelle AS adversaire, logo, PERSONNEL.nom, prenom, PERSONNEL.id As idPersonnel,butMarques, passeDecisives, cartonJauneON, cartonRougeON, minutesJouees 
					FROM MATCHS INNER JOIN STADE
					ON MATCHS.id_STADE = STADE.id
					INNER JOIN ADVERSAIRE
					ON MATCHS.id_ADVERSAIRE = ADVERSAIRE.id
					INNER JOIN participe 
					ON MATCHS.id=participe.id INNER JOIN JOUEUR 
					ON JOUEUR.id=participe.id_PERSONNEL 
					INNER JOIN PERSONNEL 
					ON PERSONNEL.id=JOUEUR.id 
					WHERE MATCHS.id = :id 
					AND (MinutesJouees!=0)";
			
			//je prépare ma requête
			$prep = $this->cx->prepare($req);
			
			//j'associe les paramètres
			$prep->bindValue(':id', $idMatch, PDO::PARAM_STR);
			
			//j'exécute
			$prep->execute();
			return $prep;
		}
	}
?>