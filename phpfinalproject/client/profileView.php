<?php

session_start();
if(isset($_SESSION['error'])){
  header('Location: /client/loginView.php');
}else{
  unset($_SESSION['error']);
}

?>

<?php include("../php/header.php"); ?>
<script type='text/javascript'>
jQuery(document).ready(function(){
  jQuery("#frequency").val('Daily');

  jQuery("#frequency").change(function(){
    if(jQuery("#specificField")){
      jQuery("#specificField").remove();
    }
    if(jQuery(this).val()=='Minute'){
      jQuery("#frequency").after("<div class='form-group' id='specificField'><label for='specific'>Every __ Minute(s): </label><input class='form-control' type='number' name='specific' id='specific' value='30'/></div>");
    }
    if(jQuery(this).val()=='Hourly'){
      jQuery("#frequency").after("<div class='form-group' id='specificField'><label for='specific'>Every __ Hour(s): </label><input class='form-control' type='number' name='specific' id='specific' value='2'/></div>");
    }
  });

   jQuery("#searchDetails").on('submit',function(e){
     e.preventDefault();
     var submitObject = new Object();
     var dateObject = jQuery("#datetimepicker").data("DateTimePicker").date()["_d"];
     submitObject['minute'] = dateObject.getMinutes();
     submitObject['hour'] = dateObject.getHours();
     submitObject['day'] = dateObject.getDate();
     submitObject['month'] = dateObject.getMonth();
     submitObject['day_of_week'] = dateObject.getDay();
     submitObject['searchName'] = jQuery("#searchName").val();
     submitObject['frequency'] = jQuery("#frequency").find(":selected").text();
     submitObject['specific'] = jQuery("#specific").val();
     submitObject['timeStamp'] = jQuery("#datetimepicker").val();
     submitObject['searchTerm'] = jQuery("input.gsc-input").val();
	 console.log(submitObject);
     jQuery.post("../php/cronJob.php",{'data':JSON.stringify(submitObject)},function(data,result){
       if(jQuery('#successResponse')){
         jQuery("#successResponse").remove();
       }
		     jQuery("#searchDetails").after("<div class='alert alert-success' id='successResponse'>Saved Successfully</div>");
		  console.log(data);
	 }).fail(function(data){
		console.log(data);
	 });
   });
 });
</script>
<div class="alert alert-success">
  <?php if(isset($_SESSION['msg'])){echo $_SESSION['msg'];}else{echo 'Welcome '.$_SESSION['username'];}?>
</div>
<div class="panel panel-default">
  <div class="panel panel-heading">
    <ul class="nav nav-tabs">
      <li role="presentation" class="active"><a data-toggle="tab" href="#home">New Search</a></li>
      <li role="presentation"><a data-toggle="tab" href="#profile">Saved Searches</a></li>
      <li role="presentation"><a data-toggle="tab" href="#messages">Messages</a></li>
    </ul>
  </div>
	<div class="tab-content clearfix">
  	 <div class="tab-pane active" id="home">
       <div class="panel-body">
           <div class="row">
             <div class='col-sm-12'>
               <p>Search Query: </p>
               <div id="searchBar"></div>
               <script>
                 jQuery(function(){
                   jQuery("#searchBar").load("gSearch.html");
                 });
               </script>
             </div>
           </div>
         </br>
           <div class="row">
               <div class='col-sm-6'>
                 <p>Update Frequency: </p>
                 <form id="searchDetails" action="#">
                   <label for="datetimepicker4">Start Date:</label>
                   <input name="startDate" type='text' class="form-control" id='datetimepicker' />
                   <div class="form-group">
                     <label for="often">How Often? (select one):</label>
                     <select name="frequency" class="form-control" id="frequency">
                       <option>Minute</option>
                       <option>Hourly</option>
                       <option>Daily</option>
                       <option>Weekly</option>
                       <option>Monthly</option>
                     </select>
                     <label for = 'searchName'>Choose a Name for this search: </label>
          					<input class='form-control' type='text' name='searchName' id='searchName' placeholder='e.g. iPhone'/>
                  </br>
                    <input type='submit' class='btn btn-success form-control' id='submitSearch' value='Save Search'/>
                   </div>
                 </form>
               </div>
               <script type="text/javascript">
                   jQuery(function () {
                       jQuery('#datetimepicker').datetimepicker();
                   });
               </script>
           </div>
       </div>
  	 </div>

  	 <div class="tab-pane" id="profile">
         <h3>Saved Searches</h3>
		  <div id="tableHistory"></div>
               <script>
                 jQuery(function(){
                   jQuery("#tableHistory").load("tableView.html");
                 });
               </script>
  	 </div>

    <div class="tab-pane" id="messages">
         <h3>Messages</h3>
  	 </div>
  </div>

</div>
<?php include ("../php/footer.php"); ?>
