<HTML>
    <HEAD>
        <script type="text/javascript" src="JS/control_inscription.js"></script>
    </HEAD>
    
    <BODY>
		<center>
			<div class="liste">
				<h3 class="coord">Rechercher une recette :<h3>
				<form name="ajout" action="index.php?do=recherche&ins=true" method="POST">
					<div style="overflow-x:auto;">
						<table style="width:50%; border-collapse: separate; border-spacing: 30;" >
							<tr>
								<td class="coord">Nom :</td>
								<td><input type="text" class="form-control" name="recherche" id="recherche"></td>
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
			
			<?php
			if($_POST != null)
			{	
				echo "<div class=\"liste\">";
				while($uneRecette=$lesRecettes->fetch(PDO::FETCH_OBJ))
				{
						echo "
								<div class=\"col-lg-4\">
									<h3 style=\"color:#fff\">".$uneRecette->nom."</h3>
									<br>
								</div>
						";
				}
				echo "</div>";
			}
		?>
		</center>
    </BODY>
</HTML>