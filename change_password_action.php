<?php include 'top.php';?>
		
	<h2>Modifier son profil</h2>
	
	<?php
	
	
		if ($_POST['password'] == $_POST['cpassword']) {
			
			$requete = "UPDATE users set password='".$_POST['password']."' where id = ".$id_user;
			$res = $database->exec($requete);
			
			echo "Votre mot de passe a bien été modifié. Vous allez devoir vous reconnecter.";
			
		}
		
		else {
			echo 'Votre mot de passe et sa confirmation ne sont pas identiques. <a href="change_password.php">Cliquez ici pour remodifier votre mot de passe</a>.';
		}
		
		
		
	
	?>
		
		
		
		
<?php include 'footer.php';?>