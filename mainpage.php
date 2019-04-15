<?php
session_start();

$my = mysqli_connect("localhost", "root", "", "grocery");
   //session_start();
//echo "Connected to MySQL";

if(isset($_POST['login']))
{
    
    $email=$_POST['emailid'];
    $pw=$_POST['pw'];
      $check=mysqli_query($my,"select * from user where email='$email' and password='$pw'");
      $num=mysqli_num_rows($check);
      if($num==0)
      {
        echo "INVALID USERNAME OR PASSWORD";
      }
      else
      {
      	$res=mysqli_query($my,"select * from user where email='$email'");
      	$row=mysqli_fetch_assoc($res);
      	$_SESSION['fsname']=$row['firstname'];
        header("Location:mp.php");
      }
}
if(isset($_POST['register']))
{
    $_SESSION['name']=$_POST['fname'];
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
       echo "record created";
    // else{
    //     echo "error". $q. mysqli_error($my);
    //   } 
    //$n=$_POST['fname'];
    $b=$_SESSION["name"];
    $sql="SELECT delivered from orderstatus o left join user u on o.uid=u.uid and u.firstname='$b'";
    $result=mysqli_query($my,$sql);
    $row=mysqli_fetch_array($result,MYSQLI_NUM);
    if($row)
    {
    	echo '
          
        	<div class="alert alert-success alert-dismissible">
           <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <strong>Success!</strong> order delivered.
          <script>
           function myfun()
          {
           document.getElementById("s").style.color="orange";
          }
           function myfun1()
          {
           document.getElementById("s1").style.color="orange";
           }
           function myfun2()
          {
            document.getElementById("s2").style.color="orange";
          }
          function myfun3()
          {
           document.getElementById("s3").style.color="orange";
           }
          function myfun4()
           {
         document.getElementById("s4").style.color="orange";
          }
         </script>

         <h2>Star Rating</h2>
         <span class="fa fa-star" onmouseover="myfun()" id="s"></span>
         <span class="fa fa-star" onmouseover="myfun1()"id="s1"></span>
          <span class="fa fa-star"onmouseover="myfun2()" id="s2"></span>
          <span class="fa fa-star"onmouseover="myfun3()" id="s3"></span>
          <span class="fa fa-star"onmouseover="myfun4()" id="s4"></span>


          </div>
     
      ';
      $query=mysqli_query($my,"DELETE from orderstatus");
      $q2=mysqli_query($my,"DELETE from item");


     }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Welcome</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
    /* Add some padding on document's body to prevent the content
    to go underneath the header and footer */
    .w3-btn {width:150px;}
    div.background {
  background-color:white;
  border: 2px solid black;
}
div.transbox {
  margin: 30px;
  background-color:white;
  opacity: 0.6;
  filter: alpha(opacity=60); /* For IE8 and earlier */
  width:50%;
  height:75%;
  align:"center";
}
div.transbox p {
  margin: 5%;
  font-weight: bold;
  color: #000000;
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
    body{        
        padding-top: 60px;
        padding-bottom: 40px;
    }
    .container{
        width: 80%;
        margin: 0 auto; /* Center the DIV horizontally */
    }
    .container-fluid{
        width: 100%;
        margin: 0 auto; /* Center the DIV horizontally */
    }
    .fixed-header, .fixed-footer{
        width: 100%;
        position:fixed;        
        background: #84c225;
        padding: 10px 0px;
        color: #fff;
    }
    .fixed-header{
        top: 0;
    }
    .fixed-footer{
        bottom: 0;
    }    
    /* Some more styles to beutify this example */
    i{
        padding-left: 40px;
    }
    i.c{
        padding-right: 250px;
    }
    .container p{
        line-height: 200px; /* Create scrollbar to test positioning */
    }
    .carousel-inner img {
      width: 100%;
      height: 100%;
  }

div.gallery {
  border: 1px solid #ccc;
}

div.gallery:hover {
  border: 1px solid #777;
}

div.gallery img {
  width: 100%;
  height: auto;
}

div.desc {
  padding: 15px;
  text-align: center;
}

* {
  box-sizing: border-box;
}

.responsive {
  padding: 0 6px;
  float: left;
  width: 24.99999%;
}

@media only screen and (max-width: 700px) {
  .responsive {
    width: 49.99999%;
    margin: 6px 0;
  }
}

@media only screen and (max-width: 500px) {
  .responsive {
    width: 100%;
  }
}

.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}

</style>
  <script>
var str1=document.getElementByName(pw).value;
var str2=document.getElementByName(cpw).value;
if(!(str1==str2))
  alert(" passwords do not match");
var in1=document.getElementByName(fname).value;
var in2=document.getElementByName(fname).value;
var in3=document.getElementByName(emailid).value;
var in4=document.getElementByName(mobilenumber).value;
var in5=document.getElementByName(city).value;
var in6=document.getElementByName(landmark).value;
var in7=document.getElementByName(doorno).value;
var in8=document.getElementByName(pincode).value;
if(!in1.checkValidity()|| !in2.checkValidity()||!in3.checkValidity()|| !in4.checkValidity()|| !in5.checkValidity()|| !in6.checkValidity()|| !in7.checkValidity()||!in8.checkValidity()) 
  alert("enter details properly");
 
 function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "white";
}

