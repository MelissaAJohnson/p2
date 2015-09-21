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
			<h1>XKCD Password Generator</h1><br />
			<!-- 1. collect rules behind password generator -->
			<form action = "" method="post">
				How many words to include?
				<select name="words" id="words">
					<option>2</option>
					<option>3</option>
					<option>4</option>
					<option>5</option>
					<option>6</option>
					<option>7</option>
					<option>8</option>
					<option>9</option>
				</select>
				<br /><br />
				<input type="checkbox" name="number" > Append a number?<br /><br />
				<input type="checkbox" name="character"> Append a special character?<br /><br />
				<input type='submit' value='Generate password'><br>
			</form><br />


		
			<?php
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
			?>
		 
			<p style="font-family:courier; font-size:160%; color:blue; text-align:center">
				<?php echo " ".$password;?>
			</p>
		</div>
	</body>
</html>
