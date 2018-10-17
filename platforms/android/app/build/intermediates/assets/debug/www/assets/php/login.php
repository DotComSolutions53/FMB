<?php

	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
	include ("connect.php");
	session_start();
	session_unset();
	$request = file_get_contents('php://input');
	$input = json_decode($request);

	//Salt Encryption
	$salt = "ALEFIYA23";

	//Entered Value in login Page
	$user_name = $input -> user_name;	
	$user_password = $input -> user_password;

	$us = $user_password;
	
	//Encrypting Password
	$user_password = $salt.$user_password;	
	$user_password = sha1($user_password);

	// $user_password = "f432047d9bc870c2467f10a05ab9b45721ed83cc";

	$output = array("status"=>"400", "message"=>"Invalid Username or Password", 'data' => array());
	
	$sql = mysqli_query($db,"SELECT * FROM app_user WHERE username = '$user_name'");

	if(mysqli_num_rows($sql) > 0)
	{

		$result = mysqli_fetch_array($sql,MYSQLI_ASSOC);
		$password = $result["password"];
		$usertype = $result["usertype"];

		if($password === $us)
		{	
			$output['data'] = array(
				"username"=> $username
			);
			$output['status'] = 200;
			$output['message'] = "OK";
		}
	}

	echo json_encode($output);
	
?>