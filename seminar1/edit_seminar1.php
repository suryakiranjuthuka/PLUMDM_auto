<?php

require_once("../../PLUMDM_help/includes/initialize.php");

//////////////////////start session for session variables///////////////////
session_start();

//Get all Sales Reps
$sales_reps = SalesRep::get_all_salesrep();

//////////////////////zip function//////////////////////////////////////////
function create_zip($files = array(),$destination = '',$overwrite = false) {
	//if the zip file already exists and overwrite is false, return false
	if(file_exists($destination) && !$overwrite) { return false; }
	//vars
	$valid_files = array();
	//if files were passed in...
	if(is_array($files)) {
		//cycle through each file
		foreach($files as $file) {
			//make sure the file exists
			if(file_exists($file)) {
				$valid_files[] = $file;
			} 
		}
	}
	//if we have good files...
	if(count($valid_files)) {
		//create the archive
		$zip = new ZipArchive();
		if($zip->open($destination,$overwrite ? ZIPARCHIVE::OVERWRITE : ZIPARCHIVE::CREATE) !== true) {
			return false;
		}
		//add the files
		foreach($valid_files as $file) {
			$zip->addFile($file,str_replace("../INDEX/cleanup_sites/", "", $file));
		}
		//debug
		//echo 'The zip archive contains ',$zip->numFiles,' files with a status of ',$zip->status;
		//close the zip -- done!
		$zip->close();
		//check to make sure the file exists
		return file_exists($destination);
	}
	else
	{
		return false;
	}
}


						 	//////////////////////////////Session logo Variables, decide if they are image or text///////////////////////////////
	
						 	
//logo variable
	if($_SESSION['b_logo'] != NULL){
		$b_logo = str_replace("../INDEX/cleanup_logos/", "public/site_images/", $_SESSION['b_logo']);
		$logo = '<img height="100" src="'. $_SESSION['b_logo'] . '" id="logo">';
		$b_logo_actual = '<img height="100" src="'. $b_logo . '" id="logo">';
	} else {
		 $logo =  '<h1>'. $_SESSION['b_name'] .'</h1>'; 
		 $b_logo_actual =  '<h1>'. $_SESSION['b_name'] .'</h1>'; 
	} 

//restaurant variable
if($_SESSION['r_logo'] != NULL){
	$r_logo = str_replace("../INDEX/cleanup_logos/", "public/site_images/", $_SESSION['r_logo']);
	$restaurant = '<div id="restLogoContainer"><img class="restlogo" height="70" src="'. $_SESSION['r_logo'].'"></div>';
	$restaurant_actual = '<div id="restLogoContainer"><img class="restlogo" height="70" src="'. $r_logo.'"></div>'; 
} 
else if($_SESSION['r_name'] != NULL){
	$restaurant =  '<div id="restaurant_text"><h1>'. $_SESSION['r_name'] .'</h1></div>'; 
    $restaurant_actual = '<div id="restaurant_text"><h1>'. $_SESSION['r_name'] .'</h1></div>'; 
}else {
	$restaurant1 =  '<div id="restaurant_two_text1"><h1>'. $_SESSION['r_two_name1'] .'</h1></div>';
	$restaurant2 =  '<div id="restaurant_two_text2"><h1>'. $_SESSION['r_two_name2'] .'</h1></div>';
}


//agent variable
if($_SESSION['p_logo'] != NULL){
	$p_logo = str_replace("../INDEX/cleanup_logos/", "public/site_images/", $_SESSION['p_logo']);
	$agent_actual =  '<img id="agent" width="200" src="'.$p_logo.'">';
}


