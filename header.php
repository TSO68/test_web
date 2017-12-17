<!-------------- AFFICHAGE DU MENU -------------->
<?php

    //Si l'utilisateur n'est pas connecté on affiche le menu complet
    if(!isset($_SESSION['login']))
    {
		include('Menu.php');
    }
    //Sinon l'utilisateur est connecté, on supprime l'accès a la page inscription
	else
	{
	?>
	<header>
		<center>
			<nav class="navbar navbar-inverse" style="display:inline-block; width: 62%; background-color:#0F7ED2;">
			  <div class="container-fluid">
				<div class="navbar-header">
				  <a class="navbar-brand" href="index.php"><img src ='Images/logo-racing-academy-2016.png' style="position:relative; top:-15px; left:5px;" width='62px'/></a>
				</div>
				<ul class="nav navbar-nav">
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" title="Recettes" href="#">&nbsp;Recettes&nbsp;
						<span class="caret"></span></a>
							<ul class="dropdown-menu">
							  <li><a href="index.php?do=recettes" title="Liste">&nbsp;Liste des recettes&nbsp;</a></li>
							  <li><a href="index.php?do=recherche" title="Recherche">&nbsp;Rechercher une recette&nbsp;</a></li>
							  <li><a href="index.php?do=ajout" title="Ajouter">&nbsp;Ajouter une recette&nbsp;</a></li>
							  <li><a href="index.php?do=ajout_ingredient" title="Ajouter ingrédient">&nbsp;Ajouter un ingrédient à une recette&nbsp;</a></li>
							</ul>
					</li>
					<li><a href="index.php?do=planning" title="Planning">&nbsp;Planning&nbsp;</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="admin.htm" title="Administration">&nbsp;Administration&nbsp;</a></li>
					<li><a href="index.php?do=compte" title="Compte"> <span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;Mon compte&nbsp;</a></li>
					<li><a href="index.php?do=deconnexion" title="Déconnexion"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Déconnexion&nbsp;</a></li>
				</ul>
			  </div>
			</nav>
		</center>
	</header>
	<?php
	}
?>