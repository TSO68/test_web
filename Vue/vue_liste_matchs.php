<center>
		<?php
		echo "<div class=\"liste\">
				<h2 style=\"color:#db1111; margin-right:4%; margin-left:4%\" align=\"left\">Calendrier : </h2>
				<div style=\"overflow-x:auto;\">
					<table style=\"width: 100%; border-collapse: separate; border-spacing: 50; color:#fff\">
						<tbody>
							<tr align=\"center\">
								<td>
									<h3 style=\"font-weight: 700;\">Date/heure/lieu du match<h3>
								</td>
								<td colspan=\"2\">
									<h3 style=\"font-weight: 700;\">Equipe à domicile<h3>
								</td>
								<td>
									<h3 style=\"font-weight: 700;\">Score<h3>
								</td>
								<td colspan=\"2\">
									<h3 style=\"font-weight: 700;\">Equipe à l'extérieur<h3>
								</td>
							</tr>";
			while($unMatch=$lesMatchs->fetch(PDO::FETCH_OBJ))
			{
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
					echo "<tr>
							<td>
								<p>Le ".$date[2]."/".$date[1]."/".$date[0]."</p>
								<p> à ".$heure[0]."h".$heure[1]."</p>
								<p>".$unMatch->libelle."</p>
							</td>";
					if($domicile=="RC Strasbourg Alsace"){
						echo"<td style=\"color:#0ab3fc;\">".$domicile."</td>";
					}
					else{
						echo"<td>".$domicile."</td>";
					}
					echo"
							<td>
								<img class=\"img-responsive\" width=100; heigth=100; src=\"".$logoDom."\"></img>
							</td>
							<td align=\"center\">".$unMatch->scoreDom." - ".$unMatch->scoreExt."</td>
							<td>
								<img class=\"img-responsive\" width=100; heigth=100; src=\"".$logoExt."\"></img>
							</td>";
					if($exterieur=="RC Strasbourg Alsace"){
						echo"<td style=\"color:#0ab3fc;\">".$exterieur."</td>";
					}
					else{
						echo"<td>".$exterieur."</td>";
					}
						echo"<td><p><a class=\"btn btn-default\" href=\"index.php?do=detailsMatch&idMatch=".$unMatch->id."\" role=\"button\">Détails</a></p></td>
						</tr>"
					;
			}
			echo"		</tbody>
					</table>
					</div>
				</div>";
		?>
</center>