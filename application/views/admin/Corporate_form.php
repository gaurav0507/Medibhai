
<div id="content">

<div id="content-header">
  
  <div id="breadcrumb"> <a href="<?php echo base_url(); ?>admin/dashboard" title="Go to Home" class="tip-bottom">
  <i class="icon-home"></i> Home</a> 
   <a href="<?php echo base_url();?>admin/corporate">Corporate</a> 
  <a href="<?php echo base_url();?>admin/corporate/add" class="current">Corporate Registration</a> 
  </div>
  
  <h1>Corporate Registration </h1>
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
		   
		    $post = isset($eid) ? base_url()."admin/corporate/update" : base_url()."admin/corporate/add";
		?>
		
		<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
        <h5>Corporate</h5>
        </div>
        
		<div class="widget-content nopadding">
          
		<form action="<?php echo $post;?>" method="post" class="form-horizontal">
		
        <input type="hidden" id="eid" name="eid" value="<?php if(isset($eid)){echo $eid;}?>" />
		
		<div class="control-group">
        <label class="control-label">Corporate Name :</label>
        <div class="controls">
        <input type="text" class="span11" placeholder="Corporate name"  name="Corporate_name" id="Corporate_name" value="<?php if(isset($get_results)) { echo $get_results['corporate_name']; }?>"/>
        <b class="error_strings"><?php echo form_error('Corporate_name'); ?></b>
		</div>
		</div>
		
		
		<div class="control-group">
        <label class="control-label">Hr Name :</label>
        <div class="controls">
        <input type="text" class="span11" placeholder="Hr Name"  name="Hr_name" id="Hr_name" value="<?php if(isset($get_results)) { echo $get_results['Hr_name']; }?>"/>
        <b class="error_strings"><?php echo form_error('Hr_name'); ?></b>
		</div>
		</div>
		
		
		<div class="control-group">
        <label class="control-label">Branch :</label>
        <div class="controls">
        <input type="text" class="span11" placeholder="Branch"  name="branch" id="branch" value="<?php if(isset($get_results)) { echo $get_results['branch']; }?>"/>
        <b class="error_strings"><?php echo form_error('branch'); ?></b>
		</div>
		</div>
		
		
		
        <div class="control-group">
        <label class="control-label">Corporate Email :</label>
        <div class="controls">
        <input type="email"  class="span11" placeholder="Enter Email" name="email" id="email" value="<?php if(isset($get_results)) { echo $get_results['email']; }?>" />
        <b class="error_strings"><?php echo form_error('email'); ?></b>
		</div>
		</div>
        
		<div class="control-group">
        <label class="control-label">Corporate Mobile :</label>
        <div class="controls">
        <input type="text" class="span11" placeholder="Mobile" name="mobile" id="mobile" value="<?php if(isset($get_results)) { echo $get_results['mobile']; }?>" />
        <b class="error_strings"><?php echo form_error('mobile'); ?></b>
		</div>
		</div>
		
		<div class="control-group">
        <label class="control-label">Corporate Landline :</label>
        <div class="controls">
        <input type="text" class="span11" placeholder="landline" name="landline" id="landline" value="<?php if(isset($get_results)) { echo $get_results['landline']; }?>" />
		<b class="error_strings"><?php echo form_error('landline'); ?></b>
        </div>
		</div>
		
            
		<div class="control-group">
        <label class="control-label">Corporate Address</label>
        <div class="controls">
        <textarea class="span11"name="address" id="address" ><?php if(isset($get_results)) { echo $get_results['corporate_address']; }?></textarea>
        <b class="error_strings"><?php echo form_error('address'); ?></b>
		</div>
		</div>
		
		
		
		<?php  if(isset($eid)){ ?>
			
			<div class="form-actions">
			<button type="submit" class="btn btn-success" name="update" id="update" value="update" >Update</button>
			</div>
			
		<?php }else{  ?>
			
			<div class="form-actions">
			<button type="submit" class="btn btn-success" name="save" id="save" value="save" >Save</button>
			</div>
			
		<?php } ?>
        
		
		
		
        </form>
		
        </div>
		
</div>
	  
</div>
</div>
</div>
</div>