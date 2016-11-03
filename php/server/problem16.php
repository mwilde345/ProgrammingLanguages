<html>
 <head>
  <title>Youngest Person</title>
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
 <h1>Youngest Person</h1>
 <h3>Executing against the following Data:</h3>
 <table>
   <tr>
     <td>Name</td>
     <td>Age</td>
   </tr>
   <tr>
     <td>Stephen</td>
     <td>8</td>
   </tr>
   <tr>
     <td>Damarcus</td>
     <td>19</td>
   </tr>
   <tr>
     <td>Josephina</td>
     <td>88</td>
   </tr>
   <tr>
     <td>McJunior Bacon</td>
     <td>3</td>
   </tr>
 </table>
 <form id="mainForm">
   <input type="submit" name="submit" value="Find Youngest"/>
   <input type="hidden" name="funcName" value="youngest"/>
 </form>
 </br>
 <a href="../">Home</a>
 </body>
</html>
