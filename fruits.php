<?php
session_start();
?>
<html lang="en">
<head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    
</head>
<style>
body{        
        padding-top: 60px;
        padding-bottom: 40px;
      
    }
    .header {
  padding: 0px 0px;
  background: #84c225;
  color: #fff;
  top: 0;
  width: 100%;
  
}

.content {
  padding: 16px;
}

.sticky {
  position: fixed;
  top: 0;
  width: 100%;
}

.sticky + .content {
  padding-top: 102px;
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

window.onscroll = function() {myFunction()};

var header = document.getElementById("myHeader");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}

</script>
<body>
 <div class="header" id="myHeader">
        <div class="container">
     <font face = "Comic sans MS" size =" 5"><b>STORE 2 DOOR</b></font> 
    <ul class="nav justify-content-end">
    <li class="nav-item">
      <i class="glyphicon glyphicon-shopping-cart" style="color:white"><a href="cart.php" class="nav-link" style="color:black">CART</a></i>
    </li>
    <li class="nav-item">
      <i class="glyphicon glyphicon-bell" style="color:white"></i>
    </li>
    <li class="nav-item">
      <i class="glyphicon glyphicon-user" style="color:white">
       <form method="post" action="mainpage.php">
        <button type="submit" name="logout" value="LOGOUT"></button></form></i>
          <?php
        echo $_SESSION['fsname'];
        
        ?>
    </li>
  </ul>
    </div>  
    </div>

    <div class="container">
      <p>
            
        </p>
      
    </div>  
 
<div class="container-fluid">
<p>  </p>
<div class="row">
<div class="col-4">
  <div class="card" style="width:47%; height:70%">
    <img class="card-img-top" src="grapes.jpeg" alt="Card image" style="width:100%; height:70%">  
    <div class="card-body">
      <h4 class="card-title">GRAPES</h4>
      <p class="card-text">
      
    
     <input type="text" name="price" value="Rs 80.00/-" disabled></p>
     <div class="card-footer">
     	<form method='post' class="form-group">
     		<input type="hidden" name='grape' value='Grapes'>
     		 <label for="sel1">Select list:</label>
     <select class="form-control" id="sel1" name="sellist1">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>

      </select><br>
        <input type="hidden" name="grapeimage" value="grapes.jpeg">
     		<input type="hidden" name='price1' value='80'>
     		<input type="submit" name ='ADD1' class="btn btn-primary" align="center" value="ADD">
          <input type="submit" name ='DEL1' class="btn btn-primary" align="center" value="DELETE">
     	</form>
    <!--<button class="btn btn-primary" align="center">ADD</button>-->
    </div>
    </div>
    </div>
   </div>
  <div class="col-4">
  <div class="card" style="width:47%; height:70%">
    <img class="card-img-top" src="guavas.jpeg" alt="Card image" style="width:100%; height:70%">  
    <div class="card-body">
      <h4 class="card-title">GUAVAS</h4>
      <p class="card-text">
     <input type="text" name="price" value="Rs 80.00/-" disabled></p>
     <div class="card-footer">
      <form method='post' class="form-group">
        <input type="hidden" name='guavas' value='Guavas'>
         <label for="sel2">Select list:</label>
     <select class="form-control" id="sel2" name="sellist2">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>

      </select><br>
        <input type="hidden" name="guavasimage" value="guavas.jpeg">
        <input type="hidden" name='price2' value='80'>
        <input type="submit" name ='ADD2' class="btn btn-primary" align="center" value="ADD">
          <input type="submit" name ='DEL2' class="btn btn-primary" align="center" value="DELETE">
      </form>
    </div>
    </div>
   </div> 
  </div>
  <div class="col-4">
  <div class="card" style="width:47%; height:72%">
    <img class="card-img-top" src="custardapple.jpeg" alt="Card image" style="width:100%; height:70%">  
    <div class="card-body">
      <h4 class="card-title">CUSTARD APPLES</h4>
      <p class="card-text">
      
     <input type="text" name="price" value="Rs 150.00/-" disabled></p>
     <div class="card-footer">
      <form method='post' class="form-group">
        <input type="hidden" name='custardapple' value='Custard Apples'>
         <label for="sel3">Select list:</label>
     <select class="form-control" id="sel3" name="sellist3">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>

      </select><br>
        <input type="hidden" name="custardappleimage" value="custardapple.jpeg">
        <input type="hidden" name='price3' value='150'>
        <input type="submit" name ='ADD3' class="btn btn-primary" align="center" value="ADD">
          <input type="submit" name ='DEL3' class="btn btn-primary" align="center" value="DELETE">
      </form>
    </div>
    </div>
    </div>
  </div>
  </div>
 <br><br>
 <div class="row">
 <div class="col-4">
  <div class="card" style="width:45%; height:70%">
    <img class="card-img-top" src="promo.jpeg" alt="Card image" style="width:100%; height:70%">  
    <div class="card-body">
      <h4 class="card-title">POMOGRANATE</h4>
      <p class="card-text">
     
     <input type="text" name="price" value="Rs 120.00/-" disabled></p>
     <div class="card-footer">
    <form method='post' class="form-group">
        <input type="hidden" name='pomogranate' value='Pomogranate'>
         <label for="sel4">Select list:</label>
     <select class="form-control" id="sel4" name="sellist4">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>

      </select><br>
        <input type="hidden" name="pomogranateimage" value="promo.jpeg">
        <input type="hidden" name='price4' value='120'>
        <input type="submit" name ='ADD4' class="btn btn-primary" align="center" value="ADD">
          <input type="submit" name ='DEL4' class="btn btn-primary" align="center" value="DELETE">
      </form>
    </div>
    </div>
    </div>
    
  </div>
  <div class="col-4">
  <div class="card" style="width:45%; height:70%">
    <img class="card-img-top" src="mangoes.jpeg" alt="Card image" style="width:100%; height:70%">  
    <div class="card-body">
      <h4 class="card-title">MANGO</h4>
      <p class="card-text">
      
     <input type="text" name="price" value="Rs 250.00/-" disabled></p>
     <div class="card-footer">
      <form method='post' class="form-group">
        <input type="hidden" name='mango' value='Mango'>
         <label for="sel5">Select list:</label>
     <select class="form-control" id="sel5" name="sellist5">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>

      </select><br>
        <input type="hidden" name="mangoimage" value="mangoes.jpeg">
        <input type="hidden" name='price5' value='250'>
        <input type="submit" name ='ADD5' class="btn btn-primary" align="center" value="ADD">
        <input type="submit" name ='DEL5' class="btn btn-primary" align="center" value="DELETE">
      </form>
    </div>
    </div>
    
  </div>
  </div>
  <div class="col-4">
  <div class="card" style="width:45%; height:72%">
    <img class="card-img-top" src="strawberry.jpeg" alt="Card image" style="width:100%; height:70%">  
    <div class="card-body">
      <h4 class="card-title">STRAW BERRY</h4>
      <p class="card-text">
        
     <input type="text" name="price" value="Rs 130.00/-" disabled></p>
     <div class="card-footer">
      <form method='post' class="form-group">
        <input type="hidden" name='strawberry' value='Strawberry'>
         <label for="sel6">Select list:</label>
     <select class="form-control" id="sel6" name="sellist6">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>

      </select><br>
        <input type="hidden" name="strawberryimage" value="strawberry.jpeg">
        <input type="hidden" name='price6' value='130'>
        <input type="submit" name ='ADD6' class="btn btn-primary" align="center" value="ADD">
        <input type="submit" name ='DEL6' class="btn btn-primary" align="center" value="DELETE">
      </form>
    </div>
    </div>
    
  </div>
  </div>
  </div>
  <br> <br>
  
