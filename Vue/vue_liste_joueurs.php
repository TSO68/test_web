<center>
		<?php
			$poste="";
			$tab=0;
			echo "<div class=\"liste\">";
			while($unJoueur=$lesJoueurs->fetch(PDO::FETCH_OBJ))
			{
				if( $unJoueur->libelle != $poste){
					if($tab>0){
						echo "</div>";
					}
					$poste=$unJoueur->libelle;
					if($poste=="Milieu de terrain"){
						$posteCorrige="Milieux de terrain";
					}
					else{
						$posteCorrige=$poste."s";
					}
					echo "<h1 style=\"color:#db1111; font-weight:700\">".$posteCorrige."</h1>
						<br>
						<div class=\"row\">";
					$tab=$tab+1;
				}
					echo "
							<div class=\"col-lg-4\">
								<a href=\"index.php?do=detail&idJoueur=".$unJoueur->id."\">
									<img class=\"img-circle\" src=".$unJoueur->lien.">
								</a>
								<h2 style=\"color:#db1111; font-weight:900\">".$unJoueur->num."</h2>
								<h3 style=\"color:#fff\">".$unJoueur->nom." ".$unJoueur->prenom."</h3>
								<br>
							</div>
					";
			}
			echo "</div>";
		?>
</center>