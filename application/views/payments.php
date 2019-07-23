<!--<!DOCTYPE html>
<html>

<head>
    <title>Medibhai</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="http://www.medibhai.com/images/logos/9/medibhai_final__2___5__vnpn-im.png" rel="shortcut icon" type="image/png" />
    <link href="<?php echo base_url();?>frontend_css/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo base_url();?>frontend_css/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo base_url();?>frontend_css/css/font-awesome.css" rel="stylesheet">
    <script src="<?php echo base_url();?>frontend_css/js/jquery-1.11.1.min.js"></script>
    <link href='//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
   <link rel="stylesheet" href="<?php echo base_url();?>css/Demo.css" />
   
   
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
</head>

<body>
    
    <div class="agileits_header">
            <div class="container">
            
            <div class="agile-login">
            <ul>
            <li></li>
            <li></li>
            </ul>
            </div>
            <div class="product_list_header">
            </div>
            <div class="clearfix"> </div>
            </div>
    </div>

    
   

  
<div class="login">
        <div class="container">
        <h2>Payment Info</h2>
        
        <p><?php echo $payment_data['first_name'].$payment_data['last_name'];?> </p>
		<p><?php echo $register_amt = $getinfo['registration_fees'];?></p>
		<p><?php echo $net_amt = $getinfo['net_payment'];?></p>
		<p><?php echo $gst = $getinfo['gst'];?></p>
		<p><?php $price = $getinfo['registration_fees'] + $getinfo['net_payment'];
		         $tax_paid = ($price*$gst)/100;
		         echo $amt_paid = $price + $tax_paid;
		?></p>
		
		
		
		
		<p><button class="btn btn-info btn-lg active" id="rzp-button1">Payment</button></p>
		
        </div>
        </div>
</div>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
var options = {
    "key": "rzp_test_slCHSOjh0jlE72",
    "amount": "59900",                 
    "name": "Medbhai",
    "currency": "INR" ,                    
    "description": "Purchase Description",
    "image": "/your_logo.png",
    "handler": function (response){
        alert(response.razorpay_payment_id);
		
    },
    "prefill": {
        "name": "Gaurav Kumar",
        "email": "test@test.com"
    },
    "notes": {
        "address": "Hello World"
    },
    "theme": {
        "color": "#F37254"
    }
};
var rzp1 = new Razorpay(options);

document.getElementById('rzp-button1').onclick = function(e){
    rzp1.open();
    e.preventDefault();
}
</script>

<script src="<?php echo base_url();?>frontend_css/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>frontend_css/js/minicart.min.js"></script>
<script src="<?php echo base_url();?>frontend_css/js/skdslider.min.js"></script>
<link href="<?php echo base_url();?>frontend_css/css/skdslider.css" rel="stylesheet">


</body>
</html> -->
<?php

 $user_id;

 $packageid = $getinfo['id'];
 $register_amt = $getinfo['registration_fees'];
 $net_amt = $getinfo['net_payment'];
 $gst = $getinfo['gst'];
 $price = $getinfo['registration_fees'] + $getinfo['net_payment']; 
 $tax_paid = ($price*$gst)/100;
 $amt_paid = $price + $tax_paid;




?>

                    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
                    <section class="ath_gird-section th_benefits">
                    <div class="ath_container clearfix">
                    <div class="row-fluid ">
                    <div class="span16 ">
                    <div class="ty-wysiwyg-content" data-ca-live-editor-object-id="0" data-ca-live-editor-object-type="">
                    <div class="th_benefits th_benefits--tt col_3">
                    <h1 class="ty-mainbox-title">Pay Now</h1>


                    <div class="ty-mainbox-body">
					<div class="ty-account">
					<form name="profiles_register_form" method="post" class="cm-processed-form">
                    <div class="clearfix">
					<div class="ty-control-group ty-profile-field__item ty-phone">
                    <label for="elm_9" class="ty-control-group__title cm-profile-field">Registration Fees : <?php echo $register_amt; ?></label>
                    <label for="elm_9" class="ty-control-group__title cm-profile-field ">GST : <?php echo $gst; ?></label>
					<label for="elm_9" class="ty-control-group__title cm-profile-field ">Total : <?php echo $amt_paid;?></label>




                    </div>
					</div>
					<div class="ty-profile-field__buttons buttons-container">
					<!--<button class="ty-btn__secondary ty-btn" type="submit"  name="">Procced to Pay</button>-->
					<button id="rzp-button1"><?php echo $amt_paid;?> Procced to Pay</button>


                    </div>
					</div>
					</div>
					</div>
					</div>
					</div>
					</section>
					</div>
					</div>

<?php

//var_dump($payment_data);
 
/*echo $payment_data['first_name'];
echo $payment_data['last_name'];
echo $payment_data['agent_email'];
echo $payment_data['mobile'];

echo $user_id;
*/




?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>	




<!--<button id="rzp-button1"><?php echo $amt_paid;?>Pay</button>-->

<script>


var user_id = '<?php echo $user_id;?>';
var package_id = '<?php echo $packageid;?>';
var amount = '<?php echo $amt_paid;?>';


var amt = '<?php echo $amt_paid;?>';
var paise = amt * 100;

var options = {
    "key": "rzp_test_slCHSOjh0jlE72",
    "amount": parseInt(paise),                 
    "name": "MedBhai",
    "currency": "INR" ,                    
    "description": "Purchase Description",
    "image": "/your_logo.png",
    "handler": function (response){
        alert(response.razorpay_payment_id);
		
		
		 $.ajax({
                url: '<?php echo base_url('Home/paymentUpdate'); ?>',
                type:'post',
                data:{
                    'user_id' : user_id,
					'transaction_id':response.razorpay_payment_id,
					'packageid':package_id,
					'amount':amount
                },
                dataType: "json",
                success: function(data) {
                    //alert(data);
					window.location = data.redirect;
					//console.log(data.redirect);
                },
				error: function(data) {
					
				}
            });
		
		
		
		
    },
    "prefill": {
        "name": "Gaurav Kumar",
        "email": "test@test.com",
		"contact":"9999999999"
    },
    "notes": {
        "address": "Hello World"
    },
    "theme": {
        "color": "#F37254"
    },
	 "method": {
        //upi:false,      //To hide payment option
        //card: false,
        //wallet: false,
        //netbanking:false
    },
    "modal":{
        "ondismiss": function(){}
    }
};
var rzp1 = new Razorpay(options);

document.getElementById('rzp-button1').onclick = function(e){
    rzp1.open();
    e.preventDefault();
}
</script>



                    
