<?php session_start(); ?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administration du projet-recettes.tk</title>
<link rel="stylesheet" href="../css/modif.css">
</head>

<?php 
//Teste si c'est bien l'administrateur qui est enregistré 
		if ((isset($_SESSION['loginadmin'])) && (!empty($_SESSION['loginadmin']))){
	 
		}else{ header("Location:../admin.php");}
		
?>

<body>
		<div class="liste">
			<form name="modifutil" id="modifutil" method="POST" >
			<h1>Modification utilisateur</h1>
			<p>
			<label for="util">Prénom et Nom de l'utilisateur</label>
			<?php
				echo '<select id="util" name="util">';
				while($unUser=$lesUsers->fetch(PDO::FETCH_OBJ))
				{
					$id=$unUser->idUtil;
					$prenom=$unUser->prenom;
					$nom=$unUser->nom;
					echo'<option value="'.$id.'">'.$prenom.' '.$nom.'</option>';
				}
				echo "</select>";
				echo '<label for="prenom_modif">Prénom</label>
					<input type="text" class="form-control" id="prenom_modif" name="prenom_modif"/>
					
					<label for="nom_modif">Nom</label>
					<input type="text" class="form-control" id="nom_modif" name="nom_modif"/>
					
					<label for="login_modif">Login</label>
					<input type="text" class="form-control" id="login_modif" name="login_modif"/>
					
					<label for="mail_modif">E-mail</label>
					<input type="email" class="form-control" id="mail_modif" name="mail_modif"/>
					
					<label for="mdp_modif">Mot de passe</label>
					<input type="password" class="form-control" id="mdp_modif" name="mdp_modif"/>';
			?>
			<p>
				<input type="submit" class="btn btn-default" value="Modifier" id="envoyer" />
			</p>
	
			<p>
			<a href="../admin.php" title="">Page d'accueil administration</a>
			</form>
		</div>
</body>