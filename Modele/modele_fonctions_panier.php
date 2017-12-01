<?php
class PanierDAO{
	
////////////////////////////////////////////////////////////////////////
//////////////////////Fonction création du panier///////////////////////
////////////////////////////////////////////////////////////////////////
function creationPanier()
{
   //Si le panier n'existe pas alors on le crée
   if (!isset($_SESSION['panier']))
   {
     $_SESSION['panier']=array();
     $_SESSION['panier']['pdt_ref'] = array();
	 $_SESSION['panier']['taille'] = array();
     $_SESSION['panier']['quantite'] = array();
     $_SESSION['panier']['pdt_prix'] = array();
     $_SESSION['panier']['pdt_designation'] = array();
   }
   return true;
}

////////////////////////////////////////////////////////////////////////
//////////////////////Fonction Ajouter un article/////////////////////////
////////////////////////////////////////////////////////////////////////
function ajouterArticle($pdt_ref,$pdt_designation,$taille,$pdt_prix,$quantite,$creationPanier)
{
  //Si le panier existe
  if ($creationPanier)
  {
	 $existe=false;
     $nb=count($_SESSION['panier']['pdt_ref']);
	 for($i = 0; $i < $nb; $i++)
	 {
		 if($_SESSION['panier']['pdt_ref'][$i] == $pdt_ref && $_SESSION['panier']['taille'][$i] == $taille)
		 {
			 $_SESSION['panier']['quantite'][$i] += $quantite ;
			 $existe=true;
		 }
	 }
     
     //Si le produit existe déjà on ajoute seulement la quantité


     if($existe==false)
     {
      //Sinon on ajoute le produit
      //array_push permet d'ajouter une valeur après la dernière ligne d'un tableau
      array_push( $_SESSION['panier']['pdt_ref'],$pdt_ref);
      array_push( $_SESSION['panier']['pdt_designation'],$pdt_designation);
	  array_push( $_SESSION['panier']['taille'],$taille);
      array_push( $_SESSION['panier']['quantite'],$quantite);
      array_push( $_SESSION['panier']['pdt_prix'],$pdt_prix);
     }
   }
   else
   echo "Un problème est survenu lors de l'ajout au panier.";
}

////////////////////////////////////////////////////////////////////////
//////////////////////Fonction Supprimer un article////////////////////////
////////////////////////////////////////////////////////////////////////
function supprimerArticle($pdt_ref,$taille,$creationPanier)
{
   //Si le panier existe
   if ($creationPanier)
   {
     //Création d'un panier temporaire
     $tmp=array();
     $tmp['pdt_ref'] = array();
     $tmp['quantite'] = array();
	 $tmp['taille'] = array();
     $tmp['pdt_prix'] = array();
     $tmp['pdt_designation'] = array();
     // Parcours de tout les éléments du tableau
     for($i = 0; $i < count($_SESSION['panier']['pdt_ref']); $i++)
       {
         if ($_SESSION['panier']['pdt_ref'][$i] !== $pdt_ref || $_SESSION['panier']['taille'][$i] !== $taille)
         {
            array_push( $tmp['pdt_ref'],$_SESSION['panier']['pdt_ref'][$i]);
            array_push( $tmp['quantite'],$_SESSION['panier']['quantite'][$i]);
			array_push( $tmp['taille'],$_SESSION['panier']['taille'][$i]);
            array_push( $tmp['pdt_prix'],$_SESSION['panier']['pdt_prix'][$i]);
            array_push( $tmp['pdt_designation'],$_SESSION['panier']['pdt_designation'][$i]);
         }

       }
       //On remplace le panier en session par notre panier temporaire à jour
       $_SESSION['panier'] =  $tmp;
       //On efface notre panier temporaire
       unset($tmp);
   }
   else
   echo "Un problème est survenu lors de la supression de l'article.";
}


/////////////////////////////////////////////////////////////////////////
//////////////////////Fonction modifier quantite d' un article////////////////
////////////////////////////////////////////////////////////////////////
function modifierQTeArticle($pdt_designation,$quantite,$creationPanier)
{
	$tab=explode("&", $pdt_designation);
	$ref= $tab[0];
	$taille= $tab[1];
	$nb=count($_SESSION['panier']['pdt_ref']);
   //Si le panier éxiste
   if ($creationPanier)
   {
     //Si la quantité est positive on modifie sinon on supprime l'article
     if ($quantite > 0)
     {
		 for($i = 0; $i < $nb; $i++)
		 {
			 if($_SESSION['panier']['pdt_designation'][$i] == $ref && $_SESSION['panier']['taille'][$i] == $taille)
			 {
				 $_SESSION['panier']['quantite'][$i] = $quantite ;
			 }
		 }
     }
     else
	 {
	     for($i = 0; $i < $nb; $i++)
		 {
			 if($_SESSION['panier']['pdt_designation'][$i] == $ref && $_SESSION['panier']['taille'][$i] == $taille)
			 {
				 $this->supprimerArticle($_SESSION['panier']['pdt_ref'][$i], $taille, $creationPanier);
			 }
		 }
	 }
   }
   else
   echo "Un problème est survenu lors de la modification de l'article";
}

////////////////////////////////////////////////////////////////////////
//////////////////////Fonction Montant global/////////////////////////////
////////////////////////////////////////////////////////////////////////
function MontantGlobal()
{  
   $total=0;
   //On parcours le contenu du panier
   for($i = 0; $i < count($_SESSION['panier']['pdt_ref']); $i++)
   {
      //+= addition de deux valeurs et stocke le résultat dans la variable
      $total += ($_SESSION['panier']['quantite'][$i] * $_SESSION['panier']['pdt_prix'][$i]);
   }
   //Retourne le prix total
   if($total < 100){
		$total+=9.99;
   }
   return $total;
}

////////////////////////////////////////////////////////////////////////
//////////////////////Fonction Supprimer Panier///////////////////////////
////////////////////////////////////////////////////////////////////////
function supprimePanier()
{
   //détruit la variable de session panier
   unset($_SESSION['panier']);
}
}
?>