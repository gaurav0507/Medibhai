<!DOCTYPE html>
<html>

<head>
    <title>Medibhai</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="http://www.medibhai.com/images/logos/9/medibhai_final__2___5__vnpn-im.png" rel="shortcut icon" type="image/png" />
    <link href="<?php echo base_url();?>frontend_css/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo base_url();?>frontend_css/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo base_url();?>frontend_css/css/font-awesome.css" rel="stylesheet">
    <script src="<?php echo base_url();?>frontend_css/js/jquery-1.11.1.min.js"></script>
    <link href='//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
   <link rel="stylesheet" href="<?php echo base_url();?>css/Demo.css" />
    
</head>

<body>
    <!-- header -->
    <div class="agileits_header">
            <div class="container">
            
            <div class="agile-login">
            <ul>
            <li><a href="<?php echo base_url();?>Home/Registeration"> Create Account </a></li>
            <li><a href="<?php echo base_url();?>Home/signin">Login</a></li>
            </ul>
            </div>
            <div class="product_list_header">
            </div>
            <div class="clearfix"> </div>
            </div>
    </div>

    
   

  
<div class="login">
        <div class="container">
        <h2>Login Form</h2>
        <div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
        
		<form action="<?php echo base_url();?>Home/signin" method="post" name="members" id="members">
        
		<input type="email" placeholder="Email Address" name="email" id="email" >
		<span class="error_strings"><?php echo form_error('email'); ?></span>
		
        <input type="password" placeholder="Password" name="password" id="password">
		<span class="error_strings"><?php echo form_error('password'); ?></span>
        
		<div class="forgot">
        <a href="#">Forgot Password?</a>
        </div>
        
		<input type="submit" value="Login" name="save" id="save">
        </form>
		
		
        </div>
        </div>
</div>


<div class="footer-botm"></div>

<script src="<?php echo base_url();?>frontend_css/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>frontend_css/js/minicart.min.js"></script>
<script src="<?php echo base_url();?>frontend_css/js/skdslider.min.js"></script>
<link href="<?php echo base_url();?>frontend_css/css/skdslider.css" rel="stylesheet">


</body>
</html> 