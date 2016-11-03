<?php
  if(isset($_POST['funcName'])){
    switch($_POST['funcName']){
      case "hypotenuse":
        $base = $_POST['base'];
        $height = $_POST['height'];
        echo hypotenuse($base,$height);
        break;
      case "volume":
        $radius = $_POST['rad'];
        echo volume($radius);
        break;
      case "waterstate":
        $temp = $_POST['temp'];
        echo water($temp);
        break;
      case "dotproduct":
        $s1 = explode(',',$_POST['s1']);
        $s2 = explode(',',$_POST['s2']);
        echo dotprod($s1,$s2);
        break;
      case "doubleSeq":
        $s1 = explode(',',$_POST['s1']);
        echo join(',',doubleseq($s1));
        break;
      case "duplSeq":
        $s1 = explode(',',$_POST['s1']);
        echo join(',',duplicate($s1));
        break;
      case "removeDupl":
        $s1 = explode(',',$_POST['s1']);
        echo join(',',remduplicate($s1));
        break;
      case "translate":
        $s1 = $_POST['s1'];
        $apikey = 'trnsl.1.1.20161025T132809Z.1c401b650dcfac32.c927d1d1afe65742c9e289a9b4ba6320dc5130cc';
        $url = 'https://translate.yandex.net/api/v1.5/tr.json/translate?key='.$apikey.'&text='.$s1.'&lang=de';
        echo translate($url);
        break;
      case "sumprod":
        $method = isset($_POST['sumBtn']) ? 'array_sum' : 'array_product';
        $s1 = explode(',',$_POST['s1']);
        echo sumprod($method,$s1);
        break;
      case "articles":
        $s1 = explode(' ',$_POST['s1']);
        $resultArray = array_filter($s1,'articles');
        echo count($resultArray) . ' articles: ' . join(',',$resultArray);
        break;
      case "colors":
        $s1 = explode(' ',$_POST['s1']);
        $resultArray = array_filter($s1,'colors');
        echo 'Valid Colors: ' . join(',',$resultArray);
        break;
      case "positives":
        $s1 = explode(',',$_POST['s1']);
        echo 'Positives: ' . join(',',array_filter($s1,'positives'));
        break;
      case "max":
        $s1 = explode(',',$_POST['s1']);
        echo 'Max Value: ' . maxVal($s1);
      case "nestLevel":
        $search = $_POST['s1'];
        $list = array(1, 'one', array(2, 'Hello!'), 1, array('two', array(3, 'FindMe', array(4, 'treasure')), 2), 'end');
        //echo print_r($list);
        echo nestLevel($search,$list,1);
        break;
      case "nsquares":
        $n = $_POST['s1'];
        echo join(',',nsquares($n));
        break;
      case "youngest":
        $people = array('Stephen'=>8,'Josephina'=>88,'Damarcus'=>19,'McJunior Bacon'=>3);
        echo 'Youngest Person is: ' . youngest($people,$people['Damarcus']);
        break;
      default:
        break;
    }
  }
  function volume($r){
    return ((4*M_PI)/3)*$r**3;
  }
  function hypotenuse($b, $h){
    return sqrt($b**2+$h**2);
  }
  function water($t){
    return $t <= 32 ? "Solid" : ($t <212 ? "Liquid" : "Gas");
  }
  function dotprod($seq1,$seq2){
    return array_sum(array_map(function($a,$b){
      return $a * $b;
    },
    $seq1, $seq2));
  }
  function doubleseq($seq1){
    $output = array_map(function($a){
      return $a * 2;
    },
    $seq1);
    return $output;
  }
  function duplicate($seq1){
    $range = range(0,count($seq1)-1);
    foreach($range as $index){
      array_splice($seq1,2*$index,0,array($seq1[2*$index]));
    }
    return $seq1;
  }
  function remduplicate($seq1){
    return array_unique($seq1);
  }
  function translate($url){
    $response = file_get_contents($url);
    $output = json_decode($response, true);
    return $output['text'][0];
  }
  function sumprod($methodName,$sequence){
    return $methodName($sequence);
  }
  function articles($word){
    return in_array($word,array("a","an","the"));
  }
  function colors($word){
    return in_array($word,array("black","brown","blue","red","yellow","orange","purple","green","gray","pink"));
  }
  function positives($num){
    return $num > 0;
  }
  function maxVal($s1){
    return max($s1);
  }
  function nestLevel($search, $list, $level){
    if(in_array($search,$list)){
      return 'Found it! ' . $level;
    }else{
      foreach($list as $sub){
        if(is_array($sub)){
          if(in_array($search,$sub)){
            $level++;
            return 'Found it! ' . $level;
          }else{
            nestLevel($search, $sub, $level++);
          }
        }
      }
    }
    return 'Not Found';
  }

  function nsquares($n){
    $array = [];
    foreach(range(1,$n) as $num){
      array_push($array,$num*$num);
    }
    return $array;
  }

  function youngest($people,$youngest){
    foreach($people as $key => $val){
      if($val<$youngest){
        $youngest=$val;
      }
    }
    return array_search($youngest,$people);

  }

?>
