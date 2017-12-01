<?php
	require_once ("Modele/modele_staff.php");
	
	$s=new Staff();
	
	//Je récupère tous les objets
	$unStaff=$s->findById($_GET['idStaff']);
	
	if($unStaff != null){
	    //je passe la main à la vue
	    include("Vue/vue_detail_staff.php");
	}
	else
	{
		?>		
		<script type="text/javascript">
			alert('Le personnel du staff demandé n\'existe pas');
			window.history.back();
		</script>
		<?php
	}
?>