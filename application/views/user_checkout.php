<div class="heading">
	<h3>checkout</h3>
	<p> <a href="<?= base_url() ?>user">home</a> / checkout </p>
</div>

<section class="display-order">

	<?php
	if ($cart > 0) {
		$grand_total = 0;
		foreach ($cart as $key => $value) {
			$total_price = ($value->price * $value->quantity);
			$grand_total += $total_price;
	?>
			<p> <?php echo $value->name; ?> <span>(<?php echo 'RP. ' . number_format($value->price)  . ' x ' . $value->quantity; ?>)</span> </p>
	<?php
		}
	} else {
		echo '<p class="empty">your cart is empty</p>';
	}
	?>
	<div class="grand-total"> grand total : <span>RP. <?php echo number_format($grand_total); ?></span> </div>

</section>

<section class="checkout">

	<form action="<?= base_url()?>user/checkout_add" method="post">
		<h3>place your order</h3>
		<div class="flex">
			<div class="inputBox">
				<span>your name :</span>
				<input type="text" name="name" required placeholder="enter your name">
			</div>
			<div class="inputBox">
				<span>your number :</span>
				<input type="number" name="number" required placeholder="enter your number">
			</div>
			<div class="inputBox">
				<span>your email :</span>
				<input type="email" name="email" required placeholder="enter your email">
			</div>
			<div class="inputBox">
				<span>payment method :</span>
				<select name="method" required>
					<option value="COD">COD</option>
					<option value="Tranfer Bank">Tranfer Bank</option>
					<option value="Dana">Dana</option>
				</select>
			</div>
			<div class="inputBox">
				<span>address number :</span>
				<input type="number" min="0" name="flat" required placeholder="e.g. flat no.">
			</div>
			<div class="inputBox">
				<span>address line 01 :</span>
				<input type="text" name="street" required placeholder="e.g. street name">
			</div>
			<div class="inputBox">
				<span>city :</span>
				<input type="text" name="city" required placeholder="e.g. surabaya">
			</div>
			<div class="inputBox">
				<span>state :</span>
				<input type="text" name="state" required placeholder="e.g. jawa timur">
			</div>
			<div class="inputBox">
				<span>country :</span>
				<input type="text" name="country" required placeholder="e.g. Indonesia">
			</div>
			<div class="inputBox">
				<span>pin code :</span>
				<input type="number" min="0" name="pin_code" required placeholder="e.g. 123456">
			</div>
		</div>
		<input type="submit" value="order now" class="btn" name="order_btn">
	</form>

</section>
