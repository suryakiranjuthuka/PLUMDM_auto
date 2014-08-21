<?php

	  //special case session must be started before its destroyed
	  session_start();
		
	  //destroy session to kill past session variables
	  //session_destroy();
	  unset($_SESSION['b_logo']);
	  unset($_SESSION['r_logo']);
	  unset($_SESSION['p_logo']);
	  unset($_SESSION['b_name']);
	  unset($_SESSION['r_name']);
	  unset($_SESSION['r_two_name1']);
	  unset($_SESSION['r_two_name2']);
	  unset($_SESSION['c_lp_client_name1']);
	  unset($_SESSION['c_lp_sales_rep1']);
	  unset($_SESSION['c_lp_email1']);
	  unset($_SESSION['c_lp_city1']);
	  unset($_SESSION['c_lp_state1']);
	  unset($_SESSION['c_lp_zip_code1']);
	  unset($_SESSION['c_lp_notes1']);
	  unset($_SESSION['c_lp_client_monitor']);
	  unset($_SESSION['file_identifier']);
	  unset($_SESSION['c_lp_attachment_url']);
	  unset($_SESSION['c_lp_website_url1']);

?> 

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Plum's Create A Landing Page!</title>
<link rel="shortcut icon" href="INDEX/site_images/plum_logo-favicon.ico" >
<script type="text/javascript" src="//use.typekit.net/xpz1rlh.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
<link type="text/css" rel="stylesheet" href="INDEX/stylesheets/plumdm_auto.css">
</head>

<body>

<header>
	<div id="header_container">
		<a href="http://plumdirectmarketing.com/"><img id="header_logo" src="INDEX/site_images/plum_logo.png"></a>
		<a target="_blank" href="http://plumdm.com/landings/seminar_secrets/"><img id="header_webinar" src="INDEX/site_images/webinar.png"></a>
	<div id="contact_info">
		<p>Dartmouth, MA</br>+ 1 800 992 9663&nbsp;&nbsp;|&nbsp;&nbsp;<a href="mailto:support@plumdirectmarketing.com?Subject=Need%20Information" target="_top">Email us</a></p>
	</div>
	</div>
	
	<div id="header_container_float_nav">
		<a href="http://plumdirectmarketing.com/"><img height="60" id="header_logo" src="INDEX/site_images/plum_logo.png"></a>
		<nav id="floatingNavigation">
		<ul id="floatingNavbar">
		 	<li class="pagelinks"><a href="#seminars" class="scroller-link">Seminars</a></li><span class="seperator">|</span>
		 	<li class="pagelinks"><a href="#workshops" class="scroller-link">Workshops</a></li><span class="seperator">|</span>
		 	<li class="pagelinks"><a href="#ssworkshops" class="scroller-link">Social Security Workshops</a></li><span class="seperator">|</span>
		 	<li class="pagelinks"><a href="#oneonone" class="scroller-link">One-On-One Appointments</a></li>
		</ul>
	</nav>
	</div>
</header>
	<nav id="navigation">
		<ul id="navbar">
		 	<li class="pagelinks"><a href="http://plumdirectmarketing.com/products/">The Goods</a></li>
		 	<li class="pagelinks"><a href="http://plumdirectmarketing.com/videos/">Videos</a></li>
		 	<li class="pagelinks"><a href="http://plumdirectmarketing.com/meet-us/">The Gang</a></li>
		 	<li class="pagelinks"><a href="http://plumdirectmarketing.com/about/">Our Story</a></li>
		 	<li class="pagelinks"><a href="http://plumdirectmarketing.com/contact-us/">Contact Us</a></li>
		 	<li class="pagelinks"><a href="http://plumdirectmarketing.com/giving-back/">Giving Back</a></li>
		 	<li class="pagelinks" style="margin-right:0px;"><a href="http://plumdirectmarketing.com/raving-fans/">Raving Fans</a></li>
		</ul>
	</nav>
	
<section id="templatesInfo">
	<div class="buckets" id="seminarInfo">
		<h1>Seminars</h1>
		<img height="140px" src="INDEX/site_images/placeholder.jpg"/>
		<div class="contentInfo">
			<p> Will you be serving food at your event? Are you holding it at a restaurant or catered venue? Then THIS is YOUR landing page!</p>
		</div>
		<a href="#seminars" class="scroller-link1"><div class="transition1 templateInfoButton">Choose Design</div></a>
	</div>
	
	<div class="buckets" id="workshopInfo">
		<h1>Workshops</h1>
		<img height="140px" src="INDEX/site_images/placeholder.jpg"/>
		<div class="contentInfo">
			<p>Holding a workshop at a library, community center or college campus? Our workshop landing page is the perfect fit.</p>
		</div>
		<a href="#workshops" class="scroller-link1"><div class="transition1 templateInfoButton">Choose Design</div></a>
	</div>
	
	<div class="buckets" id="ssWorkshopInfo">
		<h1>Social Security Workshops</h1>
		<img height="140px" src="INDEX/site_images/placeholder.jpg"/>
		<div class="contentInfo">
			<p>Is your workshop social-security specific? This landing page includes a video about social security and event information for your prospects.</p>
		</div>
		<a href="#ssworkshops" class="scroller-link1"><div class="transition1 templateInfoButton">Choose Design</div></a>
	</div>
	
	<div class="buckets" id="oneOnOneInfo">
		<h1>One-On-One Appointments</h1>
		<img height="140px" src="INDEX/site_images/placeholder.jpg"/>
		<div class="contentInfo">
			<p>Using our turn-key One-On-One appointment mailer? Look professional with this appointment landing page.</p></br>
		</div>
		<a href="#oneonone" class="scroller-link1"><div class="transition1 templateInfoButton">Choose Design</div></a>
	</div>
