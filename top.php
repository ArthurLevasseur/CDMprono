<?php 

session_start();

include 'db.php';?>

<?php 


	if(isset($_COOKIE['name']) && isset($_COOKIE['password'])) {
		
		$requete = 'select id, name, password from users';
		$compareCookies = $database->query($requete);
		
		while($fCompareCookies = $compareCookies->fetch()) {
			if($_COOKIE['name'] == $fCompareCookies['name'] && $_COOKIE['password'] == $fCompareCookies['password']) {
				$_SESSION["name"] = $_COOKIE['name'];
				$_SESSION["password"] = $_COOKIE['password'];
			}
		}
		
		
	}

	if(!isset($_SESSION['name']) || !isset($_SESSION['password'])) {
		$_SESSION['statut'] = 0;
	}
	else {
		
		$requete = 'select id, rank from users where name = "'.$_SESSION['name'].'" and password = "'.$_SESSION['password'].'"';
		$idBF = $database->query($requete);
		$rqFetched = $idBF->fetchAll();
		$id_user = $rqFetched[0][0];
		$_SESSION['statut'] = $rqFetched[0][1];
		
		
		
	}
	
	//print_r($_SESSION);
	
	include 'autorisations.php';
	
?>

<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="HandheldFriendly" content="true" />
	<meta name="MobileOptimized" content="320" />
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no" />
	<title>Pronos CDM</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>

	<div class="container">
	
	<div class="banner"><img height=140 src="img/logo.png" /></div>

	
<?php include 'nav.php';?>