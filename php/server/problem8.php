<html>
 <head>
  <title>Translation</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script type="text/javascript">
  $(document).ready(function(){
    $("#submitBtn").click(function(e){
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
 <h1>German Translator</h1>
 <h3>Enter a sentence to translate</h3>
 <form id="mainForm">
   <input type="text" name="s1"></input>
   <input type="submit" name="submit" id="submitBtn"> Translate!</input>
   <input type="hidden" name="funcName" value="translate"/>
 </form>
 </br>
 <a href="../">Home</a>
 </body>
</html>
