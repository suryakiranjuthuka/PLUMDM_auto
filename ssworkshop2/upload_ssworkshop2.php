<?php 
	
	  //special case session must be started before its destroyed
	  session_start();
		
	  //destroy session to kill past session variables
	  //session_destroy();
	  unset($_SESSION['b_logo']);
	  unset($_SESSION['r_logo']);
	  unset($_SESSION['p_logo']);
	  unset($_SESSION['b_name']);
	  unset($_SESSION['r_name']);
	  unset($_SESSION['r_two_name1']);
	  unset($_SESSION['r_two_name2']);
	  unset($_SESSION['c_lp_client_name1']);
	  unset($_SESSION['c_lp_sales_rep1']);
	  unset($_SESSION['c_lp_email1']);
	  unset($_SESSION['c_lp_city1']);
	  unset($_SESSION['c_lp_state1']);
	  unset($_SESSION['c_lp_zip_code1']);
	  unset($_SESSION['c_lp_notes1']);
	  unset($_SESSION['c_lp_client_monitor']);
	  unset($_SESSION['file_identifier']);
	  unset($_SESSION['c_lp_attachment_url']);
	  unset($_SESSION['c_lp_website_url1']);  
	

	//**************Upload All Pictures***************
	if(isset($_POST['upload_all'])){
		
		session_start();
		
		if($_POST['r_name']){	
		$_SESSION['r_name'] = trim($_POST['r_name']);
		}else{ $_SESSION['r_name'] = NULL; }
		
		if($_POST['r_two_name1']){	
		$_SESSION['r_two_name1'] = trim($_POST['r_two_name1']);
		}else{ $_SESSION['r_two_name1'] = NULL; }
		
		if($_POST['r_two_name2']){	
		$_SESSION['r_two_name2'] = trim($_POST['r_two_name2']);
		}else{ $_SESSION['r_two_name2'] = NULL; }
		
		header("Location: edit_ssworkshop2.php");
		
	}
?>
<!doctype html>
<html>
	<head>
	<meta charset="utf-8">
	<title>Upload SSWorkshop 2</title>
	<link rel="shortcut icon" href="public/site_images/plum_logo-favicon.ico" >
	<link type="text/css" rel="stylesheet" href="public/stylesheets/plumdm_auto_upload.css">
	</head>

<body>
	<header class="bottomShadow">Customize Your Social Security Workshop Landing Page</header>
	
	<!-------------------------Bussiness LOGO------------------------------->
	<form id="form" action="upload_ssworkshop2.php" method="POST" enctype="multipart/form-data" onsubmit="loader();">

	    <!-------------------------Restaurant Names------------------------------->
	    	<h1 id="RLogoContainerh1">Step - <span>1</span></h1>
	    <section class="transition" id="RLogoContainer">
	        <h2>Location</h2>
	        <div id="noRLogoRadioContainer">
	        	<input type="radio" name="r_logo_radio" id="no_r_logo_radio" value="r_name" checked>
	        	<label>One Location?</label> <span class="breaker">|</span>
	        </div>
	        
	        <div id="twoRLogoRadioContainer1">
	        	<input type="radio" name="r_logo_radio" id="two_r_logo_radio1" value="r_two_name">
	        	<label>Multiple Locations?</label>
	        </div>
	        
	        
	        <div class="bottomShadow transition green">
			        
			        <div id="restaurentNameContainer">
			        	<label>Location Name</label>
			        	<input type="text" name="r_name" id="r_name">
			        </div>
			        
			        <div id="restaurentTwoNameContainer1">
			        	<label>Location Name1</label>
			        	<input type="text" name="r_two_name1" id="r_two_name1">
			        </div></br>
			        
			        <div id="restaurentTwoNameContainer2">
			        	<label>Location Name2</label>
			        	<input type="text" name="r_two_name2" id="r_two_name2">
			        </div>
	        </div>
	        
		</section>
	    
	    
	    <div class="loader" id="loader_form"></div><!--LOADER-->
	    <!--SUBMIT data, upload photos to next page, save as superglobals-->
		<input style="margin-top: 60px;" type="submit" id="submit" name="upload_all" value="NEXT">
	    
	</form>
	
	
	
	<footer class="upperShadow">PLUMDM</footer>
	
	<script type="text/javascript" src="public/javascripts/jquery-2.0.3.min.js"></script>
	<script type="text/javascript">
	
		$(document).ready(function() {
		        // trigger the click event
		        $('body').click();
		});
		
		$('body').click(function() {
				if($('#no_r_logo_radio').is(':checked')) {  $("#r_two_name1").val(""); $("#r_two_name2").val(""); $('#r_two_name1').prop('required', false); $('#r_two_name2').prop('required', false); $('#r_name').prop('required', true); $('#restaurentTwoNameContainer1').hide(); $('#restaurentTwoNameContainer2').hide();  $('#restaurentNameContainer').fadeIn(500); }
				if($('#two_r_logo_radio1').is(':checked')) {  $("#r_name").val("");  $('#r_two_name1').prop('required', true); $('#r_two_name2').prop('required', true); $('#r_name').prop('required', false);  $('#restaurentNameContainer').hide(); $('#restaurentTwoNameContainer1').fadeIn(500);  $('#restaurentTwoNameContainer2').fadeIn(500); }
		});
		
		function loader()
		{
			$("#loader_form").show();
			$("#submit").hide();
		
		    return true;
		}
     </script>
  </body>
</html>