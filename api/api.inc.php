<?php

	class HaloStatus {

		const URL = "http://localhost/halo-status/api/api.php";

		public static function getPlayers($ip, $port) {
			$postData = self::getPost();
			$data = self::get_data(self::URL, $postData);
			$parsed = json_decode($data, true);
			print_r($parsed);
		}

		public static function getPost() {
		
			$fields = array(
				'ip' => urlencode($_GET['ip']),
				'port' => urlencode($_GET['port']),
				'apiType' => urlencode($_GET['apiType'])
			);

			return $fields;
		}

		public static function get_data($url, $fields) {
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,5);
			$data = curl_exec($ch);
			curl_close($ch);
			return $data;
		}

	}
?>