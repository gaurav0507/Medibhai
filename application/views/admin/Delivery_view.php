
<div id="content">
  
    <div id="content-header">
    <div id="breadcrumb"> 
	<a href="<?php echo base_url();?>admin/dashboard" title="Go to Home" class="tip-bottom">
	<i class="icon-home"></i> Home</a> <a href="<?php echo base_url();?>admin/Delivery/view" class="current">Delivery</a> 
	</div>
    
	<h5><a href="<?php echo base_url();?>admin/Delivery" class="btn">Add Delivery Executive</a></h5>
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
            <th>Name</th>
            <th>Mobile</th>
            <th>Address</th>
			<th>Pincode</th>
            <th>Status</th>
		    <th>Edit</th>
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
                  <td><?php echo $row['name']; ?></td>
                  <td><?php echo $row['contact_number']; ?></td>
                  <td><?php echo $row['address']; ?></td>
				  <td><?php echo $row['pincode']; ?></td>
				  <td>
				  <?php 
	              if($row['status']==0)
				  {  
				  ?>
				  <a href="<?php echo base_url();?>admin/Delivery/status/<?php echo $row['id'];?>" class="btn btn-success btn-mini confirmation">Active</a>
                  <?php 
				  }
				  else
				  { ?>
				  <a href="<?php echo base_url();?>admin/Delivery/status/<?php echo $row['id'];?>" class="btn btn-danger btn-mini confirmation">In-Active</a>
				  <?php 
				  } 
				  ?>
				  </td>
				  <td><a href="<?php echo base_url();?>admin/Delivery/edit/<?php echo $row['id'];?>"  class="btn btn-primary btn-mini">Edit</a></td>
				  
				  
				  
				<?php  } ?>
                
                
                
                
             </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<script type="text/javascript">
    $('.confirmation').on('click', function () 
	{
        return confirm('Are you sure?');
    });
</script>

