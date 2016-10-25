<?php
  if(isset($_GET['submit'])){
    $s1 = explode(',',$_GET['s1']);
    duplicate($s1);
  }
  function duplicate($seq1){
    return print_r(array_unique($seq1));
  }
 ?>

<html>
 <head>
  <title>Remove Duplicates</title>
 </head>
 <body>
 <h1>Remove Duplicates</h1>
 <h3>Enter comma separated values</h3>
 <form action="" method="GET">
   <input type="text" name="s1">Number Sequence 1</input>
   <input type="submit" name="submit">Calculate</input>
 </form>
 </br>
 <h4>Code Used</h4></br>
 <?php
    ob_start();
?>
<code>
  if(isset($_GET['submit'])){
    $s1 = explode(',',$_GET['s1']);
    duplicate($s1);
  }
  function duplicate($seq1){
    return print_r(array_unique($seq1));
  }
</code>

 <a href="../">Home</a>
 </body>
</html>
