<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<div class="col-xs-12">
<div class="col-md-12" >
<h3> Actions</h3>
<div id="field">

<div id="field0">
<!-- Text input-->

<div class="form-group">
<label class="col-md-4 control-label" for="action_id">Select Type</label>  
<div class="col-md-5">

<select class="form-control input-md">
  <option value="Home">Home</option>
  <option value="Work">Work</option>
  <option value="Other">Other</option>
  
</select>

</div>
</div>

<br><br>
<!-- Text input-->
  <div class="form-group">
  <label class="col-md-4 control-label" for="action_name">Address</label>  
  <div class="col-md-5">
  <!--<input id="action_name" name="action_name" type="text" placeholder="" class="form-control input-md">-->
  <textarea id="action_name" name="action_name" class="form-control input-md"> </textarea> 
  </div>
  </div>
 
 
 


</div>
</div>
    <!-- Button -->
    <div class="form-group">
    <div class="col-md-4">
    <button id="add-more" name="add-more" class="btn btn-primary">Add More</button>
    </div>
    </div>
    
	<br><br>
              
    </div>
    </div>
    </div>
	
	
	
	<script>
	
	
	
	$(document).ready(function () {
    
    var next = 0;
    $("#add-more").click(function(e){
        e.preventDefault();
        var addto = "#field" + next;
        var addRemove = "#field" + (next);
        next = next + 1;
        var newIn = ' <div id="field'+ next +'" name="field'+ next +'"><!--select--><div class="form-group"> <label class="col-md-4 control-label" for="action_id">Type</label> <div class="col-md-5"><select class="form-control input-md"><option value="Home">Home</option><option value="Work">Work</option><option value="Other">Other</option></select> </div></div><br><br> <!-- Text input--><div class="form-group"> <label class="col-md-4 control-label" for="action_name">Address</label> <div class="col-md-5"> <textarea id="action_name" name="action_name" class="form-control input-md"> </textarea> </div></div></div>';
        var newInput = $(newIn);
        var removeBtn = '<button id="remove' + (next - 1) + '" class="btn btn-danger remove-me" >Remove</button></div></div><div id="field">';
        var removeButton = $(removeBtn);
        $(addto).after(newInput);
        $(addRemove).after(removeButton);
        $("#field" + next).attr('data-source',$(addto).attr('data-source'));
        $("#count").val(next);  
        
            $('.remove-me').click(function(e){
                e.preventDefault();
                var fieldNum = this.id.charAt(this.id.length-1);
                var fieldID = "#field" + fieldNum;
                $(this).remove();
                $(fieldID).remove();
            });
    });

});
	
	
	
	
	
	
	
	
	</script>
	