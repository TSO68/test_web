<!-------------- AFFICHAGE DU MENU -------------->
	<header>
		<center>
			<nav class="navbar navbar-inverse" style="display:inline-block; width: 62%; background-color:#0F7ED2;">
			  <div class="container-fluid">
				<div class="navbar-header">
				  <a class="navbar-brand" href="admin.php"><img src ='Images/logo-racing-academy-2016.png' style="position:relative; top:-15px; left:5px;" width='62px'/></a>
				</div>
				<ul class="nav navbar-nav">
				<li class="dropdown">
					<a class="dropdown-toggle" data-hover="dropdown" title="Recettes" href="#">&nbsp;Utilisateurs&nbsp;
					<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="admin.php?do=modif_utilisateur" title="Modifier utilisateur">&nbsp;Modifier&nbsp;</a></li>
							<li><a href="admin.php?do=sup_utilisateur" title="Supprimer utilisateur">&nbsp;Supprimer&nbsp;</a></li>
						</ul>
				</li>
				<li class="dropdown">
					<a class="dropdown-toggle" data-hover="dropdown" title="Recettes" href="#">&nbsp;Recettes&nbsp;
					<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="admin.php?do=modif_recette" title="Modifier recette">&nbsp;Modifier&nbsp;</a></li>
							<li><a href="admin.php?do=sup_recette" title="Supprimer recette">&nbsp;Supprimer&nbsp;</a></li>
						</ul>
				</li>
				<li class="dropdown">
					<a class="dropdown-toggle" data-hover="dropdown" title="Ingrédients" href="#">&nbsp;Ingrédients&nbsp;
					<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="admin.php?do=modif_ingredient" title="Modifier ingrédient">&nbsp;Modifier&nbsp;</a></li>
							<li><a href="admin.php?do=sup_ingredient" title="Supprimer ingrédient">&nbsp;Supprimer&nbsp;</a></li>
						</ul>
				</li>
			</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="admin.php?do=deconnexion_admin" title="Déconnexion"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Déconnexion&nbsp;</a></li>
				</ul>
			  </div>
			</nav>
		</center>
	</header>