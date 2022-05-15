<?php $this->load->view('layouts/header'); ?>
		<center><div class="add">
			<p class="added">The <?php echo $name ?> has been added to your cart</p>
			<form action="<?php echo base_url(); ?>Accessories/Display/" method="post" class="added">
				<input type="hidden" name="from" value="chains">
				<input type="hidden" name="id" value="<?php echo $id ?>">
				<input type="hidden" name="title" value="<?php echo $name ?>">
				<input type="hidden" name="price" value="<?php echo $price ?>">
				<input type="hidden" name="length" value="<?php echo $length ?>">
				<input type="hidden" name="size" value="<?php echo $size ?>">
				<button type="submit" class="back">Back</button>
			</form>
			<button class="added" onclick="window.location.href='<?php echo base_url(); ?>Cart/'">Cart</button>
		</div></center>
	</body>
</html>