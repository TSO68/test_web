<?php
		require ("Modele/modele_staff.php");
		
		$s= new Staff();
		
		$lesStaffs=$s->readAll();

		include("Vue/vue_liste_staff.php");
?>	