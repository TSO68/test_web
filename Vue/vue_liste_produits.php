<center>
		<?php
		echo "<div class=\"liste\">
					<div class=\"row\"><br>";
			while($unProduit=$lesProduits->fetch(PDO::FETCH_OBJ))
			{
					echo "<div class=\"col-lg-3\">
								<a href=\"index.php?do=detailProduit&idProduit=".$unProduit->id."\">
									<img class=\"img-circle\" style=\"max-width: 80%; height:auto;\" height=\"200\" width=\"200\" src=".$unProduit->lien.">
								</a>
								<h3 style=\"color:#fff\">".$unProduit->nom."</h3>
								<h4 style=\"color:#db1111\">".$unProduit->prix." €</h4>
								<br>
						</div>
					";
			}
			echo"	</div>
				</div>";
		?>
</center>