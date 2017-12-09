<center>
		<?php
			echo "<div class=\"liste\">";
			echo '<select id="util" name="util">';
			while($unUser=$lesUsers->fetch(PDO::FETCH_OBJ))
			{
				$id=$unUser->idUtil;
				$prenom=$unUser->prenom;
				$nom=$unUser->nom;
				echo'<option value="'.$id.'">'.$prenom.' '.$nom.'</option>';
			}
			echo "</select>";
		?>
		</br>
		<tr>
			<td colspan="2" align="right">
				<input type="submit" class="btn btn-default" value="Supprimer" id="envoyer" onclick="return confirm(\'Etes vous sûr de vouloir supprimer cet utilisateur ?\')" style="width: 25%; min-width: 80px;">
			</td>
		</tr>
</center>