</div>
<div id="mySidenav" class="sidenav">
<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="fruits.html"><font face = "Comic sans MS" size =" 4"><b>FRUITS</b></a>
  <a href="vegetables.html"><font face = "Comic sans MS" size =" 4"><b>VEGETABLES</b></a>
  </div>
    <div class="fixed-footer">
        <div class="container">
      <ul class="nav justify-content-end">    
    <li class="nav-item">
      <i class="glyphicon glyphicon-home" style="color:white"><a href="mainpage.html"></a></i>
    </li>
    <li class="nav-item">
      <i class="glyphicon glyphicon-th" style="color:white; align-self:right;font-size:30px;cursor:pointer" onclick="openNav()"></i>
    </li>
       
    <li class="nav-item">
      <i class="glyphicon glyphicon-certificate" style="color:white"><a href="deals.html" class="nav-link">DEALS</a></i>
    </li>         
     </ul>       
        </div>        
    </div>
<?php

$my = mysqli_connect("localhost", "root", "", "grocery");
$b=$_SESSION['fsname'];
$c1=mysqli_query($my,"SELECT uid FROM user where firstname='$b'");
    $c2=mysqli_fetch_assoc($c1);
    $c=$c2['uid'];
echo "Connected to MySQL<br>";
if(isset($_POST['ADD1']))
{
    
    $fruit=$_POST['grape'];
    $image=$_POST['grapeimage'];
    $price=$_POST['price1'];
    $quant=$_POST['sellist1'];
    echo $fruit;
    echo $image;
    echo $price;
    echo $quant;
      $check="insert into item(name,type,image,price,quantity,uid) values('$fruit','fruit','$image','$price','$quant','$c')";
      if($my->query($check)===TRUE)
      {
        echo " ";
      }
      else
      {
        echo $my->error;
      }
      //$num=mysqli_num_rows($check);
   
}
if(isset($_POST['ADD2']))
{
    
    $fruit=$_POST['guavas'];
    $image=$_POST['guavasimage'];
    $price=$_POST['price2'];
    $quant=$_POST['sellist2'];
    echo $fruit;
    echo $image;
    echo $price;
    echo $quant;
      $check="insert into item(name,type,image,price,quantity,uid) values('$fruit','fruit','$image','$price','$quant','$c')";
      if($my->query($check)===TRUE)
      {
        echo " ";
      }
      else
      {
        echo $my->error;
      }
      //$num=mysqli_num_rows($check);
   
}
if(isset($_POST['ADD3']))
{
    
    $fruit=$_POST['custardapple'];
    $image=$_POST['custardappleimage'];
    $price=$_POST['price3'];
    $quant=$_POST['sellist3'];
    echo $fruit;
    echo $image;
    echo $price;
    echo $quant;
      $check="insert into item(name,type,image,price,quantity,uid) values('$fruit','fruit','$image','$price','$quant,'$c')";
      if($my->query($check)===TRUE)
      {
        echo " ";
      }
      else
      {
        echo $my->error;
      }
      //$num=mysqli_num_rows($check);
   
}
if(isset($_POST['ADD4']))
{
    
    $fruit=$_POST['pomogranate'];
    $image=$_POST['pomogranateimage'];
    $price=$_POST['price4'];
    $quant=$_POST['sellist4'];
    echo $fruit;
    echo $image;
    echo $price;
    echo $quant;
      $check="insert into item(name,type,image,price,quantity,uid) values('$fruit','fruit','$image','$price','$quant','$c')";
      if($my->query($check)===TRUE)
      {
        echo " ";
      }
      else
      {
        echo $my->error;
      }
      //$num=mysqli_num_rows($check);
   
}
if(isset($_POST['ADD5']))
{
    
    $fruit=$_POST['mango'];
    $image=$_POST['mangoimage'];
    $price=$_POST['price5'];
    $quant=$_POST['sellist5'];
    echo $fruit;
    echo $image;
    echo $price;
    echo $quant;
      $check="insert into item(name,type,image,price,quantity,uid) values('$fruit','fruit','$image','$price','$quant','$c')";
      if($my->query($check)===TRUE)
      {
        echo " ";
      }
      else
      {
        echo $my->error;
      }
      //$num=mysqli_num_rows($check);
   
}
if(isset($_POST['ADD6']))
{
    
    $fruit=$_POST['strawberry'];
    $image=$_POST['strawberryimage'];
    $price=$_POST['price6'];
    $quant=$_POST['sellist6'];
    echo $fruit;
    echo $image;
    echo $price;
    echo $quant;
      $check="insert into item(name,type,image,price,quantity,uid) values('$fruit','fruit','$image','$price','$quant','$c')";
      if($my->query($check)===TRUE)
      {
        echo " ";
      }
      else
      {
        echo $my->error;
      }
 }

   if(isset($_POST['DEL1']))
{
    
    $fruit=$_POST['grape'];
      $check="delete from item where name='$fruit'";
      if($my->query($check)===TRUE)
      {
        echo " ";
      }
      else
      {
        echo $my->error;
      }
      //$num=mysqli_num_rows($check);
   
}
   if(isset($_POST['DEL2']))
{
    
    $fruit=$_POST['guavas'];
      $check="delete from item where name='$fruit'";
      if($my->query($check)===TRUE)
      {
        echo " ";
      }
      else
      {
        echo $my->error;
      }
      //$num=mysqli_num_rows($check);
   
}
   if(isset($_POST['DEL3']))
{
    
    $fruit=$_POST['custardapple'];
      $check="delete from item where name='$fruit'";
      if($my->query($check)===TRUE)
      {
        echo " ";
      }
      else
      {
        echo $my->error;
      }
      //$num=mysqli_num_rows($check);
   
}
   if(isset($_POST['DEL4']))
{
    
    $fruit=$_POST['pomogranate'];
      $check="delete from item where name='$fruit'";
      if($my->query($check)===TRUE)
      {
        echo " ";
      }
      else
      {
        echo $my->error;
      }
      //$num=mysqli_num_rows($check);
   
}
   if(isset($_POST['DEL5']))
{
    
    $fruit=$_POST['mango'];
      $check="delete from item where name='$fruit'";
      if($my->query($check)===TRUE)
      {
        echo "";
      }
      else
      {
        echo $my->error;
      }
      //$num=mysqli_num_rows($check);
   
}
   if(isset($_POST['DEL6']))
{
    
    $fruit=$_POST['Strawberry'];
      $check="delete from item where name='$fruit'";
      if($my->query($check)===TRUE)
      {
        echo "";
      }
      else
      {
        echo $my->error;
      }
      //$num=mysqli_num_rows($check);
   
}


?>
</body></html>


