
<div id="content">

<div id="content-header">
  
  <div id="breadcrumb"> <a href="<?php echo base_url(); ?>Dashboard" title="Go to Home" class="tip-bottom">
  <i class="icon-home"></i> Home</a> 
  <a href="#" class="current">Mapping Delivery Boy</a> 
  </div>
  
  <h1>Mapping Delivery</h1>
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
		   
		   $post = isset($eid) ? base_url()."admin/Delivery/update_mapping" : base_url()."admin/Delivery/add_mapping";
		?>
		
		<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
        <h5>Mapping Delivery to Pincode</h5>
        </div>
        
		<div class="widget-content nopadding">
          
		<form action="<?php echo $post;?>" method="post" class="form-horizontal" id="delivery_form" name="delivery_form">
        
		
		<!--<div class="control-group">
        <label class="control-label">Pincode :</label>
        <div class="controls">
                <select id="pincode" name="pincode">
                <option>Select Pincode</option>
                
				<?php foreach ($pincode as $pincode): ?>
                <option value="<?php echo $pincode['id']; ?>"><?php echo $pincode['pincode']; ?></option>
                <?php endforeach; ?>  			
                </select>
        </div>
		<b class="error_strings"><?php echo form_error('pincode'); ?></b>
        </div>-->
		
		
		<!--<div class="control-group">
        <label class="control-label">Multiple Select Delivery Executive</label>
        <div class="controls">
        <select multiple id="Delivery_boy" name="Delivery_boy[]">
                <option>Select Delivery Boy</option>
                  
				<?php if(isset($delivery_boy))
			    {
				foreach($delivery_boy as $db)
				{?>
				 
			    <option value="<?php echo $db['id'];?>"<?php echo set_select('delivery_boy', $db['id'], False);?>
				<?php if(!empty($get_result)){ if(in_array($course['id'],$get_result))
				{ echo "selected"; } }?>><?php echo $db['name']; ?> <?php echo $db['pincode']; ?></option>
				 <?php }}?>
				 
				  
        </select>
        </div>
		<b class="error_strings"><?php echo form_error('Delivery_boy'); ?></b>
        </div>-->
		
        <!-----DB DROPDOWN----->
		
		<div class="control-group">
        <label class="control-label">Select Delivery Executive :</label>
        <div class="controls">
                <select id="Delivery_boy" name="Delivery_boy">
                <option>Select Delivery Executive</option>
                
				<?php foreach ($delivery_boy as $db): ?>
                <option value="<?php echo $db['id'] ?>"><?php echo $db['name'] ?></option>
                <?php endforeach; ?>  			
                </select>
        </div>
		<b class="error_strings"><?php echo form_error('Delivery_boy'); ?></b>
        </div>
		
		
		
		<!---PINCODE DROPDOWN------>
		
		<div class="control-group">
        <label class="control-label">Multiple Select Pincode</label>
        <div class="controls">
        <select multiple id="pincode" name="pincode[]">
                <option>Select Pincode</option>
                  
				<?php if(isset($pincode_list))
			    {
				foreach($pincode_list as $code)
				{?>
				 
			    <option value="<?php echo $code['id'];?>"<?php echo set_select('pincode', $code['id'], False);?>
				<?php if(!empty($get_result)){ if(in_array($course['id'],$get_result))
				{ echo "selected"; } }?>><?php echo $code['pincode']; ?></option>
				 <?php }}?>
				 
				  
        </select>
        </div>
		<b class="error_strings"><?php echo form_error('pincode'); ?></b>
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


