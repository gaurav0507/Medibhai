
<div id="content">
  
  <div id="content-header">
    <div id="breadcrumb"> 
	<a href="<?php echo base_url();?>admin/dashboard" title="Go to Home" class="tip-bottom">
	<i class="icon-home"></i> Home</a> <a href="<?php echo base_url();?>admin/corporate" class="current">Corporate</a> 
	</div>
    <!--<h1>Corporate</h1>-->
	<h5><a href="<?php echo base_url();?>admin/corporate/add" class="btn">Add Corporate</a></h5>
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
                  <th>Corporate Name</th>
                  <th>Email & Mobile</th>
                  <th>Address</th>
                  <th>Status</th>
				  <th>Edit</th>
                </tr>
              </thead>
              <tbody>
                <?php
				
                  $i =1;
                  foreach ($corporate as $result) 
                  {
					  
					  
				   ?>
				  <tr class="gradeX">
				  <td><?php echo $i; ?></td>
                  <td><?php echo $result['corporate_name']; ?></td>
                  <td><?php echo $result['email'].' /--/ '.$result['mobile']; ?></td>
                  <td><?php echo $result['corporate_address']; ?></td>
				  
				  
				  <?php if($result['status']==0){   ?>
					  
				  <td><a href="<?php echo base_url();?>admin/corporate/status/<?php echo $result['id'];?>" class="btn btn-success btn-mini">Active</a></td>
				  <?php }
				  else
				  {  ?>
					  <td><a href="<?php echo base_url();?>admin/corporate/status/<?php echo $result['id'];?>" class="btn btn-danger btn-mini">InActive</a></td>
				 <?php } ?>
				  
                 <td><a href="<?php echo base_url();?>admin/corporate/edit/<?php echo $result['id'];?>" class="btn btn-info btn-mini">Edit</a></td>
                </tr>
                
				  <?php  }  ?>
                
                
                
                
                
                
                
                
                
               
                
                
				
				
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

