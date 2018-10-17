<?php

	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');

	include ("connect.php");
	session_start();
	session_unset();
	$request = file_get_contents('php://input');
	$input = json_decode($request);

	//Entered Value in login Page
	$hof_its = $input -> hof_its;	
	$password = rand('1111','9999');

	$sql0 = mysqli_query($db,"SELECT * FROM mumeneen WHERE its = '$hof_its'");
    $result0 = mysqli_fetch_array($sql0,MYSQLI_ASSOC);
    $hof_name = $result0["name"];   
    $mobile = $result0["mobile_g"];  

	// $validator = array('success' => false, 'messages' => array());
	$output = array("status"=>"400", "message"=>"Invalid Username or Password", 'data' => array());

	if($hof_name != "")
	{
		$sql = "INSERT INTO app_user (`username`,`password`) VALUES ('$hof_its','$password')";
		$query = $db->query($sql);

		if($query===TRUE)
		{

			$message = "Salaam, Your password is : ".$password;

			$str = str_replace(" ", "%20",trim($message));
			$mob_no = "91".$mobile;
			// $mob_no = "918961043773";

			$url="https://www.smsgatewayhub.com/api/mt/SendSMS?APIKey=SBZrauN4tkG4lk3YQmHjxw&senderid=BMFAIZ&channel=2&DCS=0&flashsms=0&number=$mob_no&text=$str&route=13";

		    $ch = curl_init();
			curl_setopt($ch, CURLOPT_URL,$url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$response = curl_exec($ch);
			curl_close($ch);

		    $object = json_decode($response);

			$output['status'] = 200;
			$output['messages'] = "Successfully Added";
		}
	}	

	echo json_encode($output);
	
?>