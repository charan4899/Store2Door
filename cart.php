<?php

$my = mysqli_connect("localhost", "root", "", "grocery");
   
echo "Connected to MySQL<br>";
      $check="select * from item";
      $result=$my->query($check);
      $total=0;
      if($result->num_rows>0)
      {
        while($row=$result->fetch_assoc()){
          $img=$row['image'];
          $name=$row['name'];
          $q=$row['quantity'];
          $p=$row['price']*$q;
          echo "<img src='$img'>";
          echo "<br>";
          echo "<h1>$name</h1>";
          echo "<br>";
          echo $p;
          echo "<br>";
          $total=$total+$p;
        }

      }
     echo "TOTAL PRICE"."<input type='text' value='$total' disabled/>";
     echo '<form method="get" action="payment.php">
            <button type="submit">proceed to payment</button></form>';
            echo '<form method="get" action="mp.php">
            <button type="submit">go to main page</button></form>';
      if($my->query($check)===TRUE)
      {
        echo "hlooo";
      }
      else
      {
        echo $my->error;
      }

      //$num=mysqli_num_rows($check);
   

?>
</body></html>


