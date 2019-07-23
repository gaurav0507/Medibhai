<html>
<head>
  <title><?php echo isset($header_title) ? $header_title : 'McXtra'; ?></title>
</head>

<?php 

foreach ($userfile as $get_user_uploded_file) 
{
  $path_extension = pathinfo($get_user_uploded_file['real_file_name'], PATHINFO_EXTENSION);  
  if($path_extension != "pdf" && $path_extension != "PDF")
  {
    echo "<img src=".SITE_POLICY_UPLODED_URL.$get_user_uploded_file['user_id']."/".$get_user_uploded_file['file_name']." width='100%' height='75%'>";
    echo "</br></br>";
  }
  else
  {
    ?>
    <iframe  src="<?php echo SITE_POLICY_UPLODED_URL.$get_user_uploded_file['user_id']."/".$get_user_uploded_file['file_name']; ?>"
    style="width:100%; height:100%;" frameborder="0"></iframe>
    <?php
  }
}
 ?>

</html>
