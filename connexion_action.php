<?php 

if (isset($_POST['remember'])) {
	
	setcookie("name", $_POST['name'], time()+7*24*60*60);
	setcookie("password", $_POST['password'], time()+7*24*60*60);
	
}


include 'top.php';?>
		
	
	
	<?php
		
		$requete = 'select * from users where name = "'.$_POST['name'].'"';
		$getUser = $database->query($requete);
		
		$fGetUser = $getUser->fetch();
		
		if ($fGetUser['password'] === $_POST['password']) {
			
			?>
			
			<h2>Connexion réussie !</h2>
			
			<p>Vous pouvez retourner à la <a href="index.php">page d'accueil</a>.</p>
			
			
			<?php
			
			$_SESSION["name"] = $_POST['name'];
			$_SESSION["password"] = $_POST['password'];
			
			
		}
		
		else {
			
			?>
			
			<h2>Echec</h2>
			
			<p>L'utilisateur n'existe pas ou le mot de passe est incorrect.</p>
			<p><a href="connexion.php">Retour à la page de connexion.</a></p>
			
			
			<?php
			
		}
	
	?>
		
		
		
<?php include 'footer.php';?>