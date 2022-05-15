<?php $this->load->view('layouts/header'); ?>
		<div id="box1">
		    <div id="scroll1" style="background-image:url(<?php echo base_url(); ?>assets/img/image2.jpg);display: absolute;height: 100vh;width: 100%;background-attachment: fixed;background-position: 0px 70%;background-size: cover;"></div>
		    <div id="scroll2" style="background-image:url(<?php echo base_url(); ?>assets/img/image1.jpg);display: none;height: 100vh;width: 100%;background-attachment: fixed;background-position: 0px 70%;background-size: cover;"></div>
			<a href="#main" id="button"><div id="button">Shop</div></a>
		</div>
		<div id="main"><center>
			<div style="color:#00aeff;padding-top:10px;"><h2><b><i>All Chains On Sale</i></b></h2></div>
			<div class="block">
				<img class="block" src="<?php echo base_url(); ?>assets/img/chains/Gold Lion Chain.jpg">
				<p class="block">Gold Lion Chain</p>
				<p style="display:inline-block">$9.99</p>
				<form action="<?php echo base_url(); ?>Accessories/Display/" method="POST">
					<input type="hidden" name="from" value="main">
					<input type="hidden" name="id" value="1">
					<input type="hidden" name="title" value="Gold Lion Chain">
					<input type="hidden" name="price" value="9.99">
					<input type="hidden" name="length" value="78cm">
					<input type="hidden" name="size" value="32*55mm">
					<button type="submit" class="block">View</button>
				</form>
			</div>
			<div class="block">
				<img class="block" src="<?php echo base_url(); ?>assets/img/chains/Silver Lion Chain.jpg">
				<p class="block">Silver Lion Chain</p>
				<p style="display:inline-block;margin-right:10px;">$9.99</p>
				<form action="<?php echo base_url(); ?>Accessories/Display/" method="POST">
					<input type="hidden" name="from" value="main">
					<input type="hidden" name="id" value="2">
					<input type="hidden" name="title" value="Silver Lion Chain">
					<input type="hidden" name="price" value="9.99">
					<input type="hidden" name="length" value="78cm">
					<input type="hidden" name="size" value="32*55mm">
					<button type="submit" class="block">View</button>
				</form>
			</div><br>
			<button class="block" onclick="window.location.href='Products/Accessories/'">View All</button><br><br/>
		</center></div>
	</body>
</html>