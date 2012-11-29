<?php
	include ("./constants.php");
	include ("./dbconnect.php");
	include ("./dbfuncs.php");
	include ("./funcs.php");
	
	$gameId = $_GET["gameId"];
	$week = $_GET["week"];
	
	if ($gameId == null && $week == null)
	{
<<<<<<< HEAD:search.php
		$backLink = "./weeks.php";
	}
	else if ($gameId == null)
	{
		$backLink = "./week.php?week=" . $week;
=======
		$backLink = "./index.php#week" . $week;
>>>>>>> 73960d1f693142c97fd6cc3aaf14bd14108a2fa2:primary/search.php
	}
	else
	{
		$backLink = "./game.php?id=" . $gameId . "&week=" . $week;
	}
?>

<html>
	<head>
		<script src="http://cdn.optimizely.com/js/138697994.js"></script>
		<title>Football 4 Noobz</title>
		<meta charset="utf-8">
		<meta name="apple-mobile-web-app-capable" content="yes">
	 	<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta name="viewport" content="width=device-width, initial-scale=1"> 

		<link rel="stylesheet" href="jquery.mobile-1.2.0.css" />

		<link rel="stylesheet" href="style.css" />
		<!-- link rel="apple-touch-icon" href="appicon.png" /-->
		<!-- link rel="apple-touch-startup-image" href="upstart.png"-->
	
		<script src="jquery-1.8.2.min.js"></script>
		<script src="jquery.mobile-1.2.0.js"></script>
	</head>
	<body>
		<div data-role="page">
			<?php
				include ("./header.php");
			?>
			<div data-role="header">
				<h1>
					Search
				</h1>
			</div>
			
			<script type="text/javascript">
			
				// Code for keypress() adapted from 
				// http://bytes.com/topic/javascript/answers/92476-handling-enter-key-text-input-field
				function keypress(week, gameId)
				{
					var key = window.event.keyCode || window.event.which;
					if (key == 13)
					{
						submitform(week, gameId);
					}
				}
			
				function submitform(week, gameId)
				{
					$.ajax({
						url: "termcontent.php?week=" + week + "&gameId=" + gameId + "&term=" + $("#query").val()
					}).done(function(data) {
						$("#result").html(data);
					});
				}
			</script>
			
			<input type="text" id="query" name="query" 
				onkeypress="keypress('<?= $week ?>', '<?= $gameId ?>');" />
			<input type="submit" name="submit" value="Search" 
				onclick="submitform('<?= $week ?>', '<?= $gameId ?>');" />
			
			<div id="result">
			</div>
			
			<?php
				include ("./footer.php");
			?>
		</div>
	</body>
</html>

<?php
	include ("./dbdisconnect.php");
?>
