<?php 

class FollowupBoss {
	const API_HOST = 'https://api.followupboss.com/v1/';
	const API_KEY = '3a58dbcd374c1efb9298e28594a1e7f41b1049';
	const API_PORT = 80;
	private static $last_comment = '';
	private static $prevent_moderation_email_for_these_comments = array();
	private static $last_comment_result = null;
	public function __construct() {
		//parent::__construct();
		//self::generateLead(array());
	}
	
	public static function generateLead($data) {
		echo "<pre>";
		print_r($_SERVER);
		die;
		$data = array(
				"source" => get_site_url(),
				"type" => $data['type'],
				"message" => ($data['message']) ? $data['message'] : "",
				"person" => array(
					"firstName" => $data['firstname'],
					"lastName" => $data['lastname'],
					"emails" => array(array("value" => $data['email'])),
					"phones" => array(array("value" => $data['phone'])),
					"tags" => array("Buyer")
				),
				"property" => array(
					"street" => ($data['property']['street']) ? $data['property']['street'] : "",
					"city" => ($data['property']['city']) ? $data['property']['city'] : "",
					"state" => ($data['property']['state']) ? $data['property']['state'] : "",
					"code" => ($data['property']['code']) ? $data['property']['code'] : "",
					"mlsNumber" => ($data['property']['mlsNumber']) ? $data['property']['mlsNumber'] : "",
					"price" => ($data['property']['price']) ? $data['property']['price'] : "",
					"forRent" => ($data['property']['forRent']) ? $data['property']['forRent'] : false,
					"url" => ($data['property']['url']) ? $data['property']['url'] : "",
					"type" => ($data['property']['type']) ? $data['property']['type'] : "",
					"bedrooms" => ($data['property']['bedrooms']) ? $data['property']['bedrooms'] : "",
					"bathrooms" => ($data['property']['bathrooms']) ? $data['property']['bathrooms'] : "",
					"area" => ($data['property']['area']) ? $data['property']['area'] : "",
					"lot" => ($data['property']['lot']) ? $data['property']['lot'] : ""
				)
			);
		$response = self::request(API_HOST, "POST", $data);
		echo "<pre>";
		print_r($response);
		die;
	}

	public static function request($url, $type, $data){
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($ch, CURLOPT_USERPWD, API_KEY. ':');
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		if(!empty($data)){
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $type);
			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
		}
		$response = curl_exec($ch);
		if ($response === false) {
			exit('cURL error: ' . curl_error($ch) . "\n");
		}
		$code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		if ($code == 201) {
			echo "New contact created.\n";
		} elseif ($code == 200) {
			echo "Existing contact updated.\n";
		} else {
			echo "Error, status code: {$code}\n";
		}
		if ($response) {
			$response = json_decode($response);
			var_dump($response);
		}
	}
}
new FollowupBoss();