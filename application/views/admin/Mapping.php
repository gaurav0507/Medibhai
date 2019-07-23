
<div id="content">
  
    <div id="content-header">
    <div id="breadcrumb"> 
	<a href="<?php echo base_url();?>admin/dashboard" title="Go to Home" class="tip-bottom">
	<i class="icon-home"></i> Home</a> <a href="<?php echo base_url();?>admin/Delivery/view" class="current">Mapping</a> 
	</div>
    
	<h5><a href="#" class="btn"> Mapping </a></h5>
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
            <!--<th>Pincode</th>-->
            <th>Delivery Boy</th>
			<th>Service Pincode</th>
			<th>Mobile</th>
			<th>Status</th>
            <th>Edit</th>
            </tr>
            </thead>
            
			<tbody>
            <?php
			    $i =1;
				
                foreach ($mapped_data as $row) 
                {
					  
					  
			?>
				  <tr class="gradeX">
				  <td><?php echo $i; ?></td>
                  <!--<td><?php echo $row['mapped']; ?></td>-->
                  <td><?php echo $row['name']; ?></td>
				  <td><?php echo $row['mapped']; ?></td>
				  <td><?php echo $row['contact_number'].'  -/-  '.$row['alternate_number']; ?></td>
				  <td><?php 
	              if($row['db']==0)
				  {  
				  ?>
				  <a href="<?php echo base_url();?>admin/Delivery/status/<?php echo $row['pdbm'];?>" class="btn btn-success btn-mini">Active</a>
                  <?php 
				  }
				  else
				  { ?>
				  <a href="<?php echo base_url();?>admin/Delivery/status/<?php echo $row['pdbm'];?>" class="btn btn-danger btn-mini">In-Active</a>
				  <?php } ?>
				  </td>
				  <td><a href="<?php echo base_url();?>admin/Delivery/<?php echo $row['pdbm'];?>" class="btn btn-primary btn-mini">Edit</a></td>
				  
				  
				  
				<?php  
				      $i++;
				} ?>
                
                
                
                
             </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

