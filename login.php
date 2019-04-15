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
</style>

</head>
<body>
<div class="background">
<center>
  <div class="transbox">
  <button class="w3-button w3-border-red w3-round-large w3-hover-red" style="color:red">LOGIN</button><button class="w3-button w3-border-red w3-hover-red w3-round-large" style="color:red">SIGNUP</button><br><br>
<form method="post" action="mainpage.php" align="center">

<input type="email" name="emailid"  required placeholder="email"><br><br>
<input type="password" name="pw"  required placeholder="password"><br><br>

<input type="submit" name="login" value="LOGIN">
</form>
  </div>
  </center>

</div>
<?php
session_start();
$my = mysqli_connect("localhost", "root", "", "grocery");
   
echo "Connected to MySQL<br>";

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
        
        $_SESSION['fname']=mysqli_query($my,"select firstname from user where email='$email' and password='$pw'");
        
        header("Location:mp.php");
      }
}
?>

</body>
</html>
