<center>
		<?php
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
		?>
</center>