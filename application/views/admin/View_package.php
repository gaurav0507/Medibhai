
<div id="content">
  
    <div id="content-header">
    <div id="breadcrumb"> 
	<a href="<?php echo base_url();?>admin/dashboard" title="Go to Home" class="tip-bottom">
	<i class="icon-home"></i> Home</a> <a href="<?php echo base_url();?>admin/Agents/view" class="current">Agents</a> 
	</div>
    
	<h5><a href="<?php echo base_url();?>admin/Agents" class="btn">Add Agents</a></h5>
    </div>
 
    <div class="container-fluid">
    
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
        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
        <h5>Data table</h5>
        </div>
        
		<div class="widget-content nopadding">
        <table class="table table-bordered data-table">
        <thead>
            <tr>
		    <th>#</th>
            <th>Registration Fees</th>
            <th>Fix Amt</th>
            <th>GST(Tax)</th>
			<th>Total Amt</th>
            <th>Package-Info</th>
			<th>status</th>
		    <th>Action</th>
            </tr>
            </thead>
            
			<tbody>
            <?php
			    $i =1;
                foreach ($get_data as $row) 
                {
					  
					  
			?>
				  <tr class="gradeX">
				  <td><?php echo $i; ?></td>
                  <td><?php echo $row['registration_fees']; ?></td>
                  <td><?php echo $row['net_payment']; ?></td>
				  <td><?php echo $row['gst']; ?></td>
				  <td><?php echo $row['total_package_amt_paid']; ?></td>
				  <td><?php echo $row['package_info']; ?></td>
				  <?php if($row['status']==0){   ?>
					  
				  <td><a href="<?php echo base_url();?>admin/Package/status/<?php echo $row['id'];?>" class="btn btn-success btn-mini">Active</a></td>
				  <?php }
				  else
				  {  ?>
					  <td><a href="<?php echo base_url();?>admin/Package/status/<?php echo $row['id'];?>" class="btn btn-danger btn-mini">InActive</a></td>
				 <?php } ?>
				  
				  <td><a href="<?php echo base_url();?>admin/Package/edit/<?php echo $row['id'];?>" class="btn btn-info btn-mini">Edit</a></td>
				  
		    <?php $i++;
			
			} ?>
                
                
                
                
             </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

