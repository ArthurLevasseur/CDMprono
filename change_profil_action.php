<?php include 'top.php';?>
		
	<h2>Modifier son profil</h2>
	
	<?php
	
		$requete = "UPDATE users set name='".$_POST['name']."' where id = ".$id_user;
		$res = $database->exec($requete);
		
		echo "Votre profil a bien été modifié. Vous allez devoir vous reconnecter.";
		
		
	
	?>
		
		
		
		
<?php include 'footer.php';?>