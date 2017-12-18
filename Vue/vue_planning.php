<center>
		<?php
			echo "<div class=\"liste\">";
			while($unPlanning=$lesPlannings->fetch(PDO::FETCH_OBJ))
			{
					echo "
							<div class=\"col-lg-4\">
								<a href=\"index.php?do=plan&idPlanning=".$unPlanning->pidP."\">id</a>
								<h2 style=\"color:#db1111; font-weight:900\">".$unPlanning->dateDebut."</h2>
								<h3 style=\"color:#fff\">".$unPlanning->dateFin."</h3>
								<h3 style=\"color:#fff\">".$unPlanning->utilNom."</h3>
								<br>
							</div>
					";
			}
			echo "</div>";
		?>
</center>