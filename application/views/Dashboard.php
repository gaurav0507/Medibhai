
<style>
table, th, td {
  border: 1px solid black;
}
table{
	
    width: 450px;
    height: 70px;
				  
}

alert alert-success fade in{
	color:green;
}
</style>

<!--<a href="<?php echo base_url('Dashboard/upload') ?>">Upload </a> </br>

<a href="<?php echo base_url('Home/logout') ?>">Logout </a>-->



<div class="tygh-content clearfix">
                
				
				<div class="container-fluid  content-grid">

                <section class="ath_gird-section th_benefits">
                <div class="ath_container clearfix">
                <div class="row-fluid ">
                <div class="span16 ">
                <div class="ty-wysiwyg-content" data-ca-live-editor-object-id="0" data-ca-live-editor-object-type="">
                <div class="th_benefits th_benefits--tt col_3">


                
                <div class="ty-mainbox-body">
                                                


                <div class="ty-account">

                <div style="width: 1200px; height: 300px; border: 2px solid black;">
				<div style="width: 1200px; height: 100px; border: 1px solid black;"> 
				
			
				
				<table>
				  <tr>
					<th>Total Unit</th>
					<th>Used Unit</th>
					<th>Remaining Unit</th>
				  </tr>
				  <tr>
					<td><?php echo $user_package['total_unit'];?></td>
					<td><?php echo $user_package['used_unit'];?></td>
					<td><?php echo $user_package['remain_unit'];?></td>
				  </tr>
				  
				</table>
				
				</div>
				<?php 
				
				//print_r($this->session->userdata['user_info']);
				//print_r($user_package);
				
				?>
				<?php
				if($user_package['used_unit'] == $user_package['total_unit'])
				{
					echo "Please update Package or contact Admin to upgrade package";
				}
				else
				{
				?>
				<a href="<?php echo base_url('Dashboard/upload') ?>" class="ty-btn ty-btn__primary">Upload Policy </a>
				<?php } ?>
				
				<a href="<?php echo base_url('Dashboard/track') ?>" class="ty-btn ty-btn__primary">Track policy </a>

                </div>
				</div>
				</div>
				</div>
                </section>   
                    

                </div>
				
				
				
				
				
				
				
				
				
				
				
            </div>

