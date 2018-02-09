<?php
	session_start();
	
?>
<!DOCTYPE HTML>
	<head>
		<title>Hangman</title>
		<style>
			body{background-color:#cccccc;}
			button{cursor:pointer;}
			
			#selectionsdiv{float:right;}
			.selections{width:30px;height:30px;border: 1px solid purple;background-color: #e2e9f3;}
			.selections:hover{background-color:#ffffff;}
			
			table{border:5px solid purple;}
			
			#gamepanel{border:2px solid purple;position:absolute;left:50%;border-radius: 5px;
			transform: translate(-50%, 0%);}
			
			#d1, #d2, #d3, #d4, #d5, #d6, #d7, #d8, #d9, #d10, #over {visible:0;}
			td{border: 0px solid red;}
			
			#startbutton:hover{background-color:#ffffff;}
			#startbutton{font-size:25px;border-color:purple;border-radius:15px;background-color:#e2e9f3;
			position:absolute;left:50%;top:80%;height:50px;width:40%;transform: translate(-50%, 0%);}
			
			#aftercongratsdiv{border: 1px solid red;position:absolute;left:50%;transform: translate(-50%, 0%);}
			
			footer{background-color:black;color:white;text-align:center;padding:5px;width:99%;
			position:absolute;left:50%;bottom:0%;transform: translate(-50%,0%);}
			
			#logout{position:absolute; top:90%; right:0%; border-radius: 4px; background-color: #e2a9f3;
			border: 1px solid purple; width: 5%; height: 5%;}
			#logout:hover{background-color:#ffffff;}
		</style>
		<script src="jquery-1.12.3.js"></script>
		<script>
			var words = ["gujranwala", "lahore", "sargodha", "sialkot",
			"multan", "sheikhupura", "bahawalpur", "rawalpindi", 
			"sahiwal", "faisalabad", "gujrat", "jhang"];
			var itt = 0;
			var gsel = 0;
			var lefts = 0;
			var wrongWords = 0;
			var correctWords = 0;
			var selectedWord = 0;
			$(document).ready(function(){$("#btn1").click(function()
			{
				$("#btn2").html(words.join(",<br/>"));
				$("#btn2").toggle();
			})});
			$(document).ready(function(){$("#logout").click(function()
			{
				location.href = "http:///localhost:8500//WP%20A4//logout.php";
			})})
			function disable_all_buttons()
			{
				for(var i = 1; i < 27; i++)
				$("#sel"+i.toString()).attr("disabled", "disabled");
			}
			function enable_all_buttons()
			{
				for(var i = 1; i < 27; i++)
				$("#sel"+i.toString()).removeAttr("disabled");
			}
			function hidethem()
			{
				for(i = 0; i < 11; i++) $("#d"+i.toString()).hide();
				$("#over").hide();
				$("#congrats").hide();
			}
			function wrongInput()
			{
				itt++;
				$("#d"+itt.toString()).show();
				if(itt == 10)
				{	
					$("#over").show();
					$("#startbutton").show();
					wrongWords++;
					$("#wrong").html("Wrong: "+wrongWords);
					hidethem();
					itt = 0;
					disable_all_buttons();
				}
			}
			function dummy()
			{
				$("#worse").html(selectedWord);
				$("#correct").html("Correct: "+correctWords);
				$("#wrong").html("Wrong: "+wrongWords);
			}
			function worderMake()
			{
				var gsel = parseInt(Math.random()*12);
				alert(gsel);
				selectedWord = words[Number(gsel)];
				lefts = selectedWord.length;
				itt = 0;
				$("#startbutton").hide();
				$("#congrats").hide();
				$("#over").hide();
				enable_all_buttons();
				hidethem();
				dummy();
			};
			function sel(valas)
			{
				if(selectedWord.search(valas) != -1)
				{
					//Do nothing
					lefts--;
					var x, y;
					x = selectedWord.substring(0,selectedWord.search(valas));
					y = selectedWord.slice(selectedWord.search(valas)+1);
					selectedWord = x.toString() + "-" + y.toString();
					$("worse").html(selectedWord);
					if(lefts <= 0)
					{
						$("#congrats").show();
						correctWords++;
						$("#correct").html("Correct: "+correctWords);
						$("#startbutton").show();
					}
				}
				else
				{
					wrongInput();
				}
			}
			function showMePlayers()
			{
				$("#temp").load("onlinePlayers.txt");
			}
			function startingfunction()
			{
				hidethem();
				showMePlayers();
			}
		</script>
	</head>
	<body onload="startingfunction()">
		<div id="selectionsdiv">
		<table><tr>
			<td><button class="selections" id="sel1" value='a' onclick="sel('a')">A</button></td>
			<td><button class="selections" id="sel2" value='b' onclick="sel('b')">B</button></td>
			<td><button class="selections" id="sel3" value='c' onclick="sel('c')">C</button></td>
			<td><button class="selections" id="sel4" value='d' onclick="sel('d')">D</button></td>
			<td><button class="selections" id="sel5" value='e' onclick="sel('e')">E</button></td></tr>
		<tr><td><button class="selections" id="sel6" value='f' onclick="sel('f')">F</button></td>
			<td><button class="selections" id="sel7" value='g' onclick="sel('g')">G</button></td>
			<td><button class="selections" id="sel8" value='h' onclick="sel('h')">H</button></td>
			<td><button class="selections" id="sel9" value='i' onclick="sel('i')">I</button></td>
			<td><button class="selections" id="sel10" value='j' onclick="sel('j')">J</button></td></tr>
		<tr><td><button class="selections" id="sel11" value='k' onclick="sel('k')">K</button></td>
			<td><button class="selections" id="sel12" value='l' onclick="sel('l')">L</button></td>
			<td><button class="selections" id="sel13" value='m' onclick="sel('m')">M</button></td>
			<td><button class="selections" id="sel14" value='n' onclick="sel('n')">N</button></td>
			<td><button class="selections" id="sel15" value='o' onclick="sel('o')">O</button></td></tr>
		<tr><td><button class="selections" id="sel16" value='p' onclick="sel('p')">P</button></td>
			<td><button class="selections" id="sel17" value='q' onclick="sel('q')">Q</button></td>
			<td><button class="selections" id="sel18" value='r' onclick="sel('r')">R</button></td>
			<td><button class="selections" id="sel19" value='s' onclick="sel('s')">S</button></td>
			<td><button class="selections" id="sel20" value='t' onclick="sel('t')">T</button></td></tr>
		<tr><td><button class="selections" id="sel21" value='u' onclick="sel('u')">U</button></td>
			<td><button class="selections" id="sel22" value='v' onclick="sel('v')">V</button></td>
			<td><button class="selections" id="sel23" value='w' onclick="sel('w')">W</button></td>
			<td><button class="selections" id="sel24" value='x' onclick="sel('x')">X</button></td>
			<td><button class="selections" id="sel25" value='y' onclick="sel('y')">Y</button></td></tr>
		<tr><td colspan="5" align="center"><button class="selections" id="sel26" value='z' onclick="sel('z')">Z</button></td></tr>
		</table>
		<p id="correct">Correct: 0</p>
		<p id="wrong">Wrong: 0</p>
		</div>
		<div id="gamepanel">
		<!--This is where the game will be shown-->
			<svg width = "500" height = "500">
			<line id='d6' x1 = '350' x2 = '350' y1 = '100' y2 = '250'
			stroke = #bb1090 stroke-width = '10' stroke-linecap = 'butt' />
			<line id='d7' x1 = '350' x2 = '300' y1 = '102' y2 = '150'
			stroke = #bb1090 stroke-width = '10' stroke-linecap = 'round' />
			<line id='d8' x1 = '350' x2 = '400' y1 = '102' y2 = '150'
			stroke = #bb1090 stroke-width = '10' stroke-linecap = 'round' />
			<line id='d9' x1 = '350' x2 = '300' y1 = '250' y2 = '350'
			stroke = #bb1090 stroke-width = '10' stroke-linecap = 'round' />
			<line id='d10' x1 = '350' x2 = '400' y1 = '250' y2 = '350'
			stroke = #bb1090 stroke-width = '10' stroke-linecap = 'round' />
			<rect id='d1' x='50' y='450' rx='5' width='200' height='45'
			stroke='black' fill='grey' stroke-width='0' />
			<line id='d2' x1 = '100' x2 = '100' y1 = '450' y2 = '25'
			stroke = 'grey' stroke-width = '10' stroke-linecap = 'round' />
			<line id='d3' x1 = '100' x2 = '350' y1 = '25' y2 = '25'
			stroke = 'grey' stroke-width = '10' stroke-linecap = 'round' />
			<line id='d4' x1 = '350' x2 = '350' y1 = '25' y2 = '100'
			stroke = 'grey' stroke-width = '10' stroke-linecap = 'round' />
			<circle id='d5' cx=350 cy=100 r=25 stroke="black" stroke-width=1 fill=#e0e0e0 />
			<text id='over' fill="#000000" font-size="25" font-family="times" x="150" y="100">Game Over</text>
			<text id='congrats' fill="#000000" font-size="25" font-family="times" x="150" y="100">Congrats!!</text>
			</svg>
		</div>
		<button id="logout">Logout</button>
		<button id="btn1">Show all cities</button>
		<p id="btn2">-------------</p>
		<button id="startbutton" onclick="worderMake()">Start</button>
		<div id="worder">
			<p>Word Could Be</p>
			<p id="worse"> </p>
		</div>
		<footer>
			Online Players: <span id="temp"></span>
		</footer>
	</body>
</html>






















