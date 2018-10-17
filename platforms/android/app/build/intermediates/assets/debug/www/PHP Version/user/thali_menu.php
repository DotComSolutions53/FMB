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
		<a href="#" class="header-title  back-button">Thali Menu</a>
		<a href="#" class="header-logo disabled"></a>
		<a href="#" class="header-icon back-button header-icon-1 font-10 no-border"><i class="fa fa-chevron-left"></i></a>
		<a href="index.php" class="header-icon header-icon-2 no-border font-14" data-deploy-menu="menu-4"><i class="fa fa-home"></i></a>
		<a href="#" class="header-icon header-icon-4 hamburger-animated" data-deploy-menu="menu-1"></a>
	</div>	
	
	<!-- Menu -->
	<?php include("sidebar.php"); ?>
		
	<div id="page-content" class="page-content">	
		<div id="page-content-scroll" class="header-clear-larger"><!--Enables this element to be scrolled --> 	
			
	<!-- 		<div id="page-countdown">		
				<h1 class="center-text"><i class="fa fa-cog fa-spin fa-2x opacity-20 full-bottom"></i></h1>
				<h1 class="uppercase center-text">Coming Soon</h1>
				<h2 class="uppercase center-text full-bottom"> We're working on it</h2>
				<p class="center-text">
					We're working hard to get this page up and running in the shortest possible time.
				</p>
				<div class="decoration opacity-50"></div>
				<div class="countdown">
					<div class="countdown-years disabled">
						<div id="years"></div>
						<em>years</em>
					</div>
					<div class="countdown-days">
						<div id="days"></div>
						<em>days</em>
					</div>
					<div class="countdown-hours">
						<div id="hours"></div>
						<em>hours</em>
					</div>				
					<div class="countdown-minutes">
						<div id="minutes"></div>
						<em>minutes</em>
					</div>
					<div class="countdown-seconds">
						<div id="seconds"></div>
						<em>seconds</em>
					</div>	
				</div>
				<div class="clear"></div>
				<div class="decoration opacity-50 full-top"></div>
			</div> -->

			<div class="content content-boxed content-boxed-padding">
				<!-- <h1 class="huge-text center-text full-top"><i class="fa color-pink-dark fa-quote-right fa-2x"></i></h1> -->
				<h2 class="uppercase ultrabold center-text full-top color-black">Menu</h2>
				<h5 class="uppercase small-text center-text color-gray-dark regularbold full-bottom">This Week</h5>
				<div class="decoration opacity-50"></div>
				<div class="single-slider owl-carousel">
					<?php
						$sql = "SELECT * FROM faiz_menu ORDER BY `date` DESC LIMIT 7";
						$query = $db->query($sql);
						while($row = $query->fetch_assoc()){

							 $d = date_create($row['date']);
					?>
					<div class="item review-3 container">
						<!-- <img src="https://img8.androidappsapk.co/300/a/0/2/com.avs.faizulmawaidilburhaniyah.png" class="review-icon"> -->
						<p>
							<?php echo date_format($d,"d-m-Y"); ?><br/>
							<strong style="font-size: 20px"><?php echo $row["menu"]; ?></strong>
						</p>
						<div class="review-stars">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
						</div>
						<a href="#">Niyaz By : 
							<?php 
							if($row["niyaz_by"] != "")
							{
								echo $row["niyaz_by"];
							}
							else
							{	
								echo "Faiz ul Mawaid il Burhaniyah";
							}; 
						?></a>
					</div>

					<?php } ?>
				</div>
			</div>
									
			
			<?php include ("footer.php"); ?>
			
		</div>  
	</div>
	
	<a href="#" class="back-to-top-badge back-to-top-small"><i class="fa fa-angle-up"></i>Back to Top</a>
</div>
	

<script type="text/javascript" src="../scripts/jquery.js"></script>
<script type="text/javascript" src="../scripts/custom.js"></script>
<script type="text/javascript" src="../scripts/plugins.js"></script>

</body>