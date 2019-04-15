
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
.w3-btn {width:150px;}
</style>
<style>
div.background {
  background-color:white;
  border: 2px solid black;
}
div.transbox {
  margin: 30px;
  background-color:white;
  border: 5px solid black;
  opacity: 0.6;
  filter: alpha(opacity=60); /* For IE8 and earlier */
  width:50%;
  height:75%
  align:"center";
}
div.transbox p {
  margin: 5%;
  font-weight: bold;
  color: #000000;)
}
input[type=text] {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: none;
  border-bottom-width: 2px; 
  border-bottom-style:solid;
  border-bottom-color:rgb(44,76,170);
  
}
input[type=email] {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: none;
  border-bottom-width: 2px; 
  border-bottom-style:solid;
  border-bottom-color:rgb(44,76,170);
}
input[type=password] {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: none;
  border-bottom-width: 2px; 
  border-bottom-style:solid;
  border-bottom-color:rgb(44,76,170);
}
</style>
<script>
var str1=document.getElementByName(pw).value;
var str2=document.getElementByName(cpw).value;
if(!(str1==str2))
  alert(" passwords do not match");
var in1=document.getElementByName(fname).value;
var in2=document.getElementByName(lname).value;
var in3=document.getElementByName(emailid).value;
var in4=document.getElementByName(mobilenumber).value;
var in5=document.getElementByName(city).value;
var in6=document.getElementByName(landmark).value;
var in7=document.getElementByName(doorno).value;
var in8=document.getElementByName(pincode).value;
if(!in1.checkValidity()|| !in2.checkValidity()||!in3.checkValidity()|| !in4.checkValidity()|| !in5.checkValidity()|| !in6.checkValidity()|| !in7.checkValidity()||!in8.checkValidity()) 
  alert("enter details properly");


</script>
</head>
<body>
<div class="background">
<center>
  <div class="transbox">
  
  <button class="w3-button w3-border-red w3-round-large w3-hover-red" style="color:red">LOGIN</button><button class="w3-button w3-border-red w3-hover-red w3-round-large" style="color:red">SIGNUP</button><br><br>
<form  method="post" action="registration.php" align='center'>

<input type="text" name="fname" required placeholder="First name" maxlength="10"><br><br>
<input type="text" name="lname" required placeholder="Last name" maxlength="10"><br><br>
<input type="email" name="emailid"  required placeholder="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"><br><br>
<input type="password" name="pw"  required placeholder="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"><br><br>
<input type="password" name="cpw" required placeholder="confirm password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"><br><br>
<input type="text" name="mobilenumber" required placeholder="mobilenumber" pattern="(?=*\d)[0-9])" maxlength="11"><br><br>
<input type="text" name="city"  required placeholder="city"><br><br>
<input type="text" name="pincode" required placeholder="pincode" pattern="(?=*\d)[0-9])" maxlength="6"><br><br>
<input type="text" name="landmark" required placeholder="landmark"><br><br>
<input type="text" name="doorno"  required placeholder="dr-no:"><br><br>
<input type="submit" name="register" >
</form>
  </div>
  </center>
</div>
<?php

$my = mysqli_connect("localhost", "root", "", "grocery");
   
echo "Connected to MySQL<br>";

if(isset($_POST['register']))
{
    echo "<script>alert('REGISTERED SUCCESSFULLY')</script>";
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['emailid'];
    $pw=$_POST['pw'];
    $phno=$_POST['mobilenumber'];
    $city=$_POST['city'];
    $pincode=$_POST['pincode'];
    $landmark=$_POST['landmark'];
    $doorno=$_POST['doorno'];
      $q="insert into user(firstname,lastname,email,password,phoneno,city,pincode,landmark,doorno) values('$fname','$lname','$email','$pw','$phno','$city','$pincode','$landmark','$doorno')";
       mysqli_query($my,$q) or die(mysqli_error($my));
    // if(mysqli_query($my,$q)) {
    //   echo "record created";
    // }
    // else{
    //     echo "error". $q . "<br>" . mysqli_error($my);
    //   }
}
?>
</body>
</html>









