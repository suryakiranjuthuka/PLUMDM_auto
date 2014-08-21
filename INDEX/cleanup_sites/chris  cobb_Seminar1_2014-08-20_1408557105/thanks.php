
		<?php
			$attendee_name = $_GET["attendee"];
		?>
		<!DOCTYPE html>
		<html>
			<head>
				<title>chris  cobb Seminar</title>
				<link href="public/stylesheets/plumdm_auto_editor.css" rel="stylesheet" type="text/css">
				<link href="public/stylesheets/seminar1_original.css" rel="stylesheet" type="text/css">
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
					
					<div id="logo_container"><h1></h1></div>
				
					<div id="regphone">
						Event Registration: 
						
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
		</html>