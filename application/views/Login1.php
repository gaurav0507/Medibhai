<!DOCTYPE html>
<html>
<body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


<form action="<?php echo base_url();?>Home/signin" method="post" name="members" id="members">
  
  
   
   <label>Email Address:</label><br>
   <input type="text" name="email" id="email"> </br>
   <b class="error_strings"><?php echo form_error('email'); ?></b>
   
   <label>Password:</label><br>
   <input type="password" name="password" id="password"> </br>
   <b class="error_strings"><?php echo form_error('password'); ?></b>
   
   
   
   <input type="submit" value="Login" name="save" id="save">
   
  
</form>





</body>
</html>
