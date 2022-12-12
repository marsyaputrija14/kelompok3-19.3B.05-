<section class="users">

   <h1 class="title"> user accounts </h1>

   <div class="box-container">
      <?php
         foreach ($users as $key => $value) {
      ?>
      <div class="box">
         <p> user id : <span><?php echo $value->id; ?></span> </p>
         <p> username : <span><?php echo $value->name; ?></span> </p>
         <p> email : <span><?php echo $value->email; ?></span> </p>
         <p> user type : <span style="color:<?php if($value->user_type == 'admin'){ echo 'var(--orange)'; } ?>"><?php echo $value->user_type; ?></span> </p>
         <a href="<?= base_url() ?>admin/users_delete/<?php echo $value->id; ?>" onclick="return confirm('delete this user?');" class="delete-btn">delete user</a>
      </div>
      <?php
         };
      ?>
   </div>

</section>
<script src="<?= base_url() ?>assets/js/admin_script.js"></script>

</body>
</html>
