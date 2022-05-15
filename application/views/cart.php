<?php $this->load->view('layouts/header'); ?>
<?php if($this->cart->contents()): ?>
		<div class="cart"><center>
			<form method="post" action="<?php echo base_url(); ?>Cart/Update/">
				<table class="cart" cellspacing="0">
					<tr>
						<th class="cart">Qty</th>
						<th class="cart">Item Title</th>
						<th class="cart">Item Price</th>
					</tr>
					<?php $i = 0; ?>
					<?php foreach ($this->cart->contents() as $items): ?>
					<tr>
						<td class="cart"><input style="width:50px;text-align:center;" type="text" name="qty" value="<?php echo $items['qty']; ?>"></td>
						<td class="cart"><?php echo $items['name']; ?></td>
						<td class="cart"><?php echo $this->cart->format_number($items['price']);?></td>
						<td class="cart"><div class="remove" onclick="window.location.href='Remove/<?php echo $items['rowid']?>'"><p class="remove">Remove</p></div></td>
					</tr>
					<?php $i++; ?>
					<?php endforeach; ?>
					<tr>
						<th class="cart" colspan="2">Total</th>
						<th class="cart"><?php echo $this->cart->total(); ?></th>
					</tr>
				</table><br>
				<button type="submit" name="submit" class="cart">Update</button>
			</form>
			<button class="cart" onclick="window.location.href='<?php echo base_url(); ?>Order/'">Checkout</button>
		<?php else: ?>
		<div class="cart"><center>
			<p>There are no items in your cart</p>
		</div>
	</body>
</html>
	<?php endif; ?>
		</center></div>
	</body>
</html>