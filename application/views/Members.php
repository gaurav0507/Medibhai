<!DOCTYPE html>
<html>
<head>

<title>Medibhai</title>

<style>

.outerdiv{
	width:100%;
	height:100vh;
}

.innerdiv{
	width:350px;
	height:500px;
	
	position:absolute;
	top:10%;
	left:40%;
	transform:translate(0%,13%);
	box-shadow: 0.1px 0px 6px #000000;
}

h2{
	text-align:center;
	color:black;
	text-transform:uppercase;
}

label{
	
	color:black;
}
</style>

</head>




   
   <div class="outerdiv">
   <div class="innerdiv">
   
   <h2>Register</h2>
   
   <form action="<?php echo base_url();?>Home/create_members" method="post" name="members" id="members">
  
   
   <label>First name:</label><br>
   <input type="text" name="firstname" id="firstname"></br>
   <b class="error_strings"><?php echo form_error('firstname'); ?></b>

   <label>Last name:</label><br>
   <input type="text" name="lastname" id="lastname"> </br>
   <b class="error_strings"><?php echo form_error('lastname'); ?></b>
   
   <label>Email Address:</label><br>
   <input type="text" name="email" id="email"> </br>
   <b class="error_strings"><?php echo form_error('email'); ?></b>
   
   <label>Mobile:</label><br>
   <input type="text" name="mobile" id="mobile"> </br>
   <b class="error_strings"><?php echo form_error('mobile'); ?></b>
   
   <label>Package:</label><br>
   <select name="package" id="package">
   <option value="1">upto 50</option>
   <option value="2">50 to 100</option>
   <option value="3">Above 100</option>
   </select>
   </br>
   <b class="error_strings"><?php echo form_error('package'); ?></b>
   
   <label>Password:</label><br>
   <input type="password" name="password" id="password"> </br>
   <b class="error_strings"><?php echo form_error('password'); ?></b>
   
   <label>Confirm Password:</label><br>
   <input type="password" name="confirm_password" id="confirm_password"> 
   <span id='message'></span></br></br>
   <b class="error_strings"><?php echo form_error('confirm_password'); ?></b>
   
   <input type="submit" value="Register" name="save" id="save">
   
  
   </form>


    </div>
	</div>






</body>
</html>
