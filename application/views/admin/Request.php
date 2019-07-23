
<div id="content">
  
    <div id="content-header">
    <div id="breadcrumb"> 
	<a href="<?php echo base_url();?>admin/dashboard" title="Go to Home" class="tip-bottom">
	<i class="icon-home"></i> Home</a> <a href="#" class="current">CLAIM REQUEST</a> 
	</div>
    
	<h5><a href="#" class="btn">CLAIM REQUEST</a></h5>
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
           
            <th>Delivery Boy</th>
			<th>Service Pincode</th>
			<th>Mobile</th>
			<th>Status</th>
            <th>Edit</th>
            </tr>
            </thead>
            
			<tbody>
            
				  <tr class="gradeX">
				  <td>xcvxcvx</td>
                  <td>vxcvxcvx</td>
				  <td>vxcvxcvx</td>
				  <td>vxcvxcvx</td>
				  <td>vxcvxcvx</td>
				  <td>vxcvxcvx</td>
                  
				  
				  
				
                
                
                
                
             </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