//////////////submit final design from popup, create folder structure and copy and zip files///////////////
if($_POST['submitDesignPopup']){
	
	//if no stylesheet selected, default to original
	if($_POST['stylesheet']==""){
		$stylesheet =  'seminar1_original.css';
	}else{
		$stylesheet = $_POST['stylesheet'];
	}
	
	//vars from javascript dynamic changes from user
	$sem_num_change1 = $_POST['sem_num_change1'];
	$sem_name_change1 = $_POST['sem_name_change1'];
	$sem_meal_change1 = $_POST['sem_meal_change1'];
	$sem_date1_day_change1 = $_POST['sem_date1_day_change1'];
	$sem_date1_date_change1 = $_POST['sem_date1_date_change1'];
	$sem_date1_time_change1 = $_POST['sem_date1_time_change1'];
	$sem_date2_day_change1 = $_POST['sem_date2_day_change1'];
	$sem_date2_date_change1 = $_POST['sem_date2_date_change1'];
	$sem_date2_time_change1 = $_POST['sem_date2_time_change1'];
	$sem_date3_day_change1 = $_POST['sem_date3_day_change1'];
	$sem_date3_date_change1 = $_POST['sem_date3_date_change1'];
	$sem_date3_time_change1 = $_POST['sem_date3_time_change1'];
	$original_date1 = $_POST['original_date1'];
	$original_date2 = $_POST['original_date2'];
	$original_date3 = $_POST['original_date3'];
	$sem_location_rName1 = $_POST['sem_location_rName1'];
	$sem_location_street1 = $_POST['sem_location_street1'];
	$sem_location_city1 = $_POST['sem_location_city1'];
	$sem_location_street2 = $_POST['sem_location_street2'];
	$sem_location_city2 = $_POST['sem_location_city2'];
	$sem_bio_title_change1 = $_POST['sem_bio_title_change1'];
	$bio1 = $_POST['bio1'];
	$sem_bullet_title_change1 = $_POST['sem_bullet_title_change1'];
    $sem_bullet11 = $_POST['sem_bullet11'];
	$sem_bullet21 = $_POST['sem_bullet21'];
	$sem_bullet31 = $_POST['sem_bullet31'];
	$sem_bullet41 = $_POST['sem_bullet41'];
	$sem_bullet51 = $_POST['sem_bullet51'];
	
	
	
	
	//For Seminar Locations on the Actual Page
	$r_name_actual = $_SESSION['r_name'];
	if($restaurant1 == "" && $r_name_actual == ""){
		 $actualRName1 = '<span id="rName1">'.$sem_location_rName1.'</span></br>'; 
	}
	$actualRStreet1 = '<span id="street1">'.$sem_location_street1.'</span></br>';
	$actualRCity1 = '<span id="city1">'.$sem_location_city1.'</span>';
	
	$actualRStreet2 = '<span id="street2">'.$sem_location_street2.'</span></br>';
	$actualRCity2 = '<span id="city2">'.$sem_location_city2.'</span>';
	
	//Working
	//For centering of dates on the actual page
	if($_SESSION['r_two_name1'] != NULL){
			$date1_actual_style = "padding: 0px 50px;";
			$date2_actual_style = "padding: 0px 50px;";
			$date3_actual_style = "display:none;";
	}
	
	
	if($_SESSION['r_two_name1'] == NULL){
		
		if($original_date1 == 0){
			$date1_actual_style = "display:none;";
				//document.getElementById("date1").style.display = "none";
		}else{
			$date1_actual_style = "display:inline-block;";
			//document.getElementById("date1").style.display = "inline-block";
		}
		
		if($original_date2 == 0){
			$date2_actual_style = "display:none;";
				//document.getElementById("date1").style.display = "none";
		}else{
			$date2_actual_style = "display:inline-block;";
			//document.getElementById("date1").style.display = "inline-block";
		}
		
		if($original_date3 == 0){
			$date3_actual_style = "display:none;";
			
			if(($original_date1 == 1)&&($original_date2 == 1)){
				$date1_actual_style = "padding: 0px 40px;";
				$date2_actual_style = "padding: 0px 40px;";
			}
			
		}else{
			$date3_actual_style = "display:inline-block;";
		}
		
	}
	
	
	//For centering Restaurant Locations on Actual Page
	if($restaurant1 == "" && $_SESSION['r_name'] == ""){
		 $restaurant1_actual_style = $actualRName1;
	}
	if($restaurant2 == ""){
		$restaurant2_actual_style = "display:none;";
	}
	if($restaurant2 == ""){
		$restaurant2_actual_style1 = '<span id="rName1">Restaurant Name #2</span></br>';
	}
	
	//special case if date is blank, dont create bullet for it
	if($sem_date1_time_change1 != ""){
		$newDate1 = '<option value="'.$sem_date1_date_change1.'">'.$sem_date1_date_change1.'</option>';
	}else{
		$newDate1 = "";
	}
	
	//special case if date is blank, dont create bullet for it
	if($sem_date2_time_change1 != ""){
		$newDate2 = '<option value="'.$sem_date2_date_change1.'">'.$sem_date2_date_change1.'</option>';
	}else{ 
		$newDate2 = "";
	}
	
	//special case if date is blank, dont create bullet for it
	if($sem_date3_time_change1 != ""){
		$newDate3 = '<option value="'.$sem_date3_date_change1.'">'.$sem_date3_date_change1.'</option>';
	}else{
		$newDate3 = "";
	}
	
	//special case if date is blank, dont create bullet for it
	// if($sem_date4_time_change1 != ""){
		// $newDate4 = '<option value="'.$sem_date4_time_change1.'">'.$sem_date4_time_change1.'</option>';
	// }else{
		// $newDate4 = "";
	// }
	
	//Super Globals for submit_design.php
	$_SESSION['c_lp_client_name1'] = $_POST['c_lp_client_firstname1'] ." ". $_POST['c_lp_client_lastname1'];
	$_SESSION['c_lp_sales_rep1'] = $_POST['c_lp_sales_rep1'];
	$_SESSION['c_lp_email1'] = $_POST['c_lp_email1'];
	$_SESSION['c_lp_city1'] = $_POST['c_lp_city1'];
	$_SESSION['c_lp_state1'] = $_POST['c_lp_state1'];
	$_SESSION['c_lp_zip_code1'] = $_POST['c_lp_zip_code1'];
	$_SESSION['c_lp_notes1'] = $_POST['c_lp_website_url1'];
	
	if(isset($_POST['client_monitor'])){
		$_SESSION['c_lp_client_monitor'] = "(SETUP Teledirect & CRM Monitoring)";
	}
	
	//find current selected sales rep
	$current_salesrep = SalesRep::find_by_id($_POST['c_lp_sales_rep1']);
	//get sales reps email(s)
	$salesrep_emails = $current_salesrep->emails;
	
	//date
    $date = date("Y-m-d");
	$time = time();
	
	//unique identifier for folder
	$_SESSION['file_identifier'] = $_SESSION['c_lp_client_name1'].'_Seminar1'.'_'.$date.'_'.$time;
	
	//zip attachment location
	$_SESSION['c_lp_attachment_url'] = '../../../PLUMDM_auto/INDEX/cleanup_sites/'.$_SESSION['file_identifier'].'.zip';
	
	//Folder path to populate in PLUMDM-Help's URL section
	$_SESSION['c_lp_website_url1'] = '../../../PLUMDM_auto/INDEX/cleanup_sites/'.$_SESSION['file_identifier'];
	
	//make directory
	mkdir('../INDEX/cleanup_sites/'.$_SESSION['file_identifier'].'/public/stylesheets',0777,true);
	mkdir('../INDEX/cleanup_sites/'.$_SESSION['file_identifier'].'/public/site_images',0777,false);
	
	//create files
	$main_index = fopen('../INDEX/cleanup_sites/'.$_SESSION['file_identifier'].'/index.php', "w");	
	$thanks = fopen('../INDEX/cleanup_sites/'.$_SESSION['file_identifier'].'/thanks.php', "w");	
	$process = fopen('../INDEX/cleanup_sites/'.$_SESSION['file_identifier'].'/process.php', "w");	
	$friend_process = fopen('../INDEX/cleanup_sites/'.$_SESSION['file_identifier'].'/friend_process.php', "w");
	
	//stylesheets
	$styles = fopen('../INDEX/cleanup_sites/'.$_SESSION['file_identifier'].'/public/stylesheets/'.$stylesheet.', w');
	$styles_main = fopen('../INDEX/cleanup_sites/'.$_SESSION['file_identifier'].'/public/stylesheets/plumdm_auto_editor.css', "w");
	
	//copy to new directory
	copy('public/stylesheets/'. $stylesheet .'','../INDEX/cleanup_sites/'.$_SESSION['file_identifier'].'/public/stylesheets/'.$stylesheet.'');
	copy('public/stylesheets/plumdm_auto_editor.css','../INDEX/cleanup_sites/'.$_SESSION['file_identifier'].'/public/stylesheets/plumdm_auto_editor.css');	
	copy('public/site_images/bannerfullbackground.jpg','../INDEX/cleanup_sites/'.$_SESSION['file_identifier'].'/public/site_images/bannerfullbackground.jpg');
	copy('public/site_images/loader.gif','../INDEX/cleanup_sites/'.$_SESSION['file_identifier'].'/public/site_images/loader.gif');
	
	//remove paths, get just file name	
	$blogo = str_replace("../INDEX/cleanup_logos/", "", $_SESSION['b_logo']);
	$rlogo = str_replace("../INDEX/cleanup_logos/", "", $_SESSION['r_logo']);
	$plogo = str_replace("../INDEX/cleanup_logos/", "", $_SESSION['p_logo']);
	
	//copy to new directory
	copy($_SESSION['b_logo'],'../INDEX/cleanup_sites/'.$_SESSION['file_identifier'].'/public/site_images/'.$blogo.'');
	copy($_SESSION['r_logo'],'../INDEX/cleanup_sites/'.$_SESSION['file_identifier'].'/public/site_images/'.$rlogo.'');
	copy($_SESSION['p_logo'],'../INDEX/cleanup_sites/'.$_SESSION['file_identifier'].'/public/site_images/'.$plogo.'');
	
	//write to index file
	$index = '../INDEX/cleanup_sites/'.$_SESSION['file_identifier'].'/index.php';
	
	/////////////////////////content of index file/////////////////////
	$index_content = '
			<!DOCTYPE html>
			<html>
				<head>
					<title>'.$_SESSION['c_lp_client_name1'].' Seminar</title>
					<link href="public/stylesheets/plumdm_auto_editor.css" rel="stylesheet" type="text/css">
					<link href="public/stylesheets/'.$stylesheet.'" rel="stylesheet" type="text/css">
					<link href="http://fonts.googleapis.com/css?family=Tangerine|Muli:400,400italic|Alegreya:400italic,400" rel="stylesheet" type="text/css">
					<style>
					    #loading {display: none; text-align: center;}
					</style>
					<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
					<script>
					    $(function(){
					      $("form").submit(function(e){
					        var thisForm = $(this);
					        //Hide the form
					        $(this).fadeOut(function(){
					          //Display the "loading" message
					          $("#loading").fadeIn();
					         
					          });
					        });
					      })
					  </script>
				</head>
						<body id="templateContainer1">
						<header>
							<div id="logo_container">'. $b_logo_actual .'</div>
						
			            <div id="regphone" style="width:500px; position:relative;">
			                	Event Registration:
							<div id="seminar_number">'.$sem_num_change1.'</div>
						</div>
					</header>
					<div id="fullbanner">
						<div id="banner">
							<div id="eventwrap">
								<div id="event">
									<h1 id="inviteName"><span id="adv_name">'.$sem_name_change1.'</span>Invites You</h1>
									<h2>to a complimentary <span id="meal">'. $sem_meal_change1 .'</span></h2>
								<div id="datesContainer">
									<div style="'. $date1_actual_style .'" id="date1">
										<h3 id="date_1_day">'.$sem_date1_day_change1.'</h3>
										<p id="date_1_date">'.$sem_date1_date_change1.'</p>
										<p id="date_1_time">'.$sem_date1_time_change1.'</p>
									</div>
									
									<div style="'. $date2_actual_style .'" id="date2">
										<h3 id="date_2_day">'.$sem_date2_day_change1.'</h3>
										<p id="date_2_date">'.$sem_date2_date_change1.'</p>
										<p id="date_2_time">'.$sem_date2_time_change1.'</p>
									</div>
			                        
			                        <div  style="'. $date3_actual_style .'"  id="date3">
										<h3 id="date_3_day">'.$sem_date3_day_change1.'</h3>
										<p id="date_3_date">'.$sem_date3_date_change1.'</p>
										<p id="date_3_time">'.$sem_date3_time_change1.'</p>
									</div>
								</div>
			                        
									'. $restaurant_actual .'
									
									<div id="restaurantNameContainer">
									'. $restaurant1 .'
									'. $restaurant2 .'
									</div>
									
									<div id="restaurant">
									<div id="restaurant1">
			                        	<h3>'.$restaurant1_actual_style.'
			                        		'. $actualRStreet1 .'
			                        		'. $actualRCity1 .'
										</h3>
									</div>
									
									<div id="restaurant2" style="'. $restaurant2_actual_style .'">
			                        	<h3>'.$restaurant2_actual_style1.'
			                        		'. $actualRStreet2 .'
			                        		'. $actualRCity2 .'
										</h3>
									</div>
									
									</div>
									
								</div>	
							</div>
							<div id="form">
								<h1>Register Now!</h1>
								<div id="loading" style="margin-top:140px; margin-bottom:140px;">
					    			<img src="public/site_images/loader.gif">
									Confirming Registration....
								</div>
								<form id="enroll_form" method="post" action="process.php">
									<p>Full Name:*</p>
									<input type="text" name="fullname" class="fullname" id="fullname" required/>
									<p>Email:*</p>
									<input type="text" name="email" class="email" id="email" required />
									<p>Phone:*</p>
									<input type="text" name="phone" class="phone" id="phone" required/>
									<p>Guest Name:</p>
									<input type="text" name="guestname" class="guestname" id="guestname"  />
									<p>Date:*
									<select name="date" id="date" required >
			                       		<option value="">--</option>
			                        	'.$newDate1.''.$newDate2.''.$newDate3.'
									</select></p>
									<button type="submit" name="submit" id="submit" />REGISTER</button>
								</form>
							</div>
						</div>
					</div>
					<div id="contentwrapper">
						<div class="infosectionlarge">'.$agent_actual.
			    			'<h1 id="bio_title">'.$sem_bio_title_change1.'</h1>
							<p id="biography">'.$bio1.'</p>
						</div>
						
						<div class="infosection">
							<div class="border"></div>
							<h1 id="bullet_title">'.$sem_bullet_title_change1.'</h1>
							<ul>
								<div id="bullet1">'.$sem_bullet11.'</div>
								<div id="bullet2">'.$sem_bullet21.'</div>
								<div id="bullet3">'.$sem_bullet31.'</div>
								<div id="bullet4">'.$sem_bullet41.'</div>
								<div id="bullet5">'.$sem_bullet51.'</div>
							</ul>
						</div>
					</div>
					<footer>
						<span id="footertext">Copyright 2014 Plum Direct Marketing</span>
					</footer>
			
						</body>
				    </html>';
		
	//place index content in file	
	file_put_contents($index,$index_content);
	
	//thanks file
	$thankyou = '../INDEX/cleanup_sites/'.$_SESSION['file_identifier'].'/thanks.php';
	
	/////////////////////////content of thanks file/////////////////////
	$thankyou_content = '
		<?php
			$attendee_name = $_GET["attendee"];
		?>
		<!DOCTYPE html>
		<html>
			<head>
				<title>'.$_SESSION['c_lp_client_name1'].' Seminar</title>
				<link href="public/stylesheets/plumdm_auto_editor.css" rel="stylesheet" type="text/css">
				<link href="public/stylesheets/'.$stylesheet.'" rel="stylesheet" type="text/css">
				<link href="http://fonts.googleapis.com/css?family=Tangerine|Muli:400,400italic|Alegreya:400italic,400" rel="stylesheet" type="text/css">
				<style>
				    #loading, #success, #invite_another{display: none; text-align: center;}
				  </style>
				  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
				  <script>
				    $(function(){
				      $("form").submit(function(e){
				        var thisForm = $(this);
				        //Prevent the default form action
				        e.preventDefault();
				        //Hide the form
				        $(this).fadeOut(function(){
				          //Display the "loading" message
				          $("#loading").fadeIn(function(){
				            //Post the form to the send script
				            $.ajax({
				              type: "POST",
				              url: thisForm.attr("action"),
				              data: thisForm.serialize(),
				              //Wait for a successful response
				              success: function(data){
				                //Hide the "loading" message
				                $("#loading").fadeOut(function(){
				                  //Display the "success" message
				                  $("#success").text(data).fadeIn();
				                  $("#invite_another").fadeIn();
				                });
				              }
				            });
				          });
				        });
				      })
				    });
				  </script>
			</head>
			<body id="templateContainer1">
				<div id="wrapper">
				<header>
					
					<div id="logo_container">'.$b_logo_actual.'</div>
				
					<div id="regphone">
						Event Registration: 
						'.$sem_num_change1.'
					</div>
				</header>
				<div id="fullbanner">
					<div id="banner">
						<div id="eventwrap">
							<div id="event">
								<div id="thanks">
								<h1 style="font-family: tangerine, cursive;">Thank You!</h1>
								<h2>Want to invite a friend?<br>Its as easy as filling out the form to the right!</h2>
								</div>
							</div>
						</div>
						<div id="form" class="friendform">
							<h1>Invite a Friend</h1>
							<form id="enroll_form" method="post" action="friend_process.php?attendee=<?php echo $attendee_name?>">
								<p>Friends Full Name:*</p>
								<input type="text" name="friend_name" class="friend_name" id="friend_name" required />
								<p>Friends Email:*</p>
								<input type="text" name="friend_email" class="friend_email" id="friend_email" required />
								<p>Friends Phone:</p>
								<input type="text" name="friend_phone" class="friend_phone" id="friend_phone" />
								
								<button type="submit" />INVITE</button>
							</form>
							 <div id="loading" style="margin-top:100px; margin-bottom:100px;">
				        		<img src="public/site_images/loader.gif">
				    			Sending Your Invite....
				  			</div>
				  		
				  		<div id="success" style="margin-top:30px;">
				  		</div>
				  		
				  		<div id="invite_another" style="margin-top:20px;">
				  		If you have any others that may be interested, <a href="#" onClick="window.location.reload( true );">CLICK HERE</a>	
				  		</div>
						</div>
					</div>
				</div>
				<div id="contentwrapper">
					
				</div>
				<div class="push"></div>
				</div>
				<footer>
					Copyright 2014 Plum Direct Marketing
				</footer>
			</body>
		</html>';
	
	//place thanks in file
	file_put_contents($thankyou,$thankyou_content);
	
	//process file
	$init_process = '../INDEX/cleanup_sites/'.$_SESSION['file_identifier'].'/process.php';
	
	/////////////////////////content of process file/////////////////////
	$init_process_content = '
		<?php

		if (isset($_POST["submit"])) {

			$allowedFields = array(
				"fullname",
				"email",
				"phone",
				"guestname",
				"date",
			);
			
			$requiredFields = array(
				"fullname",
				"email",
				"phone",
				"date",
			);
			
			$requiredEmail = array(
				"email",
			);
			
			$errors = array();
			foreach($_POST AS $key => $value)
			{
				// first need to make sure this is an allowed field
				if(in_array($key, $allowedFields))
				{
					$$key = $value;
			  
			  		// is this a required field?
					if(in_array($key, $requiredFields) && $value == "")	
					{
						$errors[] = "The field $key is required.";
					}
			
			  		// is this a required field?
					if(in_array($key, $requiredEmail) && !filter_var($value, FILTER_VALIDATE_EMAIL))	
					{
						$errors[] = "A valid email is required.";
					}
				}	
			}
			
			// were there any errors?
			if(count($errors) > 0)
			{
				$errorString = '."'".'<div class="error2"><h1>There was an error with the form.</h1><br />'."'".';
				$errorString .= "<ul>";
				foreach($errors as $error)
				{
					$errorString .= "<li>$error</li>";
				}
				$errorString .= "</ul></div>";
				
				session_start();
				
				$_SESSION["test"] = $errorString;
				
				//echo $_SESSION["test"];
				// display the previous form
				header("Location: index.php");
			}
			else
			{
			
			
			/////////////////////////////////////////////////Email 1: To agent and PLUM//////////////////////////////
			
			//information from form
			$fullname = $_POST["fullname"];
			$email = $_POST["email"];
			$phone = $_POST["phone"];
			$guestname = $_POST["guestname"];
			$date = $_POST["date"];
			
			//html email content ****(INSERT AGENT NAME)
			$formcontent = "
			<html>
			<body style='."'".'max-width:100%;'."'".'>
				<head>
				<title>Seminar Request</title>
				</head>
			    <h1 style='."'".'color:#253069;'."'".'>New Seminar Reservation For '.$_SESSION['c_lp_client_name1'].'!!</h1>
			    </br>
			    <h2>Name: ".$fullname."</h2>
			    <h2>Email: ".$email."</h2>
			    <h2>Phone: ".$phone."</h2>
			    <h2>Guest: ".$guestname."</h2>
			    <h2>Day: ".$date."</h2>
			</body>
			</html>";
			//recipients ****(INSERT AGENT EMAIL)(REMOVE FROM EMAIL FOR DEMO PURPOSE ONLY)
			$recipient = "<landings@plumdm.com> , <'.$_SESSION['c_lp_email1'].'> , '.$salesrep_emails.'";
			//subject ****(INSERT AGENT NAME)
			$subject = "New '.$_SESSION['c_lp_client_name1'].' Seminar Lead";
			//who email is from
			$headers  = "From: Plum DM <landings@plumdm.com>\r\n"; 
			$headers .= "Content-type: text/html\r\n";
			//mail it
			mail($recipient, $subject, $formcontent, $headers) or die("Error!");
			
			
			/////////////////////////////////////////////////Email 2: To Lead//////////////////////////////
			
			//html email contnet ***(INSERT AGENT NAME)
			$formcontent1 = "
			<html>
			<body style='."'".'max-width:100%;'."'".'>
				<head>
				<title>Thank You For Enrolling</title>
				</head>
				<h1 style='."'".'color:#253069;'."'".'>See You Soon!</h1>
				</br>
			    <h2>Hello ".$fullname.",</h2>
			    </br>
			    <h2>Thank You For Registering For My Seminar on: ".$date."<span style='."'".'font-size:10px;'."'".'>(save the date!)</span></h2>
			    </br>
			    <h2>I look Forward To Meeting You!</h2>
			    <h2>'.$_SESSION['c_lp_client_name1'].'</h2>
			</body>
			</html>";
			//recipients
			$recipient1 = $email;
			//subject
			$subject1 = "Thank You!";
			//whos it from ***(INSERT AGENT NAME)
			$headers1  = "From: '.$_SESSION['c_lp_client_name1'].'\r\n"; 
			$headers1 .= "Content-type: text/html\r\n";
			//mail it
			mail($recipient1, $subject1, $formcontent1, $headers1) or die("Error!");
			
			//redirect to thank you page on success
			header("Location: thanks.php?attendee=$fullname");
			}
			
			}
			
			else{
				die("Error!");
			}
			
			?>';

	//place process file
	file_put_contents($init_process,$init_process_content);
	
	//friend process file
	$init_friend_process = '../INDEX/cleanup_sites/'.$_SESSION['file_identifier'].'/friend_process.php';
	
	/////////////////////////content of friend process file/////////////////////
	$init_friend_process_content = '
		<?php

			//Ajax Email Sequence, for inviting a friend
			
			
			//email Information
			$friend_name = $_POST["friend_name"];
			$friend_email = $_POST["friend_email"];
			$friend_phone = $_POST["friend_phone"];
			$attendee_name = $_GET["attendee"];
			
			////////////email 1: To PLUM and Agent//////////////
			//***(INSERT AGENT NAME)
			$formcontent = "
			<html>
			<body style='."'".'max-width:100%;'."'".'>
				<head>
				<title>Seminar Request</title>
				</head>
			    <h1 style='."'".'color:#253069'."'".'>New Friend Seminar Invite For '.$_SESSION['c_lp_client_name1'].'!!</h1>
			    </br>
			    <h2>Attendee Name: ".$attendee_name."</h2>
			    <h2>Friend Name: ".$friend_name."</h2>
			    <h2>Friend Email: ".$friend_email."</h2>
			    <h2>Friend Phone: ".$friend_phone."</h2>
			</body>
			</html>";
			
			//***(INSERT AGENT EMAIL)(REMOVE FRIEND EMAIL DEMO PURPOSE ONLY)
			$recipient = "<landings@plumdm.com> , <'.$_SESSION['c_lp_email1'].'> , '.$salesrep_emails.'";
			//***(INSERT AGENT NAME)
			$subject = "'.$_SESSION['c_lp_client_name1'].' Friend Invite Sent";
			$headers  = "From: Plum DM <landings@plumdm.com>\r\n"; 
			$headers .= "Content-type: text/html\r\n";
			mail($recipient, $subject, $formcontent, $headers) or die("Error!");
			
			////////////email 2: To Friend/////////////////////
			//***(INSERT AGENT NAME, AND LINKS)
			$formcontent1 = "
			<html>
			<body style='."'".'max-width:100%;'."'".'>
				<head>
				<title>Seminar Request</title>
				</head>
			    <h1 style='."'".'color:#253069;'."'".'>Join ".$attendee_name." For A Complimentary Dinner And Seminar!!</h1>
				</br>
			    <h2>Would You Like To Go To This Seminar With Me?</h2>
			    <h3>Hello ".$friend_name.",  I would like you to attend a seminar hosted by '.$_SESSION['c_lp_client_name1'].' with me. '.$_SESSION['c_lp_client_name1'].' is a financial planner that is hosting a complimentary seminar where these topics will be discussed:</h3>
			    <ul>
			    '.$sem_bullet11.'
			    '.$sem_bullet21.'
			    '.$sem_bullet31.'
			    '.$sem_bullet41.'
			    '.$sem_bullet51.'
			    </ul>
			    </br>
			    <h3>If You Would Like To Reserve Your Spot Alongside Me, Or To Learn more Information <a href='."'".$_SESSION['c_lp_notes1']."'".'>Click Here</a></h3>
			    <h3>Or Visit: '.$_SESSION['c_lp_notes1'].'</h3>
			    </br>
			    <h3>I hope To See You There!</h3>
			    <h3>".$attendee_name."</h3>
			</body>
			</html>";
			$recipient1 = $friend_email;
			$subject1 = $friend_name.", ".$attendee_name." Would Like You To Join Us!";
			//***(INSERT AGENT NAME)
			$headers1  = "From: '.$_SESSION['c_lp_client_name1'].'\r\n"; 
			$headers1 .= "Content-type: text/html\r\n";
			mail($recipient1, $subject1, $formcontent1, $headers1) or die("Error!");
			
			echo "Invite Successfully Sent!"
			
			?>';
	
	//place friend process content in file
	file_put_contents($init_friend_process,$init_friend_process_content);
	
	//////Files to be zipped///////////
	$files_to_zip = array(
	'../INDEX/cleanup_sites/'.$_SESSION['file_identifier'].'/index.php',
	'../INDEX/cleanup_sites/'.$_SESSION['file_identifier'].'/thanks.php',
	'../INDEX/cleanup_sites/'.$_SESSION['file_identifier'].'/process.php',
	'../INDEX/cleanup_sites/'.$_SESSION['file_identifier'].'/friend_process.php',
	'../INDEX/cleanup_sites/'.$_SESSION['file_identifier'].'/public/site_images/bannerfullbackground.jpg',
	'../INDEX/cleanup_sites/'.$_SESSION['file_identifier'].'/public/site_images/loader.gif',
	'../INDEX/cleanup_sites/'.$_SESSION['file_identifier'].'/public/stylesheets/plumdm_auto_editor.css',
	'../INDEX/cleanup_sites/'.$_SESSION['file_identifier'].'/public/stylesheets/'.$stylesheet.'',
	'../INDEX/cleanup_sites/'.$_SESSION['file_identifier'].'/public/site_images/'.$blogo.'',
	'../INDEX/cleanup_sites/'.$_SESSION['file_identifier'].'/public/site_images/'.$rlogo.'',
	'../INDEX/cleanup_sites/'.$_SESSION['file_identifier'].'/public/site_images/'.$plogo.''
	);
	
	///call zip function with above files as params
	$result = create_zip($files_to_zip,'../INDEX/cleanup_sites/'.$_SESSION['file_identifier'].'.zip');	
	
	//redirect to submit design
	header("Location: submit_design.php");

}//END Push finalize design button from popup, finished create copy and zip

