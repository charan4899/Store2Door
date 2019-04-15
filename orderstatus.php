<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
* {
  box-sizing: border-box;
}

body {
  background-color: #474e5d;
  font-family: Helvetica, sans-serif;
}

/* The actual timeline (the vertical ruler) */
.timeline {
  position: relative;
  max-width: 1200px;
  margin: 0 auto;
}

/* The actual timeline (the vertical ruler) */
.timeline::after {
  content: '';
  position: absolute;
  width: 6px;
  background-color: white;
  top: 0;
  bottom: 0;
  left: 50%;
  margin-left: -3px;
}

/* Container around content */
.container {
  padding: 10px 40px;
  position: relative;
  background-color: inherit;
  width: 50%;
}

/* The circles on the timeline */
.container::after {
  content: '';
  position: absolute;
  width: 25px;
  height: 25px;
  right: -17px;
  background-color: white;
  border: 4px solid #FF9F55;
  top: 15px;
  border-radius: 50%;
  z-index: 1;
}


/* Place the container to the left */
.left {
  left: 0;
}

/* Place the container to the right */
.right {
  left: 50%;
}

/* Add arrows to the left container (pointing right) */
.left::before {
  content: " ";
  height: 0;
  position: absolute;
  top: 22px;
  width: 0;
  z-index: 1;
  right: 30px;
  border: medium solid white;
  border-width: 10px 0 10px 10px;
  border-color: transparent transparent transparent white;
}

/* Add arrows to the right container (pointing left) */
.right::before {
  content: " ";
  height: 0;
  position: absolute;
  top: 22px;
  width: 0;
  z-index: 1;
  left: 30px;
  border: medium solid white;
  border-width: 10px 10px 10px 0;
  border-color: transparent white transparent transparent;
}

/* Fix the circle for containers on the right side */
.right::after {
  left: -16px;
}

/* The actual content */
.content {
  padding: 20px 30px;
  background-color: white;
  position: relative;
  border-radius: 6px;
}

/* Media queries - Responsive timeline on screens less than 600px wide */
@media screen and (max-width: 600px) {
  /* Place the timelime to the left */
  .timeline::after {
  left: 31px;
  }
  
  /* Full-width containers */
  .container {
  width: 100%;
  padding-left: 70px;
  padding-right: 25px;
  }
  
  /* Make sure that all arrows are pointing leftwards */
  .container::before {
  left: 60px;
  border: medium solid white;
  border-width: 10px 10px 10px 0;
  border-color: transparent white transparent transparent;
  }

  /* Make sure all circles are at the same spot */
  .left::after, .right::after {
  left: 15px;
  }
  
  /* Make all right containers behave like the left ones */
  .right {
  left: 0%;
  }
}
</style>
</head>
<body>

<div class="timeline">
  
   
<div class="container left">
    <div class="content" id="s1">
      <h2>ORDER PROCESSING</h2>
      
    </div>
  </div>
  <div class="container right">
    <div class="content" id="s2">
      <h2>PRE PRODUCTION</h2>
      
    </div>
  </div>
  <div class="container left">
    <div class="content" id="s3">
      <h2>IN PRODUCTION</h2>
      
    </div>
  </div>
  <div class="container right">
    <div class="content" id="s4">
      <h2>SHIPPED</h2>
      
    </div>
  </div>
  <div class="container left">
    <div class="content" id="s5">
      <h2>DELIVERED</h2>
      
    </div>
  </div>
  </div>
 <?php
   session_start();
   $my=mysqli_connect("localhost", "root","", "grocery");
   
echo "Connected to MySQL<br>";
  echo "db connected"; 
 
 $a=date("Y-m-d");
  echo '
   <script>
    setTimeout(myTimeout1, 2000); 
  setTimeout(myTimeout2, 4000);
  setTimeout(myTimeout3, 6000); 
  setTimeout(myTimeout4, 8000); 
  setTimeout(myTimeout5, 10000); 
function myTimeout1() {
  document.getElementById("s1").style.backgroundColor = "LightGreen";
}
function myTimeout2() {
  document.getElementById("s2").style.backgroundColor = "LightGreen";
  
}
function myTimeout3() {
  document.getElementById("s3").style.backgroundColor = "LightGreen";
}
function myTimeout4() {
  document.getElementById("s4").style.backgroundColor = "LightGreen";
  
}
function myTimeout5() {
  document.getElementById("s5").style.backgroundColor = "LightGreen";
  
}
</script> 
';
 
  $q="UPDATE orderstatus SET orderprocessing=1";
    mysqli_query($my,$q);
 $q1="UPDATE orderstatus SET preproduction=1";
  mysqli_query($my,$q1);
  $q2="UPDATE orderstatus SET inproduction=1";
  mysqli_query($my,$q2);
   $q3="UPDATE orderstatus SET shipped=1";
  mysqli_query($my,$q3);
   $q4="UPDATE orderstatus SET delivered=1";
  mysqli_query($my,$q4);
  

 ?>
</body>
</html>
