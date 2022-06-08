<?php include 'top.php';?>
		
	<h2>Modifier son profil</h2>
	
	
		
			<form action="change_password_action.php" method="post">
				<label for="password">Mot de passe</label>
				<input type="password" name="password" id="password">
				<label for="cpassword">Confirmer le mot de passe</label>
				<input type="password" name="cpassword" id="cpassword">
				<input type="submit" Value="Valider">
			</form>
		
		
		
		
<?php include 'footer.php';?>