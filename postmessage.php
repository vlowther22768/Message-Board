<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Post Message</title>
</head>
<body>
	<?php
		if(isset($_POST["submit"])) {
			$Subject = stripslashes($_POST["subject"]);
			$Name = stripslashes($_POST["name"]);
			$Message = stripslashes($_POST["message"]);
			// Replace any '~' characters with '-' characters
			$Subject = str_replace("~", "-", $Subject);
			$Name = str_replace("~", "-", $Name);
			$Message = str_replace("~", "-", $Message);
			// Create a string out of all the values from the $_POST array
			$MessageRecord = "$Subject~$Name~$Message\n";
			// Starting working with file data
			$MessageFile = fopen("MessageBoard/messages.txt", "a");
			// check to see if the $MessageFile is valid
			if($MessageFile == FALSE) {
				echo "<p>There was an error in saving your message!</p>";
			} else {
				fwrite($MessageFile, $MessageRecord);
				fclose($MessageFile);
				echo "<p>Your message has been saved!</p>";
			}
		}
	 ?>
	 <h1>Post New Message</h1>
	 <hr/>
	 <form action="postmessage.php" method="POST">
	 	<label style="font-weight: bold;" for="sub">Subject:</label>
	 	<input type="text" name="subject" id="sub" />
	 	<label style="font-weight: bold;" for="n">Name:</label>
	 	<input type="text" name="name" id="n" />
	 	<br/>
	 	<textarea name="message" rows="6" cols="80"></textarea>
	 	<br/>
	 	<input type="submit" name="submit" value="Post Message" />
	 	<input type="reset" name="reset" value="Reset Form" />
	 </form>
	 <hr/>
	 <p><a href="messageboard.php">View Messages</a></p>
</body>
</html>