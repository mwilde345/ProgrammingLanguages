<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$majors = explode(",","Accounting,Advertising,African-American Studies,Agriculture,Animal Science,Anthropology,Aerospace Engineering,Archaeology,Architecture,Art History,Arts Management,Asian-American Studies,Astronomy and Astrophysics,Bilingual/Crosscultural Education,Athletic Training,Biochemistry,Biology,Biomedical Engineering,Business,Chemical Engineering,Chemistry,Civil Engineering,Classical Studies,Communication Disorders Sciences and Services,Communications,Comparative Literature,Computer Engineering,Computer Information Systems,Computer Science,Construction Services,Cosmetology Services,Creative Writing,Criminology,Culinary Arts,Design,Economics,Education,Electrical Engineering,Elementary Education,Engineering,English Language and Literature,Entomology,Environmental Engineering,Film and Video Production,Film-Video Arts,Finance,Fine Arts,Fire Safety Science,Food Science,Foreign Languages,Forestry,Gender Studies,Genetics,Geology,Graphic Design,Health Sciences,History,Hospitality Management,Human Ecology,Industrial Technology,International Business,International Relations,Journalism,Kinesiology,Latin American Studies,Liberal Studies,Library Science,Linguistics,Logistics Management,Marketing,Mathematics,Mechanical Engineering,Medical Technology,Metallurgical Engineering,Meteorology,Microbiology,Military Technology,Mining and Mineral Engineering,Music,Mythology and Folklore,Naval Architecture and Marine Engineering,Neuroscience,Nuclear Engineering,Nursing,Oceanography,Occupational Health and Safety,Parks,Recreation and Leisure Studies,Performing Arts,Petroleum Engineering,Pharmacology,Philosophy,Photography,Physics,Physiology,Plant Science,Political Science,Pre-Law,Psychology,Public Administration,Puppetry,Religious Studies,Rhetoric,Social Work,Sociology,Software Engineering,Special Education,Sports Medicine,Statistics,Student Counseling,Supply Chain Management,Theater Arts,Viticulture,Zoology");
//$majors = ["Accounting","Computer","Science"];?>
<html>
<body>
  <script type="text/javascript">
  var allURLs = {};
  var siteTracker = {};
  var totalMajors = <?php echo sizeof($majors)?>;
  </script>
  <div id="maContents" style="visibility:hidden">
<?php foreach($majors as $major):

  $base = "http://www.bing.com/search?q=";
  $url = $base . str_replace(" ","+",$major) . "+News";
  $response = file_get_contents($url);



  //$output = json_decode($response, true);

  echo ($response);?>




  <script type="text/javascript">
    var major = "<?php echo $major ?>";
    //console.log($($("#maContents .b_algo h2 a")[i]).attr("href"));
    for(var i of [0,1,2]){
       var resultURL = /^http.*\..*?\//.exec($($("#maContents .b_algo h2 a")[i]).attr("href"))[0];
       if(allURLs[major]==undefined){
         //allURLs[resultURL] = 1;
         allURLs[major] = resultURL;
       }else{
         //allURLs[resultURL] = allURLs[resultURL] + 1;
         allURLs[major] +=", "+resultURL;
       }
       if(siteTracker[resultURL]==undefined){
         siteTracker[resultURL] = 1;
       }else{
         siteTracker[resultURL] += 1;
       }
    }
    $("#maContents").empty();
  </script>
  <?php endforeach; ?>

  <script type="text/javascript">
  var sortable = [];
  for (var site in siteTracker) {
    sortable.push([site, siteTracker[site]]);
  }

  sortable.sort(function(a, b) {
    return a[1] - b[1];
  });

  for(var item in sortable){
    console.log(sortable[item][0] + " used "+ ((sortable[item][1]/totalMajors)*100).toFixed(2)+"%");
  }

  </script>
  </div>
  </body>
</html>
