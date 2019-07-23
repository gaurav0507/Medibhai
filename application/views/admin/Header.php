<!DOCTYPE html>
<html lang="en">
<head>
<title>Dashboard</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>css/fullcalendar.css" />
<link rel="stylesheet" href="<?php echo base_url();?>css/colorpicker.css" />
<link rel="stylesheet" href="<?php echo base_url();?>css/datepicker.css" />
<link rel="stylesheet" href="<?php echo base_url();?>css/uniform.css" />
<link rel="stylesheet" href="<?php echo base_url();?>css/select2.css" />
<link rel="stylesheet" href="<?php echo base_url();?>css/matrix-style.css" />
<link rel="stylesheet" href="<?php echo base_url();?>css/matrix-media.css" />
<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap-wysihtml5.css" />
<link href="<?php echo base_url();?>font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="<?php echo base_url();?>css/demo.css" />
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>


</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="#">Matrix Admin</a></h1>
</div>
<!--close-Header-part--> 

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  
    <ul class="nav">
    <li  class="dropdown" id="profile-messages" >
	<a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>
	<span class="text">Welcome <?php echo $this->session->userdata['logged_in']['firstname'];?></span><b class="caret"></b></a>
    <ul class="dropdown-menu">
    <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
    <li class="divider"></li>
    <li><a href="<?php echo base_url();?>logout"><i class="icon-key"></i> Log Out</a></li>
    </ul>
    </li>
    <li class=""><a title="" href="<?php echo base_url();?>logout"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
    </ul>

</div>

<!--start-top-serch-->
<div id="search">
  <!--<input type="text" placeholder="Search here..."/>
  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>-->
</div>
<!--close-top-serch--> 
