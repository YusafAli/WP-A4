<?php
	session_start();
	$aFile = fopen("onlinePlayers.txt", "r");
	$temp = fgets($aFile);
	fclose($aFile);
	$temp = $temp + 1;
	$aFile = fopen("onlinePlayers.txt", "w");
	fwrite($aFile, $temp);
	fclose($aFile);
	
?>
<script>location.href = "http:///localhost:8500//WP%20A4//Hangman.php"</script>