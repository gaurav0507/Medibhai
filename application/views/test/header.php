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
    <script type="text/javascript" src="<?php echo base_url();?>frontend_css/js/move-top.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>frontend_css/js/easing.js"></script>
    
    
</head>

<body>
    
    <div class="agileits_header">
        
		<div class="container">
        <!--<div class="w3l_offers">
		<p>Welcome : <?php echo $this->session->userdata['user_info']['lastname']; ?></p>
		</div>-->
            
            <div class="agile-login">
            <ul>
			<?php
			if(isset($_SESSION["user_info"]))
			{ 
		    ?>
			    <li><a href="<?php echo base_url();?>Home/logout">Logout</a></li>
		    <?php  
		    } 
			else
			{ ?>
				<li><a href="registered.php"> Create Account </a></li>
				<li><a href="login.php">Login</a></li>
		    <?php } ?>
            
			
			
            </ul>
            </div>
            <div class="product_list_header">

            </div>
            
			
        </div>
    </div>

    
    
    
    
    