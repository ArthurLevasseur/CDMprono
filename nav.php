<nav><ul>
	<li><a href="index.php">Accueil</a></li>
	
	<?php 
	
	if ($_SESSION['statut'] == 0) {
		
		?>
			
			<li><a href="inscription.php">S'inscrire</a></li>
			<li><a href="connexion.php">Se connecter</a></li>
		
		<?php
		
	}
	
	else if ($_SESSION['statut'] >= 1) {
		
		?>
			<li><a href="pronostiquer.php">Pronostiquer</a></li>
			
		<?php
		
	}
	
	
	
	if ($_SESSION['statut'] >= 2) {
		?>
		
			<li><a href="entrer.php">Entrer résultats</a></li>
		
		<?php
	}
	
	
	if ($_SESSION['statut'] >= 1) {
		?>
		
			<li><a href="profil.php">Profil</a></li>		
			<li><a href="deconnexion.php">Se déconnecter</a></li>
		
		<?php
	}
	
	?>
	
	
</ul>
</nav>