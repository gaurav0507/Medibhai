<!DOCTYPE html>
<html>
    <head>
    <title>Track your policy</title>
    </head>
	
	
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 5px;
}
th {
  text-align: left;
}

</style>
<body>




<div id="form" style="width:100%;">
   <fieldset>
   <legend style="color:blue;font-weight:bold;">Track your policy</legend>
       
	   
  <table style="width:100%">
  
  <tr>
     <th>#</th>
     <th>Policy File</th>
     <th>Status</th> 
     <th>Date</th>
  </tr>
  
  <?php
     $i=1;
     foreach($uploaded_details as $row)
	 { ?>
	 
	 <tr>
	 <td><?php echo $i;?></td>
     <!--<td><?php echo $row['file_name'];?></td>-->
	 <td><a href="<?php echo base_url();?>/uploads/<?php echo $row['user_id'];?>/<?php echo $row['file_name'];?>" ><?php echo $row['file_name'];?></a></td>
     <td><?php echo $row['status_type'];?></td>
     <td><?php echo $row['created_at'];?></td>
     
     </tr>
		 
	<?php  $i++;  } ?>
  
 
  </table>
</fieldset>
</div>



</body>
</html>