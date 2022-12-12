<section class="add-products">

	<h1 class="title">shop products</h1>

	<form action="<?= base_url() ?>/admin/products_tambah" method="post" enctype="multipart/form-data">
		<h3>add product</h3>
		<input type="text" name="name" class="box" placeholder="enter product name" required>
		<input type="number" min="0" name="price" class="box" placeholder="enter product price" required>
		<input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="box" required>
		<input type="submit" value="add product" name="add_product" class="btn">
	</form>

</section>

<!-- product CRUD section ends -->

<!-- show products  -->

<section class="show-products">

	<div class="box-container">
		<?php
		if ($products) {
			foreach ($products->result() as $key => $value) {
		?>
				<div class="box">
					<img src="<?= base_url() ?>assets/uploaded_img/<?php echo $value->image; ?>" alt="">
					<div class="name"><?php echo $value->name; ?></div>
					<div class="price">Rp.<?php echo $value->price; ?></div>
					<a href="<?= base_url() ?>admin/products_update/<?php echo $value->id; ?>" class="option-btn">update</a>
					<a href="<?= base_url() ?>admin/products_delete/<?php echo $value->id; ?>" class="delete-btn" onclick="return confirm('delete this product?');">delete</a>
				</div>
		<?php
			}
		} else {
			echo '<p class="empty">no products added yet!</p>';
		}
		?>

	</div>

</section>

<section class="edit-product-form">
	<?php
	if ($update) {
	?>
		<form action="<?=base_url()?>admin/products_up" method="post" enctype="multipart/form-data">
			<input type="hidden" name="update_p_id" value="<?php echo $update[0]->id; ?>">
			<input type="hidden" name="update_old_image" value="<?php echo $update[0]->image; ?>">
			<img src="<?=base_url()?>assets/uploaded_img/<?php echo $update[0]->image; ?>" alt="">
			<input type="text" name="update_name" value="<?php echo $update[0]->name; ?>" class="box" required placeholder="enter product name">
			<input type="number" name="update_price" value="<?php echo $update[0]->price; ?>" min="0" class="box" required placeholder="enter product price">
			<input type="file" class="box" name="update_image" accept="image/jpg, image/jpeg, image/png">
			<input type="submit" value="update" name="update_product" class="btn">
			<a href='<?=base_url()?>admin/products' class="option-btn">Cancel</a>
		</form>
	<?php
	} else {
		echo '<script>document.querySelector(".edit-product-form").style.display = "none";</script>';
	}
	?>


</section>
<script src="<?= base_url() ?>assets/js/admin_script.js"></script>

</body>

</html>
