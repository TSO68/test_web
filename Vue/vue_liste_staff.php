<center>
		<?php
		echo "<div class=\"liste\">
					<div class=\"row\"><br>";
			while($unStaff=$lesStaffs->fetch(PDO::FETCH_OBJ))
			{
					echo "<div class=\"col-lg-4\">
								<a href=\"index.php?do=detailStaff&idStaff=".$unStaff->id."\">
									<img class=\"img-circle\" height=\"200\" width=\"140\" src=".$unStaff->lien.">
								</a>
								<h3 style=\"color:#fff\">".$unStaff->nom." ".$unStaff->prenom." <br>".$unStaff->libelle."</h3>
								<br>
						</div>
					";
			}
			echo"	</div>
				</div>";
		?>
</center>