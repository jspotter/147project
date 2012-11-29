<?php
	include ("./constants.php");
	include ("./dbconnect.php");
	include ("./dbfuncs.php");
	include ("./funcs.php");
	
	$termIdsString = $_GET["termIds"];
	$gameId = $_GET["gameId"];
	$week = $_GET["week"];
	
	//TODO handle invalid input
	//TODO put week in the database?
	
	$termIds = explode(",", $termIdsString);
	$backTermIds = array_slice($termIds, 0, count($termIds) - 1);	
	if (count($backTermIds) == 0)
	{
		if ($gameId == null && $week == null)
		{
			$backLink = "./weeks.php";
		}
		if ($gameId == null)
		{
			$backLink = "./week.php?week=" . $week;
		}
		else
		{
			$backLink = "./game.php?id=" . $gameId . "&week="
				. $week;
		}
	}
	else
	{
		$backLink = "./term.php?termIds=" . implode(",", $backTermIds)
			. "&gameId=" . $gameId . "&week=" . $week;
	}
	$termId = $termIds[count($termIds) - 1];
	
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
					<?= $term ?>
				</h1>
			</div>
			
			<?php
				include ("./termcontent.php");
				include ("./footer.php");
			?>
		</div>
	</body>
</html>

<?php
	include ("./dbdisconnect.php");
?>
