<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>home</title>

	<!-- font awesome cdn link  -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

	<!-- custom css file link  -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">

</head>

<body>
	<header class="header">

		<div class="header-2">
			<div class="flex">
				<a href="home.php" class="logo">The Vintage Bookshop</a>

				<nav class="navbar">
					<a href="<?= base_url() ?>user/">home</a>
					<a href="<?= base_url() ?>user/about">about</a>
					<a href="<?= base_url() ?>user/shop">shop</a>
					<a href="<?= base_url() ?>user/contact">contact</a>
					<a href="<?= base_url() ?>user/orders">orders</a>
				</nav>

				<div class="icons">
					<div id="menu-btn" class="fas fa-bars"></div>
					<a href="<?= base_url() ?>user/search" class="fas fa-search"></a>
					<div id="user-btn" class="fas fa-user"></div>
					<a href="<?= base_url() ?>user/cart"> <i class="fas fa-shopping-cart"></i> <span>(<?php echo $cart_row_number ?? 0; ?>)</span> </a>
				</div>

				<div class="user-box">
					<p>username : <span><?php echo $this->session->name; ?></span></p>
					<p>email : <span><?php echo $this->session->email; ?></span></p>
					<a href="<?= base_url() ?>/login/logout" class="delete-btn">logout</a>
				</div>
			</div>
		</div>
	</header>
	<?php
	if (isset($message)) {
		foreach ($message as $message) {
			echo '
      <div class="message">
         <span>' . $message . '</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
		}
	}
	?>
