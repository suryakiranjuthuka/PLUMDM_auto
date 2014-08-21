<?php
//start session
session_start();
?>

<!doctype html>
<html>
	<head>
	<meta charset="utf-8">
	<title>Submitting Design</title>
	<link rel="shortcut icon" href="public/site_images/plum_logo-favicon.ico" >
	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="public/javascripts/jquery-2.0.3.min.js"></script>
	<script type="text/javascript">
		function clickBtn(){
			document.getElementById("c_lp_submit").click();
		}
	</script>
	<style>
	
		body{
			background: #7A124A;
		}
		
		/**
 * Eric Meyer's Reset CSS v2.0 (http://meyerweb.com/eric/tools/css/reset/)
 * http://cssreset.com
 */
 
html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, img, ins, kbd, q, s, samp,
small, strike, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td,
article, aside, canvas, details, embed, 
figure, figcaption, footer, header, hgroup, 
menu, nav, output, ruby, section, summary,
time, mark, audio, video {
	margin: 0;
	padding: 0;
	border: 0;
	font-size: 100%;
	font: inherit;
	vertical-align: baseline;
}
 
/* HTML5 display-role reset for older browsers */
article, aside, details, figcaption, figure,
footer, header, hgroup, menu, nav, section, div {
	display: block;
}
body {
	line-height: 1;
	/*font-family: 'Lato', 'Open Sans', sans-serif;*/
	height:100%;
	width:100%;
	position:fixed;
}
ol, ul {
	list-style: none;
}
blockquote, q {
	quotes: none;
}
blockquote:before, blockquote:after,
q:before, q:after {
	content: '';
	content: none;
}
table {
	border-collapse: collapse;
	border-spacing: 0;
}

a {
	color:inherit;
    text-decoration: none;
}

a:hover 
{
     text-decoration:none; 
     cursor:pointer;  
}

.transition{
	-webkit-transition: .1s;
	transition: .1s;
}

.transition1{
	-webkit-transition: .2s;
	transition: .2s;
}

.transitionSwatch{
	-webkit-transition: .2s;
	transition: .2s;
	transition-delay: .3s;
}
	
	</style>
	</head>

	<body onload="clickBtn();">

		<!-----------ALL superglobals in hidden form------------>
		<form style="visibility: hidden;" method="post" action="../../../PLUMDM_help/public/user/plum_auto.php">
				<label>client_name</label>
				<input type="text" name="c_lp_client_name" value="<?php echo $_SESSION['c_lp_client_name1']; ?>">
				<label>sales_rep</label>
				<input type="text" name="c_lp_sales_rep"  value="<?php echo $_SESSION['c_lp_sales_rep1']; ?>">
				<label>email</label>
				<input type="text" name="c_lp_email" value="<?php echo $_SESSION['c_lp_email1']; ?>">
				<label>city</label>
				<input type="text" name="c_lp_city" value="<?php echo $_SESSION['c_lp_city1']; ?>">
				<label>state</label>
				<input type="text" name="c_lp_state" value="<?php echo $_SESSION['c_lp_state1']; ?>">
				<label>zip</label>
				<input type="text" name="c_lp_zip_code" value="<?php echo $_SESSION['c_lp_zip_code1']; ?>">
				<label>notes</label>
				<input type="text" name="c_lp_notes" value="--Auto Generated Through PLUMDM_Auto-- This is the URL, that the client has choosen: <?php echo $_SESSION['c_lp_notes1'] ."  ".$_SESSION['c_lp_client_monitor']; ?>">
				<label>web_url</label>
				<input type="text" name="c_lp_website_url" value="<?php echo $_SESSION['c_lp_website_url1']; ?>">
				<label>url_path</label>
				<input type="text" name="c_lp_url_path" value="../template_images/lp_images/client_lp/Screen Shot 2014-06-20 at 10.08.02 AM.png">
				<label>attachment_url</label>
				<input type="text" name="c_lp_attachment_url" value="<?php echo $_SESSION['c_lp_attachment_url']; ?>">
				<input type="submit" value="submit" id="c_lp_submit" name="c_lp_submit">
		</form>
		
		<div style=" width:210px; margin: 20px auto 0; position: relative; left:-20px; "><img src="public/site_images/plum_logo_name.png" /></div>

		<div style="position: absolute; top: 40%; text-align: center; width: 98%; font-family: 'Lato', Arial; font-size: 50px; color:white;">
			<h1>THANK YOU</h1>
			<h2 style="font-size: 30px; margin-top: 20px; color:white;">Our Design Team Will Be Checking Your Design And Your Page Will Be Live Shortly!</h2>
		</div>

	</body>
</html>