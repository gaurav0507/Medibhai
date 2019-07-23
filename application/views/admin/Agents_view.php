
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
            <th>AgentsName</th>
            <th>Email & Mobile</th>
            <th>Package_Info</th>
            <th>Payment_Status</th>
			<th>Code</th>
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
                  <td><?php echo $row['first_name'].$row['last_name']; ?></td>
                  <td><?php echo $row['agent_email'].' /--/ '.$row['mobile']; ?></td>
                  <!--<td><?php echo $row['package_info']; ?></td>-->
				  <?php 
				    if($row['package_info'] == 1)
					{
						echo "<td><span class='badge badge-info'>Basic Package </span></td>";
					}
					else if($row['package_info'] == 2)
					{
						echo "<td><span class='badge'>Silver Package </span></td>";
					}
					else if($row['package_info'] == 3)
					{
						echo "<td><span class='badge badge-warning'>Gold Package </span></td>";
					}
					else
					{
						echo "<td><span class='badge badge-inverse'>No Package </span></td>";
					}
				  
				  ?>
				  <td><?php echo $row['payment_status']; ?></td>
				  <td><?php echo $row['activation_code']; ?></td>
				 
				  <td><a href="<?php echo base_url();?>admin/Agents/edit/<?php echo $row['id'];?>" class="btn btn-primary btn-mini">Edit</a></td>
				  
				  
				  
		    <?php } ?>
                
                
                
                
             </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

