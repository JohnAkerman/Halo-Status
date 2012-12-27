<?php

	require_once '../script/QueryServer.class.php';
	require_once '../script/FlagDecoder.class.php';

	header('Content-type: application/json');


	if (isset($_REQUEST['ip']) && isset($_REQUEST['port']) && isset($_REQUEST['apiType'])) {
		$ip = $_REQUEST['ip'];
		$port = $_REQUEST['port'];
		$apiType = $_REQUEST['apiType'];

		$buffer = " ";
		$query = new QueryServer($buffer, trim($ip), (int)$port, 5,1);

		if (($response = $query->runQuery()) !== false) {
		    $response['hostname'] = str_replace("", "", trim($response['hostname']));
		    switch ($apiType) {
		    	case "all":
		    		echo json_encode(array(
				    	"response" => $response
				  	  ));	
		    		break;
		    	case "players":
		    		 echo json_encode(array(
				    	"players" => $response['players']
				    ));		
		    		break;

		    	case "server_name":
			    	echo json_encode(array(
						"server_name" => $response['hostname']
					));	
			    	break;
			    case "server_info":
			    	echo json_encode(array(
						"server_name" => $response['hostname'],
						"server_version" => $response['gamever'],
						"server_maxplayers" => $response['maxplayers'],
						"server_numplayers" => $response['numplayers'],
						"server_ispassword" => $response['password'],
						"server_isdedicated" => $response['dedicated'],
						"server_map" => $response['mapname'],
						"server_gametype" => $response['gametype'],
					));	
			    	break;
			    case "teamscore":
			    	echo json_encode(array(
						$response['team_t0'] => $response['score_t0'],
						$response['team_t1'] => $response['score_t1']
					));	
			    	break;
			   default:
			    	echo json_encode(array(
						'server_name' => 'Returns the server name',
						'server_info' => 'Returns the server name',
						'teamscore' => 'Returns what the current score is for the teams',
						'player' => 'Returns an array of players with information such as what team, their ping and score.'
					));	
			    	break;
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