<?php
	include('api.inc.php'); 

	
	echo "<pre>";
	print_r(HaloStatus::getServerInfo("46.249.47.12","2332"));
	// print_r(HaloStatus::getRequest($fields)); 					// All Information
	// print_r(HaloStatus::getPlayers("46.249.47.12","2332")); 		// Player Information
	// print_r(HaloStatus::getTeamScore("46.249.47.12","2332")); 	// Team Information
	echo "</pre>";

?>
