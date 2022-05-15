<?php $this->load->view('layouts/header'); ?>
        <?php if ($from == main) : ?>
        <button class="display_back" onclick="window.location.href='<?php echo base_url(); ?>'">Back</button>
        <?php endif ?>
        <?php if ($from == chains) : ?>
        <button class="display_back" onclick="window.location.href='<?php echo base_url(); ?>/Products/Accessories/'">Back</button>
        <?php endif ?>
		<div class="view">
			<div class="image_view">
				<img class="view" src="<?php echo base_url(); ?>/assets/img/chains/<?php echo $title ?>.jpg">
			</div>
			<div class="details_view">
				<h3><?php echo $title ?></h3>
				<p>$<?php echo $price ?></p>
				<p>Length: <?php echo $length ?></p>
				<p>Pendant Size: <?php echo $size ?></p>
				<form action="<?php echo base_url(); ?>Cart/Add/" method="post">
					<p class="qty" id="left" style="cursor:not-allowed;" onclick="subtract()">-</p>
					<p class="qty" id="value" style="cursor:auto;">1</p>
					<input type="hidden" id="qty" name="qty" value="1"/>
					<p class="qty" style="cursor:pointer;" onclick="add()">+</p><br><br/>
					<input type="hidden" name="id" value="<?php echo $id ?>">
					<input type="hidden" name="title" value="<?php echo $title ?>">
					<input type="hidden" name="price" value="<?php echo $price ?>">
					<input type="hidden" name="length" value="<?php echo $length ?>">
					<input type="hidden" name="size" value="<?php echo $size ?>" >
					<button class="cart" type="submit">Add to Cart</button>
				</form>
			</div>
		</div></center>
	</body>
</html>