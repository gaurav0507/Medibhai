<!DOCTYPE html>
<html lang="en">
    
<head>
        <title>MediBhai Admin</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>css/Demo.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>css/matrix-login.css" />
        <link href="<?php echo base_url();?>font-awesome/css/font-awesome.css" rel="stylesheet" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

    </head>
    <body> 
        <div id="loginbox">
        

		<form id="loginform" class="form-vertical" action="<?php echo ADMIN_SITE_URL;?>Login/user_login_process" method="post">
        
        <div class="control-group normal_text"> <h3><img src="<?php echo base_url();?>img/logo.png" alt="Logo" /></h3></div>
		
		<?php
		   
		   if(isset($error_message)){ echo "<center><div class='error_strings'>"; echo $error_message; echo "</div></center>";}
           if(isset($message_display)){ echo "<center><div class='success_string'>"; echo $message_display;echo "</div></center>";}
	    
        ?> 
                
        <div class="control-group">
        <div class="controls">
        <div class="main_input_box">
        <span class="add-on bg_lg"><i class="icon-user"> </i></span>
        <input type="text" placeholder="Email" name="username" id="username" value="<?php echo set_value('username');?>" />
        </div>
		<center><b class="error_strings"><?php echo form_error('username'); ?></b></center>
        </div>
        </div>

        <div class="control-group">
        <div class="controls">
        <div class="main_input_box">
        <span class="add-on bg_ly"><i class="icon-lock"></i></span>
        <input type="password" placeholder="Password" name="password" id="password" />
        </div>
		<center><b class="error_strings"><?php echo form_error('password'); ?></b></center>
        </div>
        </div>
                
        <div class="form-actions">
        <span class="pull-left"><a href="#" class="flip-link btn btn-info" id="to-recover">Lost password?</a></span>
        <span class="pull-right">
        <input type="submit" class="btn btn-success" name="login"  id="login" value="login">
        </span>
        </div>
        </form>
        
        <form id="recoverform" action="#" class="form-vertical">
		<p class="normal_text">Enter your e-mail address below and we will send you instructions how to recover a password.</p>
				
            <div class="controls">
            <div class="main_input_box">
            <span class="add-on bg_lo">
            <i class="icon-envelope"></i></span>
            <input type="text" placeholder="E-mail address" />
            </div>
            </div>
               
            <div class="form-actions">
            <span class="pull-left"><a href="#" class="flip-link btn btn-success" id="to-login">&laquo; Back to login</a></span>
            <span class="pull-right"><a class="btn btn-info"/>Recover</a></span>
            </div>
        
        </form>
        </div>
        
        <script src="<?php echo base_url();?>js/jquery.min.js"></script>  
        <script src="<?php echo base_url();?>js/matrix.login.js"></script> 
    </body>

</html>
