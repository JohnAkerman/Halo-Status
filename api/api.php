<?php

	require_once '../script/QueryServer.class.php';
	require_once '../script/FlagDecoder.class.php';


	if (isset($_REQUEST['ip']) && isset($_REQUEST['port']) && isset($_REQUEST['apiType'])) {
		$ip = $_REQUEST['ip'];
		$port = $_REQUEST['port'];
		$apiType =$_REQUEST['apiType'];


		$buffer = " ";
		$query = new QueryServer($buffer, trim($ip), (int)$port, 1,1);

		if (($response = $query->runQuery()) !== false) {
		    $response['hostname'] = str_replace("", "", trim($response['hostname']));
		    
		    if ($apiType == "players") {
			    echo json_encode(array(
			    	"players" => $response['players']
			    ));		    	
		    } else
		    {
		    	 echo json_encode(array(
			    	"response" => $response
			    ));	
		    }

		} else {
		    echo json_encode(array(
		        "error" => $query->getError(),
		        "errorcode" => $query->getErrorCode())
		    );
		}
	} else {
		echo json_encode(array(
			'errors'	=> 'API requires both IP and PORT get variables'
		));
	}

?>