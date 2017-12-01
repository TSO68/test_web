<center>
		<?php
		$i=0;
		echo "<div class=\"liste\">
				<h2 style=\"color:#db1111; margin-right:4%; margin-left:4%\" align=\"left\">Détails du match : </h2>
				<div class=\"row\">";
			while($unMatch=$lesMatchs->fetch(PDO::FETCH_OBJ))
			{
					$resume="";
					$date= explode("-",$unMatch->dateMatch);
					$heure=explode(":",$unMatch->heure);
					if($unMatch->exterieurON==1){
						$domicile=$unMatch->adversaire;
						$exterieur="RC Strasbourg Alsace";
						$logoExt="https://upload.wikimedia.org/wikipedia/fr/thumb/1/1a/Racing_Club_de_Strasbourg.svg/1024px-Racing_Club_de_Strasbourg.svg.png";
						$logoDom=$unMatch->logo;
					}
					else{
						$domicile="RC Strasbourg Alsace";
						$exterieur=$unMatch->adversaire;
						$logoExt=$unMatch->logo;
						$logoDom="https://upload.wikimedia.org/wikipedia/fr/thumb/1/1a/Racing_Club_de_Strasbourg.svg/1024px-Racing_Club_de_Strasbourg.svg.png";
					}
					if($i==0){
						echo"
						<div class=\"col-lg-12\" style=\"color:#fff; text-align: justify;\">
							<div style=\"margin-right:4%; margin-left:4%\" >
								<h3>Date : ".$date[2]."/".$date[1]."/".$date[0]."</h3>
								<h3>Heure : ".$heure[0]."h".$heure[1]."</h3>
								<h3>Stade : ".$unMatch->libelle."</h3>
							</div>
						</div>
						<div class=\"col-lg-12\" style=\"color:#fff; text-align: justify;\">
							<h3 style=\"margin-right:4%; margin-left:4%\">Résultat : </h3>
							<div style=\"overflow-x:auto;\">
							<table style=\"width: 100%; border-collapse: separate; border-spacing: 100; color:#fff\">
								<tbody>
									<tr>";	
							if($domicile=="RC Strasbourg Alsace"){
								echo"<td style=\"color:#0ab3fc;\"><h4>".$domicile."</h4></td>";
							}
							else{
								echo"<td><h4>".$domicile."</h4></td>";
							}
							echo"
									<td>
										<img class=\"img-responsive\" width=100; heigth=100; src=\"".$logoDom."\"></img>
									</td>
									<td align=\"center\" style=\"min-width: 50px\"><h3>".$unMatch->scoreDom." - ".$unMatch->scoreExt."</h3></td>
									<td>
										<img class=\"img-responsive\" width=100; heigth=100; src=\"".$logoExt."\"></img>
									</td>";
							if($exterieur=="RC Strasbourg Alsace"){
								echo"<td style=\"color:#0ab3fc;\"><h4>".$exterieur."</h4></td>";
							}
							else{
								echo"<td><h4>".$exterieur."</h4></td>";
							}
							echo"	</tr>
								</tbody>
							</table>
						</div>
						</div>
						<div class=\"col-lg-12\" style=\"color:#fff; text-align: justify;\">
						<div style=\"overflow-x:auto;\">
							<table style=\"width: 100%; border-collapse: separate; border-spacing: 40; color:#fff\">
								<tbody>
									<tr>
										<td>
											<h3>Statistiques de nos joueurs : </h3>
										</td>
									</tr>
							";
					}
					echo"<tr>";
					$resume=$unMatch->minutesJouees." minutes jouées";
					if($unMatch->butMarques != 0){
						if($unMatch->butMarques>1){
							$resume=$resume.", ".$unMatch->butMarques." buts inscrits";
						}
						else{
							$resume=$resume.", ".$unMatch->butMarques." but inscrit";
						}
					}
					if($unMatch->passeDecisives != 0){
						if($unMatch->passeDecisives>1){
							$resume=$resume.", ".$unMatch->passeDecisives." passes décisives";
						}
						else{
							$resume=$resume.", ".$unMatch->passeDecisives." passe décisive";
						}
					}
					if($unMatch->cartonJauneON != 0){
						$resume=$resume.", ".$unMatch->cartonJauneON." carton jaune";
					}
					if($unMatch->cartonRougeON != 0){
						$resume=$resume.", ".$unMatch->cartonRougeON." carton rouge";
					}
					echo"<td>
							<h4><a href=\"index.php?do=detail&idJoueur=".$unMatch->idPersonnel."\" style=\"color: #fff\">".$unMatch->nom." ".$unMatch->prenom."</a> : ".$resume."</h4>
						</td>";
					echo"</tr>";
					
				$i=$i+1;
			}
			echo"			</tr>
						</tbody>
					</table>
					</div>
				</div>
			</div>";
		?>
</center>