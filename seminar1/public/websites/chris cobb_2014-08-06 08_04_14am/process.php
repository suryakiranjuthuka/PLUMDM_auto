
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
	$errorString = '<div class="error2"><h1>There was an error with the form.</h1><br />';
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
<body style='max-width:100%;'>
	<head>
	<title>Seminar Request</title>
	</head>
    <h1 style='color:#253069;'>New Seminar Reservation For chris cobb!!</h1>
    </br>
    <h2>Name: ".$fullname."</h2>
    <h2>Email: ".$email."</h2>
    <h2>Phone: ".$phone."</h2>
    <h2>Guest: ".$guestname."</h2>
    <h2>Day: ".$date."</h2>
</body>
</html>";
//recipients ****(INSERT AGENT EMAIL)(REMOVE FROM EMAIL FOR DEMO PURPOSE ONLY)
$recipient = "<landings@plumdm.com> , <cobb.sdfasdfsadf>";
//subject ****(INSERT AGENT NAME)
$subject = "New chris cobb Seminar Lead";
//who email is from
$headers  = "From: Plum DM <landings@plumdm.com>\r\n"; 
$headers .= "Content-type: text/html\r\n";
//mail it
mail($recipient, $subject, $formcontent, $headers) or die("Error!");


/////////////////////////////////////////////////Email 2: To Lead//////////////////////////////

//html email contnet ***(INSERT AGENT NAME)
$formcontent1 = "
<html>
<body style='max-width:100%;'>
	<head>
	<title>Thank You For Enrolling</title>
	</head>
	<h1 style='color:#253069;'>See You Soon!</h1>
	</br>
    <h2>Hello ".$fullname.",</h2>
    </br>
    <h2>Thank You For Registering For My Seminar on: ".$date."<span style='font-size:10px;'>(save the date!)</span></h2>
    </br>
    <h2>I look Forward To Meeting You!</h2>
    <h2>chris cobb</h2>
</body>
</html>";
//recipients
$recipient1 = $email;
//subject
$subject1 = "Thank You!";
//whos it from ***(INSERT AGENT NAME)
$headers1  = "From: chris cobb\r\n"; 
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

?>