<div class="heading">
	<h3>search page</h3>
	<p> <a href="<?= base_url() ?>user">home</a> / search </p>
</div>

<section class="search-form">
	<form action="<?= base_url() ?>user/search" method="post">
		<input type="text" name="search" placeholder="search products..." class="box">
		<input type="submit" name="submit" value="search" class="btn">
	</form>
</section>

<section class="products" style="padding-top: 0;">

	<div class="box-container">
		<?php
		if (isset($_POST['submit'])) {
			if ($products) {
				foreach ($products as $key => $value) {
		?>
					<form action="<?= base_url() ?>user/cart_add" method="post" class="box">
						<img class="image" src="<?= base_url() ?>assets/uploaded_img/<?php echo $value->image; ?>" alt="">
						<div class="name"><?php echo $value->name; ?></div>
						<div class="price">Rp.<?php echo $value->price; ?></div>
						<input type="number" min="1" name="product_quantity" value="1" class="qty">
						<input type="hidden" name="product_name" value="<?php echo $value->name; ?>">
						<input type="hidden" name="product_price" value="<?php echo $value->price; ?>">
						<input type="hidden" name="product_image" value="<?php echo $value->image; ?>">
						<input type="submit" value="add to cart" name="add_to_cart" class="btn">
					</form>
		<?php
				}
			} else {
				echo '<p class="empty">no result found!</p>';
			}
		} else {
			echo '<p class="empty">search something!</p>';
		}
		?>
	</div>


</section>
