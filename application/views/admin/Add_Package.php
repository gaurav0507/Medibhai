<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<div id="content">

<div id="content-header">
  
  <div id="breadcrumb"> <a href="<?php echo base_url(); ?>admin/Dashboard" title="Go to Home" class="tip-bottom">
  <i class="icon-home"></i> Home</a> 
  <a href="#" class="current">Create Package</a> 
  </div>
  
  <h1>Package </h1>
</div>


<div class="container-fluid">
<hr>

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
        
		<?php 
		   
		   $post = isset($eid) ? base_url()."admin/Package/update" : base_url()."admin/Package/create";
		?>
		
		<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
        <h5>Create Package</h5>
        </div>
        
		<div class="widget-content nopadding">
          
		<form action="<?php echo $post;?>" method="post" class="form-horizontal" id="package" name="package">
        
		<input type="hidden" id="eid" name="eid" value="<?php if(isset($eid)){echo $eid;}?>" />
		
		<div class="control-group">
        <label class="control-label">Registration cost :</label>
        <div class="controls">
        <input type="text" class="span11" placeholder="Registration cost"  name="Registration_cost" id="Registration_cost" value="<?php if(isset($get_results)) { echo $get_results['registration_fees']; }?>"/>
        <b class="error_strings"><?php echo form_error('Registration_cost'); ?></b>
		</div>
		</div>
		
		
		
        <div class="control-group">
        <label class="control-label">Package Range</label>
        <div class="controls">
                <select id="dropdown_package" name="dropdown_package">
                  <option value="1">upto 50</option>
                  <option value="2">50 to 100</option>
                  <option value="3">Above 100</option>
                  
                </select>
		<b class="error_strings"><?php echo form_error('dropdown_package'); ?></b>		
        </div>
        </div>
        
		<div class="control-group">
        <label class="control-label">Net Payment</label>
        <div class="controls">
        <input type="text" placeholder=""  value="1500" name="payment" id="payment" class="span11" readonly>
		<b class="error_strings"><?php echo form_error('payment'); ?></b>
        </div>
        </div>
		
		<div class="control-group">
        <label class="control-label">GST</label>
        <div class="controls">
        <input type="text" placeholder="" name="gst" id="gst" value="<?php if(isset($get_results)) { echo $get_results['gst']; }?>" class="span11">
		<b class="error_strings"><?php echo form_error('gst'); ?></b>
        </div>
        </div>
		
		<div class="control-group">
        <label class="control-label">Total Amount Paid</label>
        <div class="controls">
        <input type="text" placeholder="" name="Paid" id="Paid" class="span11"  readonly>
		<b class="error_strings"><?php echo form_error('Paid'); ?></b>
        </div>
        </div>
        
		
		<div class="control-group">
        <label class="control-label">Description of Package</label>
        <div class="controls">
        <textarea class="span11"name="description" id="description" ><?php if(isset($get_results)) { echo $get_results['package_info']; }?></textarea>
        <b class="error_strings"><?php echo form_error('description'); ?></b>
		</div>
		</div>
		
		
        
		<div class="form-actions">
        <button type="submit" class="btn btn-success" name="save" id="save" value="save" >Save</button>
        </div>
        </form>
		
        </div>
		
</div>
	  
</div>
</div>
</div>
</div>

<script type="text/javascript">
$(document).ready(function(){
     
	/*-----onpage load-----*/
	var eid = $('#eid').val();
	
	//alert(eid);
	//return;
	    if(eid)
		{
			var regcost = parseInt($("#Registration_cost").val());
			var payment = parseInt($("#payment").val());
			var gst = parseInt($("#gst").val());
			var calculate_amt = regcost + payment;
			var tax_paid = (calculate_amt * gst)/100;
			var amt_paid = calculate_amt + tax_paid;
			
			amt_paid = isNaN(amt_paid) ? '0.00' : amt_paid;
			
			$("#Paid").val(amt_paid);
	    }
		  
	/*----onkeyup calucalutaion---*/
	
    $('#gst,#Registration_cost, #payment').on('input',function() {
		
		  var regcost = parseInt($("#Registration_cost").val());
		  var payment = parseInt($("#payment").val());
		  var gst = parseInt($("#gst").val());
		  var calculate_amt = regcost + payment;
		  var tax_paid = (calculate_amt * gst)/100;
		  var amt_paid = calculate_amt + tax_paid;
		  
		  amt_paid = isNaN(amt_paid) ? '0.00' : amt_paid;
		  
		  $("#Paid").val(amt_paid);
    
    });
	 
	 
   }); 
   
   
 $(document).ready(function () {

    $('#package').validate({ 
        rules: {
            Registration_cost: {
                required: true,
				digits : true
				
            },
            gst: {
                required: true,
				digits : true,
                maxlength: 2
            },
			Paid: {
                required: true
				
                
            },
			description: {
                required: true
            }
        },
		messages: {
            Registration_cost: {
              required: "Registration cost is Required",
              digits: "Please Use Only Numbers"
            },
			gst: {
              required: "GST Required",
              digits: "Please Use Only Numbers",
			  maxlength:"Maxlength 2 Numbers Allowed",
			  onkeyup: true,
            },
			Paid: {
              required: "Paid Amount Required"
              
            },
			description:{
				required:"Description is Required",
				
			}
		},
		submitHandler: function (form) {
              
			 form.submit();
		}
    });

});  
   
   
   
   
   
   
            </script>

