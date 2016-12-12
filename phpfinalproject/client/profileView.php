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
   jQuery("#searchDetails").on('submit',function(e){
     e.preventDefault();
     var submitObject = {};
     submitObject['startDate'] = Date(jQuery("#startDate").val());
     submitObject['frequency'] = jQuery("#frequency").find(":selected").text();
     submitObject['searchTerm'] = jQuery("input.gsc-input").val();
     //send to cronJob.php
     console.log(submitObject);
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
                   <input name="startDate" type='text' class="form-control" id='datetimepicker4' />
                   <div class="form-group">
                     <label for="often">How Often? (select one):</label>
                     <select name="frequency" class="form-control" id="frequency">
                       <option>Daily</option>
                       <option>Weekly</option>
                       <option>Monthly</option>
                     </select>
                   </div>
                   <input type='submit' class='btn btn-success' id='submitSearch' value='Save Search'/>
                 </form>
               </div>
               <script type="text/javascript">
                   jQuery(function () {
                       jQuery('#datetimepicker4').datetimepicker();
                   });
               </script>
           </div>
       </div>
  	 </div>

  	 <div class="tab-pane" id="profile">
         <h3>Saved Searches</h3>
  	 </div>

    <div class="tab-pane" id="messages">
         <h3>Messages</h3>
  	 </div>
  </div>

</div>
<?php include ("../php/footer.php"); ?>
