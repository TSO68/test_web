<HTML>
    <HEAD>
        <script type="text/javascript" src="JS/control_inscription.js"></script>
    </HEAD>
    
    <BODY>
		<center>
			<div class="liste">
				<h3 class="coord">Ajouter une recette :<h3>
				<form name="ajout" action="index.php?do=ajout&ins=true" method="POST">
					<div style="overflow-x:auto;">
						<table style="width:50%; border-collapse: separate; border-spacing: 30;" >
							<tr>
								<td class="coord">Nom :</td>
								<td><input type="text" class="form-control" name="nom" id="nom"></td>
							</tr>
					
							<tr>
								<td class="coord">Descriptif :</td>
								<td><textarea rows="10" cols="50" name="descriptif" id="descriptif"></textarea></td>
							</tr>
		
							<tr>
								<td class="coord">Difficulté :</td>
								<td><select name="difficulte" id="difficulte">
										<option value="Très facile">Très facile</option>
										<option value="Facile">Facile</option>
										<option value="Moyen">Moyen</option>
										<option value="Difficile">Difficile</option>
									</select></td>
							</tr>
		
							<tr>
								<td class="coord">Prix :</td>
								<td><select name="prix" id="prix">
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
									</select></td>
							</tr>
		
							<tr>
								<td class="coord">Nombre de personnes :</td>
								<td><input type="text" class="form-control" name="personnes" id="personnes"></td>
							</tr>
							
							<tr>
								<td class="coord">Durée de préparation :</td>
								<td><input type="text" class="form-control" name="preparation" id="preparation"></td>
							</tr>

							<tr>
								<td class="coord">Durée de cuisson :</td>
								<td><input type="text" class="form-control" name="cuisson" id="cuisson"></td>
							</tr>    
					
							<tr>
								<td colspan="2" align="right">
									<input type="submit" class="btn btn-default" value="Envoyer" id="envoyer" style="width: 25%; min-width: 80px;">
									<input type="reset" class="btn btn-default" value="Annuler" style="width: 15%; min-width: 65px;">
								</td>
							</tr>
						</table>
					</div>
				</form>
			</div>
		</center>
    </BODY>
</HTML>