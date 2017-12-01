<?php
	require("Modele/modele_fpdf.php");
	
	class FactureDAO extends FPDF{
		//attribut privé qui recevra une instance de la connexion
		private $cx;
		
		public function __construct(){
			require_once("Modele/modele_connexion_base.php");
			$this->cx = Connexion::getInstance();
			parent::__construct();
		}
		
		function Header()
		{
			// Requête SQL
			$req = "SELECT c.id, dateCommande, quantite, libelle, p.prix, p.nom, co.nom as nomClient, prenom, adresse, cp, ville 
					FROM COMMANDE c
					INNER JOIN ligneCmd l
					ON c.id=l.id_COMMANDE
					INNER JOIN PRODUIT p 
					ON l.id_PRODUIT=p.id
					INNER JOIN TAILLE t
					ON t.id=l.id_TAILLE
					INNER JOIN COMPTE co
					ON co.id=c.id_COMPTE
					WHERE c.id = '{$_GET['id']}'";
			//Exécution de la requête
			$uneFacture= $this->cx->query($req);
			
			// Logo
			$this->SetFont('Arial','B',25);
			$this->Image('Images/logo-racing-academy-2016.png',20,10,50);
			$this->text(80,37,'Merci pour votre achat!');

			// Police Arial gras 13
			$this->SetFont('Arial','B',13);

			$this->text(20,70,'Numéro de commande: '.$_GET['id']);
			$espace=0;
			$totalHorsFrais=0;
			$i=0;
			//On parcours le tableau des commande (mysql_fetch_array stock le résultat de la requête dans un tableau)
			while ($commandes = $uneFacture->fetch(PDO::FETCH_OBJ))
			{
			  $date= explode("-",$commandes->dateCommande);
			  $this->text(120,80,'Date : '.$date[2].'/'.$date[1].'/'.$date[0]);
			  $this->text(20,80,'Commande expédiée à :');
			  $this->text(20,90,utf8_decode($commandes->nomClient).' '.utf8_decode($commandes->prenom));
			  $this->text(20,100,utf8_decode($commandes->adresse));
			  $this->text(20,110,$commandes->cp.', '.utf8_decode($commandes->ville));
				if($i==0)
				{
				  $this->text(20,130,'Produit');
				  $this->text(120,130,'Taille');
				  $this->text(145,130,'Quantité');
				  $this->text(180,130,'Prix');
				  $i=$i+1;
				}
			
			  $this->text(20,140+$espace,utf8_decode($commandes->nom));
			  $this->text(122,140+$espace,$commandes->libelle);
			  $this->text(152,140+$espace,$commandes->quantite);
			  $this->text(180,140+$espace,$commandes->prix.' €');
			  $espace+=10;
			  $totalHorsFrais+=$commandes->quantite*$commandes->prix;
			}
			if($totalHorsFrais<100){
				$fdp='9.99 €';
				$total=$totalHorsFrais+$fdp;
			}
			else{
				$fdp="Offerts!";
				$total=$totalHorsFrais;
			}
			$this->text (150,150+$espace,'Prix TTC : '.$totalHorsFrais .' €');
			$this->text (150,160+$espace,'Frais de port : '.$fdp);
			$this->SetFont('Arial','B',16);
			$this->text (150,170+$espace,'Prix total : '.$total .' €');

		}

	}
?>