<?php
	include('api.inc.php'); 

	$request =  str_replace("/halo-status/api/", "", $_SERVER['REQUEST_URI']);
	$param = explode("/", $request);

	$fields = array(
        'ip' => urlencode($param[0]),
        'port' => urlencode($param[1]),
        'apiType' => urlencode($param[2])
    );
	
	echo "<pre>";
	print_r(HaloStatus::getRequest($fields));
	echo "</pre>";

?>
