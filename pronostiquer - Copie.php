<?php include 'top.php';?>

<?php include 'classes/game.php';?>

<h2>Pronostiquer</h2>

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