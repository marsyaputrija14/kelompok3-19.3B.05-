<div class="heading">
<h3>contact us</h3>
<p> <a href="<?= base_url() ?>user">home</a> / contact </p>
</div>

<section class="contact">

	<form action="<?= base_url() ?>user/contact_add" method="post">
		<h3>say something!</h3>
		<input type="text" name="name" required placeholder="enter your name" class="box">
		<input type="email" name="email" required placeholder="enter your email" class="box">
		<input type="number" name="number" required placeholder="enter your number" class="box">
		<textarea name="message" class="box" placeholder="enter your message" id="" cols="30" rows="10"></textarea>
		<input type="submit" value="send message" name="send" class="btn">
	</form>

</section>
