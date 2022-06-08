<?php include 'top.php';?>
		
		<h2>Bienvenue</h2>
		
		
		<?php
		

			if ($_SESSION['statut'] >= 1) {
				
				echo '<p>Bienvenue !</p>';
			}
			
			else {
				
				echo '<p>Inscrivez-vous !</p>';
				
			}
			
			
			
		
		?>
		
		
		
<?php include 'footer.php';?>