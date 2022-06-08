<?php include 'top.php';?>
		
	<h2>S'inscrire</h2>
		
	<form action="inscription_action.php" method="post" class="form-example">
	
		<label for="name">Pseudo</label>
		<input type="text" id="name" name="name" required minlength="2" maxlength="15" size="10">
		<label for="password">Mot de passe</label>
		<input type="password" id="password" name="password" required minlength="2" maxlength="15" size="10">
		<input type="submit" value="Choisir">
	</form>	
		
		
		
<?php include 'footer.php';?>