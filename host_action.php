<?php include 'top.php';?>
		
	<h2>Panel host</h2>
	

	
		
		<?php
			
			if ($_POST['action_giveaway'] == 1) {
				$requete = "INSERT INTO advantages (name, description, holder, status) VALUES ('{$_POST['adv_name']}', '{$_POST['adv_desc']}', '{$_POST['contestant_giveaway']}', 1)";
				$contestant_list = $database->exec($requete);
			}
			
			if ($_POST['adv_place'] == 1) {
				$requete = "INSERT INTO advantages (name, description, holder, status) VALUES ('{$_POST['adv_name']}', '{$_POST['adv_desc']}', '{$_POST['room_choice']}', 0)";
				$contestant_list = $database->exec($requete);
			}
			
			if ($_POST['adv_remove'] == 1) {
				$requete = "DELETE FROM advantages where id = {$_POST['adv_name']}";
				$contestant_list = $database->exec($requete);
			}
			
			if ($_POST['create_room'] == 1) {
				$requete = 'INSERT INTO maze_rooms (name, content, fog) VALUES ("'.$_POST['room_name'].'", "'.$_POST['room_desc'].'", '.$_POST['fog'].')';
				$database->exec($requete);
			}
			
			if ($_POST['edit_room'] == 1) {
				$requete = "SELECT * from maze_rooms where id = ".$_POST['room_edit'];
				$room_info = $database->query($requete);
				$froom_info = $room_info->fetch();
				
				echo '<form action="host_action.php" method="post">';
				echo '<input type="hidden" id="edit_room" value="2" name="edit_room">';
				echo '<input type="hidden" id="room_id" value="'.$_POST['room_edit'].'" name="room_id">';
				echo '<label for="room_name">Nom de la pièce :</label>';
				echo '<input type="text" id="room_name" name="room_name" required maxlength="30" size="10" value="'.$froom_info['name'].'">';
				echo '<label for="room_desc">Contenu de la pièce :</label>';
				echo '<textarea id="room_desc" name="room_desc" rows="5" cols="33">'.$froom_info['content'].'</textarea>';
				
				
				echo '<fieldset>';

					echo '<input type="radio" id="nofog" name="fog" value="0">';
					echo '<label for="nofog">Pas de brouillard</label>';

					echo '<input type="radio" id="fog" name="fog" value="1">';
					echo '<label for="fog">Brouillard</label>';

				echo '</fieldset>';
				
				
				
				
				echo '<input type="submit" Value="Valider">';
				
			}
			
			if ($_POST['edit_room'] == 2) {
				$requete = $database->prepare("UPDATE maze_rooms SET name = :name, content = :content, fog = :fog where id = :id");
				$requete->bindParam(':name', $_POST['room_name']);
				$requete->bindParam(':content', $_POST['room_desc']);
				$requete->bindParam(':fog', $_POST['fog']);
				$requete->bindParam(':id', $_POST['room_id']);
				
				$requete->execute();
			}
			
			if ($_POST['room_remove'] == 1) {
				$requete = "DELETE FROM maze_rooms where id = {$_POST['room_name']}";
				$contestant_list = $database->exec($requete);
			}
			
			if ($_POST['connect_room'] == 1) {
				
				$porteA = $_POST['door'];
				
				if ($_POST['door'] == 'north_door') {
					$porteB = 'south_door';
				}
				else if ($_POST['door'] == 'south_door') {
					$porteB = 'north_door';
				}
				else if ($_POST['door'] == 'west_door') {
					$porteB = 'east_door';
				}
				else if ($_POST['door'] == 'east_door') {
					$porteB = 'west_door';
				}
				
				$requete = "UPDATE maze_rooms SET {$porteA} = {$_POST['room_connect2']} WHERE id = {$_POST['room_connect1']}";
				$database->exec($requete);
				
				$requete = "UPDATE maze_rooms SET {$porteB} = {$_POST['room_connect1']} WHERE id = {$_POST['room_connect2']}";
				$database->exec($requete);
			}
			
		?>
		
		
		
		
		
<?php include 'footer.php';?>