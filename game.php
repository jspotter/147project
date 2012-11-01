<?php
	include ("./constants.php");
	include ("./dbconnect.php");
	include ("./dbfuncs.php");
	
	$gameId = $_GET["id"];
	$week = $_GET["week"];
	//TODO handle faulty game id
	$gameResult = executeQuery($db, "select * from Game where id = "
		. $gameId . ";");
	$playResult = executeQuery($db, "select * from Play where gameId = "
		. $gameId . " order by quarter desc, clock;");
	$awayTeam = executeQuery($db, "select * from Team where id = " 
		. $gameResult[0]["awayTeamId"] . ";");
	$homeTeam = executeQuery($db, "select * from Team where id = " 
		. $gameResult[0]["homeTeamId"] . ";");
?>

<html>
	<head>
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
			<div data-role="header">
				<a href="../#week<?= $week ?>">
					Back
				</a>
				<h1>Football 4 Noobz</h1>
			</div><!-- /header -->
			<div data-role="header">
				<h1>
					<?= $awayTeam[0]["name"] ?> @ <?= $homeTeam[0]["name"] ?>
				</h1>
			</div>
		
			<div data-role="content">
				<table>
					<tr>
						<th>Quarter</th>
						<th>Clock</th>
						<th>Description</th>
						<th><?= $awayTeam[0]["name"] ?></th>
						<th><?= $homeTeam[0]["name"] ?></th>
					</tr>
					<?php
						foreach ($playResult as $play)
						{
					?>
							<tr>
								<td><?= $play["quarter"] ?></td>
								<td><?= $play["clock"] ?></td>
								<td><?= $play["description"] ?></td>
								<td><?= $play["awayScore"] ?></td>
								<td><?= $play["homeScore"] ?></td>
							</tr>
					<?php
						}
					?>
				</table>
			</div>
		</div>
	</body>
</html>

<?php
	include ("./dbdisconnect.php");
?>
