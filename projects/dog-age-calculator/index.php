<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- google fonts -->
		<link href="https://fonts.googleapis.com/css?family=Chelsea+Market|Roboto:300,400" rel="stylesheet">
		<!-- Custom styles for site  -->
		<link rel="stylesheet" href="../../site/css/slicknav.css">
		<link href="../../site/css/myStyles.css" rel="stylesheet">
		<!-- jQuery and jQuery UI-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
		<!-- Custom UI theme and jQuery Validate-->
        <link href="jquery-ui.css" rel="stylesheet">
        <script src="http://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>

		<!-- Responsive links -->
		<script src="../../site/js/jquery.slicknav.min.js"></script>
		<script src="../../site/js/initResponsive.js"></script>
		<!-- restive js -->
		<script type="text/javascript" src="../../site/js/restive.min.js"></script>
		<script type="text/javascript">
			$(function(){
				if($.restive.isPC())
					{
						$('body').restive({
							breakpoints: ['560', '960'],
							classes: ['mobi phone', 'mobi tablet'],
							force_dip: true
						});
					}
				else if ($.restive.isMobile())
					{
						$('body').restive({
							breakpoints: ['10000'],
							classes: ['nb'],
							turbo_classes: 'is_mobile=mobi,is_phone=phone,is_tablet=tablet,is_landscape=landscape',
							force_dip: true
						});
					}
			});
		</script>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!-- for site responsiveness -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<meta name="keywords" content="andres, jimenez, software, developer, software engineer, software developer">
		<meta name="description" content="Personal Web Page of Andres Jimenez">
		<meta name="author" content="Andres Jimenez">
		<link rel="icon" href="../../favicon.ico" type="image/x-icon">
		<title>Dog Age - Andres J.</title>
		

		<!-- Google Analytics -->
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

			ga('create', 'UA-73977107-1', 'auto');
			ga('send', 'pageview');
		</script>

	</head>

	<body id="projects">    
		<!-- Full Site -->
		<div class="wrapper">

			<!-- Main Menu -->
			<div class="pages">
				<ul id="top-menu">
					<li><a href="../../" id="homeNav">Home</a></li>
					<li><a href="../../about/" id="aboutNav">About</a></li>
					<li><a href="../../contact/" id="contactNav">Contact</a></li>
					<li><a href="../../projects/" id="projectsNav">Projects</a></li>
					<?php
						if (isset($_SESSION['login_user'])) {
							echo "<li id='loginLink'><a href='../../login/logout.php'>Logout</a></li>";
						} else {
							echo "<li id='loginLink'><a href='../../login'>Login</a></li>";
						}
					?>
				</ul>
			</div>

			<!-- Mobile Menu -->
			<div class="mobile_nav">
				<ul class="mobile_menu">
					<li><a href="../../" id="homeNav">Home</a></li>
					<li><a href="../../about/" id="aboutNav">About</a></li>
					<li><a href="../../contact/" id="contactNav">Contact</a></li>
					<li><a href="../../projects/" id="projectsNav">Projects</a></li>
					<li id="loginLink"><a href="../../login">Login</a></li>
				</ul>
			</div>

			<!-- Main Content of Page -->
			<div class="content">
				<div class="page_content">
					<div id="dogAge_heading">
						<p id="welcome_name">
							<?php
								if (isset($_SESSION['login_user'])) {
									echo "Hello " . $_SESSION['login_user'] . ". " . "<a href='../../profile/'>Profile</a>";
								}
							?>
						</p>
						<div id="pagetop-name">
							<p id="pagetop-first">Dog Age</p>
							<p id="pagetop-last">Calculator</p> 
						</div>
						<p id="dogAge_name">Dog Age Calculator</p>
						<p id="dogAge_punchline">find out how old your dog really is...</p>
					</div>
					<div id="dogAge_line"></div>
					<div id="dogAgeCalcDiv">
						<div id="dogFormDiv">
							<form id="getDogInfo">
								<h3 id="dog_calc_heading">How old is your dog? lets find out</h3>
								<fieldset id="dog_radioSet">
									<legend id="dog_size">Select your pup's size</legend>
									<div id="dogSizeError"></div>

									<label for="dogSmall">small<br><small>0-20 lbs.</small></label>
									<input type="radio" id="dogSmall" name="dogAgeRadio" value="1" required>

									<label for="dogMedium">medium<br><small>21-50 lbs.</small></label>
									<input type="radio" id="dogMedium" name="dogAgeRadio" value="2" required>

									<label for="dogLarge">large<br><small>51-90 lbs.</small></label>
									<input type="radio" id="dogLarge" name="dogAgeRadio" value="3" required>

									<label for="dogXLarge">x-large<br><small>90+ lbs</small></label>
									<input type="radio" id="dogXLarge" name="dogAgeRadio" value="4" required>
								</fieldset>
								<fieldset id="dog_human_age">
									<legend id="dog_age_years">Enter pup's current age</legend>
									<div id="humanAgeError"></div>
									<input class="ageInput" id="humanAge" name="humanAge" type="text" maxlength="4" required><br>
								</fieldset>
								<fieldset>
									<button class="dogAgeButton" type="button">Woof!</button>
								</fieldset>
							</form>
							<div id="ageResult">
								<p>Your dog is</p>
								<p id="answer"></p>
								<p>Years old</p>
							</div>
						</div>
					</div>
					<div id="dogAgeInfo">
						<h3>A more accurate calculator</h3>
						<p>There is no scientifically proven or agreed upon formula to calculate the exact age of your dog. 
						Instead, studies have shown that to better determine the approximate age of your dog, we need to consider other factors 
						such as the dog's breed and size or weight. With this calculator you can choose the size of your dog depending 
						on their weight and enter their current age in "human years". With this extra factor, it should give us a more precise 
						estimate of your puppie's actual age. You can get a more accurate result by entering	a decimal after the year to represent 
						months as well. ( e.g. for a 3 year 6 month old dog, enter 3.5 in years )</p>
						
					</div>
					<div id="dogInfo">
						<h4>Get more information about your dog</h4>
						<div id="breeds">
							<!-- <p>Select your breed below</p> -->
							<div id="breedSelectid">
								<select class="breedSelect">
									<option>Select a breed</option>
									<option></option>
								</select>
							</div>
							<div id="breed_img_div">
								<img id="breed_img"scr="" />
							</div>
							<div id="breed_info">
								<table id="breed_table">
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Footer -->
			<?php
			$github_footer = "../../site/media/github_white.png";
			$contact_page = "../../contact/";
			$mail_footer = "../../site/media/mail.png";
			include("../../site/includes/footer.php"); ?>

		<!-- end Footer -->

		<script type="text/javascript" src="dog.js"></script>

	</body>
</html>
