
<div id="content">
  
  <div id="content-header">
    <div id="breadcrumb"> 
	<a href="<?php echo base_url();?>admin/dashboard" title="Go to Home" class="tip-bottom">
	<i class="icon-home"></i> Home</a> <a href="<?php echo base_url();?>admin/corporate/view_user" class="current">Users</a> 
	</div>
    <!--<h1>Corporate</h1>-->
	<h5><a href="<?php echo base_url();?>admin/corporate/users" class="btn">Add Users</a></h5>
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
                  <th>Email</th>
				  <th>Mobile</th>
                  <th>Corporate</th>
				  <th>Code</th>
                  <th>Status</th>
				  <th>Edit</th>
                </tr>
              </thead>
              <tbody>
                <?php
				
                  $i =1;
                  foreach ($results as $row) 
                  {
					  
					  
				   ?>
				  <tr class="gradeX">
				  <td><?php echo $i; ?></td>
                  <td><?php echo $row['first_name'].' '.$row['last_name']; ?></td>
                  <td><?php echo $row['email']; ?></td>
				  <td><?php echo $row['mobile']; ?></td>
                  <td><?php echo $row['corporate_name']; ?></td>
				  <td><?php echo $row['corporate_id']; ?></td>
				  
				  <?php if($row['user_status']==0){   ?>
					  
				  <td><a href="<?php echo base_url();?>admin/corporate/users_status/<?php echo $row['id'];?>" class="btn btn-success btn-mini">Active</a></td>
				  <?php }
				  else
				  {  ?>
					  <td><a href="<?php echo base_url();?>admin/corporate/users_status/<?php echo $row['id'];?>" class="btn btn-danger btn-mini">InActive</a></td>
				 <?php } ?>
				  
                 <td><a href="<?php echo base_url();?>admin/Users/user_edit/<?php echo $row['id'];?>" class="btn btn-info btn-mini">Edit</a></td>
                </tr>
                
				  <?php  $i++; }  ?>
                
                
                
                
                
                
                
                
                
               
                
                
				
				
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

