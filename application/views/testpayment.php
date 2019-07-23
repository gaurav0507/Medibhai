<?php

//var_dump($payment_data);
 
/*echo $payment_data['first_name'];
echo $payment_data['last_name'];
echo $payment_data['agent_email'];
echo $payment_data['mobile'];
*/

/*

echo $register_amt = $getinfo['registration_fees']."</br>";
echo $net_amt = $getinfo['net_payment']."</br>";
echo $gst = $getinfo['gst']."</br>";
echo $price = $getinfo['registration_fees'] + $getinfo['net_payment']."</br>"; 
echo $tax_paid = ($price*$gst)/100;
echo $amt_paid = $price + $tax_paid;

*/
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>	




<button id="rzp-button1">Pay</button>
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

