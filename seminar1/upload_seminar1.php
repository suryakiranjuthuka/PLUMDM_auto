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
	
	  // In an application, this could be moved to a config file
	  $upload_errors = array(
	  
	  // http://www.php.net/manual/en/features.file-upload.errors.php
	  UPLOAD_ERR_OK 				=> "No errors.",
	  UPLOAD_ERR_INI_SIZE  	=> "Larger than upload_max_filesize.",
	  UPLOAD_ERR_FORM_SIZE 	=> "Larger than form MAX_FILE_SIZE.",
	  UPLOAD_ERR_PARTIAL 		=> "Partial upload.",
	  UPLOAD_ERR_NO_FILE 		=> "No file.",
	  UPLOAD_ERR_NO_TMP_DIR => "No temporary directory.",
	  UPLOAD_ERR_CANT_WRITE => "Can't write to disk.",
	  UPLOAD_ERR_EXTENSION 	=> "File upload stopped by extension."
	  );

	//date
    $date = date("Y-m-d");
	$time = time();
	
	$unique_time = $date.'_'.$time;

	//**************Upload All Pictures***************
	if(isset($_POST['upload_all'])){
		
		session_start();
		
		if($_FILES['b_logo']){	
			// process the form data
			$org_file = $_FILES['b_logo']['name'];
			$tmp_file = $_FILES['b_logo']['tmp_name'];
			$file_type = $_FILES['b_logo']['type'];
			$if_image = substr($file_type, 0 , 5);
			/* $replaced_file_type = str_replace('image/', '', $file_type);
			$target_file =  $org_file . "." . $replaced_file_type;*/
			$upload_dir = "cleanup_logos";
		  
			// You will probably want to first use file_exists() to make sure
			// there isn't already a file by the same name.
			
			// move_uploaded_file will return false if $tmp_file is not a valid upload file 
			// or if it cannot be moved for any other reason
			if($if_image == "image"){
			if(move_uploaded_file($tmp_file, "../INDEX/".$upload_dir."/b".$unique_time.$org_file)) {
				$_SESSION['b_logo']= "../INDEX/".$upload_dir."/b".$unique_time.$org_file;
				$message = "File uploaded successfully.";
			} else {
				$error = $_FILES['file_upload']['error'];
				$message = $upload_errors[$error];
			}
			}else{
				$message = "Invalid Image Format";
			}
		}else{ $_SESSION['b_logo']= NULL; }
		
		
		if($_FILES['r_logo']){	
			// process the form data
			$org_file = $_FILES['r_logo']['name'];
			$tmp_file = $_FILES['r_logo']['tmp_name'];
			$file_type = $_FILES['r_logo']['type'];
			$if_image = substr($file_type, 0 , 5);
			/* $replaced_file_type = str_replace('image/', '', $file_type);
			$target_file =  $org_file . "." . $replaced_file_type;*/
			$upload_dir = "cleanup_logos";
		  
			// You will probably want to first use file_exists() to make sure
			// there isn't already a file by the same name.
			
			// move_uploaded_file will return false if $tmp_file is not a valid upload file 
			// or if it cannot be moved for any other reason
			if($if_image == "image"){
			if(move_uploaded_file($tmp_file, "../INDEX/".$upload_dir."/r".$unique_time.$org_file)) {
				$_SESSION['r_logo']= "../INDEX/".$upload_dir."/r".$unique_time.$org_file;
				$message = "File uploaded successfully.";
			} else {
				$error = $_FILES['file_upload']['error'];
				$message = $upload_errors[$error];
			}
			}else{
				$message = "Invalid Image Format";
			}
		}else{ $_SESSION['r_logo']= NULL; }
		
		
		if($_FILES['p_logo']){	
			// process the form data
			$org_file = $_FILES['p_logo']['name'];
			$tmp_file = $_FILES['p_logo']['tmp_name'];
			$file_type = $_FILES['p_logo']['type'];
			$if_image = substr($file_type, 0 , 5);
			/* $replaced_file_type = str_replace('image/', '', $file_type);
			$target_file =  $org_file . "." . $replaced_file_type;*/
			$upload_dir = "cleanup_logos";
		  
			// You will probably want to first use file_exists() to make sure
			// there isn't already a file by the same name.
			
			// move_uploaded_file will return false if $tmp_file is not a valid upload file 
			// or if it cannot be moved for any other reason
			if($if_image == "image"){
			if(move_uploaded_file($tmp_file, "../INDEX/".$upload_dir."/p".$unique_time.$org_file)) {
				$_SESSION['p_logo']= "../INDEX/".$upload_dir."/p".$unique_time.$org_file;
				$message = "File uploaded successfully.";
			} else {
				$error = $_FILES['file_upload']['error'];
				$message = $upload_errors[$error];
			}
			}else{
				$message = "Invalid Image Format";
			}
		}else{ $_SESSION['p_logo']= NULL; }
		
		
		if($_POST['b_name']){	
		$_SESSION['b_name'] = trim($_POST['b_name']);
		}else{ $_SESSION['b_name'] = NULL; }
		
		
		if($_POST['r_name']){	
		$_SESSION['r_name'] = trim($_POST['r_name']);
		}else{ $_SESSION['r_name'] = NULL; }
		
		if($_POST['r_two_name1']){	
		$_SESSION['r_two_name1'] = trim($_POST['r_two_name1']);
		}else{ $_SESSION['r_two_name1'] = NULL; }
		
		if($_POST['r_two_name2']){	
		$_SESSION['r_two_name2'] = trim($_POST['r_two_name2']);
		}else{ $_SESSION['r_two_name2'] = NULL; }
		
		header("Location: edit_seminar1.php");
		
	}
