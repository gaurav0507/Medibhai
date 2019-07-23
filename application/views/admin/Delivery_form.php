
<div id="content">

<div id="content-header">
  
  <div id="breadcrumb"> <a href="<?php echo base_url(); ?>Dashboard" title="Go to Home" class="tip-bottom">
  <i class="icon-home"></i> Home</a> 
  <a href="#" class="current">Delivery Boy Registration</a> 
  </div>
  
  <h1>Delivery Boy Registration</h1>
</div>


<div class="container-fluid">
<hr>

<div class="row-fluid">
<div class="span12">
		<?php
        if($this->session->flashdata('message'))
        {
            $message = $this->session->flashdata('message');
            echo "<div class='".$message['class']."'>".$message['message']."</div>";
        }
        ?> 
<div class="widget-box">
        
		<?php 
		   
		   $post = isset($eid) ? base_url()."admin/Delivery/update" : base_url()."admin/Delivery/Add";
		?>
		
		<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
        <h5>Delivery Boy Info</h5>
        </div>
        
		<div class="widget-content nopadding">
          
		<form action="<?php echo $post;?>" method="post" class="form-horizontal" id="delivery_form" name="delivery_form">
		
		<input type="hidden" id="eid" name="eid" value="<?php if(isset($eid)){echo $eid;}?>" />
        
		<div class="control-group">
        <label class="control-label">Name :</label>
        <div class="controls">
        <input type="text" class="span11" placeholder="Please Enter Your Full Name"  name="name" id="name" value="<?php if(isset($get_results)){ echo $get_results['name']; }?>"/>
        <b class="error_strings"><?php echo form_error('name'); ?></b>
		</div>
		</div>
		
        
            
		<div class="control-group">
        <label class="control-label">Email :</label>
        <div class="controls">
        <input type="email"  class="span11" placeholder="Enter Email" name="email" id="email" value="<?php if(isset($get_results)){ echo $get_results['email']; }?>"  />
        <b class="error_strings"><?php echo form_error('email'); ?></b>
		</div>
		</div>
        
		<div class="control-group">
        <label class="control-label">Mobile :</label>
        <div class="controls">
        <input type="text" class="span11" placeholder="Mobile" name="mobile" id="mobile" value="<?php if(isset($get_results)){ echo $get_results['contact_number']; }?>"/>
        <b class="error_strings"><?php echo form_error('mobile'); ?></b>
		</div>
		</div>
		
		<div class="control-group">
        <label class="control-label">Alternate Mobile :</label>
        <div class="controls">
        <input type="text" class="span11" placeholder="Alternate Mobile" name="alt_mobile" id="alt_mobile" value="<?php if(isset($get_results)){ echo $get_results['alternate_number']; }?>" />
        </div>
		</div>
        
		<div class="control-group">
        <label class="control-label">Address :</label>
        <div class="controls">
        <textarea class="span11"name="address" id="address" ><?php if(isset($get_results)){ echo $get_results['address'];}?></textarea>
        <b class="error_strings"><?php echo form_error('address'); ?></b>
		</div>
		</div>
		
		<div class="control-group">
        <label class="control-label">Pincode :</label>
        <div class="controls">
        <input type="text" class="span11" placeholder="Pincode" name="pincode" id="pincode" value="<?php if(isset($get_results)){ echo $get_results['pincode']; }?>" />
        <b class="error_strings"><?php echo form_error('pincode'); ?></b>
		</div>
		</div>
        
		<?php if(isset($eid)){  ?>
			
			<div class="form-actions">
            <button type="submit" class="btn btn-success" name="update" id="update" value="update" >update</button>
            </div>
			
		<?php }
		else
		{   ?>
			
			<div class="form-actions">
            <button type="submit" class="btn btn-success" name="save" id="save" value="save" >Save</button>
            </div>
			
		<?php }?>
		
		
		
        </form>
		
        </div>
		
</div>
	  
</div>
</div>
</div>
</div>


<script type="text/javascript">
$(document).ready(function(){
    $("#delivery_form").validate({
    rules :{
        name:{
              required: true
             },
        mobile: {
                required: true,
				number: true,
                minlength: 10,
				maxlength: 12
			},
	   email:{
		   required: true,
		   email: true
	   },
	   address:{
		   required :true
	   },
	   pincode:{
		   required :true,
		   number: true,
		   minlength :6,
		   maxlength:6
	   }
    },
    messages :{
        name: {
              required: "Please Enter your Full Name"
              
             },
		mobile:{
			required:"Please Enter Mobile Number",
			number: "Please Enter Number Only",
			minlength :"Please Enter Your Valid Mobile Number",
			maxlength : "Please Enter Your Valid Mobile Number "
		},
		email:{
			required:"Please Enter Email Address",
			email:"Please Enter Valid Email Address"
		},
		address:{
			required:"Please Enter Address"
		},
		pincode:{
			required:"Please Enter Pincode",
			number : "only Numeric",
			minlength :"Pincode Must Contain 6Digit",
			maxlength : "Pincode Only 6Digit"
		}
		
    }
    });
});
</script>