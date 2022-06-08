<?php

	$currentFile = basename($_SERVER["SCRIPT_NAME"], ".php");
	
	
	$forbiddenToGuestOnly = array("lab", "combine", "combine_action", "combine2", "combine3", "combinel", "getitem", "getitem_action", "maze");
	$forbiddenToUsersOnly = array("inscription", "inscription_action");
	$forbiddenToPlayersOnly = array("diary");
	$forbiddenExceptHosts = array("host");
	
	$forbid = false;
	
	if ($_SESSION['statut'] == 0) {
		foreach($forbiddenToGuestOnly as $value) {
		if ($value == $currentFile) {
			$forbid = true;
		}
	}
	}
	
	if ($_SESSION['statut'] >= 1) {
		foreach($forbiddenToUsersOnly as $value) {
		if ($value == $currentFile) {
			$forbid = true;
		}
	}
	} 
	
	
	if ($_SESSION['statut'] == 1) {
		foreach($forbiddenToPlayersOnly as $value) {	
		if ($value == $currentFile) {
			$forbid = true;
		}
	}
	} 
	
	if ($_SESSION['statut'] < 3) {
		foreach($forbiddenExceptHosts as $value) {	
		if ($value == $currentFile) {
			$forbid = true;
		}
	}
	}
	
	
	
	
	
	
	if ($forbid) {
		header("Location: 403.php");
	}
	
	
	
?>