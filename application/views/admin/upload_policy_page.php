
<div id="content">
  
    <div id="content-header">
    <div id="breadcrumb"> 
	<a href="<?php echo base_url();?>admin/dashboard" title="Go to Home" class="tip-bottom">
	<i class="icon-home"></i> Home</a> <a href="<?php echo base_url();?>admin/Agents/view" class="current">Upload_policy</a> 
	</div>
    
	<!--<h5><a href="<?php echo base_url();?>admin/Agents" class="btn">UPLOAD</a></h5>-->
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
            <th>File upload</th>
			<th>Status</th>
            <th>Created On</th>
		    <th>Edit</th>
            </tr>
            </thead>
            
			<tbody>
            <?php
			    $i =1;
                foreach ($documents as $row) 
                {
					  
					  
			?>
				  <tr class="gradeX">
				  <td><?php echo $i; ?></td>
                  <td><?php echo $row['first_name'] . $row['last_name']; ?></td>
                  <!--<td><?php echo $row['file_name']; ?></td>-->
				  <td><a href="<?php echo base_url();?>/uploads/<?php echo $row['user_id'];?>/<?php echo $row['file_name'];?>" target="_blank"><?php echo $row['file_name'];?></td>
				  <td><?php echo $row['status_type']; ?></td>
                  <td><?php echo $row['created_at']; ?></td>
				  
				  <!--<td><?php echo $row['id']; ?></td>-->
				  <td><a href="<?php echo base_url();?>admin/Policy/status_changed/<?php echo $row['id'];?>" class="btn btn-info btn-mini">Edit</a></td>
				  
				   
				  
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

