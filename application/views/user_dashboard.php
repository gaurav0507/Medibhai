<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  
  
  
</head>
<body> 
 
<div class="container">
  <h2>Welcome User</h2>
  
    <?php if($this->session->userdata('sess_logged_in'))
		  {  ?>
		<h2><a href="<?php echo base_url();?>Home/userlogout">Logout</a></h2>	    
	<?php	  }
	?>
   
   <div class="resultdiv">
   <?php
    
	if($this->session->flashdata('error')){echo "<div class=alert-danger>".$this->session->flashdata('error')."</div>";}
    if($this->session->flashdata('success')){echo "<div class=alert-success>".$this->session->flashdata('success')."</div>";}
	
	?>
   </div>
  
  <div class="panel panel-default">
  <div class="panel-body"><a href="<?php echo base_url();?>Dashboard_user/user_upload">Upload Policy</a></div>
  </div>
  
  <div class="panel panel-default">
  <div class="panel-body"><a href="<?php echo base_url();?>Dashboard_user/policy_info">Policy Info</a></div>
  </div>
  
  <div class="panel panel-default">
  <div class="panel-body">
  <!--<a href="#" class="claim" id="<?php echo $this->session->userdata['id'];?>">Claim Request</a>-->
  
    <form action="<?php echo base_url();?>Dashboard_user/claim_request" method="POST" id="change">
             <input type="hidden" value="<?php echo $this->session->userdata['id'];?>" id="id" name="id" >    
             <input type="submit" value="Claim Request" >
    </form>
  
  </div>
  </div>
  
</div>






</body>
</html>
