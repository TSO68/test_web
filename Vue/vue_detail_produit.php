<center>
		<?php
		$i=0;
		echo "<div class=\"liste\">
					<div class=\"row\"><br>";
			while($unProduit=$lesProduits->fetch(PDO::FETCH_OBJ))
			{
				if($i==0){
					echo "<div class=\"col-lg-6\">
								<br>
								<img class=\"img-rounded\" height=\"392\" width=\"392\" style=\"max-width: 80%; height:auto;\" src=".$unProduit->lien.">
								<br>
						</div>
						<div class=\"col-lg-6\" align=\"left\">
							<div style=\"margin-left:10%; margin-right:10%;\">
								<h3 style=\"color:fff\">".$unProduit->nom."</h3>
								<h3 style=\"color:fff\">Prix : ".$unProduit->prix." € </h3>
								<h3 style=\"color:fff\">Description : <br>".$unProduit->description."</h3>
								<h3 style=\"color:fff\">Sélectionnez votre taille : </h3>
								<select id=\"taille\" class=\"selectpicker show-tick\" data-width=\"100px\">
					";
					$lien= "index.php?do=panier&action=ajout&pdt_ref=".$unProduit->lien."&pdt_designation=".$unProduit->nom."&pdt_prix=".$unProduit->prix;
				}
				echo "		<option value=".$unProduit->libelle.">".$unProduit->libelle."</option>";
				$i=$i+1;
			}
			$nb=1;
			echo"					</select>
								<h3 style=\"color:fff\">Quantité : </h3>
								<select name=\"qte\" id=\"qte\" class=\"selectpicker show-tick\" data-width=\"100px\" data-dropup-auto=\"false\">";
								while($nb != 11){
									echo"
											<option value=".$nb.">".$nb."</option>
										";
										$nb=$nb+1;
								}
			echo"				</select>
								<br>
								<br>
								<a type=\"button\" class=\"btn btn-default btn-lg\" onclick=\"myFunction()\">
								  <span class=\"glyphicon glyphicon-shopping-cart\"></span> Ajouter au panier
								</a>
							</div>
							<br>
						</div>
					</div>
				</div>";
		?>
</center>
<?php
if(isset($_SESSION['login']))
	{
?>
	<script type="text/javascript">
	function myFunction() {
		var msg='<?PHP echo $lien;?>';
		var e = document.getElementById("taille");
		var taille = e.options[e.selectedIndex].value;
		var a = document.getElementById("qte");
		var qte = a.options[a.selectedIndex].value;
		msg=msg+"&quantite="+qte+"&taille="+taille;
		document.location.href=msg;
	}
	</script>
<?php
	}
	else{
?>
		<script type="text/javascript">
		function myFunction() {
			alert('Vous devez être connecté afin de réaliser cette opération!');
		}
		</script>
<?php
	}
?>