<?php include 'top.php';?>
		
	<h2>Panel host</h2>
	
	<h3>Sommaire</h3>
	
	<ul>
	<li><a href="#l-give-advantage">Ajouter un avantage à un joueur</a></li>
	<li><a href="#l-place-advantage">Placer un avantage dans une pièce</a></li>
	<li><a href="#l-remove-advantage">Supprimer un avantage</a></li>
	<li><a href="#l-create-room">Créer une pièce</a></li>
	<li><a href="#l-edit-room">Modifier une pièce</a></li>
	<li><a href="#l-connect-room">Relier deux pièces entre elles</a></li>
	<li><a href="#l-delete-room">Supprimer une pièce</a></li>
	
	</ul>
	
	<h3 id="l-give-advantage">Ajouter un avantage à un joueur</h3>
	
	<form action="host_action.php" method="post">
	
	
		<?php
		
			$requete = "select * from users where rank = 1";
			$contestant_list = $database->query($requete);
		
		?>
		
		<input type="hidden" id="action_giveaway" value="1" name="action_giveaway">
		<label for="contestant_choice">Candidat :</label>

		<select name="contestant_giveaway" id="contestant_choice" required>
			<option value="">--Choisissez un candidat--</option>
			
			<?php
			
				while ($contestant = $contestant_list->fetch()) {
					echo "<option value='{$contestant['id']}'>{$contestant['name']}</option>";
				}
			
			?>
			
		</select>

		<label for="adv_name">Nom de l'avantage :</label>
		<input type="text" id="adv_name" name="adv_name" required maxlength="15" size="10">
		
		<label for="adv_desc">Description de l'avantage :</label>
		<textarea id="adv_desc" name="adv_desc" rows="5" cols="33"></textarea>
			
		<input type="submit" Value="Valider">
	
	</form>
	
	
	<h3 id="l-place-advantage">Poser un avantage dans une pièce</h3>
	
	<form action="host_action.php" method="post">
	
	
		<?php
		
			$requete = "select * from maze_rooms";
			$contestant_list = $database->query($requete);
		
		?>
		
		<input type="hidden" id="adv_place" value="1" name="adv_place">
		<label for="room_choice">Pièce :</label>

		<select name="room_choice" id="room_choice" required>
			<option value="">--Choisissez une pièce--</option>
			
			<?php
			
				while ($contestant = $contestant_list->fetch()) {
					echo "<option value='{$contestant['id']}'>{$contestant['name']}</option>";
				}
			
			?>
			
		</select>

		<label for="adv_name">Nom de l'avantage :</label>
		<input type="text" id="adv_name" name="adv_name" required maxlength="15" size="10">
		
		<label for="adv_desc">Description de l'avantage :</label>
		<textarea id="adv_desc" name="adv_desc" rows="5" cols="33"></textarea>
			
		<input type="submit" Value="Valider">
	
	</form>
	
	<h3 id="l-delete-advantage">Supprimer un avantage</h3>
	
	<form action="host_action.php" method="post">
	
	
		<?php
		
			$requete = "select * from advantages";
			$contestant_list = $database->query($requete);
		
		?>
		
		<input type="hidden" id="adv_remove" value="1" name="adv_remove">
		<label for="adv_name">Avantage :</label>

		<select name="adv_name" id="adv_name" required>
			<option value="">--Choisissez une pièce--</option>
			
			<?php
			
				while ($contestant = $contestant_list->fetch()) {
					echo "<option value='{$contestant['id']}'>{$contestant['name']}</option>";
				}
			
			?>
			
		</select>
			
		<input type="submit" Value="Valider">
	
	</form>
		
	<h3 id="l-create-room">Créer une pièce</h3>
	
	<form action="host_action.php" method="post">
		
		<input type="hidden" id="create_room" value="1" name="create_room">
		<label for="room_name">Nom de la pièce</label>
		<input type="text" id="room_name" name="room_name" required maxlength="30" size="10">
		<label for="room_desc">Description de la pièce :</label>
		<textarea id="room_desc" name="room_desc" rows="5" cols="33"></textarea>
		
		<fieldset>

			<input type="radio" id="nofog" name="fog" value="0">
			<label for="nofog">Pas de brouillard</label>

			<input type="radio" id="fog" name="fog" value="1">
			<label for="fog">Brouillard</label>

		</fieldset>

			
		<input type="submit" Value="Valider">
	
	</form>
	
	<h3 id="l-edit-room">Modifier une pièce</h3>
	
	<form action="host_action.php" method="post">
	
		<?php
		
			$requete = "select * from maze_rooms";
			$contestant_list = $database->query($requete);
		
		?>
		
		<input type="hidden" id="edit_room" value="1" name="edit_room">
		<label for="room_edit">Pièce à modifier :</label>

		<select name="room_edit" id="room_edit" required>
			<option value="">--Choisissez une pièce--</option>
			
			<?php
			
				while ($contestant = $contestant_list->fetch()) {
					echo "<option value='{$contestant['id']}'>{$contestant['name']}</option>";
				}
			
			?>
			
		</select>
			
		<input type="submit" Value="Valider">
	
	</form>
	
	<h3 id="l-connect-room">Relier deux pièces</h3>
	
	<form action="host_action.php" method="post">
	
		<?php
		
			$requete = "select * from maze_rooms";
			$room_list = $database->query($requete);
		
		?>
		
		<input type="hidden" id="connect_room" value="1" name="connect_room">
		
		
		<label for="room_connect1">Pièce de départ :</label>
		<select name="room_connect1" id="room_connect1" required>
			<option value="">--Choisissez une pièce--</option>
			
			<?php
			
				while ($room = $room_list->fetch()) {
					echo "<option value='{$room['id']}'>{$room['name']}</option>";
				}
			
			?>			
		</select>
		
		<?php
		
			$requete = "select * from maze_rooms";
			$room_list = $database->query($requete);
		
		?>
		
		<label for="room_connect2">Pièce d'arrivée :</label>
		<select name="room_connect2" id="room_connect2" required>
			<option value="">--Choisissez une pièce--</option>
			
			<?php
			
				while ($room = $room_list->fetch()) {
					echo "<option value='{$room['id']}'>{$room['name']}</option>";
				}
			
			?>			
		</select>
		
		<fieldset>

			<input type="radio" id="north_door" name="door" value="north_door">
			<label for="north_door">Nord -> Sud</label>
			
			<input type="radio" id="south_door" name="door" value="south_door">
			<label for="south_door">Sud -> Nord</label>
			
			<input type="radio" id="west_door" name="door" value="west_door">
			<label for="west_door">Ouest -> Est</label>
			
			<input type="radio" id="east_door" name="door" value="east_door">
			<label for="east_door">Est -> Ouest</label>

		</fieldset>
		
		<input type="submit" Value="Valider">	
	
	</form>
	
	<h3 id="l-delete-room">Supprimer une pièce</h3>
	
	<form action="host_action.php" method="post">
	
	
		<?php
		
			$requete = "select * from maze_rooms";
			$room_list = $database->query($requete);
		
		?>
		
		<input type="hidden" id="room_remove" value="1" name="room_remove">
		<label for="room_name">Pièce :</label>

		<select name="room_name" id="room_name" required>
			<option value="">--Choisissez une pièce--</option>
			
			<?php
			
				while ($room = $room_list->fetch()) {
					echo "<option value='{$room['id']}'>{$room['name']}</option>";
				}
			
			?>
			
		</select>
			
		<input type="submit" Value="Valider">
		
		
		
<?php include 'footer.php';?>