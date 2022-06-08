<?php include 'top.php';?>
		
	<h2>Se connecter</h2>
		
	<form action="connexion_action.php" method="post" class="form-example">
	
		<label for="name">Pseudo</label>
		<input type="text" id="name" name="name" required minlength="2" maxlength="15" size="10">
		<label for="password">Mot de passe</label>
		<input type="password" id="password" name="password" required minlength="2" maxlength="15" size="10">
		<label for="remember">Retenir mon mot de passe (expire au bout de deux semaines) <input type="checkbox" id="remember" name="remember" value="remember"></label>
		
		<input type="submit" value="Choisir">
	</form>	
		
		
		
<?php include 'footer.php';?>