<?php
  if(isset($_GET['submit'])){
    $base = $_GET['base'];
    $height = $_GET['height'];
    echo "<h2>Hypotenuse: ".hypotenuse($base,$height)."</h2>";
  }
  function hypotenuse($b, $h){
    return sqrt($b**2+$h**2);
  }
 ?>

<html>
 <head>
  <title>Hypotenuse</title>
 </head>
 <body>
 <h1>Calcualte the Hypotenuse of a Triangle</h1>
 <form action="" method="GET">
   <input type="text" name="base">Base</input>
   <input type="text" name="height">Height</input>
   <input type="submit" name="submit">Calculate</input>
 </form>
 </body>
</html>
