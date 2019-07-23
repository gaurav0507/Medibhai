<html>
<head>
<title>Registration Form</title>

<style>
h3{
  font-family: Calibri; 
  font-size: 25pt;         
  font-style: normal; 
  font-weight: bold; 
  color:#5acd83;
  text-align: center; 
  text-decoration: underline
}

table{
  font-family: Calibri; 
  color:white; 
  font-size: 11pt; 
  font-style: normal;
  font-weight: bold;
  text-align:; 
  background-color: #5acd83; 
  border-collapse: collapse; 
  border: 2px solid navy
}
table.inner{
  border: 0px
}

.error{
    color: #e14c13;
}
</style>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

</head>
 
<body>
<h3>REGISTRATION FORM</h3>

<form action="<?php echo base_url();?>Register" method="post" id="myform" name="myform"> 
<table align="center" cellpadding = "10">
 

<input type="hidden" name="code" id="code" value="<?php echo $code;?>"/>

<tr><td>FIRST NAME</td>
<td><input type="text" name="First_Name" id="First_Name" maxlength="30"/></td>
</tr>
 

<tr>
<td>LAST NAME</td>
<td><input type="text" name="Last_Name" id="Last_Name" maxlength="30"/></td>
</tr>
 

 

<tr>
<td>EMAIL ID</td>
<td><input type="text" name="email_id" id="email_id" maxlength="100" /></td>
</tr>
 

<tr>
<td>MOBILE NUMBER</td>
<td>
<input type="text" name="Mobile_Number"  id="Mobile_Number" maxlength="10" /></td>
</tr>
 
<tr>
<td>PASSWORD</td>
<td>
<input type="password" name="password"  id="password" maxlength="10" /></td>
</tr> 

<tr>
<td>CONFIRM PASSWORD</td>
<td>
<input type="password"  name="cfmPassword" id="cfmPassword" />
</tr>
 
<tr>
<td>GENDER</td>
<td>Male <input type="radio" name="Gender" id="Gender" value="Male" />
    Female <input type="radio" name="Gender" id="Gender" value="Female" /></td></br>
</tr>
 


<!-----------------------Submit and Reset ----------------------->
<tr>
	<td colspan="2" align="center">
	<input type="submit" value="Submit">
	<input type="reset" value="Reset" id="reset">
	</td>
</tr>

</table>
 </form>
 
 
 
 <script>

$(document).ready(function(){
$("#reset").click(function(){
//$("#myform")[0].reset();
$("#myform").get(0).reset();
});});
 </script>
 
 <script type="text/javascript">
$(document).ready(function(){
    $("#myform").validate({
    rules :{
        First_Name:{
              required: true
             },
		Last_Name:{
              required: true
             },
        Mobile_Number: {
                required: true,
				number: true,
                minlength: 10,
				maxlength: 12,
			},
	   email_id:{
		   required: true,
		   email: true
	   },
	   Gender:{
		   required: true
	   },
	   password: { 
                 required: true,
                    minlength: 6,
                    maxlength: 10,

               } , 

                   cfmPassword: { 
                    equalTo: "#password",
                     minlength: 6,
                     maxlength: 10
               }
	   
	   
    },
    messages :{
        First_Name: {
              required: "Please Enter your First Name"
              
             },
		Last_Name: {
              required: "Please Enter your Last Name"
              
             },
		Mobile_Number:{
			required:"Please Enter Mobile Number",
			number: "Please Enter Number Only",
			minlength :"Please Enter Your Valid Mobile Number",
			maxlength : "Please Enter Your Valid Mobile Number "
		},
		email_id:{
			required:"Please Enter Email Address",
			email:"Please Enter Valid Email Address"
		},
		Gender:{
			required:"Please select your gender"
		},
		password: { 
                 required:"the password is required"

               }
		
    }
    });
});
</script>
 
 
 
 
</body>
</html>