?>

<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Edit Seminar 1</title>
		<link rel="shortcut icon" href="public/site_images/plum_logo-favicon.ico" >
		<link href='http://fonts.googleapis.com/css?family=Tangerine|Muli:400,400italic|Alegreya:400italic,400' rel='stylesheet' type='text/css'>
		<link href="public/stylesheets/plumdm_auto_editor.css" rel="stylesheet" type="text/css">
		<link id="template_style" href="public/stylesheets/seminar1_original.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" type="text/css" href="public/stylesheets/jquery.qtip.css" />
		<link rel="stylesheet" type="text/css" href="public/stylesheets/component.css" />
		 <script> 
			function popup(){ 
				document.getElementById('finalPopupContent').className = 'md-content';
			}
		</script>
	</head>
	
	<body onload="popup()">
		
	
		<section class="bottomShadow" id="mainNav">
			<h1>Customize Your Landing Page</h1>
		    <h2><a href="../index.php">HOME</a></h2>
		</section> 

		<section class="allShadow2" id="dashboard">
			<img src="public/site_images/logo_tagline.png" height="50">
		    
		    <div id="swatches">
		    	<h3>Select A Theme</h3>
		    	<a name="original" class="transitionSwatch" onclick="swapStyleSheet1('public/stylesheets/seminar1_original.css')"><div class="allShadow1 swatch" style="background-color:#FFF8EA;"></div></a>
		        <a name="blue" class="transitionSwatch" onclick="swapStyleSheet2('public/stylesheets/seminar1_blue.css')"><div class="allShadow1 swatch" style="background-color:#D5E8EF;"></div></a>
		        <a name="gray" class="transitionSwatch" onclick="swapStyleSheet3('public/stylesheets/seminar1_gray.css')"><div class="allShadow1 swatch" style="background-color:#112F41;"></div></a>
		        <a name="red" class="transitionSwatch" onclick="swapStyleSheet4('public/stylesheets/seminar1_red.css')"><div class="allShadow1 swatch" style="background-color:#5E2B28;"></div></a>
		    </div>
		    <hr></hr>
		    
		    <div id="notes"><h3 class="transition bottomShadow">INSTRUCTIONS</h3></div>
		    <hr></hr>
		    <a class="md-trigger" data-modal="finalPopup" ><div class="transition1 bottomShadow" id="submitDesign">i am done!</br> submit design</div></a>
		    <hr></hr>
		    <a href="upload_seminar1.php"><div class="transition1 bottomShadow" id="resetDesign">start over</div></a>
			<hr></hr>
		
		</section>


		<!--************************ Template Container Start ***************************-->
		<section class="allShadow" id="templateContainer">
		<header>
					<div id="logo_container"><?php echo $logo; ?></div>
					
		            <div id="regphone" style="width:500px; position:relative;">
						<div id="change_num" class="edit_icon"></div>
		                	Event Registration:
						<div id="seminar_number">xxx-xxx-xxxx</div>
					</div>
				</header>
				<div id="fullbanner">
					<div id="banner">
						<div id="eventwrap">
		                <div id="change_sem_info" class="edit_icon"></div>
							<div id="event">
								<h1 id="inviteName"><span id="adv_name">John Smith</span> Invites You</h1>
								<h2>to a complimentary <span id="meal">dinner</span></h2>
								<div id="datesContainer">
								<div id="date1" style="<?php if($_SESSION['r_two_name1'] != NULL){echo 'padding: 0 50px;';} ?>">
									<h3 id="date_1_day">Day</h3>
									<p id="date_1_date">Date</p>
									<p id="date_1_time">Time</p>
								</div>
								
								<div id="date2" style="<?php if($_SESSION['r_two_name1'] != NULL){echo 'padding: 0 50px;';} ?>">
									<h3 id="date_2_day">Day</h3>
									<p id="date_2_date">Date</p>
									<p id="date_2_time">Time</p>
								</div>
		                        
		                        <div id="date3" <?php if($restaurant2 != ""){ echo 'style="display:none;"'; } ?> >
									<h3 id="date_3_day">Day</h3>
									<p id="date_3_date">Date</p>
									<p id="date_3_time">Time</p>
								</div>
								
								</div>
		                        
		                       <?php echo $restaurant; ?>
		                        
		                        
		                        <div id="restaurantNameContainer">
		                        <?php echo $restaurant1; ?>
		                        <?php echo $restaurant2; ?>
		                        </div>
		                        
		                        <div id="restaurant">
								<div id="restaurant1">
									<h3><?php if($restaurant1 == "" && $_SESSION['r_name'] == ""){ echo '<span id="rName1">Restaurant Name #1</span></br>' ; } ?>
										<span id="street1">Street Address</span></br>
										<span id="city1">City, State, Zip</span>
									</h3>
								</div>
								
								<div id="restaurant2" <?php if($restaurant2 == ""){ echo 'style="display:none;"'; } ?> >
									<h3><?php if($restaurant2 == ""){ echo '<span id="rName1">Restaurant Name #2</span></br>' ; } ?>
										<span id="street2">Street Address</span></br>
										<span id="city2">City, State, Zip</span>
									</h3>
								</div>
							</div>
								
							</div>
						</div>
						<div id="form">
						  <div id="example_form_cont"><h1 style="font-family:'Lato'; color: black; font-weight:bold; font-size:50px;" id="example_form">Example</h1></div>
							<h1>Register Now!</h1>
							<form id="enroll_form" method="post" action="process.php">
								<p>Full Name:*</p>
								<input type="text" name="fullname" class="fullname" id="fullname" disabled />
								<p>Email:*</p>
								<input type="text" name="email" class="email" id="email" disabled />
								<p>Phone:*</p>
								<input type="text" name="phone" class="phone" id="phone" disabled />
								<p>Guest Name:</p>
								<input type="text" name="guestname" class="guestname" id="guestname" disabled />
								<p>Date:*
								<select class="validate['required']" name="date" id="date" disabled>
		                       		<option value="">--</option>
		                        	<option value="June 15">June 15</option>
		                        	<option value="June 17">June 17</option>
								</select></p>
								<button type="submit" name="submit" id="submit" disabled />REGISTER</button>
							</form>
						</div>
					</div>
				</div>
				<div id="contentwrapper">
					<div class="infosectionlarge">
		            <?php if($_SESSION['p_logo'] != ""){ echo '<img id="agent" width="200" src="'. $_SESSION['p_logo'] . '">'; } ?>
						<h1 id="bio_title">About John Smith</h1>
		    			<div id="change_bio" class="edit_icon"></div>
						<p id="biography">Lorem ipsum dolor sit amet, sit nostro facilisi ad. Et autem integre ius. Eos eu vitae ceteros. Cum no etiam nullam appetere.</br>
		
		Harum aliquam cu quo. An errem vidisse atomorum usu. Ad vel liberavisse concludaturque. His soleat possim aliquip at. Movet aliquam expetenda ius no, mei liber utamur eu. Diam impetus scaevola eos te.</br>
		
		Quo alterum euripidis ea, no quo feugiat detracto. Mel ne fugit senserit constituam. Vidit accumsan percipit ut ius. Mucius conceptam et ius, nulla ignota admodum ut usu, soluta efficiendi in eos.</p>
					</div>
					
					<div class="infosection">
						<div class="border"></div>
		                <div id="change_learn" class="edit_icon"></div>
						<h1 id="bullet_title">You Will Learn:</h1>
						<ul>
							<div id="bullet1"><li>Quo alterum euripidis ea, no quo feugiat detracto. Mel ne fugit senserit constituam. Vidit accumsan percipit ut ius. Mucius conceptam et ius, nulla ignota admodum ut usu, soluta efficiendi in eos.</li></div>
							<div id="bullet2"><li>Lorem ipsum dolor sit amet,</li></div>
							<div id="bullet3"><li>Lorem ipsum dolor sit amet,</li></div>
							<div id="bullet4"><li>Lorem ipsum dolor sit amet,</li></div>
							<div id="bullet5"><li>Lorem ipsum dolor sit amet,</li></div>
						</ul>
					</div>
				</div>
				<footer>
					<span id="footertext">Copyright 2014 Plum Direct Marketing</span>
				</footer>
		
		<!--This is instructions tooltip*-->
		<div id="instructions" style="display:none; padding:10px; width:410px;">
		    	<img src="public/site_images/directions.jpg" style="margin:auto;">
		</div>
		
		
		<!--This is change number tooltip*-->
		<div id="change_number" style="display:none; padding:10px; width:230px;">
			<label>Change Seminar Number:</label></br>
		    	<input type="text" id="sem_num_change" placeholder="xxx-xxx-xxxx" maxlength="14"></br>
		    <button onclick="change_sem_number()">Change</button>
		</div>
		
		<!--This is the change seminar info tooltip*-->
		<div id="change_seminar_information" style="display:none; padding:10px; width:315px;">
			<form onsubmit="event.preventDefault(); change_sem_info();">
		        <label>Agent Name:</label><label style="margin-left:100px;">Event:</label></br>
		            <input type="text" id="sem_name_change" placeholder="John Smith" maxlength="17" style="width:150px;" required>	
					<select id="sem_meal_change" style="width:90px; margin-left:10px; height:24px; margin-bottom:2px;" required>
						<option value="">----</option>
						<option value="dinner">dinner</option>
						<option value="lunch">lunch</option>
						<option value="event">event</option>
					</select></br>
		        <label>Seminar Date #1:</label></br>
		            <input type="text" id="sem_date1_day_change" placeholder="Monday" style="width:90px" required>
		            <input type="text" id="sem_date1_date_change" placeholder="January 1st" style="width:90px" required>
		            <input type="text" id="sem_date1_time_change" placeholder="6:00 PM" style="width:90px" required></br>
		         <label>Seminar Date #2<?php if(!isset($_SESSION['r_two_name2'])){ echo ' (Optional):'; } ?></label></br>
		            <input type="text" id="sem_date2_day_change" placeholder="Tuesday" style="width:90px"<?php if(isset($_SESSION['r_two_name2'])){ echo ' required';}  ?>>
		            <input type="text" id="sem_date2_date_change" placeholder="January 2nd" style="width:90px"<?php if(isset($_SESSION['r_two_name2'])){ echo ' required';}  ?>>
		            <input type="text" id="sem_date2_time_change" placeholder="6:00 PM" style="width:90px"<?php if(isset($_SESSION['r_two_name2'])){ echo ' required';}  ?>></br>
		            
		         <?php if(!isset($_SESSION['r_two_name2'])){ echo '   
		         <label>Seminar Date #3 (Optional):</label></br>
		            <input type="text" id="sem_date3_day_change" placeholder="Wednesday" style="width:90px">
		            <input type="text" id="sem_date3_date_change" placeholder="January 3rd" style="width:90px">
		            <input type="text" id="sem_date3_time_change" placeholder="6:00 PM" style="width:90px"></br>
		            ';}?>
		            
		         <label>Seminar Location #1:</label></br>
		            <?php if($_SESSION['r_logo'] != NULL){ echo '<input type="text" id="1rName" placeholder="Restaurant Name" style="width:90px">' ; } ?>
		            <input type="text" id="1sem_location_street" placeholder="123 Main Street" style="width:90px" required>
		            <input type="text" id="1sem_location_city" placeholder="New York, NY" style="width:90px" required></br>
		            
		            
		         
		         <?php if(isset($_SESSION['r_two_name2'])){ echo '
		         <label>Seminar Location #2</label></br>
		            <input type="text" id="2sem_location_street" placeholder="123 Main Street" style="width:90px" required>
		            <input type="text" id="2sem_location_city" placeholder="New York, NY" style="width:90px" required></br>';}?>
		    <button>Change</button>
		    </form>
		</div>
		
		<!--This is the change seminar bio*-->
		<div id="change_seminar_bio" style="display:none; padding:10px; width:280px;">
		        <label>Title:</label></br>
		            <input style="width:250px;" type="text" id="sem_bio_title_change" placeholder="About John Smith"></br>
		        <label>Bio:</label></br>
		            <textarea id="bio" style="border:1px solid lightgrey; resize:none; border-radius:9px; padding:3px; width:250px; height:170px;" placeholder="John is a financial advisor..."></textarea></br>
		    <button onclick="change_sem_bio()">Change</button>
		</div>
		       
		<!--This is the change seminar bio*-->
		<div id="change_seminar_bullet" style="display:none; padding:10px; width:230px;">
		        <label>Title:</label></br>
		            <input type="text" id="sem_bullet_title_change" placeholder="What You Will Learn:"></br>
		        <label>Bullet #1:</label></br>
		            <input type="text" id="sem_bullet1" placeholder="You will learn this..."></br>
		        <label>Bullet #2:</label></br>
		            <input type="text" id="sem_bullet2" placeholder="You will learn this..."></br>
		        <label>Bullet #3:</label></br>
		            <input type="text" id="sem_bullet3" placeholder="You will learn this..."></br>
		        <label>Bullet #4:</label></br>
		            <input type="text" id="sem_bullet4" placeholder="You will learn this..."></br>
		        <label>Bullet #5:</label></br>
		            <input type="text" id="sem_bullet5" placeholder="You will learn this..."></br>
		    <button onclick="change_bullets()">Change</button>
		</div>
		        
		</section><!--***********END OF TMEPLATE CONTAINER***********-->


            									<!--********** BEGIN Popup Block********** -->
		<div class="md-modal md-effect-1" id="finalPopup">
			<div id="finalPopupContent">
           			<h2>Fill In Your Personal Informantion</h2>
                    <form class="upperShadow" id="finishDesign" method="post" action="edit_seminar1.php"  onsubmit="return loader();">
                   		<input type="hidden" id="stylesheet" name="stylesheet">
					    <input type="hidden" id="sem_num_change1" name="sem_num_change1" >
					    <input type="hidden" id="sem_name_change1" name="sem_name_change1" >
					    <input type="hidden" id="sem_date1_day_change1" name="sem_date1_day_change1" >
					    <input type="hidden" id="sem_date1_date_change1" name="sem_date1_date_change1" >
					    <input type="hidden" id="sem_date1_time_change1" name="sem_date1_time_change1" >
					    <input type="hidden" id="sem_date2_day_change1" name="sem_date2_day_change1" >
					    <input type="hidden" id="sem_date2_date_change1" name="sem_date2_date_change1" >
					    <input type="hidden" id="sem_date2_time_change1" name="sem_date2_time_change1" >
					    <input type="hidden" id="sem_date3_day_change1" name="sem_date3_day_change1" >
					    <input type="hidden" id="sem_date3_date_change1" name="sem_date3_date_change1" >
					    <input type="hidden" id="sem_date3_time_change1" name="sem_date3_time_change1" >
					    <input type="hidden" id="original_date1" name="original_date1" >
					    <input type="hidden" id="original_date2" name="original_date2" >
					    <input type="hidden" id="original_date3" name="original_date3" >
					    <input type="hidden" id="sem_location_rName1" name="sem_location_rName1" >
					    <input type="hidden" id="sem_location_street1" name="sem_location_street1" >
					    <input type="hidden" id="sem_location_city1" name="sem_location_city1" >	
					    <input type="hidden" id="sem_location_street2" name="sem_location_street2" >
					    <input type="hidden" id="sem_location_city2" name="sem_location_city2" >				    
					    <input type="hidden" id="sem_bio_title_change1" name="sem_bio_title_change1" >
					    <textarea style="visibility: hidden; float: left; " id="bio1" name="bio1" ></textarea>
					    <input type="hidden" id="sem_bullet_title_change1" name="sem_bullet_title_change1" >
					    <input type="hidden" id="sem_bullet11" name="sem_bullet11" >
					    <input type="hidden" id="sem_bullet21" name="sem_bullet21" >
					    <input type="hidden" id="sem_bullet31" name="sem_bullet31" >
					    <input type="hidden" id="sem_bullet41" name="sem_bullet41" >
					    <input type="hidden" id="sem_bullet51" name="sem_bullet51" >
					    <input type="hidden" id="sem_meal_change1" name="sem_meal_change1" >
					    <div class="fieldContainerLeft">
					    <label style="">Your First Name</label>
						<input type="text" name="c_lp_client_firstname1" required>
						</div>
						<div class="fieldContainerRight">
						<label>Your Last Name</label>
						<input type="text" name="c_lp_client_lastname1" id="c_lp_client_lastname1" required >
						</div>
						
						<div class="fieldContainerLeft">
						<label>Your Marketing Advisor</label>
						<select required name="c_lp_sales_rep1">
						<option value="">- - - - - -</option>
						<?php foreach($sales_reps as $sales_rep): ?>
						<?php if($sales_rep->id == 1 || $sales_rep->id == 13 ){ continue; } ?>
						<option value="<?php echo $sales_rep->id; ?>"><?php echo $sales_rep->first_name." ".$sales_rep->last_name; ?></option>
						<?php endforeach; ?>
						<option value="2">Don't have a Marketing Advisor?</option>
						</select>
						</div>
						
						<div class="fieldContainerRight">
						<label>Your Email</label>
						<input type="text" name="c_lp_email1" required>
						</div>
						
						<div style="display: inline-block; width:180px; margin-right: 62px;">
						<label>city</label>
						<input style="width:180px;"  type="text" name="c_lp_city1" required>
						</div>
						
						<div style="display: inline-block; width:180px; margin-right: 62px;">
						<label>state</label>
						<input style="width:180px;"  type="text" name="c_lp_state1" required>
						</div>
						
						<div style="display: inline-block; width:180px;">
						<label>zip</label>
						<input style="width:180px;" type="text" name="c_lp_zip_code1" required>
						</div>
						
						</br>
						<hr></hr>
						
					    <h1 class="popup_headers">Choose your URL:</h1>
					    
					    <div id="defaultRadioContainer">
						<input type="radio" name="c_lp_website_url1" checked value="default" id="radio_default"><div id="default_url">www.plumdm.com/LastnameSeminar (FREE)</div>
						</div>
					    
					    <div id="customRadioContainer">
						<input type="radio" name="c_lp_website_url1" value="custom" id="radio_custom"><div id="custom_url">www.LastnameSeminar.com ($50 FEE)</div>
						</div>
					
						
						<hr></hr>
						
						<h1 class="popup_headers">Client Monitoring: <a id="whats_this">(what is this?)</a></h1>
						<input type="checkbox" name="client_monitor" value="client_monitor">
						<h3>I would like client monitoring service through teledirect and CRM integration. ($100)</h3>
						
						<div class="loader" id="loader_form"></div><!--LOADER-->
                        <input name="submitDesignPopup" id="submitDesignPopup" type="submit" value="submit"></br>
                    </form>
				</div>
			</div>
			
			

			
			
			<!--This is the display about crm addon-->
		<div id="about_crm" style="display:none; padding:10px; width:280px;">
		       <h4 style="padding-right:20px; font-size:12px;">When you do a marketing campaign with Plum, we give your prospects multiple ways to 
		       	respond (online, over the phone, or by mailing in a card). But TRACKING all of that can take a ton of time, not to 
		       	mention be a big pain. Avoid the hassles with Plum’s “Client Monitoring” Service. </br></br>Benefits Include:</br></br>
		       	</h4>
		       	<span style="font-size:12px;">
		       	  - All Your Leads, Clients & RSVPs – In One Place</br></br>
		       	  - One SIMPLE, EASY-TO-ACCESS spot for all your clients and potential clients</br></br>
		       	  - Access your lead and client information – FROM ANYWHERE</br></br>
		       	  - Get MORE out of your marketing campaigns by being able to easily follow up with your leads/prospects</br>
				</span></br>
		</div>
		
    	<div class="md-overlay"></div><!-- the overlay element -->
    
<script type="text/javascript" src="public/javascripts/placeholders.min.js"></script>
<script type="text/javascript" src="public/javascripts/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="public/javascripts/jquery.qtip.min.js"></script>
<script type="text/javascript" src="public/javascripts/classie.js"></script>
<script type="text/javascript" src="public/javascripts/modalEffects.js"></script>

<script type="text/javascript">


	function loader(){
		$("#loader_form").show();
		$("#submitDesignPopup").hide();
	
	    return true;
	}


	function change_bullets(){
		document.getElementById("bullet_title").innerHTML = document.getElementById("sem_bullet_title_change").value;
		document.getElementById("sem_bullet_title_change1").value = document.getElementById("sem_bullet_title_change").value;
		if(document.getElementById("sem_bullet1").value != ""){
			document.getElementById("bullet1").innerHTML = "<li>"+document.getElementById("sem_bullet1").value+"</li>";
			document.getElementById("sem_bullet11").value = "<li>"+document.getElementById("sem_bullet1").value+"</li>";
			}else{
			document.getElementById("bullet1").innerHTML = "";
				}
		if(document.getElementById("sem_bullet2").value != ""){
			document.getElementById("bullet2").innerHTML = "<li>"+document.getElementById("sem_bullet2").value+"</li>";
			document.getElementById("sem_bullet21").value = "<li>"+document.getElementById("sem_bullet2").value+"</li>";
			}else{
				document.getElementById("bullet2").innerHTML = "";
				}
		if(document.getElementById("sem_bullet3").value != ""){
			document.getElementById("bullet3").innerHTML = "<li>"+document.getElementById("sem_bullet3").value+"</li>";
			document.getElementById("sem_bullet31").value = "<li>"+document.getElementById("sem_bullet3").value+"</li>";
			}else{
				document.getElementById("bullet3").innerHTML = "";
				}
		if(document.getElementById("sem_bullet4").value != ""){
			document.getElementById("bullet4").innerHTML = "<li>"+document.getElementById("sem_bullet4").value+"</li>";
			document.getElementById("sem_bullet41").value = "<li>"+document.getElementById("sem_bullet4").value+"</li>";
			}else{
				document.getElementById("bullet4").innerHTML = "";
				}
		if(document.getElementById("sem_bullet5").value != ""){
			document.getElementById("bullet5").innerHTML = "<li>"+document.getElementById("sem_bullet5").value+"</li>";
			document.getElementById("sem_bullet51").value = "<li>"+document.getElementById("sem_bullet5").value+"</li>";
			}
			else{
				document.getElementById("bullet5").innerHTML = "";
				}
	}

	function change_sem_bio(){
		document.getElementById("bio_title").innerHTML = document.getElementById("sem_bio_title_change").value;
		document.getElementById("sem_bio_title_change1").value = document.getElementById("sem_bio_title_change").value;
		var text = document.getElementById("bio").value;
		text = text.replace(/\r\n/g, '<br />').replace(/[\r\n]/g, '<br />');
		document.getElementById("biography").innerHTML = text;
		document.getElementById("bio1").value = text;		
	}
	
	function change_sem_info(){
		document.getElementById("adv_name").innerHTML = document.getElementById("sem_name_change").value+" ";
		document.getElementById("sem_name_change1").value = document.getElementById("sem_name_change").value+" ";
		
		var e = document.getElementById("sem_meal_change");
		var meal = e.options[e.selectedIndex].value;
         		
		document.getElementById("meal").innerHTML = meal;
	    document.getElementById("sem_meal_change1").value = meal;
		
		document.getElementById("date_1_day").innerHTML = document.getElementById("sem_date1_day_change").value;;
		document.getElementById("sem_date1_day_change1").value = document.getElementById("sem_date1_day_change").value;
		document.getElementById("date_1_date").innerHTML = document.getElementById("sem_date1_date_change").value;
		document.getElementById("sem_date1_date_change1").value = document.getElementById("sem_date1_date_change").value;
		document.getElementById("date_1_time").innerHTML = document.getElementById("sem_date1_time_change").value;
		document.getElementById("sem_date1_time_change1").value = document.getElementById("sem_date1_time_change").value;
		
		document.getElementById("date_2_day").innerHTML = document.getElementById("sem_date2_day_change").value;
		document.getElementById("sem_date2_day_change1").value = document.getElementById("sem_date2_day_change").value;
		document.getElementById("date_2_date").innerHTML = document.getElementById("sem_date2_date_change").value;
		document.getElementById("sem_date2_date_change1").value = document.getElementById("sem_date2_date_change").value;
		document.getElementById("date_2_time").innerHTML = document.getElementById("sem_date2_time_change").value;
		document.getElementById("sem_date2_time_change1").value = document.getElementById("sem_date2_time_change").value;
		
		
		<?php if($_SESSION['r_two_name1'] == NULL){
			 echo '
		document.getElementById("date_3_day").innerHTML = document.getElementById("sem_date3_day_change").value;
		document.getElementById("sem_date3_day_change1").value = document.getElementById("sem_date3_day_change").value;
		document.getElementById("date_3_date").innerHTML = document.getElementById("sem_date3_date_change").value;
		document.getElementById("sem_date3_date_change1").value = document.getElementById("sem_date3_date_change").value;
		document.getElementById("date_3_time").innerHTML = document.getElementById("sem_date3_time_change").value;
		document.getElementById("sem_date3_time_change1").value = document.getElementById("sem_date3_time_change").value;';
		} ?>
		
		
		
		<?php if($_SESSION['r_logo'] != NULL){
			 echo 'document.getElementById("rName1").innerHTML = document.getElementById("1rName").value;
					document.getElementById("sem_location_rName1").value = document.getElementById("1rName").value;';
		} ?>
		document.getElementById("street1").innerHTML = document.getElementById("1sem_location_street").value;
		document.getElementById("sem_location_street1").value = document.getElementById("1sem_location_street").value;
		document.getElementById("city1").innerHTML = document.getElementById("1sem_location_city").value;
		document.getElementById("sem_location_city1").value = document.getElementById("1sem_location_city").value;
		
		
		<?php if($_SESSION['r_two_name1'] != NULL){
			 echo '
		document.getElementById("street2").innerHTML = document.getElementById("2sem_location_street").value;
		document.getElementById("sem_location_street2").value = document.getElementById("2sem_location_street").value;
		document.getElementById("city2").innerHTML = document.getElementById("2sem_location_city").value;
		document.getElementById("sem_location_city2").value = document.getElementById("2sem_location_city").value;';
		} ?>
		
		
			if((document.getElementById("sem_date1_day_change").value == "")){
				document.getElementById("date1").style.display = "none";
				document.getElementById("original_date1").value = 0 ;
			}else{
				document.getElementById("date1").style.display = "inline-block";
				document.getElementById("original_date1").value = 1 ;
			}
			
			if((document.getElementById("sem_date2_day_change").value == "")){
				document.getElementById("original_date2").value = 0 ;
				document.getElementById("date2").style.display = "none";
			}else{
				document.getElementById("date2").style.display = "inline-block";
				document.getElementById("original_date2").value = 1 ;
			}


			if((document.getElementById("sem_date3_date_change").value == "")){
				document.getElementById("original_date3").value = 0 ;
				document.getElementById("date3").style.display = "none";
				document.getElementById("date1").style.paddingLeft = "50px";
				document.getElementById("date1").style.paddingRight = "50px";
				document.getElementById("date2").style.paddingLeft = "50px";
				document.getElementById("date2").style.paddingRight = "50px";	
			}else{
				document.getElementById("original_date3").value = 1 ;
				document.getElementById("date3").style.display = "inline-block";
				document.getElementById("date1").style.paddingLeft = "5px";
				document.getElementById("date1").style.paddingRight = "5px";
				document.getElementById("date2").style.paddingLeft = "5px";
				document.getElementById("date2").style.paddingRight = "5px";
			}


			
		   if((document.getElementById("2sem_location_street").value == "")){
		   		document.getElementById("restaurant2").style.display = "none";
		   }else{
		   		document.getElementById("restaurant2").style.display = "inline-block";
		   }
	}

	function change_sem_number(){
		document.getElementById("seminar_number").innerHTML = document.getElementById("sem_num_change").value;
		document.getElementById("sem_num_change1").value = document.getElementById("sem_num_change").value;
	}
	
	function swapStyleSheet1(sheet){
		document.getElementById('template_style').setAttribute('href', sheet);
		document.getElementById('stylesheet').value = 'seminar1_original.css';
	}
	function swapStyleSheet2(sheet){
		document.getElementById('template_style').setAttribute('href', sheet);
		document.getElementById('stylesheet').value = 'seminar1_blue.css';
	}
	function swapStyleSheet3(sheet){
		document.getElementById('template_style').setAttribute('href', sheet);
		document.getElementById('stylesheet').value = 'seminar1_gray.css';
	}
	function swapStyleSheet4(sheet){
		document.getElementById('template_style').setAttribute('href', sheet);
		document.getElementById('stylesheet').value = 'seminar1_red.css';
	}
	
		$('#notes h3').qtip({ // Grab some elements to apply the tooltip to
		style: { 
			classes: 'qtip-bootstrap qtip-shadow'
		},
		content: {
			text: $('#instructions'),
			title: 'How To Use Customize My Landing Page!',
			button: 'close'
		},
		hide: {
			event: false,
			event: 'unfocus'
		},
		show: {
			event: 'mouseover',
			solo: true,
			effect: function(offset) {
				$(this).slideDown(150); // "this" refers to the tooltip
			}
		},
		position: {
		 	container: $('body') ,
			adjust: {
				y:60,
				x:0,
				scroll: false // Can be ommited (e.g. default behaviour)
			},
			my: 'left center',  // Position my top left...
			at: 'right bottom', // at the bottom right of...
			target: $('#notes') // my target
		}
	})

	
	$('#change_learn').qtip({ // Grab some elements to apply the tooltip to
		style: { 
			classes: 'qtip-bootstrap qtip-shadow'
		},
		content: {
			text: $('#change_seminar_bullet'),
			title: 'Change Your Seminar Bullet Points',
			button: 'close'
		},
		hide: {
			event: false,
			event: 'unfocus'
		},
		show: {
			event: 'click',
			solo: true,
			effect: function(offset) {
				$(this).slideDown(150); // "this" refers to the tooltip
			}
		},
		position: {
		 	container: $('#contentwrapper') ,
			adjust: {
				y:140,
				x:8,
				scroll: false // Can be ommited (e.g. default behaviour)
			},
			my: 'right center',  // Position my top left...
			at: 'top left', // at the bottom right of...
			target: $('.infosection') // my target
		}
	})
	
	
	$('#change_bio').qtip({ // Grab some elements to apply the tooltip to
		style: { 
			classes: 'qtip-bootstrap qtip-shadow'
		},
		content: {
			text: $('#change_seminar_bio'),
			title: 'Change Your Bio',
			button: 'close'
		},
		hide: {
			event: false,
			event: 'unfocus'
		},
		show: {
			event: 'click',
			solo: true,
			effect: function(offset) {
				$(this).slideDown(150); // "this" refers to the tooltip
			}
		},
		position: {
		 	container: $('#contentwrapper') ,
			adjust: {
				y:150,
				x:-15,
				scroll: false // Can be ommited (e.g. default behaviour)
			},
			my: 'left center',  // Position my top left...
			at: 'top right', // at the bottom right of...
			target: $('.infosectionlarge') // my target
		}
	})
	
	
	$('#change_sem_info').qtip({ // Grab some elements to apply the tooltip to
		style: { 
			classes: 'qtip-bootstrap qtip-shadow'
		},
		content: {
			text: $('#change_seminar_information'),
			title: 'Change Seminar Information',
			button: 'close'
		},
		hide: {
			event: false,
			event: 'unfocus'
		},
		show: {
			event: 'click',
			solo: true,
			effect: function(offset) {
				$(this).slideDown(150); // "this" refers to the tooltip
			}
		},
		position: {
		 	container: $('#templateContainer') ,
			adjust: {
				y:150,
				x:-30,
				scroll: false // Can be ommited (e.g. default behaviour)
			},
			my: 'left center',  // Position my top left...
			at: 'top right', // at the bottom right of...
			target: $('#event') // my target
		}
	})
	
		
	$('#change_num').qtip({ // Grab some elements to apply the tooltip to
		style: { 
			classes: 'qtip-bootstrap qtip-shadow'
		},
		content: {
			text: $('#change_number'),
			title: 'Input Your Seminar Number',
			button: 'close'
		},
		hide: {
			event: false,
			event: 'unfocus'
		},
		show: {
			event: 'click',
			solo: true,
			effect: function(offset) {
				$(this).slideDown(150); // "this" refers to the tooltip
			}
		},
		position: {
		 	container: $('header') ,
			adjust: {
				y:10,
				x:-150,
				scroll: false // Can be ommited (e.g. default behaviour)
			},
			my: 'top right',  // Position my top left...
			at: 'bottom right', // at the bottom right of...
			target: $('#regphone') // my target
		}
	})	
	
	$('#whats_this').qtip({ // Grab some elements to apply the tooltip to
		style: { 
			classes: 'qtip-bootstrap qtip-shadow'
		},
		content: {
			text: $('#about_crm'),
			title: 'What Is Client Monitoring?',
			button: 'close'
		},
		hide: {
			event: false,
			event: 'mouseout'
		},
		show: {
			event: 'mouseover',
			solo: true
		},
		position: {
		 	container: $('.md-content') ,
			adjust: {
				y:0,
				x:0,
				scroll: false // Can be ommited (e.g. default behaviour)
			},
			my: 'bottom left',  // Position my top left...
			at: 'top right', // at the bottom right of...
			target: $('#whats_this') // my target
		}
	})
	
		$('#c_lp_client_lastname1').change(function() {
  			var input = $('#c_lp_client_lastname1').val();
  			input = input.toLowerCase();
  			$("#default_url").html("http://www.plumdm.com/"+input+"seminar (FREE)");
  			$("#radio_default").val("http://www.plumdm.com/"+input+"seminar");
  			$("#custom_url").html("http://www."+input+"seminar.com ($50 FEE)");
  			$("#radio_custom").val("http://www."+input+"seminar.com");
		})
		
	$(document).ready(function() { 
    setTimeout(function(){
        	$( "#notes h3" ).mouseover();
   		 }, 100);
	});	

</script>

</body>
</html>