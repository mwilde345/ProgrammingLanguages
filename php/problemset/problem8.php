<?php
  if(isset($_GET['submit'])){
    //$s1 = explode(' ',$_GET['s1']);
    $s1 = $_GET['s1'];
    $apikey = 'trnsl.1.1.20161025T132809Z.1c401b650dcfac32.c927d1d1afe65742c9e289a9b4ba6320dc5130cc';
    $url = 'https://translate.yandex.net/api/v1.5/tr.json/translate?key='.$apikey.'&text='.$s1.'&lang=de';
    $result = translate($url);
  }
  function translate($url){
    $response = file_get_contents($url);
    $output = json_decode($response, true);
    return $output['text'][0];
  }
 ?>

<html>
 <head>
  <title>Translation</title>
 </head>
 <body>
 <h1>German Translator</h1>
 <h3>Enter a sentence to translate</h3>
 <form action="" method="GET">
   <input type="text" name="s1"></input>
   <input type="submit" name="submit"> Translate!</input>
 </form>
 </br>
 <h3>Translation: </h3></br>
 <h4><?php echo $result;?></h4>
 </br>
 <a href="../">Home</a>
 </body>
</html>
