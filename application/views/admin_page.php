
	<section class="dashboard">

		<h1 class="title">dashboard</h1>

		<div class="box-container">

			<div class="box">
				<h3>Rp. <?php echo number_format($pending); ?></h3>
				<p>total pendings</p>
			</div>

			<div class="box">
				<h3>Rp. <?php echo number_format($completed); ?></h3>
				<p>completed payments</p>
			</div>

			<div class="box">
				<h3><?php echo $total_order; ?></h3>
				<p>order placed</p>
			</div>

			<div class="box">
				<h3><?php echo $total_products; ?></h3>
				<p>products added</p>
			</div>

			<div class="box">
				<h3><?php echo $total_user; ?></h3>
				<p>normal users</p>
			</div>

			<div class="box">
				<h3><?php echo $total_admin; ?></h3>
				<p>admin users</p>
			</div>

			<div class="box">
				<h3><?php echo $total_akun; ?></h3>
				<p>total accounts</p>
			</div>

			<div class="box">
				<h3><?php echo $total_pesan; ?></h3>
				<p>new messages</p>
			</div>

		</div>

	</section>
	<script src="<?= base_url() ?>/assets/js/admin_script.js"></script>

</body>

</html>
