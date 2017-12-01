<center>
	<div class="liste" align="left">
		<div class="col-md-6">
			<h3 style="color:#fff; margin-right:10%; margin-left:10%;">Si vous souhaitez prendre contact avec nous, voici nos coordonnées : </h3>
			<br>
			<h4 class="sous-titre">Adresse : </h4>
			<h4 class="coord">Lycée Camille See
			<br>42 avenue de l'Europe
			<br>68000 Colmar Cedex</h4>
			<br>
			<h4 class="sous-titre">Téléphone : </h4>
			<h4 class="coord">03 89 22 25 00</h4>
			<br>
			<h4 class="sous-titre">Fax : </h4>
			<h4 class="coord">03 89 79 59 34</h4>
			<br>
			<h4 class="sous-titre">Mail : </h4>
			<h4 class="coord">ce.0680008P@ac-strasbourg.fr</h4>
			<br>
			<h4 class="sous-titre">Site : </h4>
			<a href="http://www.lyc-see-colmar.ac-strasbourg.fr" style="color: #fff"><h4 class="coord" style="margin-bottom:3%;">http://www.lyc-see-colmar.ac-strasbourg.fr</h4></a>
		</div>
		<div class="col-md-6" align="left">
			<h4 class="sous-titre" style="margin-top:5%">Emplacement : </h4>
			<div id="googleMap" style="width:450px; height:400px; border-radius: 6px; margin-bottom:3%; margin-left:10%; margin-top:10%; margin-right:10%; max-width: 80%;"></div>
		</div>
		<script>
			function myMap() {
				var myLatlng = new google.maps.LatLng(48.0804425, 7.325748999999973);

				var mapProp= {
					zoom:15,
					center: myLatlng
				};
				
				var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
				
				var marker = new google.maps.Marker({
					position: myLatlng,
					title: 'Lycée Camille See'
				});
				marker.setMap(map);
			}
			
		</script>

		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAofwdDf5UQftH_1BJyfTyz00tnc9uwAAQ&callback=myMap"></script>
	</div>
</center>