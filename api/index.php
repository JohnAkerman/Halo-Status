<?php
	include('api.inc.php'); 

	//$request =  str_replace("/halo-status/api/", "", $_SERVER['REQUEST_URI']);
	$request =  str_replace("/api/", "", $_SERVER['REQUEST_URI']);
	$param = explode("/", trim($request));

	if (count($param) < 3) {
		echo "Error, please make sure you have IP and Port specified.";
		die();
	}
	$fields = array(
        'ip' => urlencode($param[0]),
        'port' => urlencode($param[1]),
        'apiType' => urlencode($param[2])
    );
	
	echo "<pre>";
	print_r(HaloStatus::getRequest($fields));
	echo "</pre>";

?>