</section>

<div id="templatesContainer">
<section class="sectionBackground" id="seminars">
	<h1>Seminars</h1>
	<p> Will you be serving food at your event? Are you holding it at a restaurant or catered venue? Then THIS is YOUR landing page!</p>
	<div class="eachTemplateContainer"><a href="http://www.plumdm.com/newseminar/" target="_blank"><img src="INDEX/template_images/seminar1.jpg" width="570"></a>
	<a href="seminar1/upload_seminar1.php"><div class="transition1 templateButton">Select Template</div></a></div>
	
	<div class="eachTemplateContainer"><a href="http://www.plumdm.com/newseminar2/" target="_blank"><img src="INDEX/template_images/seminar2.jpg" width="570"></a>
	<a href="seminar2/upload_seminar2.php"><div class="transition1 templateButton">Select Template</div></a></div>
</section>

<section class="sectionBackground1" id="workshops">
	<h1>Workshops</h1>
	<p>Holding a workshop at a library, community center or college campus? Our workshop landing page is the perfect fit.</p>
	<div class="eachTemplateContainer"><a href="http://www.plumdm.com/newseminar/" target="_blank"><img src="INDEX/template_images/ssworkshop1.jpg" width="570"></a>
	<a href="workshop/upload_seminar.php"><div class="transition1 templateButton">Select Template</div></a></div>
</section>
	
<section class="sectionBackground" id="ssworkshops">
	<h1>Social Security Workshops</h1>
	<p> Is your workshop social-security specific? This landing page includes a video about social security and event information for your prospects.</p>
	<div class="eachTemplateContainer"><a href="http://www.retirementworkshop.info/" target="_blank"><img src="INDEX/template_images/ssworkshop1.jpg" width="570"></a>
	<a href="ssworkshop2/upload_seminar1.php"><div class="transition1 templateButton">Select Template</div></a></div>
	
	<div class="eachTemplateContainer"><a href="http://www.maximizemyretirement.org/" target="_blank"><img src="INDEX/template_images/ssworkshop2.jpg" width="570"></a>
	<a href="ssworkshop2/edit_seminar2.php"><div class="transition1 templateButton">Select Template</div></a></div>
</section>
	
<section class="sectionBackground1" id="oneonone">
	<h1>One-On-One Appointments</h1>
	<p>Using our turn-key One-On-One appointment mailer? Look professional with this appointment landing page.</p>
	<div class="eachTemplateContainer"><a href="http://www.plumdm.com/newseminar/" target="_blank"><img src="INDEX/template_images/ssworkshop1.jpg" width="570"></a>
	<a><div class="transition1 templateButton">Select Template</div></a></div>
	
	<div class="eachTemplateContainer"><a href="http://www.plumdm.com/newseminar/" target="_blank"><img src="INDEX/template_images/ssworkshop2.jpg" width="570"></a>
	<a><div class="transition1 templateButton">Select Template</div></a></div>
</section>
</div>


<footer>PLUMDM</footer>


<script src="INDEX/javascripts/d3.min.js"></script>
<script src="INDEX/javascripts/jquery-2.0.3.min.js"></script>

<script>

	$(function(){
    /*-- Scroll to link --*/
	    $('.scroller-link').click(function(e){
	        e.preventDefault(); //Don't automatically jump to the link
	        id = $(this).attr('href').replace('#', ''); //Extract the id of the element to jump to
	        $('html,body').animate({scrollTop: $("#"+id).offset().top-$(this).closest('ul').height()-30},'normal');
	    });
	});
	
	$(function(){
    /*-- Scroll to link --*/
	    $('.scroller-link1').click(function(e){
	        e.preventDefault(); //Don't automatically jump to the link
	        id = $(this).attr('href').replace('#', ''); //Extract the id of the element to jump to
	        $('html,body').animate({scrollTop: $("#"+id).offset().top-$(this).closest('ul').height()-300},'normal');
	    });
	});

	$(window).scroll(function(){
		var top = $(this).scrollTop();
		if(top > 180){
			$("#header_container").hide();
			$("#navigation").hide();
			$("header").css("position", "fixed");
			$("#header_container_float_nav").slideDown("fast");
		}else{
			$("#header_container_float_nav").hide();
			$("header").css("position", "relative");
			$("#header_container").slideDown("fast");
			$("#navigation").show();
		}
	});
</script>




</body>
</html>