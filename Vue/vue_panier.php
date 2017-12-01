<?php
//On initialise erreur à false
$erreur = false;

$action = (isset($_POST['action'])? $_POST['action']:(isset($_GET['action'])? $_GET['action']:null ));

if($action !== null)
{  //si l'action n'est pas ajout, suppression ou refresh alors erreur = vrai 
	if(!in_array($action,array('ajout', 'suppression', 'delete', 'refresh'))){
		$erreur=true;
	}

   //récuperation des variables en POST ou GET
	$pdt_ref = (isset($_POST['pdt_ref'])? $_POST['pdt_ref']:  (isset($_GET['pdt_ref'])? $_GET['pdt_ref']:null )) ;
	$pdt_designation = (isset($_POST['pdt_designation'])? $_POST['pdt_designation']:  (isset($_GET['pdt_designation'])? $_GET['pdt_designation']:null )) ;
	$pdt_prix = (isset($_POST['pdt_prix'])? $_POST['pdt_prix']:  (isset($_GET['pdt_prix'])? $_GET['pdt_prix']:null )) ;
	$quantite = (isset($_POST['quantite'])? $_POST['quantite']:  (isset($_GET['quantite'])? $_GET['quantite']:null )) ;
	$taille = (isset($_POST['taille'])? $_POST['taille']:  (isset($_GET['taille'])? $_GET['taille']:null )) ;

   //Suppression des espaces verticaux
   $pdt_ref = preg_replace('#\v#', '',$pdt_ref);
   //On verifie que $pdt_prix soit un réel
   $pdt_prix = floatval($pdt_prix);
   
   //Redirection vers la page panier.php afin d'éviter les problèmes d'actualisation de la page lors de l'ajout d'un produit
   if($action=='ajout')
   {
		header("Location:index.php?do=panier");
   }
   //A ne surtout pas faire sinon on écrase le $_post !!
   // else {
		// header("Location:Panier.php");
	// }

}

?>
<center>
    <div class ='liste'>
        <div style="overflow-x:auto;">
        <!--Contenu de la page-->
                <form method="post" action="index.php?do=panier&action=refresh">
                    <!--Début table panier-->


                    <table style="width: 100%; border-collapse: separate; border-spacing: 50; color:#fff;">
                        <!--En tête de la table panier-->
                        <tr align="center">
                            <td><h3 style="font-weight: 700;">Produit</h3></td>
                            <td><h3 style="font-weight: 700;">Description</h3></td>
							<td><h3 style="font-weight: 700;">Taille</h3></td>
                            <td><h3 style="font-weight: 700;">Prix TTC</h3></td>
                            <td><h3 style="font-weight: 700;">Quantité</h3></td>
                            <td><h3 style="font-weight: 700;">Supprimer</h3></td>
                        </tr>
                    

                        <?php
                            // Si le panier existe
                            if ($creationPanier)
                            {	//On compte le nombre de références dans le panier et on le stock dans une variable
                                $nbArticles=count($_SESSION['panier']['pdt_ref']);
								//si le nombre d'article est inférieur ou égale à 0 alors on affiche que le panier est vide
                                if ($nbArticles <= 0)
                                  
                                   echo "<tr><td colspan='6' align=\"center\"><h4>Votre panier est vide </td></h4></tr>";
                                //sinon tout les produits du panier on affiche la référence, la description, le prix et la quantité  
                                else
                                {
                                    for ($i=0 ;$i < $nbArticles ; $i++)
                                    {
                                        echo "<tr align=\"center\">";
										echo "<td><img class=\"img-rounded\"src='".$_SESSION['panier']['pdt_ref'][$i]."' width='100px' /></ td>"; //référence du produit
                                        echo "<td><h4>".$_SESSION['panier']['pdt_designation'][$i]."</h4></td>"; //designation du produit
										echo "<td><h4>".$_SESSION['panier']['taille'][$i]."</h4></td>"; //taille du produit
                                        echo "<td><h4>".$_SESSION['panier']['pdt_prix'][$i]." €</h4></td>"; //affichage du prix du produit
                                        echo "<td><input class=\"form-control\" style=\"color: #333; width: 150px\" type='text' name='panier[".$_SESSION['panier']['pdt_designation'][$i]."&".$_SESSION['panier']['taille'][$i]."]' id='quantite' value='".$_SESSION['panier']['quantite'][$i]."'></td>"; //quantité du produit sélectionné
										
                                        //Permet la suppression d'un article du panier
										echo "
                                             <td>
                                                 <a href='index.php?do=panier&action=suppression&pdt_ref=".rawurlencode($_SESSION['panier']['pdt_ref'][$i])."&taille=".rawurlencode($_SESSION['panier']['taille'][$i])."'><img src='Images/supprimer.png'/></a>
                                             </td>
                                        ";
                                        echo "</tr>";
                                    }

                                    echo "<tr><td colspan=\"6\" align=\"right\">";
									//Frais de port fixe
									if(is_int ($MontantGlobal)){
										echo"<h3>Frais de port : Offerts !</h3>";
									}
									else{
										echo"<h3>Frais de port : 9,99 €</h3>";										
									}
                                    echo"</td></tr>";
									
                                    echo"<tr><td colspan=\"6\" align=\"right\">";
                                    //Affichage du montant total
                                    echo "<h2>Total : ".$MontantGlobal." €</h2>";
                                    echo "</td></tr>";
									//champ caché qui permettra de passer l'action refresh en post sur clic de recalculer
                                    echo "<input type=\"hidden\" name=\"action\" value=\"refresh\"/>";
                                    echo '';
            
                                }
 
                            }
                            
                            
                            //Si le nombre d'article est supérieur à 0 alors on affiche le bouton pour passer la commande
                            if ($nbArticles > 0)
                            {
								echo "<tr>
										<td colspan=\"2\">
											<a style=\"color:#fff\" href=\"index.php?do=boutique\"><h4><span class=\"glyphicon glyphicon-arrow-left\"></span>  Retour à la liste des produits</h4></a>
										</td>
										<td colspan=\"3\" align=\"right\">
											<input type='submit' class=\"btn btn-default\" name='recalculer' value='Recalculer'>
											</form>
										</td>
										<td>
											<form name='commande' action='index.php?do=traitementCommandes' method='POST'>
												<input style=\"margin-top:8%\" type='submit' class=\"btn btn-default\" name='commander' value='Passer la commande'>
											</form>
										</td>
									</tr>
									</table>";
                            }
							else{
								echo"</table>
									</form>";
							}								
                        ?>
        </div>
    </div>
</center>