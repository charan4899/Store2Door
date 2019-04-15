<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">  
      <script src="http://code.jquery.com/jquery-1.10.2.js"></script>  
      <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>  
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
  border: 1px solid black;
  opacity: 0.6;
  filter: alpha(opacity=60); /* For IE8 and earlier */
  width:50%;
  height:75%
  align:"center";
}

div.transbox p {
  margin: 5%;
  font-weight: bold;
  color: #000000;
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
.button {
  
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
  cursor: pointer;
  border-radius:8px;
}

.button1 {
  background-color: white; 
  color: black; 
  border: 2px solid #f44336;
}

.button1:hover {
  background-color: #f44336;
  color: white;
}
.button2 {
  background-color: white;
  color: black;
  border: 2px solid #555555;
}

.button2:hover {
  background-color: #555555;
  color: white;
}
</style>
<script>  
         $(function() {  
            $( "#datepicker-3" ).datepicker({  
               
               dateFormat:"yy-mm-dd",  
              maxDate:"+2d",
              minDate:0
            });  
         });  
      </script>  
</head>
<body>

<div class="background">
<center>
  <div class="transbox">
  <form  name="myform3" align="center" method="post">
  
   <h4 align="center"><b>PAYMENT</b></h4>
 <input type="text" name="firstname" required placeholder="firstname">


<input type="text" name="lastname" placeholder="Last name" required  maxlength="20"><br><br>
<input type="text" name="phoneno" placeholder="phonenumber"><br><br>
<input type="text" name="city" placeholder="city"><br><br>
<input type="text" name="pincode" placeholder="pincode" maxlength="7"><br><br>
<input type="text" name="landmark" placeholder="landmark"><br><br>
<input type="text" name="doorno" placeholder="dr-no:"><br><br>
<label>prefered date<input type="text" name="date" placeholder="date" id="datepicker-3"></label>
<label>prefered time<select name="timings">
    <option value="mrng">6AM-11AM</option>
    <option value="noon">1PM-3PM</option>
    <option value="evng">6PM-8PM</option>
  </select></label>
<br><br>
<label>mode of payment</label><select name="mode of payment">
    <option value="cod">cash on delivery</option>
    <option value="credit">credit</option>
    <option value="debit">debit</option>
  </select>
<br><br>
<input type="submit" class= "button button1" name="generatebill" value="GENERATE BILL">
<input type="submit"  class="button button2" name="checkout" value="CHECKOUT"><br><br>
</form>
  </div>
  </center>
</div>
<?php
 session_start();
 $my=mysqli_connect("localhost", "root","", "grocery");
 if(isset($_POST['generatebill']))
{

    $a=$_POST['firstname'];
    $b1=mysqli_query($my,"SELECT uid FROM user where firstname='$a'");
    $b=mysqli_fetch_assoc($b1);
    $b2=$b['uid'];

    $c=$_POST['date'];
    $q="INSERT into orderstatus(orderprocessing,preproduction,inproduction,shipped,delivered,uid,cdate,btime) values(0,0,0,0,0,'$b2','$c',now())";
  
     if(mysqli_query($my,$q))
      {
              header("Location:bill.php");
      }
      else
      {
        echo $my->error;
      }


      
} 
if(isset($_POST['checkout']))

{
  header("Location:orderstatus.php");
}


  ?>

</body>
</html>

