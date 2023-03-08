<?php

namespace App;

class SendCode{
	public static function sendCode($phone){
		$token = "71e1d016f48c447f343d0e6807e902a8";
		$code = rand(1111, 9999);
		$to = $phone;
		$message = "Your verify code from Gain's Group is ".$code." for ".$phone.". Use it ASAP.";
		$url = "http://api.greenweb.com.bd/api.php";

		$data = array(

			'to'=> $to,

			'message'=> $message,

			'token'=> $token

		);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_ENCODING, '');
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$smsresult = curl_exec($ch);
		$result = mb_substr($smsresult, 0, 2);
		if ($result == 'Ok') {
			return $code;
		}else{
			return "error";
		}
	}


	public static function sendPass($phone){
		$token = "71e1d016f48c447f343d0e6807e902a8";
		$code = rand(111111, 999999);
		$to = $phone;
		$message = "Your Temparory Password is ".$code." for ".$phone.". after login change it.";
		$url = "http://api.greenweb.com.bd/api.php";

		$data = array(

			'to'=> $to,

			'message'=> $message,

			'token'=> $token

		);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_ENCODING, '');
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$smsresult = curl_exec($ch);
		$result = mb_substr($smsresult, 0, 2);
		if ($result == 'Ok') {
			return $code;
		}else{
			return "error";
		}
	}
}
?>
