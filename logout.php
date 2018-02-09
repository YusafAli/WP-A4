<?php
	//Destroy the session
	session_start();
	$_SESSION = array();
	session_destroy();
	
	// The following procedure is to decrement the number of current ongoing sessions
	$aFile = fopen("onlinePlayers.txt", "r");
	$temp = fgets($aFile);
	fclose($aFile);
	if($temp > 0)
		$temp = $temp - 1;
	else if($temp < 0)
	{
		$temp = 0;
	}
	$aFile = fopen("onlinePlayers.txt", "w");
	fwrite($aFile, $temp);
	fclose($aFile);
?>
<script>
	location.href = "Login.html";
</script>