<div id="content">
<div id="content-header">
  
  <div id="breadcrumb"> <a href="<?php echo base_url(); ?>Dashboard" title="Go to Home" class="tip-bottom">
  <i class="icon-home"></i> Home</a> 
  <a href="#" class="current">Users</a> 
  </div>
  
  <h1>Users Form</h1>
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
			<h5>Users General-info</h5>
			</div>
			
			<div class="widget-content nopadding">
			  
			<form action="<?php echo base_url();?>admin/Users/create" method="post" class="form-horizontal">
			
			
			<div class="control-group">
            <label class="control-label">Select Title</label>
            <div class="controls">
            <select>
                  <option value="Mr.">Mr.</option>
                  <option value="Mrs.">Mrs.</option>
                  <option value="Ms.">Ms.</option>
                  <option value="M/s.">M/s.</option>
				  <option value="Master.">Master.</option>
                  
            </select>
            </div>
            </div>
		   
				
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
        <label class="control-label">Date of birth :</label>
        <div class="controls">
        <div class="input-group date">
	    <input type="text" class="form-control" id="dob" name="dob" readonly>
		<div class="input-group-addon">
		 <b class="error_strings"><?php echo form_error('dob'); ?></b>
		</div>
		</div>
        </div>		
		</div>	
		
		<hr>
		
		<div class="span11">
        <h4>Address</h4>
        </div>	
				
			
			
			
			
		<div class="form-actions">
		<button type="submit" class="btn btn-success" name="update" id="update" value="update">update info</button>
		</div>
		</form>
			
		 </div>
			
	</div>
	  
</div>
</div>
</div>
</div>

<script>

var searchMinDate = "-80y";

$('#dob').datepicker({
	minDate:searchMinDate,
	format: 'dd-mm-yyyy',
    maxDate: 0,
    autoclose: true,
	changeMonth: true,
    changeYear: true,
    yearRange: "-80:+0"
	
});
</script>