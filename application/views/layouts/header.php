<html>
	<head>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/style.css">
		<script src="<?php echo base_url(); ?>/assets/js/jquery.min.js"></script>
		<script src="<?php echo base_url(); ?>/assets/js/menu.js"></script>
		<script src="<?php echo base_url(); ?>/assets/js/scroll.js"></script>
		<script src="<?php echo base_url(); ?>/assets/js/qty.js"></script>
		<script src="<?php echo base_url(); ?>/assets/js/mobileMenu.js"></script>
	</head>
	<body>
		<div id="MenuIcon">
			<div id="MenuLine"></div>
		</div>
		<div id="MobileMenuIcon" onclick="selectMenu()">
		    <div id="MobileMenuLine"></div>
		</div>
		<div id="MainMenu">
			<ul>
				<li onclick="window.location.href='<?php echo base_url(); ?>'">Home<div class="line"></div></li>
				<li onclick="window.location.href='<?php echo base_url(); ?>Products/Stickers/'">Stickers<div class="line"></div></li>
				<li onclick="window.location.href='<?php echo base_url(); ?>Products/Accessories/'">Accessories<div class="line"></li>
				<li onclick="window.location.href='<?php echo base_url(); ?>Cart/'">Cart<div class="line"></div></li>
			</ul>
			<div id="close">
				<img src="<?php echo base_url(); ?>assets/img/close_button.png" height="30px" width="30px"/>
			</div>
		</div>
		<div id="MobileMenu">
		    <button class="MobileMenu" onclick="window.location.href='<?php echo base_url(); ?>'">Home</button>
		    <button class="MobileMenu" onclick="window.location.href='<?php echo base_url(); ?>Chains/'">Chains</button>
		    <button class="MobileMenu" onclick="window.location.href='<?php echo base_url(); ?>Clothing/'">Clothing</button>
		    <button class="MobileMenu" onclick="window.location.href='<?php echo base_url(); ?>Watches/'">Watches</button>
		    <button class="MobileMenu" onclick="window.location.href='<?php echo base_url(); ?>Cart/'">Cart</button>
		</div>
