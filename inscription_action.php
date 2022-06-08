<?php include 'top.php';?>
		
	
	
	<?php
	
	// on vérifie si le pseudo est bien nouveau
	
	$requete = 'select * from users where name = "'.$_POST['name'].'"';
	$check = $database->query($requete);
	
	
	if ($check->fetch() == NULL ) {
		
		$requete = 'INSERT INTO users (name, password) VALUES ("'.$_POST['name'].'", "'.$_POST['password'].'")';
		//echo $requete;
		$res = $database->exec($requete);
		
		?>
			
			<h2>Inscription réussie !</h2>
			
			<p>Vous pouvez retourner à la <a href="index.php">page d'accueil</a>.</p>
			
			
			<?php
		
	}
	
	else {
		
		
		?>
			
			<h2>Echec</h2>
			
			<p>Ce pseudo est déjà utilisé.</p>
			<p><a href="inscription.php">Retour à la page d'inscription.</a></p>
			
			
			<?php
		
	}
	
	
	?>
		
		
		
<?php include 'footer.php';?>