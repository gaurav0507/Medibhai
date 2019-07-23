
<style>
input[type=submit]
{
    background-color: #3edb45;
    border: none;
    color: white;
    padding: 9px 40px;
    text-decoration: none;
    margin: 4px 2px;
    cursor: pointer;
}

input[type=file]{
	border: 1px solid #ccc;
    display: inline-block;
    padding: 6px 12px;
    cursor: pointer;
	
}

label{
	font-size: larger;
    font-style: normal;
}

.container{
	
	width: 1100px;
    height: 500px;
    border: solid;
}
.button{
	text-align:center;
}

</style>

<div class="container">

<h2>upload</h2>

            <?php
            if($this->session->flashdata('message'))
            {
                $message = $this->session->flashdata('message');
                echo "<div class='".$message['class']."'>".$message['message']."</div>";
            }
            ?>
   
<form action="<?php echo base_url();?>Dashboard/upload" method="post" name="upload" id="upload" enctype="multipart/form-data">

<div>
<label>upload : </label>
<input type="file" id="policy_files" name="policy_files[]" multiple="multiple"/> </br>
</div>

<div class="button">
<input type="submit" name="save" id="save" />
</div>

</form>

</div>