
<div id="content">

<div id="content-header">
  
   <div id="breadcrumb"><a href="<?php echo base_url(); ?>admin/dashboard" title="Go to Home" class="tip-bottom">
   <i class="icon-home"></i> Home</a> 
   <a href="<?php echo base_url();?>admin/corporate">Corporate</a> 
   <a href="<?php echo base_url();?>admin/corporate/users" class="current">Bluk User create</a> 
   </div>
  
   <h1>Corporate User Creation </h1>

   <span class="badge badge-inverse"><a href='<?php echo base_url();?>uploads/cc_user_bulk_sheet.xlsx' target="#">Download</a></span>
   
</div>


<div class="container-fluid">
<hr>

<div class="row-fluid">
<div class="span12">
		    <?php 
			if(!empty($success)){ echo "<div class='alert alert-success fade in'>".count($success)."Successfull Inserted</div>"; }
            if(!empty($fail)) { echo "<div class='alert alert-danger fade in'>".count($fail)." Failed</div>"; }              
            ?>

<div class="widget-box">
        
		 <?php 
		   
		    $post = isset($eid) ? base_url()."admin/corporate/users" : base_url()."admin/corporate/users";
		?>
		
		<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
        <h5>Create Corporate Users</h5>
        </div>
        
		<div class="widget-content nopadding">
          
		<form action="<?php echo $post;?>" method="post" class="form-horizontal" enctype="multipart/form-data">
		
        
		
		
		
		
		<div class="control-group">
        <label class="control-label">Select Corporate</label>
        <div class="controls">
        <select id="corporate_id" name="corporate_id">
		        
				<?php foreach ($cc_corporate as $c): ?>
                <option value="<?php echo $c['id'] ?>"><?php echo $c['corporate_name'] ?></option>
                <?php endforeach; ?>  
                  
                  
        </select>
        </div>
        </div>
		
		<div class="control-group">
        <label class="control-label">File upload </label>
        <div class="controls">
        <input type="file" name="cc_bulk_sheet" id="cc_bulk_sheet"/>
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