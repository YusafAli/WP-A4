<!DOCTYPE HTML>
<HTML>
<HEAD>
</HEAD>
<BODY>
	<?php
	if(isset($_POST["user"]) && isset($_POST["rpassword"]) && isset($_POST["password"]) && isset($_POST["age"]) && isset($_POST["email"]))
	{	$user = $_POST["user"];$pass = $_POST["password"];$email=$_POST["email"];$age=$_POST["age"];
		$encpass = md5($pass);
		$sql = "INSERT INTO usernames (id, username, password, age, email)
		VALUES (NULL, '".$user."', '".$encpass."', ".$age.",'".$email."')";
		$liable = mysqli_connect("localhost", "wpa4register", "webuser4");
		if(!$liable){die("Connection: " . mysqli_connect_error());}
		else
		{
			$seldb = mysqli_select_db($liable, "wpa4");
			$result = mysqli_query($liable, $sql);
			if($result == FALSE)
			{
				?><script>location.href = "Login.html"</script><?php
			}
			else
			{
				?><script>location.href = "startsession.php"</script><?php
			}
		}
		mysqli_close($liable);
	}
	?>
</BODY>
</HTML>