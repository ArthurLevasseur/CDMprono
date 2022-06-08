<?php include 'top.php';?>

<?php include 'classes/game.php';?>

<h2>Pronostiquer</h2>



<?php

	if (!empty($_POST)) {
		
		foreach($_POST as $key => $value) {
			
			$idGame = substr($key, 5);
			$idWinner = $value;
			
			$requete = "SELECT id FROM pronos where user = {$id_user} and game = {$idGame}";
			$check = $database->query($requete);
			$fCheck = $check->fetch();
			
			
			if (empty($fCheck)) {
				$requete = "INSERT INTO pronos (user, game, winner) VALUES ({$id_user}, {$idGame}, {$idWinner})";
				$database->exec($requete);
				echo '<p>Pronostic ajouté !</p>';
			}
			
			else {
				$requete = "UPDATE pronos SET winner = {$idWinner} WHERE user = {$id_user} AND game = {$idGame}";
				$database->exec($requete);
				echo '<p>Pronostic modifié !</p>';
			}
			
			
			
		}
		
	}

?>

<?php

	
	$requete = "SELECT * FROM matches where competition = 1";
	$res = $database->query($requete);
	
	$matchArray = array();
	$i = 0;
	
	while ($fRes = $res->fetch()) {
		
		
		$matchArray[$i] = new Game();
		$matchArray[$i]->generate($fRes['id']);
		$matchArray[$i]->display();
		
		$i++;
		
	}

?>


<?php include 'footer.php';?>