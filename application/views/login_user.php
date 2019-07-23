
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>



<?php
    
	if($this->session->flashdata('error')){echo "<div class=alert-danger>".$this->session->flashdata('error')."</div>";}
    
	
?>



<form action="<?php echo base_url();?>Home/Auth" method="post" id="login" name="login" enctype="multipart/form-data"> 
<table align="center" cellpadding = "10">
 
 
<tr>
<td>EMAIL ID / MOBILE</td>
<td><input type="text" name="txtemailmobile" id="txtemailmobile" value="<?php echo set_value('txtemailmobile'); ?>" maxlength="50" placeholder="Enter Email and mobile" /></td>
<?php echo form_error('txtemailmobile'); ?>
</tr>
 


 
<tr>
<td>PASSWORD</td>
<td>
<input type="password" name="password"  id="password" maxlength="10" placeholder="Password"  /></td>
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
    $("#login").validate({
    rules :{
        txtemailmobile:{
              required: true
             },
	   password: { 
                 required: true
               } 

                   
	   
    },
    messages :{
        txtemailmobile: {
              required: "Please Enter Mobile Number or Email address"
		},
             
		password: { 
                 required:"Password is required"

               }
		
    }
    });
});
</script>