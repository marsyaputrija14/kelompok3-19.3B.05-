<section class="home">

	<div class="content">
		<h3>KEEP READING</h3>
		<p>Membaca Adalah Cara Terbaik Untuk Mendapatkan Ide</p>
		<a href="<?= base_url()?>user/about" class="white-btn">discover more</a>
	</div>

</section>

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

	<div class="load-more" style="margin-top: 2rem; text-align:center">
		<a href="<?= base_url()?>user/shop" class="option-btn">load more</a>
	</div>

</section>

<section class="about">

	<div class="flex">

		<div class="image">
			<img src="<?= base_url()?>assets/images/about-img.jpg" alt="">
		</div>

		<div class="content">
			<h3>about us</h3>
			<p>The Vintage Bookshop merupakan toko buku yang menyediakan berbagai jenis buku , seperti novel, sejarah , komik, cerita, magazine , dan berbagai buku yang terbaru dari penerbit di indonesia. Tentunya dengan harga yang terjangkau</p>
			<a href="<?= base_url()?>user/about" class="btn">read more</a>
		</div>

	</div>

</section>

<section class="home-contact">

	<div class="content">
		<h3>have any questions?</h3>
		<p>Kamu ingin tahu tentang produk apa saja yang terlaris?</p>
		<a href="<?= base_url()?>user/contact" class="white-btn">contact us</a>
	</div>

</section>
