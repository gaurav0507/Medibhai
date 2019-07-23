<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<div id="content">

<div id="content-header">
  
  <div id="breadcrumb"> <a href="<?php echo base_url(); ?>admin/Dashboard" title="Go to Home" class="tip-bottom">
  <i class="icon-home"></i> Home</a> 
  <a href="#" class="current">Policy upload</a> 
  </div>
  
  <h1>Uploaded Policy </h1>
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
		   
		   $post = isset($eid) ? base_url()."admin/Policy/status_update" : base_url()."admin/Policy/status_update";
		?>
		
		<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
        <h5>Edit Uploaded Policy</h5>
        </div>
        
		<div class="widget-content nopadding">
          
		<form action="<?php echo $post;?>" method="post" class="form-horizontal" id="policy" name="policy">
        
		<input type="hidden" id="eid" name="eid" value="<?php if(isset($eid)){echo $eid;}?>" />
		
		
		
		
		
        <div class="control-group">
        <label class="control-label">Claim Status</label>
        <div class="controls">
                <select id="dropdown_status" name="dropdown_status">
                  <?php
				  
				  if(!empty($status))
				  { ?>
			  
			      <option >--- select status ---</option>
				  <?php
				  foreach($status as $row)
				  { 
				  ?>
				  <option value="<?php echo $row['id'];?>"><?php echo $row['status_type'];?></option>
                  
				  <?php } } ?>
				  
                  
                  
                </select>
		<b class="error_strings"><?php echo form_error('dropdown_status'); ?></b>		
        </div>
        </div>
        
		<div class="control-group">
        <label class="control-label">Note Claim</label>
        <div class="controls">
        <textarea class="span11" name="note" id="note" ><?php if(isset($get_results)) { echo $get_results['note']; }?></textarea>
        <b class="error_strings"><?php echo form_error('note'); ?></b>
		</div>
		</div>
		
		
        
		<div class="form-actions">
        <button type="submit" class="btn btn-success" name="save" id="save" value="save">update status</button>
        </div>
        </form>
		
        </div>
		
</div>
	  
</div>
</div>
</div>
</div>



