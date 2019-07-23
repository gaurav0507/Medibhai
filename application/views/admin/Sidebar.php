<!--sidebar-menu-->

<div id="sidebar">
   
    <?php 
	if(!empty($Menu))
	{
		if(isset($Menu["dashboard"]))
		{
			$dashboard = $Menu["dashboard"];
			$Agents = $Menu["Agents"];
			$Package = $Menu["Package"];
			$Policy = $Menu["Policy"];
			$corporate = $Menu["corporate"];
			$Delivery = $Menu["Delivery"];
			$claim = $Menu["claim"];
		}
		
	}
	?>
    
	<ul>
    
	
	
	
	<?php
	
	if(isset($dashboard) && !empty($dashboard))
	{
	  echo '<li>
	  <a href="'.base_url().'Dashboard/Menu"><i class="icon icon-home"></i> <span>Dashboard</span></a> 
	  </li>';
	  
	}
	
	
	if(!empty($Agents))
	{ 
    ?>
		<li class="submenu"> 
		<a href="#"><i class="icon icon-th-list"></i><span>Partner</span><span class="label label-important">2</span></a>
		  
			<ul>
			<?php
			foreach($Agents as $key=>$value)
			{
			?>
			<li><a href="<?php echo base_url().$value;?>"><?php echo $key?></a></li>
			<?php } ?>
			
			</ul>
			
		</li>
	 <?php  }  ?>  
		 
	
	
	<?php if(!empty($Package))
	{ 
    ?>
		<li class="submenu"> 
		<a href="#"><i class="icon icon-th-list"></i><span>Package</span><span class="label label-important">2</span></a>
		  
			<ul>
			<?php
			foreach($Package as $key=>$value)
			{
			?>
			<li><a href="<?php echo base_url().$value;?>"><?php echo $key?></a></li>
			<?php } ?>
			
			</ul>
			
		</li>
	 <?php  }  ?> 
	
	
	
	<?php if(!empty($Policy))
	{ 
    ?>
		<li class="submenu"> 
		<a href="#"><i class="icon icon-th-list"></i><span>Policy</span><span class="label label-important"><?php if(!empty($Policy)){ echo count($Policy); };?></span></a>
		  
			<ul>
			<?php
			foreach($Policy as $key=>$value)
			{
			?>
			<li><a href="<?php echo base_url().$value;?>"><?php echo $key?></a></li>
			<?php } ?>
			
			</ul>
			
		</li>
	 <?php  }  ?> 
	
	
	<?php if(!empty($corporate))
	{ 
    ?>
		<li class="submenu"> 
		<a href="#"><i class="icon icon-th-list"></i><span>Corporate</span><span class="label label-important"><?php if(!empty($corporate)){ echo count($corporate); };?></span></a>
		  
			<ul>
			<?php
			foreach($corporate as $key=>$value)
			{
			?>
			<li><a href="<?php echo base_url().$value;?>"><?php echo $key?></a></li>
			<?php } ?>
			
			</ul>
			
		</li>
	 <?php  }  ?> 
	
	 
	 
	<?php if(!empty($Delivery))
	{ 
    ?>
		<li class="submenu"> 
		<a href="#"><i class="icon icon-th-list"></i><span>Delivery Model</span><span class="label label-important"><?php if(!empty($Delivery)){ echo count($Delivery); };?></span></a>
		  
			<ul>
			<?php
			foreach($Delivery as $key=>$value)
			{
			?>
			<li><a href="<?php echo base_url().$value;?>"><?php echo $key?></a></li>
			<?php } ?>
			
			</ul>
			
		</li>
	 <?php  }  ?> 
	
	



    
    <?php if(!empty($claim))
	{ 
    ?>
		<li class="submenu"> 
		<a href="#"><i class="icon icon-th-list"></i><span>Claim Request</span><span class="label label-important"><?php if(!empty($claim)){ echo count($claim); };?></span></a>
		  
			<ul>
			<?php
			foreach($claim as $key=>$value)
			{
			?>
			<li><a href="<?php echo base_url().$value;?>"><?php echo $key?></a></li>
			<?php } ?>
			
			</ul>
			
		</li>
	 <?php  }  ?> 










	
    
    
    
    </ul>
	
	
</div>