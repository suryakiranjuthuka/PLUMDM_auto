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
	


//restaurant variable
if($_SESSION['r_name'] != NULL){
	$restaurant =  '<h1>'. $_SESSION['r_name'] .'</h1>'; 
}else {
	$restaurant1 =  '<h1>'. $_SESSION['r_two_name1'] .'</h1>';
	$restaurant2 =  '<h1>'. $_SESSION['r_two_name2'] .'</h1>';
}


//////////////submit final design from popup, create folder structure and copy and zip files///////////////
if($_POST['submitDesignPopup']){
	
	//vars from javascript dynamic changes from user
	$workshop_date1_day_change1 = $_POST['workshop_date1_day_change1'];
	$workshop_date1_datetime_change1 = $_POST['workshop_date1_datetime_change1'];
	$workshop_date2_day_change1 = $_POST['workshop_date2_day_change1'];
	$workshop_date2_datetime_change1 = $_POST['workshop_date2_datetime_change1'];
	$workshop_date3_day_change1 = $_POST['workshop_date3_day_change1'];
	$workshop_date3_datetime_change1 = $_POST['workshop_date3_datetime_change1'];
	$original_date1 = $_POST['original_date1'];
	$original_date2 = $_POST['original_date2'];
	$original_date3 = $_POST['original_date3'];
	$workshop_location_rName1 = $_POST['workshop_location_rName1'];
	$workshop_location_street1 = $_POST['workshop_location_street1'];
	$workshop_location_city1 = $_POST['workshop_location_city1'];
	$workshop_location_street2 = $_POST['workshop_location_street2'];
	$workshop_location_city2 = $_POST['workshop_location_city2'];
	$hiddenbox1 = $_POST['hiddenbox1'];
	$hiddenbox2 = $_POST['hiddenbox2'];
	$hiddenbox3 = $_POST['hiddenbox3'];
	$disclaimer1 = $_POST['disclaimer1'];
	
	
	//For workshopinar Locations on the Actual Page
	$r_name_actual = $_SESSION['r_name'];
	if($restaurant1 == "" && $r_name_actual == ""){
		 $actualRName1 = '<span id="rName1">'.$workshop_location_rName1.'</span></br>'; 
	}
	$actualRStreet1 = '<span id="street1">'.$workshop_location_street1.'</span></br>';
	$actualRCity1 = '<span id="city1">'.$workshop_location_city1.'</span>';
	
	$actualRStreet2 = '<span id="street2">'.$workshop_location_street2.'</span></br>';
	$actualRCity2 = '<span id="city2">'.$workshop_location_city2.'</span>';
	
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
	if($workshop_date1_time_change1 != ""){
		$newDate1 = '<option value="'.$workshop_date1_date_change1.'">'.$workshop_date1_date_change1.'</option>';
	}else{
		$newDate1 = "";
	}
	
	//special case if date is blank, dont create bullet for it
	if($workshop_date2_time_change1 != ""){
		$newDate2 = '<option value="'.$workshop_date2_date_change1.'">'.$workshop_date2_date_change1.'</option>';
	}else{ 
		$newDate2 = "";
	}
	
	//special case if date is blank, dont create bullet for it
	if($workshop_date3_time_change1 != ""){
		$newDate3 = '<option value="'.$workshop_date3_date_change1.'">'.$workshop_date3_date_change1.'</option>';
	}else{
		$newDate3 = "";
	}
	
	//special case if date is blank, dont create bullet for it
	// if($workshop_date4_time_change1 != ""){
		// $newDate4 = '<option value="'.$workshop_date4_time_change1.'">'.$workshop_date4_time_change1.'</option>';
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
	$_SESSION['file_identifier'] = $_SESSION['c_lp_client_name1'].'_workshopinar1'.'_'.$date.'_'.$time;
	
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
					<title>'.$_SESSION['c_lp_client_name1'].' workshopinar</title>
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
							<div id="workshopinar_number">'.$workshop_num_change1.'</div>
						</div>
					</header>
					<div id="fullbanner">
						<div id="banner">
							<div id="eventwrap">
								<div id="event">
									<h1 id="inviteName"><span id="adv_name">'.$workshop_name_change1.'</span>Invites You</h1>
									<h2>to a complimentary <span id="meal">'. $workshop_meal_change1 .'</span></h2>
								<div id="datesContainer">
									<div style="'. $date1_actual_style .'" id="date1">
										<h3 id="date_1_day">'.$workshop_date1_day_change1.'</h3>
										<p id="date_1_date">'.$workshop_date1_date_change1.'</p>
										<p id="date_1_time">'.$workshop_date1_time_change1.'</p>
									</div>
									
									<div style="'. $date2_actual_style .'" id="date2">
										<h3 id="date_2_day">'.$workshop_date2_day_change1.'</h3>
										<p id="date_2_date">'.$workshop_date2_date_change1.'</p>
										<p id="date_2_time">'.$workshop_date2_time_change1.'</p>
									</div>
			                        
			                        <div  style="'. $date3_actual_style .'"  id="date3">
										<h3 id="date_3_day">'.$workshop_date3_day_change1.'</h3>
										<p id="date_3_date">'.$workshop_date3_date_change1.'</p>
										<p id="date_3_time">'.$workshop_date3_time_change1.'</p>
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
			    			'<h1 id="bio_title">'.$workshop_bio_title_change1.'</h1>
							<p id="biography">'.$bio1.'</p>
						</div>
						
						<div class="infosection">
							<div class="border"></div>
							<h1 id="bullet_title">'.$workshop_bullet_title_change1.'</h1>
							<ul>
								<div id="bullet1">'.$workshop_bullet11.'</div>
								<div id="bullet2">'.$workshop_bullet21.'</div>
								<div id="bullet3">'.$workshop_bullet31.'</div>
								<div id="bullet4">'.$workshop_bullet41.'</div>
								<div id="bullet5">'.$workshop_bullet51.'</div>
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
				<title>'.$_SESSION['c_lp_client_name1'].' workshopinar</title>
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
						'.$workshop_num_change1.'
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
				<title>workshopinar Request</title>
				</head>
			    <h1 style='."'".'color:#253069;'."'".'>New workshopinar Reservation For '.$_SESSION['c_lp_client_name1'].'!!</h1>
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
			$subject = "New '.$_SESSION['c_lp_client_name1'].' workshopinar Lead";
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
			    <h2>Thank You For Registering For My workshopinar on: ".$date."<span style='."'".'font-size:10px;'."'".'>(save the date!)</span></h2>
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
				<title>workshopinar Request</title>
				</head>
			    <h1 style='."'".'color:#253069'."'".'>New Friend workshopinar Invite For '.$_SESSION['c_lp_client_name1'].'!!</h1>
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
				<title>workshopinar Request</title>
				</head>
			    <h1 style='."'".'color:#253069;'."'".'>Join ".$attendee_name." For A Complimentary Dinner And workshopinar!!</h1>
				</br>
			    <h2>Would You Like To Go To This workshopinar With Me?</h2>
			    <h3>Hello ".$friend_name.",  I would like you to attend a workshopinar hosted by '.$_SESSION['c_lp_client_name1'].' with me. '.$_SESSION['c_lp_client_name1'].' is a financial planner that is hosting a complimentary workshopinar where these topics will be discussed:</h3>
			    <ul>
			    '.$workshop_bullet11.'
			    '.$workshop_bullet21.'
			    '.$workshop_bullet31.'
			    '.$workshop_bullet41.'
			    '.$workshop_bullet51.'
			    </ul>
			    </br>
			    <h3>If You Would Like To Reserve Your Spot Alongside Me, Or To Learn more Information <a href='."'".''.$_SESSION['c_lp_notes1'].''."'".'>Click Here</a></h3>
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
	'../INDEX/cleanup_sites/'.$_SESSION['file_identifier'].'/'.$_SESSION['b_logo'].'',
	'../INDEX/cleanup_sites/'.$_SESSION['file_identifier'].'/'.$_SESSION['r_logo'].'',
	'../INDEX/cleanup_sites/'.$_SESSION['file_identifier'].'/'.$_SESSION['p_logo'].''
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
		<title>Edit SSWorkshop 2</title>
		<link rel="shortcut icon" href="public/site_images/plum_logo-favicon.ico" >
		<link href="public/stylesheets/plumdm_auto_editor.css" rel="stylesheet" type="text/css">
		<link id="template_style" href="public/stylesheets/style.css" rel="stylesheet" type="text/css">
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
		    
		    <hr></hr> 
		    
		    <div id="notes"><h3 class="transition bottomShadow">INSTRUCTIONS</h3></div>
		    <hr></hr>
		    <a class="md-trigger" data-modal="finalPopup" ><div class="transition1 bottomShadow" id="submitDesign">i am done!</br> submit design</div></a>
		    <hr></hr>
		    <a href="upload_ssworkshop2.php"><div class="transition1 bottomShadow" id="resetDesign">start over</div></a>
			<hr></hr>
		
		</section>


		<!--************************ Template Container Start ***************************-->
		<section class="allShadow" id="templateContainer">
		<div id="wrapper">
			
			<header>
				<h1>Discover how to <span class="maximize">maximize</span> your retirement.</h1>
				<h2 class="information">This FREE workshopinar will show you strategies for <br>maximizing your Social Security benefits - Don't Miss It!</h2>
                <div id="change_workshop_info" class="edit_icon"></div>
                <div id="datesContainer">
                        
                <?php if($_SESSION['r_name'] != NULL): ?>
                	
                    <div id="date_1">
                        <h1 id="date_1_day">Tuesday</h1>
                        <p id="date_1_datetime">Sept 21st, 12:00 PM</p>
                    </div>

                    <div id="date_or1">
                        <p>or</p>
                    </div>

                    <div id="date_2">
                        <h1 id="date_2_day">Tuesday</h1>
                        <p id="date_2_datetime">July 8th, 6:00 PM</p>
                    </div>
                    
               
                    <div id="date_or2">
                        <p>or</p>
                    </div>
                    
                    <div id="date_3">
                        <h1 id="date_3_day">Tuesday</h1>
                        <p id="date_3_datetime">Sept 21st, 12:00 PM</p>
                    </div>
              <?php endif; ?>
              
              <?php if($_SESSION['r_name'] == NULL): ?>
                	
                    <div id="date_1" style="width: 470px;">
                        <h1 id="date_1_day">Tuesday</h1>
                        <p id="date_1_datetime">Sept 21st, 12:00 PM</p>
                    </div>

                    <div id="date_or1">
                        <p>or</p>
                    </div>

                    <div id="date_2" style="width: 470px;">
                        <h1 id="date_2_day">Tuesday</h1>
                        <p id="date_2_datetime">July 8th, 6:00 PM</p>
                    </div>
              <?php endif; ?>
                </div>
                
           
           <?php if($_SESSION['r_name'] != NULL): ?>
				<div id="location">
                    <h1><?php echo $_SESSION['r_name'] ?></h1>
                    <p id="street1">35 North Jefferson Ave</p>
                    <p style="margin:0 8px; color: #92181B; font-size:20px;">|</p>
                    <p id="city1"> Canonsburg, PA 15317</p>
                </div>
           <?php endif; ?>
            
            
            <?php if($_SESSION['r_name'] == NULL): ?>    
               <div id="locationMultiple">
                	<div id="location1">
                    	<h1><?php echo $_SESSION['r_two_name1'] ?></h1>
                    	<p id="street1">35 North Jefferson Ave</p>
                    	<p id="city1">Canonsburg, PA 15317</p>
                    </div>
                    <div id="location2">
                    	<h1><?php echo $_SESSION['r_two_name2'] ?></h1>
                    	<p id="street2">35 North Jefferson Ave</p>
                    	<p id="city2">Canonsburg, PA 15317</p>
                    </div>
                </div>
           <?php endif; ?>
                
			</header>
			
			<div id="content">
				<img src="public/images/arrow.png" class="arrow" alt="sneak peek arrow" />
				<div id="player" class="full-frame" style="overflow: hidden; border:0;">
					
<iframe width="522" height="294" src="//www.youtube.com/embed/iATImwpj1BE?wmode=transparent&amp;HD=1;rel=0;showinfo=0;autoplay=0" frameborder="0"></iframe>
</div>


<div class="reformed-form">
<h3>Grab your seat!</h3>
	<div id="loading" style="margin-top:160px;">
		    <img src="public/images/loader.gif">
			Confirming Registration....
	</div>
	<form method="post" name="form-name" id="form-name" action="process.php" disabled>
		<input type="hidden" id="PIN" name="PIN"/>
		
		
			<input type="text" name="fullname" class="lettersonly" id="fullname" placeholder="Full Name" value="" required  disabled/>
			<input type="text" name="guestname" class="lettersonly" id="guestname" placeholder="Guest Name" value=""   disabled/>
			
			
			<input type="email" name="email" class="email" id="email" placeholder="Email" value="" required  disabled/>
		
			<input type="tel" name="phone" class="digits" id="phone" placeholder="Phone" value="" required  disabled/>
			
			<input type="text" name="zipcode" class="digits" id="zipcode" placeholder="Zip Code" value="" required  disabled/><br>

        Date: <select name="date" style="margin-top:15px; margin-bottom:0px" disabled>
        <option value="July 1st">July 1st</option>
        <option value="July 8th">July 8th</option>
        </select>
        
            
		
		<?php echo $errorString; ?>
				
		<div id="submit_buttons">
			<input name="submit" type="submit" class="submit-form"  disabled/>
		</div>
		</form>
        
		<div class="spacer" style="clear: both;"></div>
</div>

<div class="spacer" style="clear: both;"></div>
				
			</div>
			
			
			<div id="content2">
				
				<!--<h1 class="included">Included:</h1>-->
				
				<div id="change_workshop_box1" class="edit_icon"></div>
				<div class="box1">
					<img class="star" src="public/images/star.png" alt="Star" />
					<h4 id="box1h4">Taking your election at age 62 makes sense for your advisor, but does it really make sense for you?</h4>
				</div>
				
				<div id="change_workshop_box2" class="edit_icon"></div>
				<div class="box2">
					<img class="star" src="public/images/star.png" alt="Star" />
					<h4 id="box2h4">Don't believe the hype. Your benefits aren't going anywhere. Find out why.</h4>
				</div>
				
				<div id="change_workshop_box3" class="edit_icon"></div>
				<div class="box3">
					<img class="star" src="public/images/star.png" alt="Star" />
					<h4  id="box3h4">You could be missing out on up to 3/4 of your income by electing the wrong option.</h4>
				</div>
				<div style="clear:both;"></div>
				
				
				<div id="change_disclaimer" class="edit_icon"></div>
				<p id="disclaimerMain" class="disclaimer">*This site is not connected with, affiliated with or endorsed by the United States government or the Social Security Administration. Agent does not provide tax advice, please
consult your tax advisor or attorney.</p>
			</div>

			

			<footer>
			
			</footer>
		</div>
		</div>
		
		<!--This is instructions tooltip*-->
		<div id="instructions" style="display:none; padding:10px; width:410px;">
		    	<img src="public/site_images/directions.jpg" style="margin:auto;">
		</div>
		
		<!--This is the change workshopinar info tooltip*-->
		<div id="change_workshop_information" style="display:none; padding:10px; width:350px;">
			<form id="change_workshop_info_form" onsubmit="event.preventDefault(); change_workshop_info();">
		        <label>Workshop Date #1:</label></br>
		            <input type="text" id="workshop_date1_day_change" placeholder="Monday"required>
		            <input type="text" id="workshop_date1_datetime_change" placeholder="Jan 1st, 12:00 PM" required></br>
		         <label>Workshop Date #2<?php if(!isset($_SESSION['r_two_name2'])){ echo ' (Optional):'; } ?></label></br>
		            <input type="text" id="workshop_date2_day_change" placeholder="Tuesday"<?php if(isset($_SESSION['r_two_name2'])){ echo ' required';}  ?>>
		            <input type="text" id="workshop_date2_datetime_change" placeholder="Aug 22nd, 2:00 PM" <?php if(isset($_SESSION['r_two_name2'])){ echo ' required';}  ?>></br>
		            
		         <?php if(!isset($_SESSION['r_two_name2'])){ echo '   
		         <label>workshopinar Date #3 (Optional):</label></br>
		            <input type="text" id="workshop_date3_day_change" placeholder="Wednesday">
		            <input type="text" id="workshop_date3_datetime_change" placeholder="Dec 3rd, 10:00 AM"></br>
		            ';}?>
		            
		         <label>Workshop Location #1:</label></br>
		            <input type="text" id="1workshop_location_street" placeholder="35 North Jefferson Ave" required>
		            <input type="text" id="1workshop_location_city" placeholder="Canonsburg, PA 15317" required></br>
		            
		            
		         
		         <?php if(isset($_SESSION['r_two_name2'])){ echo '
		         <label>Workshop Location #2</label></br>
		            <input type="text" id="2workshop_location_street" placeholder="35 North Jefferson Ave"  required>
		            <input type="text" id="2workshop_location_city" placeholder="Canonsburg, PA 15317" required></br>';}?>
		    <button>Change</button>
		    </form>
		</div>
		
		<!--This is the change workshop box1*-->
		<div id="workshop_box1" style="display:none; padding:10px; width:280px;">
		        <label>Point 1:</label></br>
		            <textarea id="textareabox1" maxlength="110" style="border:1px solid lightgrey; resize:none; border-radius:9px; padding:3px; width:250px; height:170px;">Taking your election at age 62 makes sense for your advisor, but does it really make sense for you?</textarea></br>
		    <button onclick="workshop_box1()">Change</button>
		</div>
		
		<!--This is the change workshop box2*-->
		<div id="workshop_box2" style="display:none; padding:10px; width:280px;">
		        <label>Point 2:</label></br>
		            <textarea id="textareabox2" maxlength="110" style="border:1px solid lightgrey; resize:none; border-radius:9px; padding:3px; width:250px; height:170px;">Don't believe the hype. Your benefits aren't going anywhere. Find out why.</textarea></br>
		    <button onclick="workshop_box2()">Change</button>
		</div>
		
		<!--This is the change workshop box3*-->
		<div id="workshop_box3" style="display:none; padding:10px; width:280px;">
		        <label>Point 3:</label></br>
		            <textarea id="textareabox3" maxlength="110" style="border:1px solid lightgrey; resize:none; border-radius:9px; padding:3px; width:250px; height:170px;">You could be missing out on up to 3/4 of your income by electing the wrong option.</textarea></br>
		    <button onclick="workshop_box3()">Change</button>
		</div>
		
		
		<!--This is the change workshop box3*-->
		<div id="disclaimerTooltip" style="display:none; padding:10px; width:280px;">
		        <label>Disclaimer:(OPTIONAL)</label></br>
		            <textarea id="disclaimer" style="border:1px solid lightgrey; resize:none; border-radius:9px; padding:3px; width:250px; height:170px;">*This site is not connected with, affiliated with or endorsed by the United States government or the Social Security Administration. Agent does not provide tax advice, please consult your tax advisor or attorney.</textarea></br>
		    <button onclick="disclaimer()">Change</button>
		</div>
		        
		</section><!--***********END OF TMEPLATE CONTAINER***********-->


            									<!--********** BEGIN Popup Block********** -->
		<div class="md-modal md-effect-1" id="finalPopup">
			<div id="finalPopupContent">
           			<h2>Fill In Your Personal Informantion</h2>
                    <form class="upperShadow" id="finishDesign" method="post" action="edit_ssworkshop2.php"  onsubmit="return loader();">
					    <input type="hidden" id="workshop_date1_day_change1" name="workshop_date1_day_change1" >
					    <input type="hidden" id="workshop_date1_datetime_change1" name="workshop_date1_datetime_change1" >
					    <input type="hidden" id="workshop_date2_day_change1" name="workshop_date2_day_change1" >
					    <input type="hidden" id="workshop_date2_datetime_change1" name="workshop_date2_datetime_change1" >
					    <input type="hidden" id="workshop_date3_day_change1" name="workshop_date3_day_change1" >
					    <input type="hidden" id="workshop_date3_datetime_change1" name="workshop_date3_datetime_change1" >
					    <input type="hidden" id="original_date1" name="original_date1" >
					    <input type="hidden" id="original_date2" name="original_date2" >
					    <input type="hidden" id="original_date3" name="original_date3" >
					    <input type="hidden" id="workshop_location_street1" name="workshop_location_street1" >
					    <input type="hidden" id="workshop_location_city1" name="workshop_location_city1" >	
					    <input type="hidden" id="workshop_location_street2" name="workshop_location_street2" >
					    <input type="hidden" id="workshop_location_city2" name="workshop_location_city2" >
					    <textarea style="visibility: hidden; float: left; " id="hiddenbox1" name="hiddenbox1" >Taking your election at age 62 makes sense for your advisor, but does it really make sense for you?</textarea>
					    <textarea style="visibility: hidden; position: absolute; " id="hiddenbox2" name="hiddenbox2" >Don't believe the hype. Your benefits aren't going anywhere. Find out why.</textarea>
					    <textarea style="visibility: hidden; position: absolute; " id="hiddenbox3" name="hiddenbox3" >You could be missing out on up to 3/4 of your income by electing the wrong option.</textarea>
					    <textarea style="visibility: hidden; position: absolute; " id="disclaimer1" name="disclaimer1" >*This site is not connected with, affiliated with or endorsed by the United States government or the Social Security Administration. Agent does not provide tax advice, please consult your tax advisor or attorney.</textarea>
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
						<input type="radio" name="c_lp_website_url1" checked value="default" id="radio_default"><div id="default_url">www.plumdm.com/Lastnameworkshopinar (FREE)</div>
						</div>
					    
					    <div id="customRadioContainer">
						<input type="radio" name="c_lp_website_url1" value="custom" id="radio_custom"><div id="custom_url">www.Lastnameworkshopinar.com ($50 FEE)</div>
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


	function workshop_box1(){
		var text = document.getElementById("textareabox1").value;
		text = text.replace(/\r\n/g, '<br />').replace(/[\r\n]/g, '<br />');
		document.getElementById("box1h4").innerHTML = text;
		document.getElementById("hiddenbox1").value = text;		
	}
	
	function workshop_box2(){
		var text1 = document.getElementById("textareabox2").value;
		text1 = text1.replace(/\r\n/g, '<br />').replace(/[\r\n]/g, '<br />');
		document.getElementById("box2h4").innerHTML = text1;
		document.getElementById("hiddenbox2").value = text1;			
	}
	
	function workshop_box3(){
		var text2 = document.getElementById("textareabox3").value;
		text2 = text2.replace(/\r\n/g, '<br />').replace(/[\r\n]/g, '<br />');
		document.getElementById("box3h4").innerHTML = text2;
		document.getElementById("hiddenbox3").value = text2;			
	}
	
	function disclaimer(){
		var text3 = document.getElementById("disclaimer").value;
		text3 = text3.replace(/\r\n/g, '<br />').replace(/[\r\n]/g, '<br />');
		document.getElementById("disclaimerMain").innerHTML = text3;
		document.getElementById("disclaimer1").value = text3;			
	}
	
	function change_workshop_info(){
		
		console.log("hi");
		
		document.getElementById("date_1_day").innerHTML = document.getElementById("workshop_date1_day_change").value;;
		document.getElementById("workshop_date1_day_change1").value = document.getElementById("workshop_date1_day_change").value;
		document.getElementById("date_1_datetime").innerHTML = document.getElementById("workshop_date1_datetime_change").value;
		document.getElementById("workshop_date1_datetime_change1").value = document.getElementById("workshop_date1_datetime_change").value;
		
		document.getElementById("date_2_day").innerHTML = document.getElementById("workshop_date2_day_change").value;
		document.getElementById("workshop_date2_day_change1").value = document.getElementById("workshop_date2_day_change").value;
		document.getElementById("date_2_datetime").innerHTML = document.getElementById("workshop_date2_datetime_change").value;
		document.getElementById("workshop_date2_datetime_change1").value = document.getElementById("workshop_date2_datetime_change").value;
		
		
		<?php if($_SESSION['r_two_name1'] == NULL){
			 echo '
		document.getElementById("date_3_day").innerHTML = document.getElementById("workshop_date3_day_change").value;
		document.getElementById("workshop_date3_day_change1").value = document.getElementById("workshop_date3_day_change").value;
		document.getElementById("date_3_datetime").innerHTML = document.getElementById("workshop_date3_datetime_change").value;
		document.getElementById("workshop_date3_datetime_change1").value = document.getElementById("workshop_date3_datetime_change").value;';
		} ?>
		
		
		document.getElementById("street1").innerHTML = document.getElementById("1workshop_location_street").value;
		document.getElementById("workshop_location_street1").value = document.getElementById("1workshop_location_street").value;
		document.getElementById("city1").innerHTML = document.getElementById("1workshop_location_city").value;
		document.getElementById("workshop_location_city1").value = document.getElementById("1workshop_location_city").value;
		
		
		<?php if($_SESSION['r_two_name1'] != NULL){
			 echo '
		document.getElementById("street2").innerHTML = document.getElementById("2workshop_location_street").value;
		document.getElementById("workshop_location_street2").value = document.getElementById("2workshop_location_street").value;
		document.getElementById("city2").innerHTML = document.getElementById("2workshop_location_city").value;
		document.getElementById("workshop_location_city2").value = document.getElementById("2workshop_location_city").value;';
		} ?>
		
		
			if((document.getElementById("workshop_date1_day_change").value == "")){
				document.getElementById("date_1").style.display = "none";
				document.getElementById("original_date1").value = 0 ;
			}else{
				document.getElementById("date_1").style.display = "inline-block";
				document.getElementById("original_date1").value = 1 ;
			}
			
			if((document.getElementById("workshop_date2_day_change").value == "")){
				document.getElementById("original_date2").value = 0 ;
				document.getElementById("date_2").style.display = "none";
				document.getElementById("date_or1").style.display = "none";
			}else{
				document.getElementById("date_2").style.display = "inline-block";
				document.getElementById("date_or1").style.display = "inline-block";	
				document.getElementById("original_date2").value = 1 ;
			}


			if((document.getElementById("workshop_date3_day_change").value == "")){
				document.getElementById("original_date3").value = 0 ;
				document.getElementById("date_3").style.display = "none";
				document.getElementById("date_or2").style.display = "none";	
				document.getElementById("date_1").style.width = "470px";
				document.getElementById("date_2").style.width = "470px";
			}else{
				document.getElementById("original_date3").value = 1 ;
				document.getElementById("date_3").style.display = "inline-block";
				document.getElementById("date_or2").style.display = "inline-block";
				document.getElementById("date_1").style.width = "290px";
				document.getElementById("date_2").style.width = "290px";	
			}


			
		   if((document.getElementById("2workshop_location_street").value == "")){
		   		document.getElementById("locationMultiple").style.display = "none";
		   		document.getElementById("location").style.display = "none";
		   }else{
		   		document.getElementById("locationMultiple").style.display = "inline-block";
		   		document.getElementById("location").style.display = "inline-block";
		   }
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

	
	$('#change_workshop_info').qtip({ // Grab some elements to apply the tooltip to
		style: { 
			classes: 'qtip-bootstrap qtip-shadow'
		},
		content: {
			text: $('#change_workshop_information'),
			title: 'Change workshop Information',
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
		 	container: $('#header') ,
			adjust: {
				y:25,
				x:30,
				scroll: false // Can be ommited (e.g. default behaviour)
			},
			my: 'left center',  // Position my top left...
			at: 'bottom center', // at the bottom right of...
			target: $('header h2') // my target
		}
	})
	
	$('#change_workshop_box1').qtip({ // Grab some elements to apply the tooltip to
		style: { 
			classes: 'qtip-bootstrap qtip-shadow'
		},
		content: {
			text: $('#workshop_box1'),
			title: 'Change workshop Point 1',
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
		 	container: $('body') ,
			adjust: {
				y:155,
				x:247,
				scroll: false // Can be ommited (e.g. default behaviour)
			}, 
			my: 'left center',  // Position my top left...
			at: 'top left', // at the bottom right of...
			target: $('.box1') // my target
		}
	})
	
	$('#change_workshop_box2').qtip({ // Grab some elements to apply the tooltip to
		style: { 
			classes: 'qtip-bootstrap qtip-shadow'
		},
		content: {
			text: $('#workshop_box2'),
			title: 'Change workshop Point 2',
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
		 	container: $('body') ,
			adjust: {
				y:155,
				x:10,
				scroll: false // Can be ommited (e.g. default behaviour)
			},
			my: 'right center',  // Position my top left...
			at: 'top left', // at the bottom right of...
			target: $('.box2') // my target
		}
	})
	
	$('#change_workshop_box3').qtip({ // Grab some elements to apply the tooltip to
		style: { 
			classes: 'qtip-bootstrap qtip-shadow'
		},
		content: {
			text: $('#workshop_box3'),
			title: 'Change workshop Point 3',
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
		 	container: $('body') ,
			adjust: {
				y:155,
				x:10,
				scroll: false // Can be ommited (e.g. default behaviour)
			},
			my: 'right center',  // Position my top left...
			at: 'top left', // at the bottom right of...
			target: $('.box3') // my target
		}
	})
	
	$('#change_disclaimer').qtip({ // Grab some elements to apply the tooltip to
		style: { 
			classes: 'qtip-bootstrap qtip-shadow'
		},
		content: {
			text: $('#disclaimerTooltip'),
			title: 'Change Disclaimer(OPTIONAL)',
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
		 	container: $('body') ,
			adjust: {
				y:-10,
				x:-300,
				scroll: false // Can be ommited (e.g. default behaviour)
			},
			my: 'left bottom',  // Position my top left...
			at: 'top center', // at the bottom right of...
			target: $('.disclaimer') // my target
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
  			var input = $('#