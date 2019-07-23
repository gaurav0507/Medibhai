<!DOCTYPE html>
<html lang="en">
<head>
  <title>Upload Policy</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  
  <style>
  .error {color: #F00;}
  .success {color: #0F0;}
  </style>
</head>
<body> 
 
<div class="container">
  <h2>upload policy</h2>
  
  <?php
  if($this->session->flashdata('error')){echo "<div class=alert-danger>".$this->session->flashdata('error')."</div>";}
  if($this->session->flashdata('success')){echo "<div class=alert-success>".$this->session->flashdata('success')."</div>";}

 ?>
  
  <div class="panel panel-default">
  <div class="panel-body">
  
    <form action="<?php echo base_url();?>Dashboard_user/user_upload" method="post" name="upload" id="upload" enctype="multipart/form-data">

	<div>
	<label>upload : </label>
	<input type="file" id="policy_files" name="policy_files[]" multiple="multiple"/> </br>
	</div>

	<div class="button">
	<input type="submit" name="save" id="save" />
	</div>

	</form>
  
  </div>
  </div>


</div>

</body>
</html>