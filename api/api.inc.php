<?php

	class HaloStatus {

		//const URL = "http://limited-development.net/halo-status/api/api.php";
		const URL = "http://localhost/halo-status/api/api.php";

		public static function getPlayers($ip, $port) {
			$data = self::get_data(self::URL, array('ip'=>$ip, 'port' => $port, 'apiType' => 'players'));
			$parsed = json_decode($data, true);
			print_r($parsed);
		}

		public static function getTeamScore($ip, $port) {
			$data = self::get_data(self::URL, array('ip'=>$ip, 'port' => $port, 'apiType' => 'teamscore'));
			$parsed = json_decode($data, true);
			print_r($parsed);
		}

		public static function getServerInfo($ip, $port) {
			$data = self::get_data(self::URL, array('ip'=>$ip, 'port' => $port, 'apiType' => 'server_info'));
			$parsed = json_decode($data, true);
			print_r($parsed);
		}

		// Get ALL information
		public static function getRequest($param) {
			$data = self::get_data(self::URL, $param);
			$parsed = json_decode($data, true);
			print_r($parsed);
		}

		private static function get_data($url, $fields) {
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,5);
			$data = curl_exec($ch);
			curl_close($ch);
			return $data;
		}

		  //   	case "server_name":
	}
?>