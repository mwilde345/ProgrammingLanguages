<?php
  if(isset($_GET['submit'])){
    $s1 = explode(',',$_GET['s1']);
    duplicate($s1);
  }
  function duplicate($seq1){
    $range = range(0,count($seq1)-1);
    foreach($range as $index){
      array_splice($seq1,2*$index,0,array($seq1[2*$index]));
    }
    return print_r($seq1);
  }
 ?>

<html>
 <head>
  <title>Duplicate Sequence</title>
 </head>
 <body>
 <h1>Duplicate the Sequence</h1>
 <h3>Enter comma separated values</h3>
 <form action="" method="GET">
   <input type="text" name="s1">Number Sequence 1</input>
   <input type="submit" name="submit">Calculate</input>
 </form>
 </br>
 <a href="../">Home</a>
 </body>
</html>
