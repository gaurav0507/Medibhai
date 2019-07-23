
<div id="content">

<div id="content-header">
  
  <div id="breadcrumb"> <a href="<?php echo base_url(); ?>Dashboard" title="Go to Home" class="tip-bottom">
  <i class="icon-home"></i> Home</a> 
  <a href="#" class="current">Agent Registration</a> 
  </div>
  
  <h1>Agent Registration Form Elements</h1>
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
        
		
		
		<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
        <h5>Agent Personal-info</h5>
        </div>
        
		<div class="widget-content nopadding">
          
		<form action="<?php echo base_url();?>admin/Agents/create" method="post" class="form-horizontal">
        
		<div class="control-group">
        <label class="control-label">First Name :</label>
        <div class="controls">
        <input type="text" class="span11" placeholder="First name"  name="firstname" id="firstname"/>
        <b class="error_strings"><?php echo form_error('firstname'); ?></b>
		</div>
		</div>
		
        <div class="control-group">
        <label class="control-label">Last Name :</label>
        <div class="controls">
        <input type="text" class="span11" placeholder="Last name" name="lastname" id="lastname" />
        <b class="error_strings"><?php echo form_error('lastname'); ?></b>
		</div>
		</div>
            
		<div class="control-group">
        <label class="control-label">Email :</label>
        <div class="controls">
        <input type="email"  class="span11" placeholder="Enter Email" name="email" id="email"  />
        <b class="error_strings"><?php echo form_error('email'); ?></b>
		</div>
		</div>
        
		<div class="control-group">
        <label class="control-label">Mobile :</label>
        <div class="controls">
        <input type="text" class="span11" placeholder="Mobile" name="mobile" id="mobile" />
        <b class="error_strings"><?php echo form_error('mobile'); ?></b>
		</div>
		</div>
		
		<div class="control-group">
        <label class="control-label">Alternate Mobile :</label>
        <div class="controls">
        <input type="text" class="span11" placeholder="Alternate Mobile" name="amobile" id="amobile" />
        </div>
		</div>
        
		<div class="control-group">
        <label class="control-label">Office Landline :</label>
        <div class="controls">
        <input type="text" class="span11" placeholder="office landline" name="landline" id="landline" />
        </div>
		</div>
		
            
		<div class="control-group">
        <label class="control-label">Address</label>
        <div class="controls">
        <textarea class="span11"name="address" id="address" ></textarea>
        <b class="error_strings"><?php echo form_error('address'); ?></b>
		</div>
		</div>
		
		<div class="control-group">
        <label class="control-label">Pincode :</label>
        <div class="controls">
        <input type="text" class="span11" placeholder="Pincode" name="pincode" id="pincode" />
        <b class="error_strings"><?php echo form_error('pincode'); ?></b>
		</div>
		</div>
        
		<div class="form-actions">
        <button type="submit" class="btn btn-success" name="save" id="save" value="save" >Save</button>
        </div>
        </form>
		
        </div>
		
</div>
	  
</div>
</div>
</div>
</div>