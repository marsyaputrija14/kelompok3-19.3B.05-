<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>admin panel</title>

	<!-- font awesome cdn link  -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

	<!-- custom admin css file link  -->
	<link rel="stylesheet" href="<?= base_url() ?>/assets/css/admin_style.css">

</head>

<body>

<header class="header">

   <div class="flex">

      <a href="admin_page.php" class="logo">Admin<span>Panel</span></a>

      <nav class="navbar">
         <a href="<?= base_url() ?>admin">home</a>
         <a href="<?= base_url() ?>admin/products">products</a>
         <a href="<?= base_url() ?>admin/orders">orders</a>
         <a href="<?= base_url() ?>admin/users">users</a>
         <a href="<?= base_url() ?>admin/messages">messages</a>
      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="account-box">
         <p>username : <span><?php echo $this->session->name; ?></span></p>
         <p>email : <span><?php echo $this->session->email; ?></span></p>
         <a href="<?= base_url() ?>/login/logout" class="delete-btn">logout</a>
         <div>new <a href="<?= base_url() ?>/login">login</a> | <a href="<?= base_url() ?>/login/register">register</a></div>
      </div>

   </div>

</header>
<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>
