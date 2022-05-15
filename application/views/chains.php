<?php $this->load->view('layouts/header'); ?>
		<div class="chains"><center>
			<div style="color:#00aeff"><h2><b><i>All Chains On Sale</i></b></h2></div>
			<div class="block">	
				<img class="block" src="<?php echo base_url(); ?>assets/img/chains/Gold Lion Chain.jpg">
				<p class="block">Gold Lion Chain</p>
				<p style="display:inline-block;margin-right:10px;">$9.99</p>
				<form action="<?php echo base_url(); ?>Accessories/Display/" method="POST">
					<input type="hidden" name="from" value="chains">
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
					<input type="hidden" name="from" value="chains">
					<input type="hidden" name="id" value="2">
					<input type="hidden" name="title" value="Silver Lion Chain">
					<input type="hidden" name="price" value="9.99">
					<input type="hidden" name="length" value="78cm">
					<input type="hidden" name="size" value="32*55mm">
					<button type="submit" class="block">View</button>
				</form>
			</div>
			<div class="block">
				<img class="block" src="<?php echo base_url(); ?>assets/img/chains/Gold Cross Chain.jpg">
				<p class="block">Gold Cross Chain</p>
				<p style="display:inline-block;margin-right:10px;">$9.99</p>
				<form action="<?php echo base_url(); ?>Accessories/Display/" method="POST">
					<input type="hidden" name="from" value="chains">
					<input type="hidden" name="id" value="5">
					<input type="hidden" name="title" value="Gold Cross Chain">
					<input type="hidden" name="price" value="9.99">
					<input type="hidden" name="length" value="60cm">
					<input type="hidden" name="size" value="25*42mm">
					<button type="submit" class="block">View</button>
				</form>
			</div>
			<div class="block">
				<img class="block" src="<?php echo base_url(); ?>assets/img/chains/Silver Cross Chain.jpg">
				<p class="block">Silver Cross Chain</p>
				<p style="display:inline-block;margin-right:10px;">$9.99</p>
				<form action="<?php echo base_url(); ?>Accessories/Display/" method="POST">
					<input type="hidden" name="from" value="chains">
					<input type="hidden" name="id" value="6">
					<input type="hidden" name="title" value="Silver Cross Chain">
					<input type="hidden" name="price" value="9.99">
					<input type="hidden" name="length" value="60cm">
					<input type="hidden" name="size" value="25*42mm">
					<button type="submit" class="block">View</button>
				</form>
			</div>
			<div class="block">
				<img class="block" src="<?php echo base_url(); ?>assets/img/chains/Rope Chain.jpg">
				<p class="block">Rope Chain</p>
				<p style="display:inline-block;margin-right:10px;">$14.99</p>
				<form action="<?php echo base_url(); ?>Accessories/Display/" method="POST">
					<input type="hidden" name="from" value="chains">
					<input type="hidden" name="id" value="4">
					<input type="hidden" name="title" value="Rope Chain">
					<input type="hidden" name="price" value="14.99">
					<input type="hidden" name="length" value="60cm">
					<input type="hidden" name="size" value="N/A">
					<button type="submit" class="block">View</button>
				</form>
			</div>
			<div class="block">
				<img class="block" src="<?php echo base_url(); ?>assets/img/chains/Gold Weed Chain.jpg">
				<p class="block">Gold Weed Chain</p>
				<p style="display:inline-block;margin-right:10px;">$9.99</p>
				<form action="<?php echo base_url(); ?>Accessories/Display/" method="POST">
					<input type="hidden" name="from" value="chains">
					<input type="hidden" name="id" value="7">
					<input type="hidden" name="title" value="Gold Weed Chain">
					<input type="hidden" name="price" value="9.99">
					<input type="hidden" name="length" value="78cm">
					<input type="hidden" name="size" value="42*50">
					<button type="submit" class="block">View</button>
				</form>
			</div>
			<div class="block">
				<img class="block" src="<?php echo base_url(); ?>assets/img/chains/14k Snake Chain.jpg">
				<p class="block">14K Snake Chain</p>
				<p style="display:inline-block;margin-right:10px;">$499.99</p>
				<form action="<?php echo base_url(); ?>Accessories/Display/" method="POST">
					<input type="hidden" name="from" value="chains">
					<input type="hidden" name="id" value="8">
					<input type="hidden" name="title" value="14k Snake Chain">
					<input type="hidden" name="price" value="499.99">
					<input type="hidden" name="length" value="50.8cm">
					<input type="hidden" name="size" value="N/A">
					<button type="submit" class="block">View</button>
				</form>
			</div>
		</center></div>
	</body>
</html>