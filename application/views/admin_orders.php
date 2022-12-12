<section class="orders">

	<h1 class="title">placed orders</h1>

	<div class="box-container">
		<?php
		if ($orders) {
			foreach ($orders as $key => $value) {
		?>
				<div class="box">
					<p> user id : <span><?php echo $value->user_id; ?></span> </p>
					<p> placed on : <span><?php echo $value->placed_on; ?></span> </p>
					<p> name : <span><?php echo $value->name; ?></span> </p>
					<p> number : <span><?php echo $value->number; ?></span> </p>
					<p> email : <span><?php echo $value->email; ?></span> </p>
					<p> address : <span><?php echo $value->address; ?></span> </p>
					<p> total products : <span><?php echo $value->total_products; ?></span> </p>
					<p> total price : <span>$<?php echo $value->total_price; ?>/-</span> </p>
					<p> payment method : <span><?php echo $value->method; ?></span> </p>
					<form action="<?= base_url() ?>admin/orders_update" method="post">
						<input type="hidden" name="order_id" value="<?php echo $value->id; ?>">
						<select name="update_payment" required> 
							<option value="<?php echo $value->payment_status; ?>" selected><?php echo $value->payment_status; ?></option>
							<option value="pending" >pending</option>
							<option value="completed">completed</option>
						</select>
						<input type="submit" value="update" name="update_order" class="option-btn">
						<a href="<?= base_url() ?>admin/orders_delete/<?php echo $value->id; ?>" onclick="return confirm('delete this order?');" class="delete-btn">delete</a>
					</form>
				</div>
		<?php
			}
		} else {
			echo '<p class="empty">no orders placed yet!</p>';
		}
		?>
	</div>

</section>

<script src="<?= base_url() ?>assets/js/admin_script.js"></script>

</body>

</html>
