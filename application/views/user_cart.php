<div class="heading">
	<h3>shopping cart</h3>
	<p> <a href="<?= base_url() ?>user">home</a> / cart </p>
</div>

<section class="shopping-cart">

	<h1 class="title">products added</h1>

	<div class="box-container">
		<?php
		$grand_total = 0;
		if ($cart > 0) {
			foreach ($cart as $key => $value) {
		?>
				<div class="box">
					<a href="<?= base_url() ?>user/cart_delete/<?php echo $value->id; ?>" class="fas fa-times" onclick="return confirm('delete this from cart?');"></a>
					<img src="<?= base_url() ?>assets/uploaded_img/<?php echo $value->image; ?>" alt="">
					<div class="name"><?php echo $value->name; ?></div>
					<div class="price">Rp.<?php echo $value->price; ?></div>
					<form action="<?= base_url() ?>user/cart_update" method="post">
						<input type="hidden" name="cart_id" value="<?php echo $value->id; ?>">
						<input type="number" min="1" name="cart_quantity" value="<?php echo $value->quantity; ?>">
						<input type="submit" name="update_cart" value="update" class="option-btn">
					</form>
					<div class="sub-total"> sub total : <span>Rp.<?php echo number_format($sub_total = ($value->quantity * $value->price)); ?></span> </div>
				</div>
		<?php
				$grand_total += $sub_total;
			}
		} else {
			echo '<p class="empty">your cart is empty</p>';
		}
		?>
	</div>

	<div style="margin-top: 2rem; text-align:center;">
		<a href="<?= base_url() ?>user/cart_delete_all" class="delete-btn <?php echo ($grand_total > 1) ? '' : 'disabled'; ?>" onclick="return confirm('delete all from cart?');">delete all</a>
	</div>

	<div class="cart-total">
		<p>grand total : <span>Rp.<?php echo number_format($grand_total); ?></span></p>
		<div class="flex">
			<a href="<?= base_url() ?>user/shop" class="option-btn">continue shopping</a>
			<a href="<?= base_url() ?>user/checkout" class="btn <?php echo ($grand_total > 1) ? '' : 'disabled'; ?>">proceed to checkout</a>
		</div>
	</div>

</section>
