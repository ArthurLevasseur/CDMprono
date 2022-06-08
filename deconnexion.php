<?php include 'top.php';?>
		
	<h2>Se déconnecter</h2>
		
	<p>Déconnexion réussie avec succès.</p>
	
	<?php
		session_destroy();
		setcookie('name', null, -1);
		setcookie('password', null, -1);
	?>
		
		
		
<?php include 'footer.php';?>