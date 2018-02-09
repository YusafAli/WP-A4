<!DOCTYPE HTML>
<html>
	<body>
		<?php
		if(isset($_POST["SignUp"]))
		{
			echo "Here1";?>
			<script type="text/javascript">location.href = "register.html";</script>
<?php		echo "Here2";
		}
		if(!isset($_POST["SignUp"]) && isset($_POST["SignIn"]) && isset($_POST["user"]) && isset($_POST["pass"]))
		{
			// Put the values from the global variables in variables
			$entereduser = $_POST["user"];$enteredpassword = $_POST["pass"];
			// Query
			$enteredpassword = md5($enteredpassword);
			$sql = "SELECT count(id) FROM usernames WHERE username='".$entereduser."'" 
			. "AND password='".$enteredpassword."'";
			// Connect to the database 
			$dbconnect = mysqli_connect("localhost","wpa4login","webuser4");
			// Check if the db connection is true
			$settruth = false;
			if(!$dbconnect)
			{
				die();
			}
			else
			{
				// Select the db table
				$dbhere = mysqli_select_db($dbconnect, "wpa4");
				// Execute the query and get all the result in $result
				$result = mysqli_query($dbconnect, $sql);
				// Get the first row in a variable
				$row = mysqli_fetch_array($result);
				if($row[0] == 1)
				{
					mysqli_close($dbconnect);
					?><script>location.href="startsession.php"</script><?php
				}
				else
				{
					mysqli_close($dbconnect);
					?><script>location.href="Login.html"</script><?php
				}
				mysqli_free_result($result);
			}
		}
		?>
	</body>
</html>