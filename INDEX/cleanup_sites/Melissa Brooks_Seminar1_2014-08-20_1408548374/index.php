
			<!DOCTYPE html>
			<html>
				<head>
					<title>Melissa Brooks Seminar</title>
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
							<div id="logo_container"><img height="100" src="public/site_images/b2014-08-20_1408548186logo.png" id="logo"></div>
						
			            <div id="regphone" style="width:500px; position:relative;">
			                	Event Registration:
							<div id="seminar_number">800-555-5555</div>
						</div>
					</header>
					<div id="fullbanner">
						<div id="banner">
							<div id="eventwrap">
								<div id="event">
									<h1 id="inviteName"><span id="adv_name">Melissa Brooks </span>Invites You</h1>
									<h2>to a complimentary <span id="meal">dinner</span></h2>
								<div id="datesContainer">
									<div style="display:inline-block;" id="date1">
										<h3 id="date_1_day">Saturday</h3>
										<p id="date_1_date">December 31st</p>
										<p id="date_1_time">12:00 NOON</p>
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
			                        
									<div id="restLogoContainer"><img class="restlogo" height="70" src="public/site_images/r2014-08-20_1408548186AbuelosColorLogo.jpg"></div>
									
									<div id="restaurantNameContainer">
									
									
									</div>
									
									<div id="restaurant">
									<div id="restaurant1">
			                        	<h3><span id="rName1"></span></br>
			                        		<span id="street1">6478 West State Street</span></br>
			                        		<span id="city1">Austin, Texas 78602</span>
										</h3>
									</div>
									
									<div id="restaurant2" style="display:none;">
			                        	<h3><span id="rName1">Restaurant Name #2</span></br>
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
			                        	<option value="December 31st">December 31st</option>
									</select></p>
									<button type="submit" name="submit" id="submit" />REGISTER</button>
								</form>
							</div>
						</div>
					</div>
					<div id="contentwrapper">
						<div class="infosectionlarge"><img id="agent" width="200" src="public/site_images/p2014-08-20_1408548186cedernew.jpg"><h1 id="bio_title">Melissa Brooks</h1>
							<p id="biography">Peter LePage Retirement Planning is dedicated to educating and equipping older New Englanders in the protection of their investments and savings from losses due to volatile markets, taxation, probate court, or an extended illness. In implementing each of these strategies, we place the highest importance on personal and business ethics, scrupulous professionalism, vigilant confidentiality, and the extension of public knowledge on current issues affecting retirees and their heirs.<br />Peter LePage Retirement Planning is dedicated to educating and equipping older New Englanders in the protection of their investments and savings from losses due to volatile markets, taxation, probate court, or an extended illness. In implementing each of these strategies, we place the highest importance on personal and business ethics, scrupulous professionalism, vigilant confidentiality, and the extension of public knowledge on current issues affecting retirees and their heirs.</p>
						</div>
						
						<div class="infosection">
							<div class="border"></div>
							<h1 id="bullet_title">We will cover these topics and many more:</h1>
							<ul>
								<div id="bullet1"><li>Peter LePage Retirement Planning is dedicated to educating and equipping older New Englanders in the protection of their investments and savings from losses due to volatile markets, taxation, probate court, or an extended illness</li></div>
								<div id="bullet2"><li>Peter LePage Retirement Planning is dedicated to educating and equipping older New Englanders in the protection of their investments and savings from losses due to volatile markets, taxation, probate court, or an extended illness</li></div>
								<div id="bullet3"><li>Peter LePage Retirement Planning is dedicated to educating and equipping older New Englanders in the protection of their investments and savings from losses due to volatile markets, taxation, probate court, or an extended illness</li></div>
								<div id="bullet4"><li>Peter LePage Retirement Planning is dedicated to educating and equipping older New Englanders in the protection of their investments and savings from losses due to volatile markets, taxation, probate court, or an extended illness</li></div>
								<div id="bullet5"><li>Peter LePage Retirement Planning is dedicated to educating and equipping older New Englanders in the protection of their investments and savings from losses due to volatile markets, taxation, probate court, or an extended illness</li></div>
							</ul>
						</div>
					</div>
					<footer>
						<span id="footertext">Copyright 2014 Plum Direct Marketing</span>
					</footer>
			
						</body>
				    </html>