<center>
    <div class="liste">
        <!--Contenu de la page-->
        <div id='content'>
			<h3 class="coord">Vous êtes inscrit sur notre site? Veuillez vous connecter ci-dessous<h3>
			<form action="index.php?do=connexionMembre&mem=true" method="POST">
				<div style="overflow-x:auto;">
					<table style="width:40%; border-collapse: separate; border-spacing: 30;">
						<tr>
							<td class="coord">E-mail : </td> <td><input type="text" class="form-control" name="login_connexion"></td>
						</tr>
						<tr>
							<td class="coord">Mot de passe :</td> <td><input type="password" class="form-control" name="pass_connexion"></td>
						</tr>
						<tr>
							<td colspan="2" align="right">
								<input type="submit" class="btn btn-default" class="form-control" value="Connexion" id="connexion" style="width: 25%; min-width: 100px;">
								<input type="reset" class="btn btn-default" value="Annuler" id="annuler" style="width: 20%; min-width: 70px;">
							</td>
						</tr>
						<tr>
							<td class="coord" colspan="2">Si vous n'êtes pas encore inscrit, cliquez <a style="color:#0ab3fc" href="index.php?do=inscription">ici</a></td>
						</tr>
					</table>
				</div>
			</form> 
		</div>
    </div>
</center>