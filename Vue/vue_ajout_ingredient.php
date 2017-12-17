<HTML>
    <HEAD>
        <script type="text/javascript" src="JS/control_inscription.js"></script>
    </HEAD>
    
    <BODY>
		<center>
			<div class="liste">
				<h3 class="coord">Ajouter un ingrédient à une recette :<h3>
				<form name="ajout" action="index.php?do=ajout_ingredient&ins=true" method="POST">
					<div style="overflow-x:auto;">
						<table style="width:50%; border-collapse: separate; border-spacing: 30;" >
							<tr>
								<td class="coord">Recette :</td>
								<?php
									echo '<select id="rec" name="rec">';
									while($uneRecette=$lesRecettes->fetch(PDO::FETCH_OBJ))
									{
										$id=$uneRecette->idRec;
										$nom=$uneRecette->lib;
										echo'<option value="'.$id.'">'.$nom.'</option>';
									}
									echo "</select>";
								?>
							</tr>
					
							<tr>
								<td class="coord">Ingrédient :</td>
								<?php
									echo '<select id="ingre" name="ingre">';
									while($unIngre=$lesIngredients->fetch(PDO::FETCH_OBJ))
									{
										$id=$unIngre->idIngre;
										$nom=$unIngre->nom;
										echo'<option value="'.$id.'">'.$nom.'</option>';
									}
									echo "</select>";
								?>
							</tr>
		
							<tr>
								<td class="coord">Quantité :</td>
								<td><input type="text" class="form-control" name="quantite" id="quantite"></td>
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