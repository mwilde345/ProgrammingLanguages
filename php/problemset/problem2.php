<?php
  if(isset($_GET['submit'])){
    $radius = $_GET['rad'];
    echo "<h2>Volume: ".volume($radius)."</h2>";
  }
  function volume($r){
    return ((4*M_PI)/3)*$r**3;
  }
 ?>

<html>
 <head>
  <title>Volume of a Sphere</title>
 </head>
 <body>
 <h1>Calcualte the Volume of a Sphere</h1>
 <form action="" method="GET">
   <input type="text" name="rad">Radius</input>
   <input type="submit" name="submit">Calculate</input>
 </form>
 </br>
 <a href="../">Home</a>
 </body>
</html>
