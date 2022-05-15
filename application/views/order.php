<?php $this->load->view('layouts/header'); ?>
		<center><div class="order">
			<form method="post" action="<?php echo base_url(); ?>Cart/Process/">
				<div class="side">
					<div class="input"><input type="text" name="firstname" class="input" placeholder="First Name"></div>
					<div class="input"><input type="text" name="lastname" class="input" placeholder="Last Name"></div>
					<div class="input"><input type="text" name="address" class="input" placeholder="Address"></div>
					<div class="input"><input type="text" name="address2" class="input" placeholder="Apt, suite, etc(optional)"></div>
					<div class="input"><input type="text" name="city" class="input" placeholder="City"></div>
					<div class="input"><input type="text" name="state" class="input" placeholder="State"></div>
					<div class="input"><input type="text" name="zipcode" class="input" placeholder="Zip Code"></div>
					<div class="input"><input type="email" name="email" class="input" placeholder="Email"></div>
				</div>
				<div class="side">
					<table class="order">
						<tr>
							<th>Qty</th>
							<th>Item Title</th>
							<th>Item Price</th>
							<th></th>
						</tr>
						<?php $i = 0; ?>
						<?php foreach ($this->cart->contents() as $items): ?>
						<tr>
							<td><?php echo $items['qty']; ?></td>
							<td><?php echo $items['name']; ?></td>
							<td><?php echo $this->cart->format_number($items['price']);?></td>
						</tr>
						<?php echo '<input type="hidden" name="item_name['.$i.']" value="'.$items['name'].'" />';?>
						<?php echo '<input type="hidden" name="item_code['.$i.']" value="'.$items['id'].'" />';?>
						<?php echo '<input type="hidden" name="item_qty['.$i.']" value="'.$items['qty'].'" />';?>
						<?php $i++; ?>
						<?php endforeach; ?>
						<tr>
							<td colspan="2">Total</td>
							<td><?php echo $this->cart->total(); ?></td>
						</tr>
					</table><br>
					<button class="cart" type="submit">Place Your Order</button>
				</div>
			</form>
		</div></center>
	</body>
</html>