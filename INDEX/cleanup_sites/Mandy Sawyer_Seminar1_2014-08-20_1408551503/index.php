
			<!DOCTYPE html>
			<html>
				<head>
					<title>Mandy Sawyer Seminar</title>
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
							<div id="logo_container"><h1>The Greatest Financial Planner</h1></div>
						
			            <div id="regphone" style="width:500px; position:relative;">
			                	Event Registration:
							<div id="seminar_number">1-800-888-9999</div>
						</div>
					</header>
					<div id="fullbanner">
						<div id="banner">
							<div id="eventwrap">
								<div id="event">
									<h1 id="inviteName"><span id="adv_name">Mandy Sawyer </span>Invites You</h1>
									<h2>to a complimentary <span id="meal">lunch</span></h2>
								<div id="datesContainer">
									<div style="padding: 0px 50px;" id="date1">
										<h3 id="date_1_day">Saturday</h3>
										<p id="date_1_date">September 22nd</p>
										<p id="date_1_time">11:00 AM</p>
									</div>
									
									<div style="padding: 0px 50px;" id="date2">
										<h3 id="date_2_day">Thursday</h3>
										<p id="date_2_date">November 30th</p>
										<p id="date_2_time">6:30PM</p>
									</div>
			                        
			                        <div  style="display:none;"  id="date3">
										<h3 id="date_3_day"></h3>
										<p id="date_3_date"></p>
										<p id="date_3_time"></p>
									</div>
								</div>
			                        
									
									
									<div id="restaurantNameContainer">
									<div id="restaurant_two_text1"><h1>Outback Steak House</h1></div>
									<div id="restaurant_two_text2"><h1>The Oyster Bar and Drink House</h1></div>
									</div>
									
									<div id="restaurant">
									<div id="restaurant1">
			                        	<h3>
			                        		<span id="street1">3425 Northwest Parkway</span></br>
			                        		<span id="city1">Albany, NY 02856</span>
										</h3>
									</div>
									
									<div id="restaurant2" style="">
			                        	<h3>
			                        		<span id="street2">9857 Roger Williams Dr.</span></br>
			                        		<span id="city2">Pawtucket, RI 02587</span>
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
			                        	<option value="September 22nd">September 22nd</option><option value="November 30th">November 30th</option>
									</select></p>
									<button type="submit" name="submit" id="submit" />REGISTER</button>
								</form>
							</div>
						</div>
					</div>
					<div id="contentwrapper">
						<div class="infosectionlarge"><h1 id="bio_title">Mandy Sawyer</h1>
							<p id="biography">Lorem ipsum dolor sit amet, elitr voluptatibus vim no, an dicit senserit consequuntur cum, nibh iudico oblique cu vix. Id dolorem reprimique per, maiorum molestie suscipiantur et duo. Mea no dicat impetus. Sea velit facilisis et, ludus legere nec ad. Autem maiorum sed eu, id cibo vocibus sit, eam an aperiri denique.<br />Sea velit facilisis et, ludus legere nec ad. Autem maiorum sed eu, id cibo vocibus sit, eam an aperiri denique.</p>
						</div>
						
						<div class="infosection">
							<div class="border"></div>
							<h1 id="bullet_title">Let's talk about</h1>
							<ul>
								<div id="bullet1"><li>Lorem ipsum dolor sit amet</li></div>
								<div id="bullet2"><li>Lorem ipsum dolor sit amet, elitr volup</li></div>
								<div id="bullet3"><li>Lorem ipsum dolor sit amet, elitr voluptatibus vim no, an dicit senserit consequuntur cum, nibh iudico oblique cu vix. Id dolorem reprimique per, maiorum molestie suscipiantur et duo. Mea no dicat impetus. Sea velit facilisis et, ludus legere nec ad. Autem maiorum sed eu, id cibo vocibus sit, eam an aperiri denique. Sea velit facilisis et, ludus legere nec ad. Autem maiorum sed eu, id cibo vocibus sit, eam an aperiri denique.</li></div>
								<div id="bullet4"><li>Lorem ipsum dolor sit amet, elitr voluptatibus vim no, an dicit senserit consequuntur cum, nibh iudico oblique cu vix. Id dolorem reprimique per, maiorum molestie suscipiantur et duo. Mea no dicat impetus. Sea velit facilisis et, ludus legere nec ad. Autem maiorum sed eu, id cibo vocibus sit, eam an aperiri denique. Sea velit facilisis et, ludus legere nec ad. Autem maiorum sed eu, id cibo vocibus sit, eam an aperiri denique.</li></div>
								<div id="bullet5"><li>Lorem ipsum dolor sit amet, elitr voluptatibus vim no, an dicit senserit consequuntur cum, nibh iudico oblique cu vix. Id dolorem reprimique per, maiorum molestie suscipiantur et duo. Mea no dicat impetus. Sea velit facilisis et, ludus legere nec ad. Autem maiorum sed eu, id cibo vocibus sit, eam an aperiri denique. Sea velit facilisis et, ludus legere nec ad. Autem maiorum sed eu, id cibo vocibus sit, eam an aperiri denique.</li></div>
							</ul>
						</div>
					</div>
					<footer>
						<span id="footertext">Copyright 2014 Plum Direct Marketing</span>
					</footer>
			
						</body>
				    </html>