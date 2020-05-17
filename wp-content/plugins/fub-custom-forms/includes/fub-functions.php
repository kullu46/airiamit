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
	
	public static function generateLead($formdata) {
		parse_str($formdata, $data);
		if(empty($data)){
			exit(json_encode(array('success' => 0, 'message' => 'No data found!')));
		}
		if(!isset($data['fub_template']) || $data['fub_template'] == ''){
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
		$tags = !empty($data['fub_tags']) ? array_map('trim', explode(',', $data['fub_tags'])) : array();
		if(stripos($data['fub_email'], 'test') !== false){
			$tags[] = 'Test Lead';
		}
		$note = $noteSubject = '';
		$args = array(
				"source" => get_site_url(),
				"type" => $data['fub_lead_type'],
				"message" => "",
				"person" => array(
					"firstName" => $firstname,
					"lastName" => $lastname,
					"emails" => array(array("value" => $data['fub_email'])),
					"phones" => array(array("value" => $data['fub_phone'])),
					"tags" => $tags
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
		switch($data['fub_template']){
			case 'generic':
				$args["message"] = ($data['fub_message']) ? $data['fub_message'] : "";
				break;
			case 'generic-full':
				$args["message"] = ($data['fub_message']) ? $data['fub_message'] : "";
				break;
			case 'investor':
				break;
			case 'seller':
				break;
			case 'appointment':
				break;
			case 'virtual-appointment':
				$noteSubject = "Virtual Appointment request arrived with following details:";
				if(isset($data["fub_property_type"]) && !empty($data["fub_property_type"])){
					$note .= '<strong>Property Type: </strong>&nbsp;'.(is_array($data["fub_property_type"]) ? implode(', ', $data["fub_property_type"]) : $data["fub_property_type"]).'<br/>';
				}
				if(isset($data["fub_is_realtor"]) && !empty($data["fub_is_realtor"])){
					$note .= '<strong>Are you a realtor?: </strong>&nbsp;'.(is_array($data["fub_is_realtor"]) ? implode(', ', $data["fub_is_realtor"]) : $data["fub_is_realtor"]).'<br/>';
				}
				if(isset($data["fub_is_working_with_realtor"]) && !empty($data["fub_is_working_with_realtor"])){
					$note .= '<strong>Are you working with a Realtor?: </strong>&nbsp;'.(is_array($data["fub_is_working_with_realtor"]) ? implode(', ', $data["fub_is_working_with_realtor"]) : $data["fub_is_working_with_realtor"]).'<br/>';
				}
				if(isset($data["fub_connect_via"]) && !empty($data["fub_connect_via"])){
					$note .= '<strong>Connect via: </strong>&nbsp;'.(is_array($data["fub_connect_via"]) ? implode(', ', $data["fub_connect_via"]) : $data["fub_connect_via"]).'<br/>';
				}
				if(isset($data["fub_appointment_date"]) && !empty($data["fub_appointment_date"])){
					$note .= '<strong>Appointment Date: </strong>&nbsp;'.(is_array($data["fub_appointment_date"]) ? implode(', ', $data["fub_appointment_date"]) : $data["fub_appointment_date"]).'<br/>';
				}
				if(isset($data["fub_appointment_time"]) && !empty($data["fub_appointment_time"])){
					$note .= '<strong>Appointment Time:</strong>&nbsp;'.(is_array($data["fub_appointment_time"]) ? implode(', ', $data["fub_appointment_time"]) : $data["fub_appointment_time"]).'<br/>';
				}
				if(isset($data["fub_looking_for"]) && !empty($data["fub_looking_for"])){
					$note .= '<strong>Looking For: </strong>&nbsp;'.(is_array($data["fub_looking_for"]) ? implode(', ', $data["fub_looking_for"]) : $data["fub_looking_for"]).'<br/>';
				}
				if(isset($data["fub_ownership"]) && !empty($data["fub_ownership"])){
					$note .= '<strong>Ownership: </strong>&nbsp;'.(is_array($data["fub_ownership"]) ? implode(', ', $data["fub_ownership"]) : $data["fub_ownership"]).'<br/>';
				}
				if(isset($data["fub_type"]) && !empty($data["fub_type"])){
					$note .= '<strong>Type: </strong>&nbsp;'.(is_array($data["fub_type"]) ? implode(', ', $data["fub_type"]) : $data["fub_type"]).'<br/>';
				}
				if(isset($data["fub_area_of_interest"]) && !empty($data["fub_area_of_interest"])){
					$note .= '<strong>Area of Interest: </strong>&nbsp;'.(is_array($data["fub_area_of_interest"]) ? implode(', ', $data["fub_area_of_interest"]) : $data["fub_area_of_interest"]).'<br/>';
				}
				if(isset($data["fub_area_sqft"]) && !empty($data["fub_area_sqft"])){
					$note .= '<strong>What size do you weant your home to be?: </strong>&nbsp;'.(is_array($data["fub_area_sqft"]) ? implode(', ', $data["fub_area_sqft"]) : $data["fub_area_sqft"]).'<br/>';
				}
				if(isset($data["fub_budget"]) && !empty($data["fub_budget"])){
					$note .= '<strong>What is your budget?: </strong>&nbsp;'.(is_array($data["fub_budget"]) ? implode(', ', $data["fub_budget"]) : $data["fub_budget"]).'<br/>';
				}
				if(isset($data["fub_use"]) && !empty($data["fub_use"])){
					$note .= '<strong>Use: </strong>&nbsp;'.(is_array($data["fub_use"]) ? implode(', ', $data["fub_use"]) : $data["fub_use"]).'<br/>';
				}
				if(isset($data["fub_first_time_buyer"]) && !empty($data["fub_first_time_buyer"])){
					$note .= '<strong>First time buyer?: </strong>&nbsp;'.(is_array($data["fub_first_time_buyer"]) ? implode(', ', $data["fub_first_time_buyer"]) : $data["fub_first_time_buyer"]).'<br/>';
				}
				if(isset($data["fub_mortgage_approved"]) && !empty($data["fub_mortgage_approved"])){
					$note .= '<strong>Mortgage Approved?: </strong>&nbsp;'.(is_array($data["fub_mortgage_approved"]) ? implode(', ', $data["fub_mortgage_approved"]) : $data["fub_mortgage_approved"]).'<br/>';
				}
				if(isset($data["fub_working_with_agent"]) && !empty($data["fub_working_with_agent"])){
					$note .= '<strong>Currently working with agent?: </strong>&nbsp;'.(is_array($data["fub_working_with_agent"]) ? implode(', ', $data["fub_working_with_agent"]) : $data["fub_working_with_agent"]).'<br/>';
				}
				if(isset($data["fub_comments"]) && !empty($data["fub_comments"])){
					$note .= '<strong>Comments: </strong>&nbsp;'.(is_array($data["fub_comments"]) ? implode(', ', $data["fub_comments"]) : $data["fub_comments"]).'<br/>';
				}
				break;
			case '2':
			case 'contact':
				$args["message"] = ($data['fub_message']) ? $data['fub_message'] : "";
				break;
			case '1':
			case 'contact-info':
				$args["message"] = ($data['fub_message']) ? $data['fub_message'] : "";
				break;
			default:
				break;
		}
		$response = self::request(self::$API_HOST.'events', "POST", $args);

		if($response['success'] == 1){
			if(!empty($note)){
				$argsNotes = array(
						'personId' => $response['response']->id,
						'subject' => $noteSubject,
						'body' => $note,
						'isHtml' => true
					);
				self::request(self::$API_HOST.'notes', "POST", $argsNotes);
			}
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