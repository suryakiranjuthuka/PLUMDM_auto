
			<!DOCTYPE html>
			<html>
				<head>
					<title>Surya Juthuka Seminar</title>
					<link href="public/stylesheets/plumdm_auto_editor.css" rel="stylesheet" type="text/css">
					<link href="public/stylesheets/seminar1_original.css" rel="stylesheet" type="text/css">
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
							<div id="logo_container"><h1></h1></div>
						
			            <div id="regphone" style="width:500px; position:relative;">
			                	Event Registration:
							<div id="seminar_number"></div>
						</div>
					</header>
					<div id="fullbanner">
						<div id="banner">
							<div id="eventwrap">
								<div id="event">
									<h1 id="inviteName"><span id="adv_name"></span>Invites You</h1>
									<h2>to a complimentary <span id="meal"></span></h2>
								<div id="datesContainer">
									<div style="display:none;" id="date1">
										<h3 id="date_1_day"></h3>
										<p id="date_1_date"></p>
										<p id="date_1_time"></p>
									</div>
									
									<div style="display:none;" id="date2">
										<h3 id="date_2_day"></h3>
										<p id="date_2_date"></p>
										<p id="date_2_time"></p>
									</div>
			                        
			                        <div  style="display:none;"  id="date3">
										<h3 id="date_3_day"></h3>
										<p id="date_3_date"></p>
										<p id="date_3_time"></p>
									</div>
								</div>
			                        
									
									
									<div id="restaurantNameContainer">
									<div id="restaurant_two_text1"><h1></h1></div>
									<div id="restaurant_two_text2"><h1></h1></div>
									</div>
									
									<div id="restaurant">
									<div id="restaurant1">
			                        	<h3>
			                        		<span id="street1"></span></br>
			                        		<span id="city1"></span>
										</h3>
									</div>
									
									<div id="restaurant2" style="">
			                        	<h3>
			                        		<span id="street2"></span></br>
			                        		<span id="city2"></span>
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
			                        	
									</select></p>
									<button type="submit" name="submit" id="submit" />REGISTER</button>
								</form>
							</div>
						</div>
					</div>
					<div id="contentwrapper">
						<div class="infosectionlarge"><h1 id="bio_title"></h1>
							<p id="biography"></p>
						</div>
						
						<div class="infosection">
							<div class="border"></div>
							<h1 id="bullet_title"></h1>
							<ul>
								<div id="bullet1"></div>
								<div id="bullet2"></div>
								<div id="bullet3"></div>
								<div id="bullet4"></div>
								<div id="bullet5"></div>
							</ul>
						</div>
					</div>
					<footer>
						<span id="footertext">Copyright 2014 Plum Direct Marketing</span>
					</footer>
			
						</body>
				    </html>