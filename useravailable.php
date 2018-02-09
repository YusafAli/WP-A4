<!DOCTYPE HTML>
<HTML>
<BODY>
	<?php
		// Connect database
		$dbconnect = mysqli_connect("localhost","wpa4login","webuser4");
		if(!$dbconnect)
		{die();}
		else
		{
			// Select database
			$dbdb = mysqli_select_db($dbconnect, "wpa4");
			// Query
			$query = "SELECT count(id) FROM usernames WHERE username='".$_POST["name"]."'";
			// Run the query
			$result = mysqli_query($dbconnect, $query);
			// Igor!, Fetch me the array
			$row = mysqli_fetch_array($result);
			// Check if username is available
			if($row[0] == 0)
			{
				echo "Available";
			}
			else
			{
				echo "Already in use. " . $row[0];
				echo "Try " . $_POST["name"] . rand(1,5) .", " . $_POST["name"] . rand(6,9);
			}
			mysqli_close($dbconnect);
		}
	?>
</BODY>
</HTML>