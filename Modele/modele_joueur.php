<?php
	class Joueur{
		//attribut privé qui recevra une instance de la connexion
		private $cx;
		
		public function __construct(){
			require_once("Modele/modele_connexion_base.php");
			$this->cx = Connexion::getInstance();
		}
		
		//Retourne un curseur contenant tous les joueurs et leurs role
		public function readAll(){
			$req = "SELECT PERSONNEL.id, PERSONNEL.nom, prenom, num, POSTE.libelle, lien
					FROM PHOTO INNER JOIN PERSONNEL
					ON PHOTO.id=PERSONNEL.id_PHOTO
					INNER JOIN JOUEUR
					ON PERSONNEL.id=JOUEUR.id
					INNER JOIN POSTE
					ON JOUEUR.id_POSTE=POSTE.id
					ORDER BY POSTE.id, num ASC";
			$curseur=$this->cx->query($req);
			return $curseur;
		}
		
		//retourne un curseur contenant l'objet associer à l'identifiant passé en paramètre
		//on utilise ici la technique des requêtes préparées qui permettent d'éviter les injonctions SQL
		public function findById($idJoueur){
			//je reçois ma requête SQL
			$req = "SELECT PERSONNEL.nom, prenom, dateNaiss, lieuNaiss, biographie, num, taille, poids, pied, venueClub, POSTE.libelle, SUM(butMarques) as nbButs, SUM(passeDecisives) as nbPassesDe, SUM(cartonJauneON) as nbCartonsJaunes, SUM(cartonRougeON) as nbCartonsRouges, SUM(minutesJouees) as nbMinutesJouees, NATIONALITE.libelle AS libelleNat, lien, COUNT(participe.id_PERSONNEL) AS nbMatchsJoues
					FROM PHOTO INNER JOIN PERSONNEL
					ON PHOTO.id=PERSONNEL.id_PHOTO
					INNER JOIN NATIONALITE
					ON NATIONALITE.id=PERSONNEL.id_NATIONALITE
					INNER JOIN JOUEUR
					ON PERSONNEL.id=JOUEUR.id
					LEFT OUTER JOIN participe
					ON JOUEUR.id=participe.id_PERSONNEL
					INNER JOIN POSTE
					ON JOUEUR.id_POSTE=POSTE.id
					WHERE PERSONNEL.id = :id
					GROUP BY PERSONNEL.nom, prenom, dateNaiss, lieuNaiss, biographie, num, taille, poids, pied, venueClub, POSTE.libelle, NATIONALITE.libelle, lien";
			
			//je prépare ma requête
			$prep = $this->cx->prepare($req);
			
			//j'associe les paramètres
			$prep->bindValue(':id', $idJoueur, PDO::PARAM_STR);
			
			//j'exécute
			$prep->execute();
			
			//je rempli le curseur
			$curseur = $prep->fetchObject();
			return $curseur;
		}
	}
?>