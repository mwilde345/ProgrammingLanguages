<html>
 <head>
  <title>Nest Level</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script type="text/javascript">
  $(document).ready(function(){
    $("#mainForm").submit(function(e){
      e.preventDefault();
      var formData = $("#mainForm").serialize();
      $.ajax({
        data:formData,
        type:"POST",
        url:"/server/functions.php",
        success:function(result){
          if($("#inserted")) $("#inserted").remove();
          $("#mainForm").after("<div id=inserted><h3>Result</h3></br><textarea>"+result+"</textarea></div>");
        },
        error:function(xhr,status,error){
          console.log(error);
        }
      });
    });
  });
  </script>
 </head>
 <body>
 <h1>Nest Level</h1>
 <h3>Enter a comma separated list</h3>
 <form id="mainForm">
   <h4>Running on the list: (1, 'one', (2, 'Hello!'), 1, ('two', (3, 'FindMe', (4, 'Treasure')), 2), 'end');</h4>
   <input type="text" name="s1">Input Search Term</input>
   <input type="submit" name="submit" value="Search"/>
   <input type="hidden" name="funcName" value="nestLevel"/>
 </form>
 </br>
 <a href="../">Home</a>
 </body>
</html>
