<!--
Please fill in your name and studentnumber
Studentname:
Studentnumber:
-->

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="description" content=""/>
		<meta name="keywords" content=""/>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<title>Wacky Races | Racer Entry</title>
		
		<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
	</head>
	<body>
		<div class="container">
			<div class="header">
				<div id="logo">
					<img src="img/logo.png" alt="Logo">
				</div>
				<div id="headerTitle">
					<h1>Assignment 1 - Subscribe and show racers</h1>
				</div>			
			</div>
			<!--Errors or succes messages can be displayed as following, adjust this with PHP as you see fit-->
			<div class="succesBar">
				<p>Succes!</p>
			</div>
			<div class="errorBar">
				<p>ERROR!</p>
			</div>
			<div class="content">
				<!--Each racer can be structured as following -->
				<div class="racer">
					<div class="racerImg">
						<img src="img/racerimg/DDM.png">
					</div>
					<div class="racerDetails">
						<p><strong>Racer: </strong>Dick Dastardly and Muttley</p>
						<p><strong>Car: </strong>Mean Machine</p>
					</div>
				</div>
				<!--Keep in mind that you'll need to change this and the above from static HTML to dynamic PHP -->
				<div class="racer">
					<div class="racerImg">
						<img src="img/racerimg/PPF.png">
					</div>
					<div class="racerDetails">
						<p><strong>Racer: </strong>Peter Perfect</p>
						<p><strong>Car: </strong>Turbo Terrific</p>
					</div>
				</div>
				<!--The input form can be added here, you'll need to do this yourself! -->				
			</div>
		</div>	
		
	</body>
</html>