</script>
</head>
<body>
    <div class="fixed-header">
        <div class="container">
      <ul class="nav navbar-nav"><font face = "Comic sans MS" size =" 5"><b>STORE 2 DOOR</b></font></ul>  
      <ul class="nav navbar-nav navbar-right">
      <li><i class="glyphicon glyphicon-shopping-cart" style="color:white"><a href="cart.php" class="nav-link" style="color:black">CART</a></i></li>
      <li><i class="glyphicon glyphicon-bell" style="color:white"></i></li>
      <li><i class="glyphicon glyphicon-user" style="color:white"><a  class="nav-link" href="#modal1" style="color:black" data-toggle="modal" data-target="#myModal">LOGIN|</a><a  class="nav-link" href="#modal2" style="color:black" data-toggle="modal" data-target="#myModal2">SIGNUP</a></i></li>
    </ul>
    
    </div>  
    </div>

    <div class="container">
    	<p>
            
        </p>
      
    </div>  
    <div class="container-fluid"> 
    <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
<div class="background">
<center>
  <div class="transbox">
  <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
  <button   class="w3-button w3-border-red w3-round-large w3-hover-red" style="color:red"><a  href="#" style="text-decoration:none"><b>LOGIN</b></a></button><button class="w3-button w3-border-red w3-round-large w3-hover-red" style="color:red"><a  data-toggle="modal" href="#myModal2" style="text-decoration:none">SIGNUP</a></button></div></div><br><br>
  <div class="modal-body">
<form method="post" align="center">

<input type="email" name="emailid"  required placeholder="email"><br><br>
<input type="password" name="pw"  required placeholder="password"><br><br>
<div class="modal-footer">
<input type="submit" name="login" value="LOGIN">
</div>
</form>
</div>
</div>
  </div>
  </center>

</div>
</div>
</div>
<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">
<div class="background">
<center>
  <div class="transbox">
  <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
  
   <button   class="w3-button w3-border-red w3-round-large w3-hover-red" style="color:red"><a data-toggle="modal" href="#myModal" style="text-decoration:none">LOGIN</a></button><button class="w3-button w3-border-red w3-round-large w3-hover-red " style="color:red"><a  href="#" style="text-decoration:none"><b>SIGNUP</b></a></button></div><br><br>
  <div class="modal-body">
<form  method="post" align='center'>

<input type="text" name="fname" required placeholder="First name" maxlength="10">
<input type="text" name="lname" required placeholder="Last name" maxlength="10"><br><br>
<input type="text" name="mobilenumber" required placeholder="mobilenumber" pattern="(?=*\d)[0-9])" maxlength="11"><br><br>
<input type="email" name="emailid"  required placeholder="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"><br><br>
<input type="password" name="pw"  required placeholder="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
<input type="password" name="cpw" required placeholder="confirm password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"><br><br>
<input type="text" name="city"  required placeholder="city">
<input type="text" name="pincode" required placeholder="pincode" pattern="(?=*\d)[0-9])" maxlength="6"><br><br>
<input type="text" name="landmark" required placeholder="landmark">
<input type="text" name="doorno"  required placeholder="dr-no:"><br><br>
<div class="modal-footer">
<input type="submit" name="register" >
</div>
</form>
</div>
  </div>
  </div>
  </center>
</div>
</div>
</div>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="promo1.jpg" alt="Los Angeles" style="width:100%;">
      </div>

      <div class="item">
        <img src="promo2.jpg" alt="Chicago" style="width:100%;">
      </div>
    
      <div class="item">
        <img src="promo3.jpg" alt="New york" style="width:100%;">
      </div>

      <div class="item">
        <img src="promo4.jpg" alt="New york" style="width:100%;">
      </div>
    </div>
    

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div><br><br>

<h4 align="center">Food Store</h4><hr>

  <div class="responsive">
  <div class="gallery">
      <img src="fruits.jpg" alt="Cinque Terre" width="500" height="500">
  </div>
</div>
<div class="responsive">
  <div class="gallery">
      <img src="vegetables.jpg" alt="Forest" width="500" height="500">
  </div>
</div>

<div class="responsive">
  <div class="gallery">
      <img src="exotic.jpg" alt="Northern Lights" width="500" height="500">
  </div>
</div>
<div class="responsive">
  <div class="gallery">
      <img src="basket.jpg" alt="Northern Lights" width="500" height="500">
  </div>
</div><br><br>
<h4 align="center">Affiliates</h4><hr>

  <div class="responsive">
  <div class="gallery">
      <img src="paytm.jpg" alt="Cinque Terre" width="300" height="300">
  </div>
</div>
<div class="responsive">
  <div class="gallery">
      <img src="mastercard.jpg" alt="Forest" width="400" height="300">
  </div>
</div>

<div class="responsive">
  <div class="gallery">
      <img src="visa.jpg" alt="Northern Lights" width="400" height="300">
  </div>
</div>

<div class="responsive">
  <div class="gallery">
      <img src="axis.jpg" alt="Mountains" width="400" height="300">
  </div>
</div><br><br><br>
</div> 
<div id="mySidenav" class="sidenav">
<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="fruits.php"><font face = "Comic sans MS" size =" 4"><b>FRUITS</b></a>
  <a href="vegetables.php"><font face = "Comic sans MS" size =" 4"><b>VEGETABLES</b></a>
  </div>
    <div class="fixed-footer">
        <div class="container">
                 <ul class="nav navbar-nav"><li><i class="glyphicon glyphicon-home" style="color:white"><a href="#"></a></i></li></ul>
                 <i class="glyphicon glyphicon-th" style="color:white; align-self:right;font-size:30px;cursor:pointer" onclick="openNav()"></i>
                 <ul class="nav navbar-nav navbar-right">
                 <li><i class="glyphicon glyphicon-certificate" style="color:white"><a href="deals.php" class="nav-link">DEALS</a></i></li></ul>
                
            
        </div>        
    </div>

</body>
</html>                            