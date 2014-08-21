
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
			<body style='max-width:100%;'>
				<head>
				<title>Seminar Request</title>
				</head>
			    <h1 style='color:#253069'>New Friend Seminar Invite For Melissa Brooks!!</h1>
			    </br>
			    <h2>Attendee Name: ".$attendee_name."</h2>
			    <h2>Friend Name: ".$friend_name."</h2>
			    <h2>Friend Email: ".$friend_email."</h2>
			    <h2>Friend Phone: ".$friend_phone."</h2>
			</body>
			</html>";
			
			//***(INSERT AGENT EMAIL)(REMOVE FRIEND EMAIL DEMO PURPOSE ONLY)
			$recipient = "<landings@plumdm.com> , <melissa@plumdm.com> , carissa@plumdm.com";
			//***(INSERT AGENT NAME)
			$subject = "Melissa Brooks Friend Invite Sent";
			$headers  = "From: Plum DM <landings@plumdm.com>\r\n"; 
			$headers .= "Content-type: text/html\r\n";
			mail($recipient, $subject, $formcontent, $headers) or die("Error!");
			
			////////////email 2: To Friend/////////////////////
			//***(INSERT AGENT NAME, AND LINKS)
			$formcontent1 = "
			<html>
			<body style='max-width:100%;'>
				<head>
				<title>Seminar Request</title>
				</head>
			    <h1 style='color:#253069;'>Join ".$attendee_name." For A Complimentary Dinner And Seminar!!</h1>
				</br>
			    <h2>Would You Like To Go To This Seminar With Me?</h2>
			    <h3>Hello ".$friend_name.",  I would like you to attend a seminar hosted by Melissa Brooks with me. Melissa Brooks is a financial planner that is hosting a complimentary seminar where these topics will be discussed:</h3>
			    <ul>
			    <li>Peter LePage Retirement Planning is dedicated to educating and equipping older New Englanders in the protection of their investments and savings from losses due to volatile markets, taxation, probate court, or an extended illness</li>
			    <li>Peter LePage Retirement Planning is dedicated to educating and equipping older New Englanders in the protection of their investments and savings from losses due to volatile markets, taxation, probate court, or an extended illness</li>
			    <li>Peter LePage Retirement Planning is dedicated to educating and equipping older New Englanders in the protection of their investments and savings from losses due to volatile markets, taxation, probate court, or an extended illness</li>
			    <li>Peter LePage Retirement Planning is dedicated to educating and equipping older New Englanders in the protection of their investments and savings from losses due to volatile markets, taxation, probate court, or an extended illness</li>
			    <li>Peter LePage Retirement Planning is dedicated to educating and equipping older New Englanders in the protection of their investments and savings from losses due to volatile markets, taxation, probate court, or an extended illness</li>
			    </ul>
			    </br>
			    <h3>If You Would Like To Reserve Your Spot Alongside Me, Or To Learn more Information <a href='www.plumdm.com/brooksseminar'>Click Here</a></h3>
			    <h3>Or Visit: www.plumdm.com/brooksseminar</h3>
			    </br>
			    <h3>I hope To See You There!</h3>
			    <h3>".$attendee_name."</h3>
			</body>
			</html>";
			$recipient1 = $friend_email;
			$subject1 = $friend_name.", ".$attendee_name." Would Like You To Join Us!";
			//***(INSERT AGENT NAME)
			$headers1  = "From: Melissa Brooks\r\n"; 
			$headers1 .= "Content-type: text/html\r\n";
			mail($recipient1, $subject1, $formcontent1, $headers1) or die("Error!");
			
			echo "Invite Successfully Sent!"
			
			?>