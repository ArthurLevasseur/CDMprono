<?php include 'top.php';?>
		
	<h2>Profil</h2>
	
	<?php
	
		$requete = "SELECT users.name as pseudo, users.rank as rank FROM users where id = ".$id_user;
		$res = $database->query($requete);
		$profil = $res->fetch();
		
		echo "<h3>Informations principales</h3>";
		echo '<p><a href="change_profil.php">Modifier</a></p>';
		
		echo "<ul>";
		echo "<li><b>Pseudo</b> : {$profil['pseudo']}</li>";
		
		echo "<li><b>Rang</b> : ";
		if ($profil['rank'] == 1) {
			echo "Joueur</li>";
		}
		else if ($profil['rank'] == 3) {
			echo "Organisateur</li>";
		}
		
		
		
	
	?>
		
		
		
		
<?php include 'footer.php';?>