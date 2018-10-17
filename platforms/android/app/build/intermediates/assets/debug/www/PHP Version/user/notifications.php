<?php

date_default_timezone_set('Asia/Kolkata');
$db = new mysqli('localhost','dotcoxat_burhan','Alefiya@23','dotcoxat_faizkolkata');
if($db->connect_errno){
	die('Sorry, We are having some errors');
}

?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
<title>Faiz Kolkata</title>
<link rel="stylesheet" type="text/css" href="../styles/style.css">
<link rel="stylesheet" type="text/css" href="../styles/framework.css">
<link rel="stylesheet" type="text/css" href="../styles/fonts/css/all.min.css">
<link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
</head>

<body>

<div id="page-transitions">
	<div id="header" class="header-logo-app header-light">
		<a href="#" class="header-title  back-button">Notifications</a>
		<a href="#" class="header-logo disabled"></a>
		<a href="#" class="header-icon back-button header-icon-1 font-10 no-border"><i class="fa fa-chevron-left"></i></a>
		<a href="index.php" class="header-icon header-icon-2 no-border font-14" data-deploy-menu="menu-4"><i class="fa fa-home"></i></a>
		<a href="#" class="header-icon header-icon-4 hamburger-animated" data-deploy-menu="menu-1"></a>
	</div>	
	
	<!-- Menu -->
	<?php include ("sidebar.php"); ?>
	
	<div id="page-content" class="page-content page-content-gray">	
		<div id="page-content-scroll" class="header-clear-larger"><!--Enables this element to be scrolled --> 	

<!-- 			<div class="content content-boxed content-boxed-padding">
				<h1 class="uppercase ultrabold center-text full-top huge-text color-black">Faiz Kolkata</h1>
				<h5 class="uppercase small-text center-text color-gray-dark regularbold full-bottom">Burhani Masjid</h5>
				<div class="decoration bg-black opacity-10"></div>
				
			</div>
			<div class="decoration decoration-margins"></div>	 -->
			<?php
				$sql = "SELECT * FROM notifications ORDER BY `timestamp` DESC";
				$query = $db->query($sql);
				while($row = $query->fetch_assoc()){
			?>
			<div class="content content-boxed content-boxed-padding">
					<p class='no-bottom' style="text-align:justify">
						<?php echo $row["message"]; ?>
					</p>
					<div style="color:#ccc; float:right"><?php echo $row["timestamp"]; ?></div>
			</div>
		<?php } ?>
			<div class="decoration decoration-margins"></div>
						
			<?php include("footer.php"); ?>
			
		</div>  
	</div>
	
	<a href="#" class="back-to-top-badge back-to-top-small"><i class="fa fa-angle-up"></i>Back to Top</a>
</div>
	

<script type="text/javascript" src="../scripts/jquery.js"></script>
<script type="text/javascript" src="../scripts/custom.js"></script>
<script type="text/javascript" src="../scripts/plugins.js"></script>

</body>