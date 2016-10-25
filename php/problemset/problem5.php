<?php
  if(isset($_GET['submit'])){
    $s1 = explode(',',$_GET['s1']);
    double($s1);
  }
  function double($seq1){
    $output = array_map(function($a){
      return $a * 2;
    },
    $seq1);
    return print_r($output);
  }
 ?>

<html>
 <head>
  <title>Double Sequence</title>
 </head>
 <body>
 <h1>Double Values in a Sequence</h1>
 <h3>Enter comma separated values</h3>
 <form action="" method="GET">
   <input type="text" name="s1">Number Sequence 1</input>
   <input type="submit" name="submit">Calculate</input>
 </form>
 </br>
 <a href="../">Home</a>
 </body>
</html>
