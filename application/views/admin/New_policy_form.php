
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
            <th>Assign Date</th>
			<th>File Name</th>
			<th>Policy Form</th>
            
            
            </tr>
            </thead>
            
			<tbody>
            <?php
			    $i =1;
				if(!empty($policy))
				{
                foreach ($policy as $row) 
                {
					  
					  
			?>
				  <tr class="gradeX">
				  <td><?php echo $i; ?></td>
                  
				  
				 <td><?php echo $row['created_on']; ?></td>
				 <td><a href="javascript:void(0)" onclick="window.open('<?php echo base_url().'admin/Plain/user_files/'.$row['id']; ?>','newwindow','width=1000,height=1000'); return false;">Uploaded Policy</a></td>
				 
				 <td><a href="">Health From</a></td>
				  
				  
				   
				  
		    <?php $i++;
			
				} 
				
				}?>
                
                
                
                
             </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

