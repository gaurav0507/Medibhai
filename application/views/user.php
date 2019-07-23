
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

<form action="<?php echo base_url();?>Home/register" method="post" id="myform" name="myform"> 
<table align="center" cellpadding = "10">
 

<tr><td>FIRST NAME</td>
<td><input type="text" name="First_Name" id="First_Name" maxlength="30"/></td>
<?php echo form_error('First_Name'); ?>
</tr>
 

<tr>
<td>LAST NAME</td>
<td><input type="text" name="Last_Name" id="Last_Name" maxlength="30"/></td>
<?php echo form_error('Last_Name'); ?>
</tr>
 

<tr>
<td>EMAIL ID</td>
<td><input type="text" name="email_id" id="email_id" value="<?php echo set_value('email_id'); ?>" maxlength="50" /></td>
<?php echo form_error('email_id'); ?>
</tr>
 

<tr>
<td>MOBILE NUMBER</td>
<td>
<input type="text" name="Mobile_Number"  id="Mobile_Number" value="<?php echo set_value('Mobile_Number'); ?>" maxlength="12" /></td>
<?php echo form_error('Mobile_Number'); ?>
</tr>
 
<tr>
<td>PASSWORD</td>
<td>
<input type="password" name="password"  id="password" maxlength="10" /></td>
<?php echo form_error('password'); ?>
</tr> 


<!-----------------------Submit and Reset ----------------------->
<tr>
<td colspan="2" align="center"><input type="submit" value="Submit"></td>

</tr>

</form>




<tr>
<td> <a href="<?=$google_login_url?>"  class="waves-effect waves-light btn red"><i class="fa fa-google left"></i>Google login</a></td>
<td> <p><a href="<?=$authUrl?>">FaceBook</a></p></td>
</tr>

</table>
 
 
 
<script type="text/javascript">
$(document).ready(function(){
    $("#myform").validate({
    rules :{
        First_Name:{
              required: true
             },
		Last_Name:{
              required: true
             },
        Mobile_Number: {
                required: true,
				number: true,
                minlength: 10,
				maxlength: 12,
			},
	   email_id:{
		   required: true,
		   email: true
	   },
	   password: { 
                 required: true,
                    minlength: 6,
                    maxlength: 10,

               } 

                   
	   
    },
    messages :{
        First_Name: {
              required: "Please Enter your First Name"
              
             },
		Last_Name: {
              required: "Please Enter your Last Name"
              
             },
		Mobile_Number:{
			required:"Please Enter Mobile Number",
			number: "Please Enter Number Only",
			minlength :"Please Enter Your Valid Mobile Number",
			maxlength : "Please Enter Your Valid Mobile Number "
		},
		email_id:{
			required:"Please Enter Email Address",
			email:"Please Enter Valid Email Address"
		},
		
		password: { 
                 required:"Password is required"

               }
		
    }
    });
});
</script>