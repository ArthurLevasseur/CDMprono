<?php include 'top.php';?>
		
	<h2>Modifier son profil</h2>
	
	<?php
	
		$requete = "SELECT name FROM users WHERE id = ".$id_user;
		$res = $database->query($requete);
		$profil = $res->fetch();
		
		?>
		
			<form action="change_profil_action.php" method="post">
				<label for="name">Pseudo</label>
				<input type="text" name="name" id="name" value="<?php echo $profil[0]; ?>">
				<a href="change_password.php" >Modifier le mot de passe</a>
				<input type="submit" Value="Valider">
			</form>
		
		<?php
		
		
	
	?>
		
		
		
		
<?php include 'footer.php';?>