<!DOCTYPE html>
<html lang="en">
 	<head>
 		<title>XKCD Password</title>
    	
    	<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> 

		<!-- Ensure proper rendering on mobile devices -->
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Javascript links -->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    	<script type="text/javascript" src="main.js"></script>
		
		<?php
			$random_words = array(
				"pride",
				"vikings",
				"minnesota",
				"purple",
				"football",
				"touchdown",
				"goal",
				"dome",
				"timeout"
			);

			$characters = array(
				"@",
				"#",
				"%",
				"&"
			);

			$password = "";
		?>
	</head>
	<body>

		<div class = "container-fluid">
			<h1 style="text-align:center">XKCD Password Generator</h1>
			<h2 style="text-align:center; color:purple">MN Vikings Edition</h2><br>
			<p>
				In it's <a href="https://xkcd.com/936/" target="_blank">comic</a>, XKCD claims, 'through 20 years of effort, we've successfully trained everyone to use passwords that are hard for humans to remember, but easy for computers to guess.' The comic suggests that stringing together a series of random words makes a stronger, more memorable password than an obscure password.
			</p>
			<p> This page makes generating your 'XKCD-compliant' password easier by creating one for you based on the parameters you select. And because this site was created during Sunday football and MN won, it includes NFL words - making it fun for fans to enjoy the passwords they create.</p>

			<hr>
			
			<h2 style="text-align:center">Create Your Password</h2>

			<!-- 1. collect rules behind password generator -->
			
			<form action = "" method="post" style="text-align: center">
				<input type="hidden" name="act" value="run">
				How many words to include?
				<select name="words" id="words">
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
				</select>

				<br /><br />
				<input type="checkbox" name="number" > Append a number?&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br /><br />
				<input type="checkbox" name="character"> Append a special character?<br /><br />
				<input type='submit' value='Generate password'><br>
			</form><br />

		
			<?php
				# Don't print password until button pressed
				if (empty($_POST["act"])) {
					$password="";
				} else {
				
					# 2. Grab number of words to include from form
					$count = $_POST["words"];

					# 3. Build password by adding to the string per number of words specified
					$i = 0;
					while ($i<$count-1) {
						$r = rand(0,8); 
						$password = $password.$random_words[$r]."-";
						$i++;
					};
					# this randomly selects another word from array and places it at the end
					$r = rand(0,8); 
					$password = $password.$random_words[$r];
					# (debug) echo "Password is ".$password;

					# 4. add number to string if boolean is true				
					if($_POST["number"]) {
						$random = rand(0,8);
						$password = $password."-".$random;
					}

					# 5. add special character to string if boolean is true 
					if($_POST["character"]) {
						$char_rand = rand(0,3);
						$password = $password."-".$characters[$char_rand];
					}
				}
			?>
		 
			<p style="font-family:courier; font-size:160%; color:purple; text-align:center" class="bg-warning">
				<?php echo " ".$password;?>
			</p>
		</div>
	</body>
</html>
