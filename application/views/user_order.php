<div class="heading">
	<h3>your orders</h3>
	<p> <a href="<?= base_url() ?>user">home</a> / orders </p>
</div>

<section class="placed-orders">

	<h1 class="title">placed orders</h1>

	<div class="box-container">

		<?php
		if ($orders) {
			foreach ($orders as $key => $value) {
		?>
				<div class="box">
					<p> placed on : <span><?php echo $value->placed_on; ?></span> </p>
					<p> name : <span><?php echo $value->name; ?></span> </p>
					<p> number : <span><?php echo $value->number; ?></span> </p>
					<p> email : <span><?php echo $value->email; ?></span> </p>
					<p> address : <span><?php echo $value->address; ?></span> </p>
					<p> payment method : <span><?php echo $value->method; ?></span> </p>
					<p> your orders : <span><?php echo $value->total_products; ?></span> </p>
					<p> total price : <span>Rp. <?php echo number_format($value->total_price); ?></span> </p>
					<p> payment status : <span style="color:<?php if ($value->payment_status == 'pending') {
																echo 'red';
															} else {
																echo 'green';
															} ?>;"><?php echo $value->payment_status; ?></span> </p>
				</div>
		<?php
			}
		} else {
			echo '<p class="empty">no orders placed yet!</p>';
		}
		?>
	</div>

</section>
