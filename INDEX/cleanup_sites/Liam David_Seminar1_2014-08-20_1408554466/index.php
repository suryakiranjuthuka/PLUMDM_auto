
			<!DOCTYPE html>
			<html>
				<head>
					<title>Liam David Seminar</title>
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
							<div id="seminar_number">508-999-8585</div>
						</div>
					</header>
					<div id="fullbanner">
						<div id="banner">
							<div id="eventwrap">
								<div id="event">
									<h1 id="inviteName"><span id="adv_name">Liam David2 </span>Invites You</h1>
									<h2>to a complimentary <span id="meal">event</span></h2>
								<div id="datesContainer">
									<div style="display:inline-block;" id="date1">
										<h3 id="date_1_day">Monday</h3>
										<p id="date_1_date">August 17th</p>
										<p id="date_1_time">3:45PM</p>
									</div>
									
									<div style="display:inline-block;" id="date2">
										<h3 id="date_2_day">Saturday</h3>
										<p id="date_2_date">February 14th</p>
										<p id="date_2_time">1:00PM</p>
									</div>
			                        
			                        <div  style="display:inline-block;"  id="date3">
										<h3 id="date_3_day">Thursday</h3>
										<p id="date_3_date"> January 18th</p>
										<p id="date_3_time">9:00AM</p>
									</div>
								</div>
			                        
									<div id="restaurant_text"><h1>Jenny's Bistro</h1></div>
									
									<div id="restaurantNameContainer">
									
									
									</div>
									
									<div id="restaurant">
									<div id="restaurant1">
			                        	<h3>
			                        		<span id="street1">6587 Roger William Memorial Parkway</span></br>
			                        		<span id="city1">Austin, TX 78744</span>
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
			                        	<option value="August 17th">August 17th</option><option value="February 14th">February 14th</option><option value=" January 18th"> January 18th</option>
									</select></p>
									<button type="submit" name="submit" id="submit" />REGISTER</button>
								</form>
							</div>
						</div>
					</div>
					<div id="contentwrapper">
						<div class="infosectionlarge"><h1 id="bio_title">Liam David</h1>
							<p id="biography">Lorem ipsum dolor sit amet, elitr voluptatibus vim no, an dicit senserit consequuntur cum, nibh iudico oblique cu vix. Id dolorem reprimique per, maiorum molestie suscipiantur et duo. Mea no dicat impetus. Sea velit facilisis et, ludus legere nec ad. Autem maiorum sed eu, id cibo vocibus sit, eam an aperiri denique.<br />Sea velit facilisis et, ludus legere nec ad. Autem maiorum sed eu, id cibo vocibus sit, eam an aperiri denique.<br /></p>
						</div>
						
						<div class="infosection">
							<div class="border"></div>
							<h1 id="bullet_title">This is it</h1>
							<ul>
								<div id="bullet1"><li>Lorem ipsum dolor sit amet, elitr voluptatibus vim no, an dicit senserit </li></div>
								<div id="bullet2"><li>Lorem ipsum dolor sit amet, elitr voluptatibus vim no, an dicit senserit </li></div>
								<div id="bullet3"><li>Lorem ipsum dolor sit amet, elitr voluptatibus vim no, an dicit senserit </li></div>
								<div id="bullet4"><li>Lorem ipsum dolor sit amet, elitr voluptatibus vim no, an dicit senserit </li></div>
								<div id="bullet5"><li>Lorem ipsum dolor sit amet, elitr voluptatibus vim no, an dicit senserit </li></div>
							</ul>
						</div>
					</div>
					<footer>
						<span id="footertext">Copyright 2014 Plum Direct Marketing</span>
					</footer>
			
						</body>
				    </html>