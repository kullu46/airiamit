<?php 

class FollowupBoss {
	public static $API_HOST = 'https://api.followupboss.com/v1/';
	public static $API_KEY = '';
	public static $API_PORT = 80;
	private static $last_comment = '';
	private static $prevent_moderation_email_for_these_comments = array();
	private static $last_comment_result = null;
	public function __construct() {
		$options = get_option('fub-options');
		if(isset($options['api_key'])){
			self::$API_KEY = $options['api_key'];
		}
	}
	
	public static function generateLead($data) {
		if(empty($data)){
			exit(json_encode(array('success' => 0, 'message' => 'No data found!')));
		}
		if(empty(self::$API_KEY)){
			exit(json_encode(array('success' => 0, 'message' => 'Lead was not generated. No key found!')));
		}
		$name = $firstname = $lastname = $data['fub_name'];
		if(stripos($name, ' ') !== false){
			$name = explode(' ', $name);
			if(count($name) > 2){
				$firstname = $name[0];
				array_shift($name);
				$lastname = implode(' ', $name);
			} elseif(count($name) == 2){
				$firstname = $name[0];
				$lastname = $name[1];
			} elseif(count($name) == 1) {
				$firstname = $name[0];
				$lastname = '';
			} else {
				$firstname = $name;
				$lastname = '';
			}
		} else {
			$firstname = $name;
			$lastname = '';
		}
		$args = array(
				"source" => get_site_url(),
				"type" => $data['fub_lead_type'],
				"message" => ($data['fub_message']) ? $data['fub_message'] : "",
				"person" => array(
					"firstName" => $firstname,
					"lastName" => $lastname,
					"emails" => array(array("value" => $data['fub_email'])),
					"phones" => array(array("value" => $data['fub_phone'])),
					"tags" => !empty($data['fub_tags']) ? array_map('trim', explode(',', $data['fub_tags'])) : array()
				)/* ,
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
				) */
			);
		$response = self::request(self::$API_HOST.'events', "POST", $args);
		if($response['success'] == 1){
			exit(json_encode(array('success' => 1, 'message' => 'Thank you. We will get back to you soon!')));
		} else {
			exit(json_encode(array('success' => 0, 'message' => 'Oops! An unknown error has encountered. Please contact administrator or try again after some time!')));
		}
	}

	public static function request($url, $type, $data){
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($ch, CURLOPT_USERPWD, self::$API_KEY. ':');
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		if(!empty($data)){
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $type);
			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
		}
		$response = curl_exec($ch);
		if ($response === false) {
			return array(
					'success' => 1,
					'message' => 'POST error: ' . curl_error($ch),
					'response' => ($response) ? json_decode($response) : null
				);
		}
		$code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		if ($code == 201) {
			return array(
					'success' => 1,
					'message' => "New contact created.",
					'response' => ($response) ? json_decode($response) : null
				);
		} elseif ($code == 200) {
			return array(
					'success' => 1,
					'message' => "Existing contact updated.",
					'response' => ($response) ? json_decode($response) : null
				);
		} else {
			return array(
					'success' => 0,
					'message' => "Error, status code: {$code}",
					'response' => ($response) ? json_decode($response) : null
				);
		}
	}
}
new FollowupBoss();