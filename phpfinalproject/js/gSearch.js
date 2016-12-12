
  (function() {
  
	 window.__gcse = {
      callback: myCallback
    };

    function myCallback() {
       $('input.gsc-input').keyup(function(e) { if(e.keyCode == 13 || e.which == 13) {  console.log($('input.gsc-input').val()); }});
      $('input.gsc-search-button').on('click', function(e) {

	  phpCall($('input.gsc-input').val());});
    }
	function phpCall(searchID){
		 $.ajax({
                    type: "POST",
                    url: 'APIPage.php',
                    data: { searchID : searchID },
                     success: function(data){
						console.log(data);
                           }
                });
	}
	
    var cx = '014956187943969651346:2orik1kviv4';
    var gcse = document.createElement('script');
    gcse.type = 'text/javascript';
    gcse.async = true;
    gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0];
	//window.alert(s);
    s.parentNode.insertBefore(gcse, s);
  })();
 
  

//<gcse:search></gcse:search>