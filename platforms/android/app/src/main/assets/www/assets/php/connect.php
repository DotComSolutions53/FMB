<?php
	date_default_timezone_set('Asia/Kolkata');
	$db = new mysqli('localhost','dotcoxat_burhan','Alefiya@23','dotcoxat_faizkolkata');
	if($db->connect_errno){
		die('Sorry, We are having some errors');
	}

?>