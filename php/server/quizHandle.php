<?php
  $s1 = explode(' ',$_POST['wordInput']);
  echo join(',',array_filter($s1,'treeify'));
  function treeify($word){
    return in_array($word,array("leaves","roots","branches","trunk"));
  }
 ?>
