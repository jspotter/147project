<?php
	include ("./constants.php");
	include ("./dbconnect.php");
	include ("./dbfuncs.php");
	
	$termId = $_GET["termId"];
	$gameId = $_GET["gameId"];
	$week = $_GET["week"];
	
	//TODO handle invalid input
	//TODO put week in the database?
	//TODO support lookup chaining
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
				<a href="../147project/game.php?id=<?= $gameId ?>&week=<?= $week ?>">
					Back
				</a>
				<h1>Football 4 Noobz</h1>
			</div><!-- /header -->
			<div data-role="header">
				<h1>
					<?= $term ?>
				</h1>
			</div>
		
			<div data-role="content">
				<center>
					<?php
						$termResult = executeQuery($db,
							"select * from Term where id = '" . $termId . "';");
						if (count($termResult) == 0)
						{
					?>
							Sorry, we could not find a definition for <?= $term ?>.
					<?php
						}
						else
						{
							$term = $termResult[0];
					?>
							<h1><?= $term["name"] ?> (<?= $term["type"] ?>)</h1>
					<?php
							if ($term["type"] == "player")
							{
								$playerResult = executeQuery($db,
									"select * from Player where name = '" . $term["name"] . "';");
								$player = $playerResult[0];
								$teamResult = executeQuery($db,
									"select * from Team where id = " . $player["teamId"] . ";");
								$team = $teamResult[0];
					?>
								<table>
									<tr>
										<td><b>Team:</b></td>
										<td><?= $team["name"] ?></td>
									</tr>
									<tr>
										<td><b>Number:</b></td>
										<td><?= $player["number"] ?></td>
									</tr>
									<tr>
										<td><b>Position:</b></td>
										<td><?= $player["position"] ?></td>
									</tr>
									<tr>
										<td><b>Weight:</b></td>
										<td><?= $player["weight"] ?></td>
									</tr>
									<tr>
										<td><b>Year:</b></td>
										<td><?= $player["year"] ?></td>
									</tr>
									<tr>
										<td><b>Background:</b></td>
										<td><?= $player["background"] ?></td>
									</tr>
								</table>
					<?php
							}
							else if ($term["type"] == "position")
							{
								$positionResult = executeQuery($db,
									"select * from Position where abbreviation = '" . $term["name"] . "';");
								$position = $positionResult[0];
					?>
								<b><?= $position["name"] ?> (<?= $position["abbreviation"] ?>): </b>
								<?= $position["description"] ?>
					<?php
							}
							else
							{
					?>
								<b><?= $term["name"] ?>: </b>
								<?= $term["description"] ?>
					<?php
							}
						}
					?>
				</center>
			</div>
		</div>
	</body>
</html>

<?php
	include ("./dbdisconnect.php");
?>