?>
<!doctype html>
<html>
	<head>
	<meta charset="utf-8">
	<title>Upload Personal Data Seminar 1</title>
	<link rel="shortcut icon" href="public/site_images/plum_logo-favicon.ico" >
	<link type="text/css" rel="stylesheet" href="public/stylesheets/plumdm_auto_upload.css">
	</head>

<body>
	<header class="bottomShadow">Customize Your Seminar Landing Page</header>
	
	<!-------------------------Bussiness LOGO------------------------------->
	<form id="form" action="upload_seminar1.php" method="POST" enctype="multipart/form-data" onsubmit="return checkSize(2097152)">
		
			<h1 id="BLogoContainerh1">Step - <span>1</span></h1>
		<section class="transition" id="BLogoContainer">
	        <h2>Business Logo</h2>
	        
	        <div id="uploadBLogoRadioContainer">
	        	<input type="radio" name="b_logo_radio" id="b_logo_radio" checked value="b_logo">
	        	<label>Upload Logo</label> <span class="breaker">|</span>
	        </div>
	        
	        <div id="noBLogoRadioContainer">
	        	<input type="radio" name="b_logo_radio" id="no_b_logo_radio" value="b_name">
	        	<label>No Logo?</label>
	        </div>
	        
	        <div class="bottomShadow transition green">
		        <div id="uploadBLogoContainer">
		        	<input type="file" name="b_logo" onChange="return checkSize1(2097152)" id="b_logo">
		        	</br>
		        	<div class="imageHint"><div class="upTriangle"></div>Accepted FileType: JPEG / PNG Only.</div>
		        </div>
		        
		        <div id="buisnessNameContainer">
		        	<label>Business Name</label>
		        	<input type="text" name="b_name" id="b_name" maxlength="32">
		        </div>
	       </div>
		</section>

	    
	    <!-------------------------Restaurant LOGO------------------------------->
	    	<h1 id="RLogoContainerh1">Step - <span>2</span></h1>
	    <section class="transition" id="RLogoContainer">
	        <h2>Restaurant Logo</h2>
	        
	        <div id="restaurantHint">HINT: Go to your restaurant's website to find your restaurant's logo!</div>
	        
	        <div id="uploadRLogoRadioContainer">
	        	<input type="radio" name="r_logo_radio" id="r_logo_radio" checked  value="r_logo">
	        	<label>Upload Logo</label> <span class="breaker">|</span>
	        </div>
	        	
	        <div id="noRLogoRadioContainer">
	        	<input type="radio" name="r_logo_radio" id="no_r_logo_radio" value="r_name">
	        	<label>No Logo?</label> <span class="breaker">|</span>
	        </div>
	        
	        <div id="twoRLogoRadioContainer1">
	        	<input type="radio" name="r_logo_radio" id="two_r_logo_radio1" value="r_two_name">
	        	<label>Multiple Locations?</label>
	        </div>
	        
	        
	        <div class="bottomShadow transition green">
			        <div id="uploadRLogoContainer">
			        	<div id="RLogoHint">HINT: For multiple locations thie option is NOT available!</div>
			        	<input type="file" name="r_logo" onChange="return checkSize2(2097152)" id="r_logo">
			        	</br>
		        		<div class="imageHint"><div class="upTriangle"></div>Accepted FileType: JPEG / PNG Only.</div>
			        </div>
			        
			        <div id="restaurentNameContainer">
			        	<label>Restaurant Name</label>
			        	<input type="text" name="r_name" id="r_name">
			        </div>
			        
			        <div id="restaurentTwoNameContainer1">
			        	<label>Restaurant Name1</label>
			        	<input type="text" name="r_two_name1" id="r_two_name1">
			        </div></br>
			        
			        <div id="restaurentTwoNameContainer2">
			        	<label>Restaurant Name2</label>
			        	<input type="text" name="r_two_name2" id="r_two_name2">
			        </div>
	        </div>
	        
		</section>
	    
	    <!-------------------------Professional Photo------------------------------->
	    	<h1 id="PLogoContainerh1">Step - <span>3</span></h1>
	    <section class="transition" id="PLogoContainer">
	        <h2>Professional Headshot</h2>
	        
	        <div id="uploadPLogoRadioContainer">
	        	<input type="radio" name="p_logo_radio" id="p_logo_radio" checked  value="p_logo">
	        	<label>Upload Picture</label> <span class="breaker">|</span>
	        </div>
	        

	        <div id="noPLogoRadioContainer">
	        	<input type="radio" name="p_logo_radio" id="no_p_logo_radio" value="p_name">
	        	<label>Don't Have a Picture?</label>
	        </div>
			        
			<div class="bottomShadow transition green">
			        <div id="uploadPLogoContainer">
			        	<input type="file" name="p_logo" onChange="return checkSize3(2097152)" id="p_logo">
			        	</br>
			        	<div class="imageHint"><div class="upTriangle"></div>Excepted File Type: JPEG Only.</div>
			        </div>
			        
			        <div id="HeadshotRemoveContainer">
			        	No "Head-Shot" for this page.
			        </div>
	        </div>
	        
		</section>
	    
	    
	    <div class="loader" id="loader_form"></div><!--LOADER-->
	    <!--SUBMIT data, upload photos to next page, save as superglobals-->
		<input type="submit" id="submit" name="upload_all" value="NEXT">
	    
	</form>
	
	
	
	<footer class="upperShadow">PLUMDM</footer>
	
	<script type="text/javascript" src="public/javascripts/jquery-2.0.3.min.js"></script>
	<script type="text/javascript">
	
		$(document).ready(function() {
		        // trigger the click event
		        $('body').click();
		});
		
		$('body').click(function() {
		    if($('#b_logo_radio').is(':checked')) { $('#b_name').val(""); $('#b_logo').prop('required', true); $('#b_name').prop('required', false); $('#buisnessNameContainer').hide(); $('#uploadBLogoContainer').fadeIn(500); }
			if($('#no_b_logo_radio').is(':checked')) { $('#b_logo').val(""); $('#b_logo').prop('required', false); $('#b_name').prop('required', true); $('#uploadBLogoContainer').hide(); $('#buisnessNameContainer').fadeIn(500); }
			
			if($('#r_logo_radio').is(':checked')) { $("#r_name").val(""); $("#r_two_name1").val(""); $("#r_two_name2").val(""); $('#r_logo').prop('required', true); $('#r_name').prop('required', false); $('#r_two_name1').prop('required', false); $('#r_two_name2').prop('required', false); $('#restaurentNameContainer').hide(); $('#restaurentTwoNameContainer1').hide(); $('#restaurentTwoNameContainer2').hide(); $('#uploadRLogoContainer').fadeIn(500); }
			if($('#no_r_logo_radio').is(':checked')) { $("#r_logo").val(""); $("#r_two_name1").val(""); $("#r_two_name2").val(""); $('#r_logo').prop('required', false); $('#r_two_name1').prop('required', false); $('#r_two_name2').prop('required', false); $('#r_name').prop('required', true); $('#uploadRLogoContainer').hide(); $('#restaurentTwoNameContainer1').hide(); $('#restaurentTwoNameContainer2').hide();  $('#restaurentNameContainer').fadeIn(500); }
			if($('#two_r_logo_radio1').is(':checked')) { $("#r_logo").val(""); $("#r_name").val(""); $('#r_logo').prop('required', false); $('#r_two_name1').prop('required', true); $('#r_two_name2').prop('required', true); $('#r_name').prop('required', false); $('#uploadRLogoContainer').hide(); $('#restaurentNameContainer').hide(); $('#restaurentTwoNameContainer1').fadeIn(500);  $('#restaurentTwoNameContainer2').fadeIn(500); }
			
			if($('#p_logo_radio').is(':checked')) { $('#p_logo').prop('required', true); $('#HeadshotRemoveContainer').hide(); $('#uploadPLogoContainer').fadeIn(500); }
			if($('#no_p_logo_radio').is(':checked')) { $('#p_logo').val(""); $('#p_logo').prop('required', false); $('#uploadPLogoContainer').hide(); $('#HeadshotRemoveContainer').fadeIn(500); }
		});
	
		function checkSize(max_img_size)
		{
		    var input1 = document.getElementById("b_logo");
			var input2 = document.getElementById("r_logo");
			var input3 = document.getElementById("p_logo");
		    // check for browser support (may need to be modified)
		    if(input1.files && input1.files.length == 1)
		    {           
		        if (input1.files[0].size > max_img_size) 
		        {
		            alert("All the FILES must be less than " + (max_img_size/1024/1024) + "MB");
		            return false;
		        }
		    }
			
			    if(input2.files && input2.files.length == 1)
		    {           
		        if (input2.files[0].size > max_img_size) 
		        {
		            alert("All the FILES must be less than " + (max_img_size/1024/1024) + "MB");
		            return false;
		        }
		    }
			
			    if(input3.files && input3.files.length == 1)
		    {           
		        if (input3.files[0].size > max_img_size) 
		        {
		            alert("All the FILES must be less than " + (max_img_size/1024/1024) + "MB");
		            return false;
		        }
		    }
		
			$("#loader_form").show();
			$("#submit").hide();
		
		    return true;
		}
		
		
		function checkSize1(max_img_size)
		{
		    var input1 = document.getElementById("b_logo");
		    // check for browser support (may need to be modified)
		    if(input1.files && input1.files.length == 1)
		    {           
		        if (input1.files[0].size > max_img_size) 
		        {
		            alert("The Buisness LOGO must be less than " + (max_img_size/1024/1024) + "MB");
		            return false;
		        }
		    }
		
		    return true;
		}
		
		
		function checkSize2(max_img_size)
		{
			var input2 = document.getElementById("r_logo");
		    // check for browser support (may need to be modified)
			    if(input2.files && input2.files.length == 1)
		    {           
		        if (input2.files[0].size > max_img_size) 
		        {
		            alert("The Restaurent LOGO must be less than " + (max_img_size/1024/1024) + "MB");
		            return false;
		        }
		    }
		
		    return true;
		}
		
		
		function checkSize3(max_img_size)
		{
			var input3 = document.getElementById("p_logo");
		    // check for browser support (may need to be modified)
			
			    if(input3.files && input3.files.length == 1)
		    {           
		        if (input3.files[0].size > max_img_size) 
		        {
		            alert("The Head-Shot must be less than " + (max_img_size/1024/1024) + "MB");
		            return false;
		        }
		    }
		
		    return true;
		}
     </script>
  </body>
</html>