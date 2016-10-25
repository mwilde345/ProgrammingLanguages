<?php
  if(isset($_GET['submit'])){
    $s1 = explode(',',$_GET['s1']);
    $s2 = explode(',',$_GET['s2']);
    echo "<h2>Dot Product: ".dotprod($s1,$s2)."</h2>";
  }
  function dotprod($seq1,$seq2){
    return array_sum(array_map(function($a,$b){
      return $a * $b;
    },
    $seq1, $seq2));
  }
 ?>

<html>
 <head>
  <title>Dot Product</title>
 </head>
 <body>
 <h1>Compute the Dot Product</h1>
 <h3>Enter comma separated values</h3>
 <form action="" method="GET">
   <input type="text" name="s1">Number Sequence 1</input>
   <input type="text" name="s2">Number Sequence 2</input>
   <input type="submit" name="submit">Calculate</input>
 </form>
 </br>
 <a href="../">Home</a>
 </body>
</html>
