<center>
	<div class="liste">
		<div class="row featurette">
			<div class="col-md-7" align="left">
				<h2 class="featurette-heading" style="color:#db1111; margin-left:2%">Un stade rempli d'histoire</h2>
				<p class="lead" style="color:#fff; text-align: justify; margin-left:2%; margin-right:2%">Le site du stade de la Meinau est utilisé pour y jouer au football depuis 1906, lorsque le club du FC Frankonia transforme progressivement la prairie du jardin Haemmerlé en terrain de football. À partir de 1914, le pré est utilisé par le FC Neudorf qui se renomme Racing Club de Strasbourg en 1919. La première tribune en bois est construite en 1921, année où le jardin prend le nom de stade de la Meinau. L'enceinte est rénovée en 1951 avant d'être complètement reconstruite en 1984.</p>
			</div>
			<div class="col-md-5">
				<br>
				<br>
				<img class="img-rounded" style="margin-left:10%; margin-right:10%; max-width: 80%;" src="http://perso.wanadoo.fr/demeraux.jerome/Cartes/Colombes.jpg" >
			</div>
		</div>
		<hr class="featurette-divider">
		<div class="row featurette">
			<div class="col-md-7 col-md-push-5" align="left">
				<h2 class="featurette-heading">Description</h2>
				<p class="lead" style="color:#fff; text-align: justify; margin-right:2%; margin-left:2%">Le stade possède une capacité de 29 320 places dont 24 320 assises. La Meinau est, en 2016, le seizième plus grand stade français au nombre de places proposées (quatorzième rang national des stades de football puisque Gerland et Chaban-Delmas sont désormais destinés au rugby). Principal équipement sportif de la ville, stade du RC Strasbourg, l'enceinte accueille ponctuellement d'autres évènements sportifs ou culturels. Le stade se situe dans le quartier de la Meinau aux bords du Krimmeri.</p>
			</div>
			<div class="col-md-5 col-md-pull-7">
				<br>
				<img class="img-rounded" height="280" width="382" style="margin-left:10%; margin-right:10%; max-width: 80%; height:auto;" src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/64/Stade_de_la_Meinau_-_Strasbourg_-_map-fr.svg/660px-Stade_de_la_Meinau_-_Strasbourg_-_map-fr.svg.png">
			</div>
      </div>
	  <hr class="featurette-divider">
	  <div class="row featurette">
			<div class="col-md-7" align="left">
				<h2 class="featurette-heading">Accès, desserte et transports</h2>
				<p class="lead" style="color:#fff; text-align: justify; margin-left:2%; margin-right:2%">Le stade est desservi par le réseau de bus de la Compagnie des transports strasbourgeois (CTS). Il est également accessible depuis l'arrêt "Krimmeri Stade de la Meinau" de la ligne A du réseau de tramway de la ville. De plus, la gare de Strasbourg-Krimmeri-Meinau, appartenant au réseau SNCF, est située à proximité du stade. En voiture, le stade est accessible depuis le réseau autoroutier par la sortie numéro 5 « Baggersee » de l'A35 et dispose d'un parking d'une capacité estimée à mille places de stationnement. Enfin, le stade se trouve à seize kilomètres de l'aéroport de Strasbourg Entzheim. </p>
			</div>
			<div class="col-md-5">
				<br>
				<br>
				<div id="googleMap" style="width:382px;height:280px; border-radius: 6px; margin-bottom:10%; margin-left:10%; margin-right:10%; max-width: 80%;"></div>
			</div>
		</div>

		<script>
			function myMap() {
				var myLatlng = new google.maps.LatLng(48.5599675, 7.754861399999982);

				var mapProp= {
					zoom:14,
					center: myLatlng
				};
				
				var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
				
				var marker = new google.maps.Marker({
					position: myLatlng,
					title: 'Stade de la Meinau'
				});
				marker.setMap(map);
			}
			
		</script>

		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAofwdDf5UQftH_1BJyfTyz00tnc9uwAAQ&callback=myMap"></script>
	</div>
</center>