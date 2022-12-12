<section class="messages">

	<h1 class="title">messages</h1>

	<div class="box-container">
		<?php
		if ($messages) {
			foreach ($messages as $key => $value) {
		?>
				<div class="box">
					<p> user id : <span><?php echo $value->user_id; ?></span> </p>
					<p> name : <span><?php echo $value->name; ?></span> </p>
					<p> number : <span><?php echo $value->number; ?></span> </p>
					<p> email : <span><?php echo $value->email; ?></span> </p>
					<p> message : <span><?php echo $value->message; ?></span> </p>
					<a href="<?= base_url() ?>admin/orders_delete/<?php echo $value->id; ?>" onclick="return confirm('delete this message?');" class="delete-btn">delete message</a>
				</div>
		<?php
			}
		} else {
			echo '<p class="empty">you have no messages!</p>';
		}
		?>
	</div>

</section>

<script src="<?= base_url() ?>assets/js/admin_script.js"></script>

</body>

</html>
