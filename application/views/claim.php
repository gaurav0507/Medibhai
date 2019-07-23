<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<Style>
.center {
    margin: auto;
    width: 50%;
    padding: 20px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

.hideform {
    display: none;
}

.form{
  
  background-color: lightgray;
}
</style>



<div class="center hideform">
    <button id="close" style="float: right;">X</button>
    
	<form id="claim" name="claim" class="form">
        
		First name:<br>
        <input type="text" name="firstname" id="firstname" >
        <br>
        Last name:<br>
        <input type="text" name="lastname" id="lastname">
        <br>
		Mobile No:<br>
        <input type="text" name="mobile" id="mobile">
        <br>
		Address:<br>
        <input type="text" name="address" id="address">
        <br>
		<br>
        <input type="submit" value="Submit">
    
	</form>
	
</div>
<button id="show">Request</button>

<script>
$('#show').on('click', function () {
    $('.center').show();
    $(this).hide();
})

$('#close').on('click', function () {
    $('.center').hide();
    $('#show').show();
})

</script>