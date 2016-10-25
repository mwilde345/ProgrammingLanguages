<?php
  if(isset($_GET['submit'])){
    $temp = $_GET['temp'];
    echo "<h2>Water State: ".water($temp)."</h2>";
  }
  function water($t){
    return $t <= 32 ? "Solid" : ($t <212 ? "Liquid" : "Gas");
  }
 ?>

<html>
 <head>
  <title>State of Water</title>
 </head>
 <body>
 <h1>Determine the State of Water</h1>
 <form action="" method="GET">
   <input type="text" name="temp">Temperature</input>
   <input type="submit" name="submit">Calculate</input>
 </form>
 </br>
 <a href="../">Home</a>
 </body>
</html>
