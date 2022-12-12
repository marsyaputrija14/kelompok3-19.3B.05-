<div class="heading">
	<h3>our product</h3>
	<p> <a href="home.php">home</a> / product </p>
</div>

<section class="products">

	<h1 class="title">latest products</h1>

	<div class="box-container">

		<?php
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
			echo '<p class="empty">no products added yet!</p>';
		}
		?>
	</div>

</section>
