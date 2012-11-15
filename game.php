<?php
	include ("./constants.php");
	include ("./dbconnect.php");
	include ("./dbfuncs.php");
	include ("./funcs.php");
	
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
			<?php
				$backLink = "./week.php?week=" . $week;
				include ("./header.php");
			?>
			<div data-role="header">
				<center>
					<?= $awayTeam[0]["name"] ?> @ <?= $homeTeam[0]["name"] ?>
				</center>
			</div>
		
			<div data-role="content">
				<table class="playtable">
					<!--tr>
						<th>Quarter</th>
						<th>Clock</th>
						<th>Description</th>
						<th><?= $awayTeam[0]["name"] ?></th>
						<th><?= $homeTeam[0]["name"] ?></th>
					</tr-->
					<?php
						$curquarter = $playResult[0]["quarter"];
					?>
						<tr>
							<td></td>
							<td><center><h3>Quarter <?= $curquarter ?></h3></center>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<th>Clock</th>
							<th>Play</th>
							<th><?= strtoupper(substr($awayTeam[0]["name"], 0, 3)) ?></th>
							<th><?= strtoupper(substr($homeTeam[0]["name"], 0, 3)) ?></th>
						</tr>
					<?
						foreach ($playResult as $play)
						{
							$quarter = $play["quarter"];
							if ($quarter != $curquarter)
							{
								$curquarter = $quarter;
					?>
								<tr>
									<td></td>
									<td><br><center><h3>Quarter <?= $curquarter ?></h3></center>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<th>Clock</th>
									<th>Play</th>
									<th><?= strtoupper(substr($awayTeam[0]["name"], 0, 3)) ?></th>
									<th><?= strtoupper(substr($homeTeam[0]["name"], 0, 3)) ?></th>
								</tr>
					<?php
							}
					?>
							<tr>
								<td><?= $play["clock"] ?></td>
								<td><?= processDescription($db, $play["description"], array(), $gameId, $week) ?></td>
								<td><?= $play["awayScore"] ?></td>
								<td><?= $play["homeScore"] ?></td>
							</tr>
					<?php
						}
					?>
				</table>
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
