<html>
 <head>
  <title>Hypotenuse</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script type="text/javascript">
  $(document).ready(function(){
    console.log("REady");
    $("#submitBtn").click(function(e){
      e.preventDefault();
      console.log("clicked");
      var formData = $("#mainForm").serialize();
      console.log(formData);
      $.ajax({
        data:formData,
        type:"POST",
        url:"/server/functions.php",
        success:function(result){
          console.log(result);
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
 <h1>Calcualte the Hypotenuse of a Triangle</h1>
 <form id="mainForm">
   <input type="hidden" name="funcName" value="hypotenuse"/>
   <input type="text" name="base">Base</input>
   <input type="text" name="height">Height</input></br>
   <input type="submit" name="submit" id="submitBtn">Calculate</input>
 </form>
 </body>
</html>
